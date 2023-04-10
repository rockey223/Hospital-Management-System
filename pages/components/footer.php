
<style>
    .footer ul li {
        list-style-type: none;
        padding-left: 0;
    }

    .footer ul {
        padding-left: 0;
    }

</style>
    <div class="bg-dark py-2">
    <div class="container text-white py-2 mb-4">
        <div class="row">
            <div class="col-lg-4 col-md-3 d-none d-md-block d-lg-flex d-md-flex flex-column mt-2 footer">
                <h4 class="mb-3">Explore</h4>
                <ul>
                    <li>
                        <a href="../index.php" class="text-decoration-none link-light fs-6">Home</a>
                    </li>
                    <li>
                        <a href="schedule.php" class="text-decoration-none link-light fs-6">Doctor's Schedule</a>
                    </li>
                    <li>
                        <a href="doctors.php" class="text-decoration-none link-light fs-6">Doctors</a>
                    </li>
                    <!-- <li>
                        <a href="" class="text-decoration-none link-light fs-6">Package</a>
                    </li> -->
                    <li>
                        <a href="consult.php" class="text-decoration-none link-light fs-6">Consult With Doctor</a>
                    </li>
                    <li>
                        <a href="appointment.php" class="text-decoration-none link-light fs-6">Appointment</a>
                    </li>
                    <!-- <li>
                        <a href="" class="text-decoration-none link-light fs-6">Galary</a>
                    </li> -->
                    <li>
                        <a href="contact.php" class="text-decoration-none link-light fs-6">Contact Us</a>
                    </li>
                    <!-- <li>
                        <a href="" class="text-decoration-none link-light fs-5">Carrer</a>
                    </li> -->
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-2">
                <h4 class="mb-3">We are here to hear you</h4>
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter your name</label>
                        <input type="name" class="form-control" id="name" aria-describedby="nameHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div id="error"></div>
                    <input type="submit" id="isubmit" class="btn btn-primary" value="Continue">
                
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 mt-2 d-flex flex-column ">
                <div>
                    <h4 class="mb-3">Contact Address</h4>
                <span class="d-block">Nepal Health Association</span>
                <span class="d-block">Kathmandu, Nepal</span>
                </div>
                <div class="mt-3">
                    <span class="d-block">Tel: +977-1-1234567</span>
                    <span class="d-block">Fax: </span>
                    <span class="d-block">Email: info@nha.com</span>
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-evenly">
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
    

    

<script>


var submit = document.getElementById("isubmit");
    submit.addEventListener("click",function(){
        const name = document.getElementById('name').value;
           var insert = /^[0-9]+$/;
       
           if(name=="" || name.length<3 || name.match(insert)  )
           {
               
               document.getElementById("error").innerHTML = "<p class='text-danger'>Enter proper Name</p>";
               
           }
           
           else{
            //    window.location.href = "assets/php/validating.php";
            document.getElementById("error").innerHTML = "<p class='text-danger'>nice</p>";
           }
    });
</script>