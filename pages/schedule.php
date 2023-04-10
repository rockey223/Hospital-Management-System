<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital | Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>
<body>
<?php include 'components/navbar.php'?>



    <!-- schedule -->
    <div class="container mt-3 mb-3">
        <h3 class="text-primary">Search Schedule</h3>


        <?php

            include 'processes/conn.php';

            $selected = "SELECT distinct speciality FROM doctors";
            $result = mysqli_query($conn,$selected);
        ?>
        <form class="forms" action="processes/displaytable.php" method="post">
            <select name='category' id='select'>
                <option value="">Select one</option>
            <?php
            
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['speciality'] . "'>" . $row['speciality'] . "</option>";
                }
                 ?>
            </select>
            </form>
            
                <div id="displaytable">
                    
                </div>   
        
    </div>



<!-- footer -->
<?php include 'components/footer.php';?>


<?php include 'components/htmlend.php'?>
<script>
        
                        
        $(document).on("change", ".forms", function() {
                event.preventDefault();
                var elem = $(this);
                var link = $(this).attr("action");
                var category = $("input[name='category']").val();

                if (category == '') {
                    $('.v-error').html("<p>Empty Input</p>")
                }else {
                    $.ajax({
                        method: 'POST',
                        url: link,
                        data:  new FormData(this),
                        mimeType:"multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data) {
                            $('#displaytable').html(data);
                        }
                    });
                }
            })


    </script>

