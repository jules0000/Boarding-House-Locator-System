<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-df4GTTEZB8E2PZTSFNfgVBHV+4m+q9z0W1hFiqV2xTCuZ8kP3TtENzLBIlYswva" crossorigin="anonymous">
    <style>
    /* Add your custom styles here */
    #header .navbar-nav a,
    #header .navbar-brand,
    #header .nav-link,
    #header .dropdown-menu a {
        font-weight: bold;
        /* Add any other styling you want */
        color: #333;
        /* Example color */
        text-decoration: none;
    }

    #header .navbar-nav a:hover,
    #header .nav-link:hover,
    #header .dropdown-menu a:hover {
        /* Add styles for hover effect */
        color: #808080;
        /* Example color */
    }

    #importFormContainer {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        /* Translucent white background */
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        max-width: 400px;
        /* Adjust the maximum width as needed */
    }

    #importFormContainer label {
        display: block;
        margin-bottom: 10px;
    }

    #importFormContainer button {
        display: block;
        margin-top: 10px;
    }

    /* Translucent background overlay */
    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black overlay */
        z-index: 999;
        /* Should be lower than the form container z-index */
    }

    #closeButton {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        color: #333;
        /* Icon color */
        cursor: pointer;
    }

    /* Add other custom styles as needed */
    </style>
    <!-- Add other head elements as needed -->
</head>

<body>

    <header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
        <div class="main-nav secondary-nav hover-success-nav py-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a class="navbar-brand position-relative" href="index.php">
                                <img class="nav-logo" src="images/logo/logo.png" alt=""
                                    style="width: 80px; height: auto;">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link" href="property.php">PROPERTIES</a></li>
                                    <li class="nav-item"><a class="nav-link" href="agent.php">LESSOR</a></li>
                                    <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
                                </ul>

                                <?php if (isset($_SESSION['uemail'])) : ?>
                                <?php if (isset($_SESSION['utype'])) : ?>
                                <?php echo "User Type: " . $_SESSION['utype']; // Debugging line ?>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MY
                                            ACCOUNT</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link" href="profile.php">PROFILE</a></li>
                                            <?php if ($_SESSION['utype'] === 'agent') : ?>
                                            <li class="nav-item"><a class="nav-link" href="feature.php">YOUR
                                                    PROPERTY</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" id="openImportForm">IMPORT
                                                    PROPERTY</a></li>
                                            <li class="nav-item"><a class="nav-link" href="submitproperty.php">PUBLISH
                                                    PROPERTY</a></li>
                                            <?php else : ?>
                                            <li class="nav-item"><a class="nav-link" href="savedproperties.php">SAVED
                                                    PROPERTIES</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="reservedproperties.php">RESERVED
                                                    PROPERTIES</a></li>
                                            <?php endif; ?>
                                            <li class="nav-item"><a class="nav-link" href="logout.php">LOG OUT</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php else : ?>
                                <?php echo "User Type not set!"; // Debugging line ?>
                                <?php endif; ?>
                                <?php else : ?>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link" href="login.php"><i
                                                class="fas fa-user"></i></a></li>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlay"></div>

        <div id="importFormContainer">
            <span id="closeButton" onclick="closeForm()"><i class="fas fa-times"></i></span>
            <form action="propertygrid.php" method="post" enctype="multipart/form-data">
                <label for="property_csv">Choose CSV file:</label>
                <input type="file" name="property_csv" id="property_csv" accept=".csv">
                <button type="submit" name="submit">Import</button>
            </form>
        </div>

        <script>
        document.getElementById('openImportForm').addEventListener('click', function() {
            document.getElementById('importFormContainer').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        });

        function closeForm() {
            document.getElementById('importFormContainer').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
        </script>
    </header>
</body>

</html>