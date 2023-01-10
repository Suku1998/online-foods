<style>
    
	.scroll-left {
        height: 30px;
        overflow: hidden;
        position: relative;
        background: #01020B;
        color: white ;
        border: 1px solid black ;
    }

    .scroll-left p {
        position: absolute;
        width: 100%;
        height: 100%;
        margin: 0;
        line-height: 20px;
        text-align: center;
        /* Starting position */
        transform: translateX(100%);
        /* Apply animation to this element */
        animation: scroll-left 15s linear infinite;
    }
	/* Move it (define the animation) */
    @keyframes scroll-left {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

	</style>
  
<section class="food-search text-center">
        <div class="container">
            <form action="#" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
</section>
<!-- <div class="slide3" style="max-width:3600px ;margin:px">
      <div class="row" style="">
	  <div class="col">
  <img class="mySlides" src="image/ads.jpg" style="width:100%;height:200px"> -->
  <!-- <img class="mySlides" src="image/ads2.jpg" style="width:100%;height:200px">
  <img class="mySlides" src="image/ads3.jpg" style="width:100%;height:200px"> -->
  <!-- </div>
  </div>
</div> -->
<div class="scroll-left">
        <p> User can Order and Sell Books in here Click Book Sell here Button and Fill the details and One  </p>
    </div> 
    <div class="row">
        daskljldjajsljdsa
    </div>
<div class="flex-container">
   <?php
	 //session_start();
	 $cartList = array();
	 if(isset($_SESSION['cartList'])){
	 	$cartList = $_SESSION['cartList'];
	 } 
	 $prod = mysqli_query($conn, "select * from products limit 0, 30");  
	 
	 while($rr = mysqli_fetch_array($prod, MYSQLI_ASSOC)){   ?>
		<div class="zoom">
			<!-- items quentity -->
		    <?php if($rr['quantity']) { ?>
			<a style="cursor:pointer; text-decoration:none" href="single_item.php?prod_id=<?=$rr['pid']?>" title="Click to get details...">
			
			<?php } else{ ?>
				<a style="cursor:pointer; text-decoration:none" title="No item available...">
				<p class="outofstock">Out of Stock</p>
			<?php } ?>
				<div style="width:100%; height:100%;">
					<img class="prod" src="<?php echo "image/" . $rr['photo']?>" />
					<div style="height:60px; ">
						<p class="ellipsis"><?=$rr['description']?></p>
						<?php
						     $offer_price = round(($rr['discount']/100) * $rr['price']);
							 $selling_price =  $rr['price'] - $offer_price;
						?>
						<b class="special-price"> &#8377; <?=$selling_price?></b> &nbsp;
						<span class="original-price">&#8377; <?=$rr['price']?></span> &nbsp;
						<b style="color:green"><?=$rr['discount']?>% Off</b><br/>
						
					</div>
				</div>
			</a>	
		</div>
	<?php }
   ?>
</div>	
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}fixed
</script>
