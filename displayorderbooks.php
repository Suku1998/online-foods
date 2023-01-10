<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrape/bootstrap.min.css" rel="stylesheet">

    <title>display order books</title>
    <style>
    footer {
        background-color: black;
        color: whitesmoke;
        text-align: center;
        width: 100%;
        height: 50px;
    }

    footer:hover {
        opacity: 0.8;
    }

    p:hover {
        color: red;
    }
    </style>
</head>

<body>

    <nav class=" navbar-expand-lg navbar navbar-dark bg-dark  ">
        <div class="container-fluid ">
            <a class="navbar-brand " href="mainadmin.php">
                <img src="image/logo123.png" alt="" width="80" height="45">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="nav justify-content-center navbar-nav me-auto mb-2 mb-lg-0 ">
                </ul>


            </div>
        </div>
    </nav>
    <div class="container " style="width:80%;padding-top:5">
        <div class="row rowspace p-3 mb-2  ">
            <div class="col_lg-11 col-12">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="py-3 text=white"> Order Id </th>
                                <th class="py-3 text=white"> User Id </th>
                                <th class="py-3 text=white"> Product Id </th>
                                <th class="py-3 text=white"> Number of Iteams </th>
                                <th class="py-3 text=white">Price </th>
                                <th class="py-3 text=white">Order Date </th>
                                <th class="py-3 text=white">  </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "online_food";
$conn = mysqli_connect($servername, $username, $password,$db);
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
//delete
if(isset($_POST['dorderbooks']))
{
      $order=$_POST['dorderbooks'];
      $query="DELETE FROM orders WHERE order_id='$order'";
      $query=mysqli_query($conn,$query);
      if($query){
          echo("Your data is deleted");
          header('location:displayorderbooks.php');
      }
      else{
        echo("Your data is not deleted");
        header('location:displayorderbooks.php');
    }
}
$selectquery="select * from orders";
$query=mysqli_query($conn,$selectquery);
//$result=mysqli_fetch_array($query);
while($result=mysqli_fetch_array($query)){
    ?>
                            <tr>
                                <td><?php echo $result['order_id']; ?></td>
                                <td><?php echo $result['uid']; ?></td>
                                <td><?php echo $result['pid']; ?></td>
                                <td><?php echo $result['numitem']; ?></td>
                                <td><?php echo $result['price']; ?></td>
                                <td><?php echo $result['ordered_date']; ?></td>
                                <form action="displayorderbooks.php" method="POST">

                                <td><button type="submit"name="dorderbooks" class="btn btn-dark" value="<?php echo $result['order_id'] ?>">Delete</button></td>
                                </form>
                            </tr>
                            <?php
}
?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>


    </table>

</body>






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->


</html>