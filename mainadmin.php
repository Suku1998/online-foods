<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrape/bootstrap.min.css" rel="stylesheet">

    <title>mainadmin</title>
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
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="displayorder.php">DisplayOrder_User</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="displayorderbooks.php">Display-Order-Items</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="userdisplay.php">Display-User</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link" aria-current="page" href="displaybooks.php">Display-Items</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav justify-content-center ">
                        <a class=" nav-link text-white btn bg-danger" aria-current="page" href="?logout=true">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    
    if(isset($_GET['logout'])){
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        if(isset($_SESSION['password'])){
            unset($_SESSION['password']);
        }
        header("Location: admin.php");
    }
    ?>
    <h1 class="" style="text-align:center"> Welcome to Admin panel</h1>
     <div class="container">
     <div class="row">
         <div class="col-12 text-align-center">
         <img src="image/admin.jpg" alt="Paris" class="center"style="display: block;margin-left: auto;margin-right: auto;width: 60%;">
         </div>
     </div>
     </div>

    <!-- <footer>
        <p> Copyright &copy; buysecandhandbook.in.All Right Reserved <br>
            2020-2021</p>

    </footer> -->

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