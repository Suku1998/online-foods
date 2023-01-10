<?php

$servername="localhost" ;
                  $username="root" ;
                  $password="" ;
                  $db="online-book" ;
                  $conn= mysqli_connect($servername, $username, $password,$db);
                  if (mysqli_connect_errno()){
                  echo" Failed to connect to MySQL:" . mysqli_connect_error();
                  }
                  $query="INSERT INTO products(`price`,`description`,`quantity`,`discount`,`photo`)VALUES('$price','$description','$quentity','$discount','$image')";
                   $query=mysqli_query($conn,$query);  
                //   if ($conn->query($query) === TRUE) {
                //       echo("error");
                //   } else {
                //       echo "Error: ".$query."<br>".$conn->error;
                //   }
                  
                //   $conn->close();
                  

                  ?>