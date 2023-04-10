<?php
    include 'conn.php';
    $name= $_POST['name'];
    $image = $_FILES['image'];
    $speciality = $_POST['speciality'];
    
    $imagename = trim($image['name']);
    $image_tmp_name=$image['tmp_name'];
    $image_size = $image['size'];
    $image_name= str_replace(' ', '', $imagename);
    $image_type = explode('.',$image_name);
    //seperate gareko extension laai lowercase ma convert gareko
    $ext = strtolower(end($image_type));
    //image upload garda image ho ki hoina vanera check garna laai image type ko array banaako
    $tostore = array('png','jpg','jpeg','gif');
    //image upload garne folder 
    $target_dir = "../../../assets/uploads/";
    //image upload garda upload hune name
    $target_image = $target_dir . $image_name;
    //image size check gareko
    if($image_size>5000000)
    {
        echo "<h3> The image size is too large </h3>";
    }
    else
    {
        //image ko extension check gareko image ho ki hoina vanera
        if(in_array($ext,$tostore))
        {
            //upload hune folder ma image pailai xa ki xaina check gareko
            if(file_exists($target_image))
            {
                echo "<h3>Duplicate image.</h3>";
            }
            else
            {
                //temporary folder bata upload hune thaau ma image move gareko
                if(move_uploaded_file($image_tmp_name,$target_image))
                {
                    $insert = "insert into doctors (doctors_name,image,speciality) values ('$name','./assets/uploads/$image_name','$speciality')";
                    $query=$conn->query($insert);
                    header("location: ../tables.php");    
                }
                else
                {
                    echo "<h3>image not uploaded. Try again! </h3>";
                }
            }
        }
        else
        {
            echo "<h3>File type is not an imag.e</h3>";
        }
    }
?>