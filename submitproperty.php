<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];

	$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor, isFeatured)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor', '$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
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
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- yoyoyoyoyo -->
    <!--	Title
	=========================================================-->
    <title>Real Estate PHP</title>
</head>

<body>

    <!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
-->


    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->

            <!--	Banner   --->
            <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Submit Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Submit Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
            <!--	Banner   --->


            <!--	Submit property   -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                        </div>
                    </div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
                            <div class="description">
                                <h5 class="text-secondary">Basic Information</h5>
                                <hr>
                                <?php echo $error; ?>
                                <?php echo $msg; ?>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Title</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="title" required
                                                    placeholder="Enter Title">
                                            </div>
                                        </div><!-- yoyoyoyoyo -->
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Content</label>
                                            <div class="col-lg-9">
                                                <textarea class="tinymce form-control" name="content" rows="10"
                                                    cols="30"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Property Type</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="ptype">
                                                    <option value="">Select Type</option>
                                                    <option value="boardinghouse">Boarding House</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="Transient">Transient</option>
                                                    <option value="bedspace">Bedspace</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Selling Type</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="stype">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div><!-- yoyoyoyoyo -->
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Bathroom</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="bath" required
                                                    placeholder="Enter Bathroom (only no 1 to 10)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Kitchen</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="kitc" required
                                                    placeholder="Enter Kitchen (only no 1 to 10)">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-3 col-form-label">Parking Area</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="bhk">
                                                    <option value="">Is there a parking area suitable for?</option>
                                                    <option value="formotorcycle">Motorcycle</option>
                                                    <option value="forauto"> Automobile</option>
                                                    <option value="none">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Bedroom</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="bed" required
                                                    placeholder="Enter Number of Bedrooms  ">
                                            </div>
                                        </div><!-- yoyoyoyoyo -->
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Balcony</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="balc" required
                                                    placeholder="Enter Number of Balcony ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Hall</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="hall" required
                                                    placeholder="Enter Number of Halls  ">
                                            </div>
                                        </div>

                                    </div><!-- yoyoyoyoyo -->
                                </div>
                                <h5 class="text-secondary">Price & Location</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Floor</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="floor">
                                                    <option value="">Select Floor</option>
                                                    <option value="1st Floor">1st Floor</option>
                                                    <option value="2nd Floor">2nd Floor</option>
                                                    <option value="3rd Floor">3rd Floor</option>
                                                    <option value="4th Floor">4th Floor</option>
                                                    <option value="5th Floor">5th Floor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Price</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="price" required
                                                    placeholder="Enter Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Barangay</label>
                                            <div class="col-lg-9">
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
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">State</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="state" required
                                                    placeholder="Enter State">
                                            </div>
                                        </div>
                                    </div><!-- yoyoyoyoyo -->
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Total Floor</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="totalfl">
                                                    <option value="">Select Floor</option>
                                                    <option value="1 Floor">1 Floor</option>
                                                    <option value="2 Floor">2 Floor</option>
                                                    <option value="3 Floor">3 Floor</option>
                                                    <option value="4 Floor">4 Floor</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Area Size</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="asize" required
                                                    placeholder="Enter Area Size (in sqrt)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Address</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="loc" required
                                                    placeholder="Enter Address">
                                            </div>
                                        </div>

                                    </div><!-- yoyoyoyoyo -->
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Feature</label>
                                    <div class="col-lg-9">
                                        <p class="alert alert-danger">* Important Please Do Not Remove Below Content
                                            Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details
                                        </p>

                                        <textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Fully furnished : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Pets Allowed : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Nearby Amenities : </span>Yes</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Laundry Facilities On-site : </span>Yes</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Appliances provided  </span>Yes</li>
														</ul>
													</div>
												<!---feature area end---->
											</textarea>
                                    </div><!-- yoyoyoyoyo -->
                                </div>

                                <h5 class="text-secondary">Image & Status</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage" type="file" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 2</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage2" type="file" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 4</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage4" type="file" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Status</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="available">Available</option>
                                                    <option value="sold out">Sold Out</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="fimage1" type="file">
                                            </div><!-- yoyoyoyoyo -->
                                        </div>
                                    </div>
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 1</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage1" type="file" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">image 3</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage3" type="file" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Floor Plan Image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="fimage" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="fimage2" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <!-- yoyoyoyoyo -->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="isFeatured">
                                                    <option value="">Select...</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <input type="submit" value="Submit Property" class="btn btn-info" name="add"
                                    style="margin-left:200px;">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--	Submit property   -->


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
    <!-- yoyoyoyoyo -->
    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/tinymce/init-tinymce.min.js"></script>
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