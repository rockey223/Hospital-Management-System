<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital | Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>
<body>
<?php include 'components/navbar.php'?>


<!-- contact form -->
    <div class="container my-4">
        <div class="row justify-content-center">

            <div class="col-lg-4">
                <h3 class="mb-4">Contact Us</h3>
                <form  id="form" >
                    <div class="col-auto mb-4">
                        <label class="visually-hidden" for="autoSizingInputGroup">Name</label>
                        <div class="input-group">
                            <div class="input-group-text fs-5">
                                Name
                            </div>
                            <input type="text" id="name" class="form-control" id="autoSizingInputGroup" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="col-auto mb-4">
                        <label class="visually-hidden" for="autoSizingInputGroup">email</label>
                        <div class="input-group">
                            <div class="input-group-text fs-5">
                                email
                            </div>
                            <input type="text" id="email" class="form-control" id="autoSizingInputGroup" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-auto mb-4">
                        <label class="visually-hidden" for="autoSizingInputGroup">message</label>
                        <div class="input-group">
                            <div class="input-group-text fs-5">
                                Message
                            </div>
                            <textarea type="text" id="message" class="form-control" id="autoSizingInputGroup" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div id="error_message" class="text-danger"></div>
                    <div id="success_message" class="text-success"></div>
                    <input type="submit" value="submit" id="submit" class="btn btn-primary">
                </form>
            </div>
            <!-- map -->
            <div class="col-lg-6 mt-5 d-flex flex-column ">
                
                
                <div class="mt-3 d-flex flex-column float-end align-items-start ">
                    
                    <span class="d-block h5">Nepal Health Association</span>
                    <span class="d-block">Kathmandu, Nepal</span>

                    <span class="d-block">Tel: +977-1-1234567</span>
                    <span class="d-block">Fax: </span>
                    <span class="d-block">Email: info@nha.com</span>
                
                    <div class="row">
                        <div class="col-12 d-flex justify-content-evenly">
                            <a href="" class="text-decoration-none link-primary h3">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="" class="text-decoration-none link-primary h3">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="" class="text-decoration-none link-danger h3">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php include 'components/footer.php'?>
<?php include 'components/htmlend.php'?>
<script>


$(document).ready(function(){  
   
   $('#submit').click(function(){
       event.preventDefault();
        var name = $('#name').val();  
        var email = $('#email').val();          
        var message = $('#message').val();  
        if(name == '' || message == '' || email=='')  
        {  
             $('#error_message').html("All Fields are required"); 
             setTimeout(function(){
                        $('#error_message').fadeOut("slow");
                    },2000);
        }  
        else  
        {  
             $('#error_message').html('');  
             $.ajax({  
                  url:"processes/contactform.php",  
                  method:"POST",  
                  data:{name:name, message:message , email:email}, 
                  beforeSend:function(){
                   $('#submit').val("connecting...");
                   }, 
                  success:function(data){  
                       $("form").trigger("reset");  
                       $('#success_message').fadeIn().html(data);
                       setTimeout(function(){  
                            $('#success_message').fadeOut("Slow");  
                       }, 2000);  
                      $('#submit').val("Send Message");

                  }  
             });  
        }  
   });  
});

</script>
