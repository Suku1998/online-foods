<!doctype html>
<html>
<head>
   <title>Food Shopping</title>
   <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>   
	<link href="style3.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="css/style1.css">
    
</head>
<body>
<div  class=""style="background-color:#0d47a1; padding: 3px 2%;">
   <table style="width:100%">
        <tr>
            <td style="text-align:left">
                <a style="padding:0 " href="home.php"><img src="image/logo123.png" style="height:60px" /></a>
            </td>
           
            <td style="text-align:right; color:#fff; font-weight:bold">  
            
              
                 <p style="margin-right:-10px; margin-top:-15px; position:absolute" class="badge">
                    <a class="anchordesign" style="color:#fff" href="getProdDetails.php"><?=$num_cart_item?></a>
                 </p>               
                 <svg class="_2fcmoV" width="15" height="14" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path class="_2JpNOH" d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"></path></svg>
                 Cart
            </td>
            
			<td style="width:65px; padding-left:30px">
			   <a href="?logout=true" style="color:#fff; text-decoration:none">Log Out</a>
			</td>
        </tr>
    </table>    
</div>
<?php
if(isset($_GET['logout'])){
	if(isset($_SESSION['uname'])){
		unset($_SESSION['uname']);
	}
	if(isset($_SESSION['paswd'])){
		unset($_SESSION['paswd']);
	}
	header("Location: index.php");
}