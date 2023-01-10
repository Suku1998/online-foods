<?php
$servername="localhost" ;
                  $username="root" ;
                  $password="" ;
                  $db="online_food" ;
                  $conn= mysqli_connect($servername, $username, $password,$db);
                  if (mysqli_connect_errno()){
                  echo" Failed to connect to MySQL:" . mysqli_connect_error();
                  }
//edite
$book_id=$_POST['pid'];
$query = "SELECT * from products where pid='$book_id'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
  while($result=mysqli_fetch_array())
  {
      ?>

      <?php
  }
}else{
    echo '<script> alert("No Record Found"); </script>';
}
?>