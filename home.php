<?php
  session_start();
  $num_cart_item = 0;

  if(isset($_SESSION['cart'])){
	$num_cart_item = count($_SESSION['cart']);    
  }

  if(isset($_POST['uname'], $_POST['psw'])){
	$uname = $_POST['uname'];
    $passw = $_POST['psw'];
	if($uname && $passw){
		include('connect.php');
		$q = mysqli_query($conn,"select * from users where (email='$uname' OR mobile='$uname') AND password='$passw'");
		if(mysqli_num_rows($q)){
			$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
			$_SESSION['uname'] = $uname;
			$_SESSION['paswd'] = $passw;		
        	include('header.php');
			include('allitem.php');
			mysqli_close($conn);
		} else {
			header("Location:index.php");
		}
	} else {
	   header("Location:index.php");
	}
} else if(isset($_SESSION['uname']) && isset($_SESSION['paswd'])){
	     include('connect.php');
	  	 include('header.php');
		 include('allitem.php');
} else {
	header("Location:index.php");
}
include('footer.php');
?>