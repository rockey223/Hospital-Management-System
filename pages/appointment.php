<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital | Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>

<body>
    <?php include 'components/navbar.php' ?>


    <!-- main content -->
    <div class="container ml-3 my-3">
        <div class="row ">
            <div class="col-lg-5">
                <h1>Doctor's Appointment</h1>
                <form id="form">
                    <div class="mb-3">
                        <label for="name" class="form-label h6">Patient's Name: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control input-md" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="membership" class="form-label h6">Membership No.: </label>
                        <input type="text" class="form-control input-md" id="membership" name="membership">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label h6">Age: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control input-md" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label h6">Gender: <span class="text-danger">*</span></label>
                        <select name="gender" class="form-control form-select" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label h6">Height: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control input-md" id="height" name="height">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label h6">Street Address: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control input-md" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label h6">City: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control input-md" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label h6">Phone No.: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control input-md" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label h6">Mobile No.: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control input-md" id="mobile" name="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label h6">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control input-md" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="doctor" class="form-label h6">Select Doctor: <span
                                class="text-danger">*</span></label>
                        <?php
                        include 'processes/conn.php';

                        $selected = "SELECT doctors_name FROM doctors";
                        $result = mysqli_query($conn, $selected);

                        echo "<select name='doctor' id='doctor' class='form-control form-select'>
                                <option value=''>Select doctor</option>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['doctors_name'] . "'>" . $row['doctors_name'] . "</option>";
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label h6">Appointment Date: <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control input-md" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="illness" class="form-label h6">Describe any present illness: <span
                                class="text-danger">*</span></label>
                        <textarea name="message" id="message" class="form-control input-md"></textarea>
                    </div>
                    <div id="error" class="text-danger"></div>
                    <div id="success" class="text-success"></div>
                    <input type="submit" value="Submit" id="submit" class="btn btn-primary">


                </form>
            </div>
        </div>
    </div>







    <?php include 'components/footer.php' ?>
    <?php include 'components/htmlend.php' ?>
    <script>



        $(document).ready(function () {
            $('#submit').click(function () {
                event.preventDefault();
                var name = $('#name').val();
                var membership = $('#membership').val();
                var age = $('#age').val();
                var gender = $('#gender').val();
                var height = $('#height').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var phone = $('#phone').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();
                var doctor = $('#doctor').val();
                var date = $('#date').val();
                var message = $('#message').val();

                if (name == '' || age == '' || gender == '' || height == '' || address == '' || city == '' || phone == '' || mobile == '' || email == '' || doctor == '' || date == '' || message == '') {
                    $('#error').html("All fields are required");
                }
                else {
                    if (phone.length == 9) {
                        if (mobile.length == 10) {

                            $('#error').html('');
                            $.ajax({
                                url: "processes/appoint.php",
                                method: "POST",
                                data: {
                                    name: name,
                                    membership: membership,
                                    age: age,
                                    gender: gender,
                                    height: height,
                                    address: address,
                                    city: city,
                                    phone: phone,
                                    mobile: mobile,
                                    email: email,
                                    doctor: doctor,
                                    date: date,
                                    message: message
                                },
                                beforeSend: function () {
                                    $('#submit').val("connecting");
                                },
                                success: function (data) {
                                    $("form").trigger("reset");
                                    $('#success').fadeIn().html(data);
                                    setTimeout(function () {
                                        $('#success').fadeOut("slow");
                                    }, 2000);
                                    $('#submit').val("Submit");
                                }
                            });
                        }
                        else {
                            $('#error').html("Mobile number must be of 10 digit");
                        }
                    }
                    else {
                        $('#error').html("Phone number must be of 9 digit");

                    }


                }
            });
        });


    </script>