<?php
session_start();
  if(isset($_SESSION['uname']) && isset($_SESSION['paswd'])){
	  header("Location:home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrape/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>index</title>
    <style>
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 10px 20px;
        margin: 3px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button:hover {
        opacity: 0.8;
    }

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




    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    span.psw {
        float: right;
        padding-top: 15px;
    }

    .login {
        display: flex;
        height: auto;
        width: auto;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        margin: 1px;
        background-color: #fefefe;
        border: 1px solid #888;
        width: 450px;
        
        /* Could be more or less, depending on screen size */
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .container {
        padding: 24.5px;
    }

    footer {
        background-color: black;
        color: whitesmoke;
        text-align: center;
        width: 100%;
        height: 50px;
    }

    /* footer:hover {
        opacity: 0.8;
    } */

    p:hover {
        color: red;
        
    }
    .colours{
        background-color: #0d47a1;
       
    }
    .forgot{
        /* float:left;  */
        text-align: left;

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
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="nav justify-content-center navbar-nav me-auto mb-2 mb-lg-0 ">
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <!-- <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="admin.php">Admin</a>
                    </li> -->
                    <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="mydetail/index.php">mydetail</a>
                    </li> -->

            </div>
        </div>
    </nav>
    <!-- <div class="scroll-left">
        <p>User can Order </p>
    </div>  -->

    <form action="home.php" method="post">
        <div class="login" style="background-image:url('image/1672913504495.jpg');width:auto;
height:auto">
            <div class="modal-content">

                <div style="padding:16px 16px 5px 16px;text-align:center;">
                    <b>User Login</b>
                </div>
                <hr />
                <div class="container">
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" class="rounded-pill">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> 
                        Remember me
                    </label>
                    <label style="padding-left:130px;">
                         <a href="forgotpsw.php" class="forgot">Forgot Password</a>
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <a href="register.php" style="text-decoration:none;"><button type="button"
                            class="cancelbtn rounded-pill">Register</button></a>
                    <!-- <span class="psw"><a href="forgotpassword.php">Forgot password</a></span> -->
                </div>
            </div>
        </div>

    </form>


    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
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