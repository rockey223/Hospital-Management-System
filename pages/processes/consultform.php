<?php
include "conn.php";

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$doctor = $_POST['doctor'];
$question = $_POST['question'];

$subject= "Mail from consulting form";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8";


$select = "select email from doctors where doctors_name='$doctor'";
$query = $conn->query($select);

while($res=mysqli_fetch_array($query)){
    $to = $res['email'];
}


$message = "<strong>Name: </strong>" . $name .
            "<br> <strong>Email: </strong>" . $email . 
            "<br> <strong>Address: </strong>" . $address .
            "<br> <strong>Question/Problem: </strong>" . $question;

            if(mail($to,$subject,$message,$headers)){
                 echo "success";
            }
        
         else{
             echo "error";
       }


?>