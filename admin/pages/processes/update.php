<?php
    include 'conn.php';
    $name= $_POST['name'];
    $id=$_POST['id'];
    
    $speciality = $_POST['speciality'];
    
                    $update ="UPDATE `doctors` SET `doctors_name`='$name',`speciality`='$speciality' WHERE id ='$id'";
                    $query=$conn->query($update);
                    if($query){
                        header("location: ../tables.php");   
                    }
                    else{
                        header("location: ../tables.php?error");   
                    }
                     
                





?>