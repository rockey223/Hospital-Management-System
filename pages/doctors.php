<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital | Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>
<body>
<?php include 'components/navbar.php'?>
<?php include 'processes/conn.php'?>
<?php

$num_per_page=02;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$start_from=($page-1)*02;

$doctorlist ="select * from doctors limit $start_from,$num_per_page";
$query = mysqli_query($conn,$doctorlist);


?>

<div class="container my-4">
    
       
        
            <?php 
               
               
                while($res=mysqli_fetch_array($query)){

            ?>
            <div class="card mb-3">
            <div class="row mt-0">
                     <div class="col-lg-3 border-end text-center pe-1">
                    <img class="displayimage" height='250px' width= '250px' src="<?php echo "../".$res['image'];?>" alt="photo">
                    </div>
                    <div class="col-lg-9 d-flex flex-column ">
                        <?php echo "<strong class='fs-4 text-uppercase'>" .$res['doctors_name']. "</strong> "; 
                         echo " <span class='fs-6 text-uppercase'>" . $res['qualification'] . "</span>";
                        ?>
                    </div>
                    </div>
            </div>
            

            <?php
                }

                $doctorlist = 'select * from doctors';
                
                $pr_result=mysqli_query($conn,$doctorlist);
                $total_records=mysqli_num_rows($pr_result);
                $total_pages=ceil($total_records/$num_per_page);
                
                if($page>1)
                {
                    echo "<a href='doctors.php?page=".($page-1)."' class='btn btn-primary me-1'>Previous</a>";
                }

                
                for($i=1;$i<$total_pages;$i++)
                {
                    echo "<a href='doctors.php?page=".$i."' class='btn btn-primary me-1'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='doctors.php?page=".($page+1)."' class='btn btn-primary me-1'>Next</a>";
                }

                


?>
        
    
</div>








<?php include 'components/footer.php'?>
<?php include 'components/htmlend.php'?>