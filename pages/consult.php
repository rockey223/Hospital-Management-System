
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital | Consult</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>
<body>
<?php include 'components/navbar.php'?>


    <!-- form -->
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-3">
                    <div class="card-header bg-white">
                        <div class="card-title">Ask your Doctor</div>
                    </div>
                    <div class="card-body">
                    <form id="form">
                    <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="name" class="form-label h5">Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label h5">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="Address" class="form-label h5">Address: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="Address">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="name" class="form-label h5">Select Doctor: <span class="text-danger">*</span></label>
                       
                        <?php

                    include 'processes/conn.php';

                    $selected = "SELECT doctors_name FROM doctors";
                    $result = mysqli_query($conn,$selected);

                    echo "<select name='doctor' id='doctor' class='form-control col-lg-6 form-select'>";
                    echo ' <option value="">Select Doctor</option>"';
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['doctors_name'] . "'>" . $row['doctors_name'] . "</option>";
                        }
                    echo "</select>";
                ?>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="name" class="form-label h5">Questions/Problems: <span class="text-danger">*</span></label>
                        <textarea name="message" id="question" class="form-control"></textarea>
                    </div>
                    </div>
                   
                    <div id="error" class="text-danger"></div>
                    <div id="success" class="text-success"></div>
                    <input type="submit" id="submit" value="submit" class="btn btn-primary">
                </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   


<!-- footer -->





<?php include 'components/footer.php'?>
<?php include 'components/htmlend.php'?>




<script>

$(document).ready(function(){
    $('#submit').click(function(){
        event.preventDefault();
        var name =$('#name').val();
        var email =$('#email').val();
        var address =$('#address').val();
        var doctor =$('#doctor').val();
        var question =$('#question').val();
        if(name=='' || email=='' || address==''|| doctor=='' || question=='')
        {
            $('#error').html("All fields are required");
        }
        else
        {
            
            $('#error').html('');
            $.ajax({
                url:"processes/consultform.php",
                method:"POST",
                data:{
                    name: name,
                    email: email,
                    address: address,
                    doctor: doctor,
                    question: question
                },
                beforeSend:function(){
                    $('#submit').val("connecting");
                },
                success: function(data){
                    $("form").trigger("reset");
                    $('#success').fadeIn().html(data);
                    setTimeout(function(){
                        $('#success').fadeOut("slow");
                    },2000);
                    $('#submit').val("Submit");
                }
            });
        }
    });
});


</script>