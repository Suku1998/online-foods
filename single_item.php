<?php 
        session_start();
        include('connect.php');
        $num_cart_item = 0;
        $prod_id = $_GET['prod_id'];
        if(isset($_POST['addtocart'])){
            $cart = array();
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $cart[$prod_id] = $_POST['num_item'];
                $_SESSION['cart'] = $cart;
               // print_r($_SESSION['cart']);
            } else {
                $cart[$prod_id] = $_POST['num_item'];
                $_SESSION['cart'] = $cart;
               // print_r($_SESSION['cart']);
            }       
        } 

        if(isset($_POST['buynow'])){
            $cart = array();
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $cart[$prod_id] = $_POST['num_item'];
                $_SESSION['cart'] = $cart;
               // print_r($_SESSION['cart']);
            } else {
                $cart[$prod_id] = $_POST['num_item'];
                $_SESSION['cart'] = $cart;
               // print_r($_SESSION['cart']);
            }       
            header("Location:placeorder.php");
        }

        if(isset($_SESSION['cart'])){
            $num_cart_item = count($_SESSION['cart']);    
        }

include('header.php');

if(ctype_digit($prod_id)){
    $sql = mysqli_query($conn, "select * from products where pid=$prod_id");

    if(mysqli_num_rows($sql)){  
        $rr = mysqli_fetch_array($sql, MYSQLI_ASSOC);    
    ?>
    <table>
        <tr>
           <td  class="cartss" style="">
               <img class="zoom1" src="<?php echo "image/".$rr['photo']?>" width="300" height="373" alt="<?= $rr['description']?>" title="<?= $rr['description']?>"/>
           </td>
           <td>
              <?php
                 echo $rr['description'];
                 $offer_price = round(($rr['discount']/100) * $rr['price']);
                 $selling_price =  $rr['price'] - $offer_price;
              ?> 
              <form action="" method="post"> 
                <p> <b style="color:green">Special price</b><br/>
                  <b class="special-price"> &#8377; <?=$selling_price?></b> &emsp;
                  <span class="original-price">&#8377; <?=$rr['price']?></span> &emsp;
                  <b style="color:green"><?=$rr['discount']?>% Off</b>                
                  <table> 
                        <tr>
                            <td style="padding-right:20px;">Item available : <span id="available_item"><?=$rr['quantity']?></span></td>
                            <td>Order Item : </td>
                            <td><p class="addremove" onclick="removeItem()">-</p></td>
                            <td><input id="added_item" name="num_item" style="width:30px; text-align:center" type="number" value='1' min="1" max="<?=$rr['quantity']?>" onchange="checkNumItem(this.value)" /></td>
                            <td><p class="addremove" onclick="addItem()">+</p></td>
                        </tr>
                  </table>
                </p>
                <p>
                
                    <!-- <form action="" method="post">
                        <input style="display:none" type="text" name="addtocart" value="1" /> -->
                       <button name="addtocart" style="background-color: #ff9f00;" class="placeorder" onclick="addTocart()">Add to Cart</button> 
                    <!-- </form>     -->
                   <button name="buynow" style="background-color: #fb641b;" class="placeorder">Buy Now</button>
                </p> 
              </form>
            </td>
        </tr> 

    </table>
    <?php
    } else {
        echo "<h1 style='text-align:center; color: red'>Something error occurred..</h1>";
    }
} else {
    echo "<h1 style='text-align:center; color: red'>Something error occurred...</h1>";
} 

?>
<script>
function addItem(){
    var item_available = parseInt(document.getElementById('available_item').innerHTML, 10);
    var item_added = parseInt(document.getElementById('added_item').value, 10);
    if(item_available > item_added){
        //alert(item_available - item_added);
        item_added++;
        document.getElementById('added_item').value = item_added;
    } else {
        alert("You can not add more than available item.");
    }
}

function removeItem(){
    var item_available = parseInt(document.getElementById('available_item').innerHTML, 10);
    var item_added = parseInt(document.getElementById('added_item').value, 10);
    if(item_added > 1){
        //alert(item_available - item_added);
        item_added--;
        document.getElementById('added_item').value = item_added;
    } else {
        alert("Minimum item 1.");
    }
}

function checkNumItem(num){
    var item_available = parseInt(document.getElementById('available_item').innerHTML, 10);
    var item_added = parseInt(document.getElementById('added_item').value, 10);
    if(item_added > item_available){
        document.getElementById('added_item').value = item_added;
    } else if(item_added < 1){
        document.getElementById('added_item').value = 1;
    }
}
</script>
<?php
include('footer.php');
?>