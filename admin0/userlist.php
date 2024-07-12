<?php
session_start();
require("config.php");

if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $lesseeId = $_GET["id"];

    // Delete the lessee from the database or update status as needed
    mysqli_query($con, "DELETE FROM user WHERE uid='$lesseeId'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>BHLS | Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Main Wrapper -->

    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Lessee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lessee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lessee List</h4>
                            <?php
                            if (isset($_GET['msg']))
                                echo $_GET['msg'];
                            ?>
                        </div>
                        <div class="card-body">

                            <table id="basic-datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Utype</th>
                                        <th>Image</th>
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th>Valid ID Picture</th>
                                        <th>Valid ID Number</th>
                                        <th>Facebook Account</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM user WHERE utype='user'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['uname']; ?></td>
                                        <td><?php echo $row['uemail']; ?></td>
                                        <td><?php echo $row['uphone']; ?></td>
                                        <td><?php echo $row['utype']; ?></td>
                                        <td><img src="user/<?php echo $row['uimage']; ?>" height="50px" width="50px">
                                        </td>
                                        <td><?php echo $row['birthday']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><img src="user/<?php echo $row['valid_id_picture']; ?>" height="50px"
                                                width="50px"></td>
                                        <td><?php echo $row['valid_id_number']; ?></td>
                                        <td><?php echo $row['facebook_account']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <form method="post">
                                                <button type="submit" name="approve" value="<?php echo $row['uid']; ?>"
                                                    class="btn btn-success">Approve</button>
                                                <button type="submit" name="disapprove"
                                                    value="<?php echo $row['uid']; ?>"
                                                    class="btn btn-danger">Disapprove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>

<?php
// Handle the approval or disapproval
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["approve"])) {
        $lesseeId = $_POST["approve"];
        mysqli_query($con, "UPDATE user SET status='approved' WHERE uid='$lesseeId'");
    }

    if (isset($_POST["disapprove"])) {
        $lesseeId = $_POST["disapprove"];
        mysqli_query($con, "UPDATE user SET status='disapproved' WHERE uid='$lesseeId'");
    }
}
?>