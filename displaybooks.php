<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrape/bootstrap.min.css" rel="stylesheet">

    <title>displaybooks</title>
  </head>
  <body>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="displaybooks.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label> Photo </label>
                <input type="file" id="photo" class="form-control" name="photo"accept="image/*" placeholder="Enter Photo">
              </div>

              <div class="form-group">
                <label> Price </label>
                <input type="text" name="price" class="form-control" placeholder="Enter Amount">
              </div>

              <div class="form-group">
                <label> description </label>
                <input type="text" name="description" class="form-control" placeholder="Item Description">
              </div>

              <div class="form-group">
                <label> Quantity </label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
              </div>

              <div class="form-group">
                <label> Discount </label>
                <input type="text" name="discount" class="form-control" placeholder="Enter Discount">
              </div>
              <div class="form-group">
                <label> Category </label>
                <select id="category" class="custom-select form-control" style="width:300px" name="category">
                <option value="">None</option>
                <option value="vegitable">Vegitable</option>
                <option value="food">Food</option>
              </select>
              </div>
            </div>
            <!--close  -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
              <button type="submit" name="addproduct" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <nav class="navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="mainadmin.php">
          <img src="image/logo123.png" alt="" width="80" height="45">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav justify-content-center navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" style="width:100%">
      <div class="row">
        <h3 class="col-12" style="align-items: center">Display Books</h3>

      </div>
    </div>
    <div class="container" style="width:80%;padding-top:5px">
      <div class="row rowspace p-3 mb-2">
        <!-- Button trigger modal -->
        <div class="col-12"><button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#exampleModal"> ADD Book</button></div>
        <div class="col_lg-12 col-12">
          <div class="table-responsive">

            <table class="table table-bordered">
              <thead>
                <tr>
               
                  <th class="py-3 text=white"> Photo </th>
                  <th class="py-3 text=white"> Description </th>
                  <th class="py-3 text=white"> Price </th>
                  <th class="py-3 text=white"> Quantity </th>
                  <th class="py-3 text=white">Discount </th>
                  <th class="py-3 text=white"> </th>
                  <th class="py-3 text=white"> </th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
                  $servername="localhost" ;
                  $username="root" ;
                  $password="" ;
                  $db="online_food" ;
                  $conn= mysqli_connect($servername, $username, $password,$db);
                  if (mysqli_connect_errno()){
                  echo" Failed to connect to MySQL:" . mysqli_connect_error();
                  }
                  
                  //updatess
                  if(isset($_POST['addproduct']))
                  {
                  
                  $filename = $_FILES["photo" ]["name" ];
                  $tempname = $_FILES["photo" ]["tmp_name" ];
                  $path="image/" .$filename;
                  $price = $_POST['price'];
                  $description = $_POST['description'];
                  $quentity = $_POST['quantity'];
                  $discount = $_POST['discount'];
                  $category =$_POST['category'];
                  $query="INSERT INTO products(`price`,`description`,`quantity`,`discount`,`photo`,`category`)VALUES('$price','$description','$quentity','$discount','$filename','$category')";
                  $query=mysqli_query($conn,$query);
                  move_uploaded_file($tempname, $path);
                  if($query){
                  echo '<script> alert("Data Save"); </script>';
                // header('Location:displaybooks.php');
                }


              }

              


                // edite
                 
                if(isset($_POST['edit_book']))
                  {
                  $book_id=$_POST['edit_book'];
                  $price= $_POST['price'];
                  $description= $_POST['description'];
                  $quentity= $_POST['quantity'];
                  $discount= $_POST['discount'];
                  $query="UPDATE products SET  price='".$price."',description='".$description."',quantity='".$quentity."',discount='".$discount."' WHERE pid='".$book_id."'";
                  $query=mysqli_query($conn,$query);
                  if($query){
                    echo '<script> alert("Data Save"); </script>';
                    
                  }else{
                    echo '<script> alert("Data not save");</script>';
                  }
                  
                }


                //delete
                if(isset($_POST['delete_book']))
                {
                $book_id=$_POST['delete_book'];
                $query="DELETE FROM products WHERE pid='$book_id'";
                $query=mysqli_query($conn,$query);

                if($query){
                echo("Your data is deleted");
                // header('location:displaybooks.php');
                }
                else{
                echo("Your data is not deleted");
                header('location:displaybooks.php');
                }
                }


                $selectquery="select * from products";
                $query=mysqli_query($conn,$selectquery);
                //$result=mysqli_fetch_array($query);
                while($result=mysqli_fetch_array($query)){
                ?>
                <tr>
                   
                  <td> <img src="<?php echo"image/" .$result['photo'];?>"width="150"height="150"></td>
                  <td><?php echo $result['description']; ?></td>
                    <td><?php echo $result['price']; ?></td>
                      <td><?php echo $result['quantity']; ?></td>
                        <td><?php echo $result['discount']; ?></td>
                          <form action="displaybooks.php" method="POST">
                            <td><button type="submit" name="delete_book"class="btn btn-dark" value="<?php echo $result['pid'];?>">Delete</button></td>
                          </form>
                          
                           <!-- butten edite -->
                              <td><button type="button" value="<?php echo $result['pid'];?>"class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $result['pid'];?>" name="edit"> Edit</button></td>

                          <!-- Modal -->
                                        <div class="modal fade" id="exampleModall<?php echo $result['pid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                          <form action="displaybooks.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group" >
                                              <label> Photo </label>
                                                                                                                                               
                                              <input type="file"><img src="<?php echo"image/" .$result['photo'];?>"value="<?php echo "image/" .$result['photo'];  ?>" name="photo" width="450"height="300">
                                            </div>

                                            <div class="form-group">
                                              <label> Price </label>
                                              <input type="text" name="price" value="<?php echo $result['price']; ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                              <label> Description </label>
                                              <input type="text" name="description" value="<?php echo $result['description']; ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                              <label> Quantity </label>
                                              <input type="text"name="quantity" value="<?php echo $result['quantity'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                              <label> Discount </label>
                                              <input type="text" name="discount" value="<?php echo $result['discount'];?>" class="form-control">
                                            </div>
                                          </div>
                                          <!--close  -->
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="edit_book" value="<?php echo $result['pid']; ?>" class="btn btn-primary">Save</button>
                                           </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>    
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
            <script
              src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
              crossorigin="anonymous">
</script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
          </html>