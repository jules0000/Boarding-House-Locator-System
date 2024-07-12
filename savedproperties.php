<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

// Create an associative array to hold the response
$response = array('status' => '', 'message' => '');

if (isset($_SESSION['uid'])) {
    // Check if the 'pid' key is set in the POST array
    if (isset($_POST['pid'])) {
        // Get the property ID from the AJAX request
        $propertyId = $_POST['pid'];

        // Insert the property ID into the saved properties table
        $userId = $_SESSION['uid'];
        $insertQuery = mysqli_query($con, "INSERT INTO saved_properties (uid, pid) VALUES ('$userId', '$propertyId')");

        if ($insertQuery) {
            // Success: Set the response message accordingly
            $response['status'] = 'success';
            $response['message'] = 'Property added to favorites successfully!';
        } else {
            // Error: Set the response message accordingly
            $response['status'] = 'error';
            $response['message'] = 'Error adding property to favorites!';
        }
    } else {
        // 'pid' is not set in the POST array
        $response['status'] = 'error';
        $response['message'] = 'Error: Property ID not provided!';
    }
} else {
    // User not logged in: Set the response message accordingly
    $response['status'] = 'error';
    $response['message'] = 'User not logged in!';
}

// Convert the response array to JSON format and echo it
echo json_encode($response);
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
    <meta name="description" content="Boarding House Locator System">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Title -->
    <title>Boarding House Listing</title>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
        <div class="d-flex justify-content-center y-middle position-relative">
            <div class="spinner-border" role="status">
            </div>
        </div>
    </div>

    <div id="page-wrapper">
        <div class="row">
            <!-- Header start -->
            <?php include("include/header.php");?>
            <!-- Header end -->

            <!-- Banner -->
            <div class="banner-full-row page-banner" style="background-image:url('images/sky.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Saved Properties</b>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Saved Properties</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner -->

            <!-- Property Grid -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <!-- Property Listing Loop -->
                                <?php 
                                if(isset($_REQUEST['filter']))
                                {
                                    $type=$_REQUEST['type'];
                                    $stype=$_REQUEST['stype'];
                                    $city=$_REQUEST['city'];

                                    $sql="SELECT property.*, user.uname FROM `property`,`user` WHERE property.uid=user.uid and type='{$type}' and stype='{$stype}' and city='{$city}'";
                                    $result=mysqli_query($con,$sql);

                                    if(mysqli_num_rows($result)>0)
                                    {
                                        if($result == true)
                                        {
                                            while($row=mysqli_fetch_array($result))
                                            {
                                            ?>
                                <div class="col-md-6">
                                    <div class="featured-thumb hover-zoomer mb-4">
                                        <div class="overlay-black overflow-hidden position-relative">
                                            <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                            <div class="sale bg-success text-white">For <?php echo $row['5'];?></div>
                                            <div class="price text-primary text-capitalize">₱<?php echo $row['13'];?>
                                                <span class="text-white"><?php echo $row['12'];?> Sqft</span>
                                            </div>
                                        </div>
                                        <div class="featured-thumb-data shadow-one">
                                            <div class="p-4">
                                                <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                                    <a
                                                        href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a>
                                                </h5>
                                                <span class="location text-capitalize"><i
                                                        class="fas fa-map-marker-alt text-success"></i>
                                                    <?php echo $row['14'];?></span>
                                            </div>
                                            <div class="px-4 pb-4 d-inline-block w-100">
                                                <div class="float-left text-capitalize">
                                                    <i class="fas fa-user text-success mr-1"></i>By :
                                                    <?php echo $row['uname'];?>
                                                </div>
                                                <div class="float-right">
                                                    <i class="far fa-calendar-alt text-success mr-1"></i>
                                                    <?php echo date('d-m-Y', strtotime($row['date']));?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                            }
                                        }
                                    }
                                    else {
                                        echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
                                    }
                                }
                                ?>
                                <!-- End Property Listing Loop -->
                            </div>
                        </div>

                    </div>
                </div>




            </div>




            <!-- Footer -->
            <?php include("include/footer.php");?>
            <!-- Footer -->

            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i
                    class="fas fa-angle-up"></i></a>
            <!-- End Scroll To top -->

        </div>

        <!-- JS Links -->
        <script src="js/jquery.min.js"></script>
        <script src="js/greensock.js"></script>
        <script src="js/layerslider.transitions.js"></script>
        <script src="js/layerslider.kreaturamedia.jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/tmpl.js"></script>
        <script src="js/jquery.dependClass-0.1.js"></script>
        <script src="js/draggable-0.1.js"></script>
        <script src="js/jquery.slider.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/custom.js"></script>
        <!-- End JS Links -->

        <!-- Your custom script to handle the button click event -->
        <script>
        // Assuming you have included jQuery in your HTML
        $(document).ready(function() {
            // Attach a click event handler to your button or element
            $('#yourButtonId').on('click', function() {
                // Make an AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'savedproperties.php',
                    data: {
                        pid: 'pid' // Replace with the actual property ID or retrieve it dynamically
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle the response
                        if (response.status === 'success') {
                            // Display a success message to the user
                            alert('Saved Property');
                        } else {
                            // Display an error message to the user
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        // Handle the AJAX error
                        alert('AJAX request failed');
                    }
                });
            });
        });
        </script>
        <!-- End custom script -->
</body>

</html>