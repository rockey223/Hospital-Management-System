<?php
include 'conn.php';


$name= $_POST['name'];
$id=$_POST['id'];
$sunday= $_POST['sunday'];
$monday= $_POST['monday'];
$tuesday= $_POST['tuesday'];
$wednesday= $_POST['wednesday'];
$thursday= $_POST['thursday'];
$friday= $_POST['friday'];
$saturday= $_POST['saturday'];

$arrange ="UPDATE doctors SET `Sunday`='$sunday',`Monday`='$monday',`Tuesday`='$tuesday',`Wednesday`='$wednesday',`Thursday`='$thursday',`Friday`='$friday',`Saturday`='$saturday' WHERE id ='$id'";
$query=$conn->query($arrange);
if($query){
    header("location: ../tables.php");
}




?>