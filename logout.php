<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
<style>
    *{
        font-family: Roboto, sans-serif;
    }
</style>
<?php
session_start();
echo "<center>Loggin out... please wait</center>";
if(isset($_SESSION['uname'], $_SESSION['paswd'])) {
   unset($_SESSION['uname'], $_SESSION['paswd']);
   header("Location:index.php");
} else {
    echo "<center style='color:red'>---->Error occurred<----</center>";
    header("Location:home.php");
}