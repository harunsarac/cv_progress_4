<?php
require('connect.php');

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password');";
    $result = mysqli_query($connection, $query);

    if($result){
        session_start();
        require_once "index.php";
    }else{
        echo "User Registration Failed";
        echo "<br><a href='index.php'>Back</a>";
    }
}