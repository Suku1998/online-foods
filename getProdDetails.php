<?php
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['paswd'])){
   
include('connect.php');
$num_cart_item = 0;
$q = '';
$p = array();
if(isset($_SESSION['cart'])){
    $q = implode(",",array_keys($_SESSION['cart'])); 
    $p = $_SESSION['cart'];  
    $num_cart_item = count($p);
}

include('header.php');
$result = "No Item to show!!";
$total_price = 0;
if($q){
    $rr = mysqli_query($conn, "select * from products where pid in ($q)");  ?>
<table width="100%">
    <tr>
        <td style="border-right:1px solid #eee">
            <table width="100%" cellspacing="0" cellpadding="3">
                <?php 
    while($row = mysqli_fetch_array($rr, MYSQLI_ASSOC)){
        $tmp = $row["pid"]; 
        ?>
                <tr>
                    <td class="borderBottom">
                        <img src="<?php echo "image/".$row["photo"]?>" height="80" style="max-width:80px"
                            alt="<?=$row["pid"]?>" />
                    </td>
                    <td class="borderBottom">
                        <?=$row["description"]?><br />
                        <?php
                                $offer_price = round(($row['discount']/100) * $row['price']);
                                $selling_price =  $row['price'] - $offer_price;
                                $total_price += $selling_price*$p[$tmp];
                            ?>
                        <b class="special-price"> &#8377; <?=$selling_price?></b> &nbsp;
                        <span class="original-price">&#8377; <?=$row['price']?></span> &nbsp;
                        <b style="color:green"><?=$row['discount']?>% Off</b><br />
                    </td>
                    <td class="borderBottom">
                        <button type="submit" class="removebutton"
                            onclick="removeFromCart('<?=$row['pid']?>', 'remove')">x Remove</button><br />
                        <br>
                        <input style="width:30px!important; text-align:center" type="number" min="1"
                            value="<?=$p[$tmp]?>" onchange="updateCart(<?=$tmp?>,this.value)" /><b> x &#8377;
                            <?=$selling_price?> = &#8377; <span
                                id="selprice<?=$tmp?>"><?=$selling_price*$p[$tmp]?></span></b>
                    </td>
                </tr>
                <?php  }  ?>

            </table>
        </td>
        <td style="padding:10px 20px" valign="top">
            <?php
            $uname = $_SESSION['uname'];
            $passw = $_SESSION['paswd'];
            $email = "";
            $name = "";
            $address = "";
            $mobile = "";
            $sql = mysqli_query($conn,"select * from users where (email='$uname' OR mobile='$uname') AND password='$passw'");
            
            if(mysqli_num_rows($sql)){
                $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                $email = $row['email'];
                $name = $row['name'];
                $address = $row['address'];
                $mobile = $row['mobile'];
            }    
        ?>
            <p> Name : <?=$name?></p>
            <p> Mobile : <?=$mobile?></p>
            <p> Email : <?=$email?></p>
            <p> Address : <?=$address?></p>
            <p> Total Price : <b>&#8377; <span id="tot_price"><?=$total_price?></span></b></p>
            <a class="anchordesign" href="placeorder.php">
                <button type="button" style="background-color: #ff9f00;" class="placeorder">Place Order</button></a>
        </td>
    </tr>
</table>
<script>
function removeFromCart(id, action) {

    if (confirm('Do you want to remove the item from cart!')) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("cartArea").innerHTML = this.responseText;
                window.location = 'getProdDetails.php';
            }
        };
        xhttp.open("GET", "updateCart.php?id=" + id + '&action=' + action, true);
        xhttp.send();
    }
}

function updateCart(pid, pnum) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var tt = JSON.parse(this.responseText);
            document.getElementById("selprice" + pid).innerHTML = tt.itmprice;
            document.getElementById("tot_price").innerHTML = tt.total_price;
        }
    };
    xhttp.open("GET", "updateCart.php?id=" + pid + '&pnum=' + pnum + '&action=update', true);
    xhttp.send();
}
</script>
<?php
} else {
	echo "<br/><br/><h2 style='text-align:center'>No item added to cart, <a href='home.php'>Continue buy.</a></h2>";
}
include('footer.php');
} else {
    header("Location:index.php");
}