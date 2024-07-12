<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Additional debugging
if (isset($_POST['filter'])) {
    // Get selected options from the form
    $type = $_POST['type'];
    $stype = $_POST['stype'];
    $city = $_POST['city'];

    // Construct the SQL query based o n the selected options
    $sql = "SELECT * FROM your_property_table WHERE 1";

    if (!empty($type)) {
        $sql .= " AND type = '$type'";
    }

    if (!empty($stype)) {
        $sql .= " AND stype = '$stype'";
    }

    if (!empty($city)) {
        $sql .= " AND city = '$city'";
    }

    // Execute the query
    $result = $conn->query($sql);

   

    // Close the database connection
    $conn->close();
}

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
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--	Title
	=========================================================-->
    <title>Boarding House Listing</title>
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

            <!--	Banner Start   -->
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-color: black;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-white">Find Your</span><br>
                                    Ideal Boarding House</h1>
                                <t2>Discover a diverse range of properties tailored to your preferences
                                    effortlessly.</span> <br>
                                    Ease your search for a residence by leaving behind all the challenges and
                                    difficulties.

                                </t2>


                                <form method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option value="boarding house">Boarding House</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="transient">Transient</option>
                                                    <option value="bedspace ">Bedspace</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control" name="city" required
                                                    placeholder="Enter Barangay">
                                                    <option value="">Select Barangay</option>
                                                    <option value="Brgy1_Ems_Barrio">Barangay 1 - Em's Barrio</option>
                                                    <option value="Brgy2_Ems_Barrio_South">Barangay 2 - Em's Barrio
                                                        South</option>
                                                    <option value="Brgy3_Ems_Barrio_East">Barangay 3 - Em's Barrio East
                                                    </option>
                                                    <option value="Brgy4_Sagpon">Barangay 4 - Sagpon</option>
                                                    <option value="Brgy5_Sagmin">Barangay 5 - Sagmin</option>
                                                    <option value="Brgy6_Bañadero">Barangay 6 - Bañadero</option>
                                                    <option value="Brgy7_Baño">Barangay 7 - Baño</option>
                                                    <option value="Brgy8_Bagumbayan">Barangay 8 - Bagumbayan</option>
                                                    <option value="Brgy9_Pinaric">Barangay 9 - Pinaric</option>
                                                    <option value="Brgy10_Cabugao">Barangay 10 - Cabugao</option>
                                                    <option value="Brgy11_Maoyod">Barangay 11 - Maoyod</option>
                                                    <option value="Brgy12_Tula-tula">Barangay 12 - Tula-tula</option>
                                                    <option value="Brgy13_Ilawod_West">Barangay 13 - Ilawod West
                                                    </option>
                                                    <option value="Brgy14_Ilawod">Barangay 14 - Ilawod</option>
                                                    <option value="Brgy15_Ilawod_East">Barangay 15 - Ilawod East
                                                    </option>
                                                    <option value="Brgy16_Kawit-East_Washington_Drive">Barangay 16 -
                                                        Kawit-East Washington Drive</option>
                                                    <option value="Brgy17_Rizal_Street">Barangay 17 - Rizal Street
                                                    </option>
                                                    <option value="Brgy18_Cabagñan_West">Barangay 18 - Cabagñan West
                                                    </option>
                                                    <option value="Brgy19_Cabagñan">Barangay 19 - Cabagñan</option>
                                                    <option value="Brgy20_Cabagñan_East">Barangay 20 - Cabagñan East
                                                    </option>
                                                    <option value="Brgy21_Binanuahan_West">Barangay 21 - Binanuahan West
                                                    </option>
                                                    <option value="Brgy22_Binanuahan_East">Barangay 22 - Binanuahan East
                                                    </option>
                                                    <option value="Brgy23_Imperial_Court_Subd">Barangay 23 - Imperial
                                                        Court Subd.</option>
                                                    <option value="Brgy24_Rizal_Street">Barangay 24 - Rizal Street
                                                    </option>
                                                    <option value="Brgy25_Lapu-lapu">Barangay 25 - Lapu-lapu</option>
                                                    <option value="Brgy26_Dinagaan">Barangay 26 - Dinagaan</option>
                                                    <option value="Brgy27_Victory_Village_South">Barangay 27 - Victory
                                                        Village South</option>
                                                    <option value="Brgy28_Victory_Village_North">Barangay 28 - Victory
                                                        Village North</option>
                                                    <option value="Brgy29_Sabang">Barangay 29 - Sabang</option>
                                                    <option value="Brgy30_Pigcale">Barangay 30 - Pigcale</option>
                                                    <option value="Brgy31_Centro-Baybay">Barangay 31 - Centro-Baybay
                                                    </option>
                                                    <option value="Brgy32_San_Roque">Barangay 32 - San Roque</option>
                                                    <option value="Brgy33_PNR-Peñaranda_St-Iraya">Barangay 33 -
                                                        PNR-Peñaranda St.-Iraya</option>
                                                    <option value="Brgy34_Oro_Site-Magallanes_St">Barangay 34 - Oro
                                                        Site-Magallanes St.</option>
                                                    <option value="Brgy35_Tinago">Barangay 35 - Tinago</option>
                                                    <option value="Brgy36_Kapantawan">Barangay 36 - Kapantawan</option>
                                                    <option value="Brgy37_Bitano">Barangay 37 - Bitano</option>
                                                    <option value="Brgy38_Gogon">Barangay 38 - Gogon</option>
                                                    <option value="Brgy39_Bonot">Barangay 39 - Bonot</option>
                                                    <option value="Brgy40_Cruzada">Barangay 40 - Cruzada</option>
                                                    <option value="Brgy41_Bogtong">Barangay 41 - Bogtong</option>
                                                    <option value="Brgy42_Rawis">Barangay 42 - Rawis</option>
                                                    <option value="Brgy43_Tamaoyan">Barangay 43 - Tamaoyan</option>
                                                    <option value="Brgy44_Pawa">Barangay 44 - Pawa</option>
                                                    <option value="Brgy45_Dita">Barangay 45 - Dita</option>
                                                    <option value="Brgy46_San_Joaquin">Barangay 46 - San Joaquin
                                                    </option>
                                                    <option value="Brgy47_Arimbay">Barangay 47 - Arimbay</option>
                                                    <option value="Brgy48_Bagong_Abre">Barangay 48 - Bagong Abre
                                                    </option>
                                                    <option value="Brgy49_Bigaa">Barangay 49 - Bigaa</option>
                                                    <option value="Brgy50_Padang">Barangay 50 - Padang</option>
                                                    <option value="Brgy51_Buyuan">Barangay 51 - Buyuan</option>
                                                    <option value="Brgy52_Matanag">Barangay 52 - Matanag</option>
                                                    <option value="Brgy53_Bonga">Barangay 53 - Bonga</option>
                                                    <option value="Brgy54_Mabinit">Barangay 54 - Mabinit</option>
                                                    <option value="Brgy55_Estanza">Barangay 55 - Estanza</option>
                                                    <option value="Brgy56_Taysan">Barangay 56 - Taysan</option>
                                                    <option value="Brgy57_Dap-dap">Barangay 57 - Dap-dap</option>
                                                    <option value="Brgy58_Buragwis">Barangay 58 - Buragwis</option>
                                                    <option value="Brgy59_Puro">Barangay 59 - Puro</option>
                                                    <option value="Brgy60_Lamba">Barangay 60 - Lamba</option>
                                                    <option value="Brgy61_Maslog">Barangay 61 - Maslog</option>
                                                    <option value="Brgy62_Homapon">Barangay 62 - Homapon</option>
                                                    <option value="Brgy63_Mariawa">Barangay 63 - Mariawa</option>
                                                    <option value="Brgy64_Bagacay">Barangay 64 - Bagacay</option>
                                                    <option value="Brgy65_Imalnod">Barangay 65 - Imalnod</option>
                                                    <option value="Brgy66_Banquerohan">Barangay 66 - Banquerohan
                                                    </option>
                                                    <option value="Brgy67_Bariis">Barangay 67 - Bariis</option>
                                                    <option value="Brgy68_San_Francisco">Barangay 68 - San Francisco
                                                    </option>
                                                    <option value="Brgy69_Buenavista">Barangay 69 - Buenavista</option>
                                                    <option value="Brgy70_Cagbacong">Barangay 70 - Cagbacong</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-success w-100">Search
                                                    Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner End  -->

            <!--	Text Block One
		======================================================-->
            <div class="full-row bg-gray rounded-corners">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                        <div class="text-box-one">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="p-4 text-center  rounded mb-4 transation-3s">
                                        <img src="admin\upload\castro.png" class="mx-auto">

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="p-4 text-center   mb-4 transation-3s">
                                        <img src="admin\upload\arcilla.png" class="mx-auto">

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="p-4 text-center  mb-4 transation-3s">
                                        <img src="admin\upload\kirkandreinald.png" class="mx-auto">

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="p-4 text-center  mb-4 transation-3s">
                                        <img src="admin\upload\ustgray.png" class="mx-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----  Our Services  ---->

            <!--	Recent Properties  -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Recent Properties</h2>
                        </div>

                        <div class="col-md-12">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home">
                                    <div class="row">

                                        <?php $query=mysqli_query($con,"SELECT property.*, user.uname,user.utype,user.uimage FROM `property`,`user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
										while($row=mysqli_fetch_array($query))
										{
									?>

                                        <div class="col-md-6 col-lg-4">
                                            <div class="featured-thumb hover-zoomer mb-4">
                                                <div class="overlay-black overflow-hidden position-relative"> <img
                                                        src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                                    <div class="featured bg-success text-white">New</div>
                                                    <div class="sale bg-success text-white text-capitalize">For
                                                        <?php echo $row['5'];?></div>
                                                    <div class="price text-primary"><b>₱<?php echo $row['13'];?>
                                                        </b><span class="text-white"><?php echo $row['12'];?>
                                                            Sqft</span></div>
                                                </div>
                                                <div class="featured-thumb-data shadow-one">
                                                    <div class="p-3">
                                                        <h5
                                                            class="text-secondary hover-text-success mb-2 text-capitalize">
                                                            <a
                                                                href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a>
                                                        </h5>

                                                        <span class="location text-capitalize"><i
                                                                class="fas fa-map-marker-alt text-success"></i>
                                                            <?php echo $row['14'];?></span>
                                                    </div>
                                                    <div class="bg-gray quantity px-4 pt-4">
                                                        <ul>
                                                            <li><span class="text-secondary"><i
                                                                        class="fas fa-ruler"></i>
                                                                    <?php echo $row['12'];?> Sqft</span></li>
                                                            <li><span class="text-secondary"><i class="fas fa-bed"></i>
                                                                    <?php echo $row['6'];?> Bedroom</span></li>
                                                            <li><span class="text-secondary"><i class="fas fa-bath"></i>
                                                                    <?php echo $row['7'];?> Bathroom</span></li>
                                                            <li><span class="text-secondary"><i
                                                                        class="fas fa-door-open"></i>
                                                                    <?php echo $row['8'];?> Balcony</span></li>
                                                            <li><span class="text-secondary"><i
                                                                        class="fas fa-couch"></i>
                                                                    <?php echo $row['10'];?> Hall</span></li>
                                                            <li><span class="text-secondary"><i
                                                                        class="fas fa-utensils"></i>
                                                                    <?php echo $row['9'];?> Kitchen</span></li>

                                                        </ul>
                                                    </div>
                                                    <div class="p-4 d-inline-block w-100">
                                                        <div class="float-left text-capitalize"><i
                                                                class="fas fa-user text-success mr-1"></i>By :
                                                            <?php echo $row['uname'];?></div>
                                                        <div class="float-right"><i
                                                                class="far fa-calendar-alt text-success mr-1"></i>
                                                            <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Recent Properties  -->

            <!--	Why Choose Us -->
            <div class="full-row living bg-one overlay-secondary-half"
                style="background-image: url('images/ustl.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="living-list pr-4">
                                <h3 class="pb-4 mb-3 text-white">Why Choose Us</h3>
                                <ul>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-reward flat-medium float-left d-table mr-4 text-success"
                                            aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Prime Location</h5>
                                            <p>Nestled in the heart of Legazpi, our boarding house offers unparalleled
                                                convenience with easy access to key amenities, transportation, and
                                                entertainment hubs.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-real-estate flat-medium float-left d-table mr-4 text-success"
                                            aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Secure and Supportive Environment</h5>
                                            <p>Your safety is our priority. Benefit from top-notch security features and
                                                a welcoming community, ensuring a worry-free and supportive living
                                                experience.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-seller flat-medium float-left d-table mr-4 text-success"
                                            aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Tailored Comfort</h5>
                                            <p>Enjoy personalized living with our well-furnished spaces and attentive
                                                services, ensuring a comfortable and uniquely catered experience for
                                                every resident.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	why choose us -->

            <!--	How it work -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">How It Works</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">1</div>
                                <div class="left-arrow"><i class="flaticon-investor flat-medium icon-success"
                                        aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Effortless Listing Creation</h5>
                                <p>For Landlords/Property Owners: Showcase your boarding house effortlessly by creating
                                    a detailed listing. Highlight the unique features, amenities, and house rules that
                                    make your property stand out. Our user-friendly platform ensures that your listing
                                    captures the attention of potential tenants, providing them with all the information
                                    they need to make an informed decision.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">2</div>
                                <div class="left-arrow"><i class="flaticon-search flat-medium icon-success"
                                        aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Tailored Tenant Search and Inquiry</h5>
                                <p>For Prospective Tenants: Your ideal boarding house is just a few clicks away. Utilize
                                    our advanced search filters to refine your options based on location, preferences,
                                    and budget. Browse through a curated selection of listings, and when you find the
                                    perfect match, initiate contact with landlords through our secure messaging system.
                                    Your inquiries are just a message away from being answered, helping you make the
                                    right choice for your next home.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">3</div>
                                <div><i class="flaticon-handshake flat-medium icon-success" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-secondary mt-5 mb-4">Seamless Booking and Agreement</h5>
                                <p>When you've found the ideal boarding house, secure it with ease through our platform.
                                    Whether it's making a reservation or confirming your booking with a deposit, we've
                                    streamlined the process to ensure a hassle-free experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--	How It Work -->

            <!--	Achievement
        ============================================================-->
            <div class="full-row overlay-secondary"
                style="background-image: url('images/sky.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50 text-white" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(pid) FROM property");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-success my-4 " data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large text-white" aria-hidden="true"
                                        class="text-white h5"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(pid) FROM property where stype='sale'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">On Sale Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(pid) FROM property where stype='rent'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Rent Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-man flat-large text-white" aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(uid) FROM user");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Registered Users</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <!--	Testonomial -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content-sidebar p-4">
                                <div class="mb-3 col-lg-12">
                                    <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">
                                        Testimonials
                                    </h4>
                                    <div class="recent-review owl-carousel owl-dots-gray owl-dots-hover-success">

                                        <?php
													
												$query=mysqli_query($con,"select feedback.*, user.* from feedback,user where feedback.uid=user.uid and feedback.status='1'");
												while($row=mysqli_fetch_array($query))
													{
										?>
                                        <div class="item">
                                            <div class="p-4 bg-success down-angle-white position-relative">
                                                <p class="text-white"><i
                                                        class="fas fa-quote-left mr-2 text-white"></i><?php echo $row['2']; ?>.
                                                    <i class="fas fa-quote-right mr-2 text-white"></i>
                                                </p>
                                            </div>
                                            <div class="p-2 mt-4">
                                                <span
                                                    class="text-success d-table text-capitalize"><?php echo $row['uname']; ?></span>
                                                <span class="text-capitalize"><?php echo $row['utype']; ?></span>
                                            </div>
                                        </div>
                                        <?php }  ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Testonomial -->


            <!--	Footer   start-->
            <?php include("include/footer.php");?>
            <!--	Footer   start-->


            <!-- Scroll to top -->
            <a href="#" class="bg-success text-white hover-text-secondary" id="scroll"><i
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
    <script src="js/YouTubePopUp.jquery.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>