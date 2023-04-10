<?php
session_start();


if(isset($_POST['login'])){
    $conn = new mysqli('localhost','root','','hospital');

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);


    $data = $conn->query("select id from users where username = '$username' and password = '$password' ");

    if($data->num_rows>0){
        $_SESSION['loggedIn']='1';
        $_SESSION['username']= $username;
        echo "sucess";
    }
    else{
        echo "fail";
    }



    

}




?>