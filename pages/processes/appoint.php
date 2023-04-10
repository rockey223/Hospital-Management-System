<?php
include 'conn.php';

$patients_name = $_POST['name'];
$membership = $_POST['membership'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$description = $_POST['message'];

$subject = "Appointment for " . $date;
$from = "rockeym50@gmail.com";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8";

// More headers
$headers .= 'From: ' . $from;


$message = "<strong>Patient's name :</strong> " . $patients_name .
    "<br> <strong>Membership No :</strong> " . $membership .
    "<br> <strong>Age :</strong> " . $age .
    "<br> <strong>Gender :</strong> " . $gender .
    "<br> <strong>Height :</strong> " . $height . "ft
  <br> <strong>Street Address :</strong> " . $address .
    "<br> <strong>City :</strong> " . $city .
    "<br> <strong>Phone No.:</strong> " . $phone .
    "<br> <strong>Mobile No.:</strong> " . $mobile .
    "<br> <strong>Email :</strong> " . $email .
    "<br> <strong>Appointed Doctor :</strong> " . $doctor .
    "<br> <strong>Appointed Date :</strong> " . $date .
    "<br> <strong>Patient's Description :</strong> " . $description;

$appoint = "INSERT INTO appointment (patients_name,membership,age,gender,height,street_address,city,phone_no,mobile_no,email,doctor,appoinment_date,patients_desc) VALUES ('$patients_name','$membership','$age','$gender','$height','$address','$city','$phone','$mobile','$email','$doctor','$date','$description')";
$query = $conn->query($appoint);

if (mail($email, $subject, $message, $headers)) {
    echo "Your Appointment has been submitted";
} else {
    echo "There is a problem. Please try again in a while.";
}




?>