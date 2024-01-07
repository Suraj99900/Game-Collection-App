<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "../session.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
?>

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="main-content">
            <!-- aside start  -->
            <div class="aside">
                <div class="logo">
                    <a href="#" style="font-size: 14px;"><span>E</span>-library</a>
                </div>

            </div>
            <!-- aside end -->


            <section class="LMS section " id="upload">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-4">
                        <li class="breadcrumb-item active" aria-current="page">LMS Dashboard</li>
                    </ol>
                </nav>
                
                <div class="container">

                    <!-- upload Section form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>LMS</h2>
                        </div>
                    </div>

                    <h3 class="contact-title padd-15">AI&DS LMS Dashoboard</h3>
                    <div class="upload-btn-section shadow p-3 bg-body rounded flex">
                        <div class="row p-2">
                            <div class="card m-2 col-sm-12 col-md-6 col-lg-4" style="width: 20rem;">
                                <a href="home.php?iActive=1">
                                    <img src="../res/img/study-literature.svg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-5">E-Library</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="card m-2 col-sm-12 col-md-6 col-lg-4" style="width: 20rem;">
                                <a href="./uploadScreen.php?staffAccess=1&iActive=2">
                                    <img src="../res/img/online-class.svg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-5 pt-5">Library Management</h5>

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