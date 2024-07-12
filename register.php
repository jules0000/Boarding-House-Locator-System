<?php
include("config.php");

$error = "";
$msg = "";

if (isset($_POST['reg'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $pass = $_POST['pass'];
    $utype = $_POST['utype'];

    // Hash the password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // Check if the email is not already registered
    $query = "SELECT * FROM user WHERE uemail=?";
    $stmt = $con->prepare($query);  
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->num_rows;
    $stmt->close();

    if ($num == 0) {
        // Define other variables here
        $uimage = ""; // Default value
        $birthday = ""; // Default value
        $age = ""; // Default value
        $valid_id_picture = ""; // Default value
        $valid_id_number = ""; // Default value
        $facebook_account = ""; // Default value
        $permit_id_picture = ""; // Default value
        $permit_id_number = ""; // Default value
        $created_at = ""; // Default value

        // Handle file uploads for User Image
        if ($_FILES['uimage']['error'] === UPLOAD_ERR_OK) {
            $uimage = $_FILES['uimage']['name'];
            $uploadPath = 'admin\user' . $uimage;
            move_uploaded_file($_FILES['uimage']['tmp_name'], $uploadPath);
        }

        // Handle file uploads for Valid ID Picture
        if ($_FILES['valid_id_picture']['error'] === UPLOAD_ERR_OK) {
            $valid_id_picture = $_FILES['valid_id_picture']['name'];
            $uploadPath = 'admin\user' . $valid_id_picture;
            move_uploaded_file($_FILES['valid_id_picture']['tmp_name'], $uploadPath);
        }

        // Handle file uploads for Permit ID Picture (only if user is a lessor)
        if ($utype === 'agent' && $_FILES['permit_id_picture']['error'] === UPLOAD_ERR_OK) {
            $permit_id_picture = $_FILES['permit_id_picture']['name'];
            $uploadPath = 'admin\user' . $permit_id_picture;
            move_uploaded_file($_FILES['permit_id_picture']['tmp_name'], $uploadPath);
        }

        // Insert user data into the database
        $insertQuery = "INSERT INTO user (uname, uemail, uphone, upass, utype, uimage, birthday, age, valid_id_picture, valid_id_number, facebook_account, permit_id_picture, permit_id_number, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("sssssssssssss", $name, $email, $phone, $pass, $utype, $uimage, $birthday, $age, $valid_id_picture, $valid_id_number, $facebook_account, $permit_id_picture, $permit_id_number);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $msg = "Registration successful!";
        } else {
            $error = "Registration failed. Please try again.";
        }

        $stmt->close();
    } else {
        $error = "Email already registered. Choose a different email.";
    }
   
    
        
        
    }
 


$con->close();
?>




<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
        ========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--	Css Link
        ========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <style>
    .password-container {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        border: none;
        background: none;
        cursor: pointer;
    }
    </style>

    <title>Boarding House Listing</title>

    <script>
    function checkPasswordStrength() {
        var password = document.getElementById("pass").value;
        var criteriaText = document.getElementById("passwordCriteria");

        // Password complexity rules
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);
        var hasDigits = /\d/.test(password);
        var hasSymbols = /[!@#$%^&*()?]/.test(password);

        if (password.length >= 8 && hasUpperCase && hasLowerCase && hasDigits && hasSymbols) {
            document.getElementById("passwordStrength").innerHTML = "";
            criteriaText.innerHTML = "Strong Password";
            criteriaText.style.color = "green";
        } else {
            document.getElementById("passwordStrength").innerHTML =
                "At least 8 characters, including uppercase, lowercase, numbers, and symbols.";
            criteriaText.innerHTML = "Weak Password";
            criteriaText.style.color = "red";
        }
    }

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("pass");
        var icon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function toggleLessorFields() {
        var lessorFields = document.getElementById('lessor-fields');
        var userType = document.querySelector('input[name="utype"]:checked').value;

        if (userType === 'agent') {
            lessorFields.style.display = 'block';
        } else {
            lessorFields.style.display = 'none';
        }
    }
    </script>

</head>

<body>
    <!--Page Loader-->

    <div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
        <div class="d-flex justify-content-center y-middle position-relative">
            <div class="spinner-border" role="status">
            </div>
        </div>
    </div>


    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->


            <div class="banner-full-row page-banner" style="background-image:url('images/sky.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Register</b>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-wrappers login-body full-row bg-gray">
                <div class="login-wrapper">
                    <div class="container">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <h1>Register</h1>
                                    <p class="account-subtitle">Register to access all features</p>
                                    <?php echo $error; ?><?php echo $msg; ?>
                                    <!-- Form -->
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Your Name*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Your Email*">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Your Phone*" maxlength="10">
                                        </div>
                                        <div class="form-group" password-container
                                            style="height: 40px; position: relative; margin-bottom: 20px;">
                                            <input type="password" name="pass" class="form-control"
                                                placeholder="Your Password*" id="pass" onkeyup="checkPasswordStrength()"
                                                style="height: 100%;">
                                            <span id="passwordStrength"></span>
                                            <p id="passwordCriteria" style="margin-top: 5px;"></p>
                                            <button type="button" onclick="togglePasswordVisibility()"
                                                style="position: absolute; top: 50%; transform: translate(0, -50%); right: 10px; border: none; background: none; cursor: pointer;">
                                                <i id="toggleIcon" class="fas fa-eye"
                                                    style="font-size: 18px; color: #888;"></i>
                                            </button>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="utype" value="user"
                                                    checked onclick="toggleLessorFields()">Lessee
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="utype" value="agent"
                                                    onclick="toggleLessorFields()">Lessor
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="uimage">Profile Image:</label>
                                            <input type="file" name="uimage" id="uimage" accept=".jpg, .png, .jpeg*"
                                                value="">
                                        </div>


                                        <div class="form-group">
                                            <input type="date" id="birthday" type="text" name="birthday"
                                                class="form-control" placeholder="Your Birthday (YYYY-MM-DD)*">
                                        </div>
                                        <div class="form-group">
                                            <input type="int" id="age" type="text" name="age" class="form-control"
                                                placeholder="Your Age*">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label"><b>Valid ID Picture</b></label>
                                            <input class="form-control" name="valid_id_picture" type="file">
                                            <small class="form-text text-muted">
                                                If you are below 18, upload either your Parent's or Guardian's Valid
                                                ID.
                                            </small>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="valid_id_number" type="text" name="valid_id_number"
                                                class="form-control" placeholder="Your Valid ID Number*">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="facebook_account" class="form-control"
                                                placeholder="Your Facebook Account Link">
                                        </div>

                                        <!-- For lessors only -->
                                        <div id="lessor-fields" style="display: none;">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Permit ID Picture</b></label>
                                                <input class="form-control" name="permit_id_picture" type="file">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="permit_id_number" class="form-control"
                                                    placeholder="Your Permit ID Number">
                                            </div>
                                        </div>

                                        <button class="btn btn-success" name="reg" value="Register"
                                            type="submit">Register</button>

                                    </form>

                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>


                                    <div class="text-center dont-have">Already have an account? <a
                                            href="login.php">Login</a></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--	login  -->


            <!--	Footer   start-->
            <?php include("include/footer.php");?>
            <!--	Footer   start-->

            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i
                    class="fas fa-angle-up"></i></a>
            <!-- End Scroll To top -->
        </div>
    </div>
    <!-- Wrapper End -->

    <!--	Js Link
    ============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>