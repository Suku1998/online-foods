<?php
$isfirsttime=1;
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "online_food";
$conn = mysqli_connect($servername, $username, $password,$db);
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$msg="";
if(empty($_POST)) {
    $msg="First time";
    $isfirsttime=1;      
} else {
    $isfirsttime=0;
    $isfound=0;
    
    $admin=$_POST["admin"];
    $password=$_POST["password"];

    if($admin=="admin" && $password=="Suku@123"){
        $_SESSION['name']="admin";
        header("Location: mainadmin.php");
        die;
    }
     



    //create a statement for the sql command u can execute
    $q="select * from admin where admin='".$admin."' and Password='".$password."'";
    echo $q;
    //die;

    $statement=$conn->prepare($q);

    //execute the command
    $statement ->execute();
    if($statement->rowCount()==0)
    {
        $isfound=0;
    }
    else{
        $isfound=1;
    }

   
    if($isfound==1) {    
        //$msg="welcome ".$un;
        
        $_SESSION['admin']=$admin;
        if($_POST['user_type']){
            header("Location:mainadmin.php");
        } else {
            header("Location:mainadmin.php");
        }
       
        die;
    }
    else{
       $msg="Invalid user and password";
    }
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

    <title>admin</title>
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
        margin: 2px;
        background-color: #fefefe;
        border: 1px solid #888;
        width: 500px;
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
        padding: 38px;
    }

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

<body style="background-image:url('image/screen.jpg')">

    <nav class=" navbar-expand-lg navbar navbar-dark bg-dark  ">
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
            </div>
        </div>
    </nav>
    <form action="#" method="post">
        <div class="login">
            <div class="modal-content">

                <div style="padding:16px 16px 0 16px">
                    <b>Admin Login</b>
                </div>
                <hr />
                <div class="container">
                    <label for="uname"><b>Admin</b></label>
                    <input type="text" placeholder="Enter Username" name="admin" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <a href="index.php" style="text-decoration:none;"><button type="button"
                            class="cancelbtn">Go back</button></a>

                </div>
            </div>
        </div>

    </form>


    <footer>
        <p> Copyright &copy; onlineshope.All Right Reserved <br>
            2022</p>

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