<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="style2.css" rel="stylesheet">
    <title>Register user</title>
    <style>
    footer {
        background-color: #0d47a1;
        color:whitesmoke;
        text-align: center;
        width: 100%;
        height: 50px;
        margin-top: 0%;
    }

    p:hover {
        color: red;
    }
    .colours{
        background-color: #0d47a1;
    }
    </style>
</head>

<body>
    <nav class=" navbar-expand-lg navbar navbar-dark colours">
        <div class="container-fluid ">
            <a class="navbar-brand " href="index.php">
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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <!-- <a class=" nav-link" aria-current="page" href="Contact.php">Contact Us</a> -->
                    </li>

            </div>
        </div>
    </nav>
    <?php
   $err_msg = "";
   $email = "";
   $mobile = "";
   $psw = "";
   $cpsw = "";
   $name = "";
   $address = "";
   if(isset($_REQUEST['register'])){
	   include('connect.php');
	   $email = $_POST['email'];
	   $mobile = $_POST['mobile'];
	   $psw = $_POST['psw'];
	   $cpsw = $_POST['cpsw'];
	   $name = $_POST['name'];
	   $address = $_POST['address'];
	   if($psw == $cpsw){
		   $chk = mysqli_query($conn, "select * from users where email='$email' OR mobile='$mobile'");
		   if(mysqli_num_rows($chk)){
			  $err_msg = "<span style='color:red'>Email or Mobile number already registered.</span>";
		   } else{
				if(mysqli_query($conn, "insert into users (`email`, `name`, `password`, `address`, `mobile`) values('$email','$name','$psw', '$address','$mobile')")){
					?>

    <script>
    alert('Registered successfully.');
    window.location = "index.php";
    </script>
    <?php
				} else {
					 $err_msg = "<span style='color:red'>Something error occurred, Please try again after sometime.</span>";
				}
		   }
	   } else {
		   $err_msg = "<span style='color:red'>Password did not matched.</span>";
	   }
   }
?>


    <form action="" method="POST">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Welcome</h3>
                    <p>You are 30 seconds away Buy your Favourite Food!</p>
                    <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log
                        In</a>

                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Sign Up</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" placeholder=" Name *"
                                            name="name" value="<?=$name?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="psw"
                                            value="<?=$psw?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password *"
                                            name="cpsw" value="<?=$cpsw?>">
                                    </div>

                                    <div class="form-group">
                                        <div class="maxl">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" placeholder="Your Email *"
                                            name="email" value="<?=$email?>">
                                    </div>
                                    <div class="form-group">
                                        <input id="mobile" type="text" class="form-control" placeholder="Your Phone *"
                                            name="mobile" value="<?=$mobile?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" style="height:100px;width:360px; resize:none"
                                            id="address" name="address" placeholder=" Your Address *"><?=$address?></textarea>

                                    </div>
                                    <?=$err_msg?>
                                    <input type="submit" class="btnRegister" name="register" value="Register" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <footer>
        <p> Copyright &copy; Food Shopping.All Right Reserved <br>
            2023</p>

    </footer>


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

</body>

</html>