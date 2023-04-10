

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    

</head>
<body>



<?php

$server='localhost';
$username = 'root';
$password = '';
$database = 'testing';


    $conn = new mysqli($server,$username,$password);
    if(!$conn){
        echo "Eror in connecting Mysql";
    }
    else{
        $create = "create database $database";
        $query = $conn->query($create);
        
        if(!$query){
            echo "Error creating Database";
        }
        else{
            $conn = new mysqli($server,$username,$password,$database);
            if(!$conn){
                echo "error connecting to Mysql / Database";
            }
            else{
                $appointmentTable = "create table appointment(
                    id int(255),
                    patients_name varchar(255),
                    membership varchar(255),
                    age int(3),
                    gender varchar(255),
                    height int(10),
                    street_address varchar(255),
                    city varchar(255),
                    phone_no varchar(255),
                    mobile_no varchar(255),
                    email varchar(255),
                    doctor varchar(255),
                    appoinment_date varchar(255),
                    patients_desc varchar(255)
                )";
                $query=$conn->query($appointmentTable);  

                $doctorsTable = "create table doctors(
                    id int(255) primary key,
                    doctors_name varchar(255),
                    email varchar(255),
                    speciality varchar(255),
                    image varchar(255),
                    Sunday varchar(255),
                    Monday varchar(255),
                    Tuesday varchar(255),
                    Wednesday varchar(255),
                    Thursday varchar(255),
                    Friday varchar(255),
                    Saturday varchar(255),
                    qualification varchar(255)
                )";
                $query=$conn->query($doctorsTable); 

                $usersTable = "create table users(
                    id int(255),
                    username varchar(255),
                    password varchar(255)
                )";
                $query=$conn->query($usersTable); 
                echo "Completed";
            }
        }
    }




?>


</body>
</html>
