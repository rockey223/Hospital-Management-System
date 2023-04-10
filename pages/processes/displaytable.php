<?php


include 'conn.php';
$var = $_POST['category'];

$sql = 'SELECT * FROM doctors';
if ($conn->query($sql)) {
   
    ?>
    <div class='table-responsive'>

                    <table class='table table-striped table-hover table-bordered text-center mt-3'>
                                <thead>
                                    <tr>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>Doctor's Name</th>
                                        <!-- <th scope='col'>speciality</th> -->
                                        <th scope='col'>Sunday</th>
                                        <th scope='col'>Monday</th>
                                        <th scope='col'>Tuesday</th>
                                        <th scope='col'>Wednesday</th>
                                        <th scope='col'>Thursday</th>
                                        <th scope='col'>Friday</th>
                                        <th scope='col'>Saturday</th>
                                    </tr>
                                </thead>
                                <tbody>                  
                                        
                                    <?php
                                        $selectquery = "select * from doctors where speciality = '$var'";
    
                                        $query = mysqli_query($conn,$selectquery);
                                        $nums = mysqli_num_rows($query);
    
                                        while($res=mysqli_fetch_array($query)){
                              
    
                                echo "          <tr>";
                                 echo"           <td>" . $res['id'] ."</td>";
                                 echo"           <td>" . $res['doctors_name'] ."</td>";
                                 echo"           <td>" . $res['Sunday'] ."</td>";
                                 echo"           <td>" . $res['Monday'] ."</td>";
                                 echo"           <td>" . $res['Tuesday'] ."</td>";
                                 echo"           <td>" . $res['Wednesday'] ."</td>";
                                 echo"           <td>" . $res['Thursday'] ."</td>";
                                 echo"           <td>" . $res['Friday'] ."</td>";
                                 echo"           <td>" . $res['Saturday'] ."</td>";
                                 echo" </tr>";
                                }
                                 echo "</tbody></table></div>"; 

?>

<?php


}


?>
