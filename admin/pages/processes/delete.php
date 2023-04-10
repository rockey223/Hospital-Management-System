<?php
    include 'conn.php';
    $id=$_POST['id'];
    $delete = "delete from doctors where id = $id";
    $query=$conn->query($delete);
    header("location: ../doctors.php");
?>