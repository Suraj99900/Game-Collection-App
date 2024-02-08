<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

$iUserID = $oSessionManager->iUserID ?  $oSessionManager->iUserID : '';
$sUserName = $oSessionManager->sUserName ?  $oSessionManager->sUserName : '';
$sUserMobileNo = $oSessionManager->sUserMobileNo ? $oSessionManager->sUserMobileNo : '';

?>

<body>

    <!-- infile CSS -->

    <style>
        .row {
            justify-content: center;
        }
    </style>
    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="dashboard">


            <section class="LMS section " id="upload">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-4">
                        <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Amuse</li>
                    </ol>
                </nav>

                <div class="container">

                    <!-- upload Section form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Amuse</h2>
                        </div>
                    </div>


                    <div class="upload-btn-section rounded flex bg-card-high">
                        <div class="row">
                            <div class="card m-2 col-sm-12 col-md-12 col-lg-12  shadow bg-card-low p-1 img-Width">
                                <a href="https://play.google.com/store/apps/details?id=com.raongames.growcastle&pli=1"
                                    class="card-flex-column">
                                    <div class="text-center p-2">
                                        <div class="bg-card-low">
                                            <h5 class="card-title">Grow Castle</h5>
                                            <div class="img-box flex p-5">
                                                <img src="../res/img/1.webp" alt="">
                                            </div>
                                            <p class="card-text p-1">It is a defense game to protect the castle from
                                                enemy
                                                attack. If growth can be placed in the castle tower and the hero on each
                                                floor.</p>
                                        </div>
                                    </div>

                                </a>
                            </div>

                            <div class="card m-2 col-sm-12 col-md-12 col-lg-12  shadow bg-card-low p-1 img-Width">
                                <a href="https://play.google.com/store/apps/details?id=com.rappidstudios.simulatorbattlephysics"
                                    class="card-flex-column">
                                    <div class="text-center p-2">
                                        <div class="bg-card-low">
                                            <h5 class="card-title">Epic Battle Simulator 2</h5>
                                            <div class="img-box flex p-5">
                                                <img src="../res/img/2_game.webp" alt="">
                                            </div>
                                            <p class="card-text p-1">Form your strategies, choose your troops and place
                                                them wisely on the battlefield! Play against levels, custom and
                                                real-time multiplayer!</p>
                                        </div>
                                    </div>

                                </a>
                            </div>

                            <div class="card m-2 col-sm-12 col-md-12 col-lg-12  shadow bg-card-low p-1 img-Width">
                                <a href="https://play.google.com/store/apps/details?id=com.raongames.growcastle&pli=1"
                                    class="card-flex-column">
                                    <div class="text-center p-2">
                                        <div class="bg-card-low">
                                            <h5 class="card-title">Art of War: Legions</h5>
                                            <div class="img-box flex p-5">
                                                <img src="../res/img/3_game.webp" alt="">
                                            </div>
                                            <p class="card-text p-1">You will be the commander who leads legions of tiny
                                                armies. Accept the challenges of various levels and don’t forget to get
                                                extra rewards from bounty tasks! It’s your army, you in charge.</p>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <div class="card m-2 col-sm-12 col-md-12 col-lg-12  shadow bg-card-low p-1 img-Width">
                                <a href="https://play.google.com/store/apps/details?id=com.raongames.growcastle&pli=1"
                                    class="card-flex-column">
                                    <div class="text-center p-2">
                                        <div class="bg-card-low">
                                            <h5 class="card-title">Find The Differences - The Detective</h5>
                                            <div class="img-box flex p-5">
                                                <img src="../res/img/4_game.webp" alt="">
                                            </div>
                                            <p class="card-text p-1">Detective needs you to solve some difficult cases.
                                                You’ll be drawn into the plot of multiple investigations, each with its
                                                own unique fugitive to catch, challenges, and surprises.</p>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>

                    </div>


                </div>
            </section>
        </div>

        <!-- main Content end-->

    </div>

    <!-- main container end  -->

    <!-- style switcher start -->
    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas "></i>
        </div>
        <h4>Theme Color</h4>
        <div class="colors">
            <span class="color-1" onclick="setActivityStyle('color-1')"></span>
            <span class="color-2" onclick="setActivityStyle('color-2')"></span>
            <span class="color-3" onclick="setActivityStyle('color-3')"></span>
            <span class="color-4" onclick="setActivityStyle('color-4')"></span>
            <span class="color-5" onclick="setActivityStyle('color-5')"></span>
        </div>
    </div>

    <!-- style switcher end -->

    <!-- manu toggler start -->

    <div class="toggler-box">
        <div class="toggler-open icon">
            <i class="uil uil-angle-right-b"></i>
        </div>
        <div class="toggler-close icon">
            <i class="uil uil-angle-left-b"></i>
        </div>
    </div>

    <!-- manu toggler end -->

    <!-- include footer section -->
    <?php include_once "./CDN_Footer.php" ?>
    <script src="../controller/SearchController.js"></script>