<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
?>



<!-- main Content start -->
<div class="main-content">



    <!-- home section start -->
    <section class="upload section " id="upload">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="LMS-Dashboard.php">LMS Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff Login</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Staff Login</h2>
                </div>
            </div>
            <h3 class="contact-title padd-15 typing">Welcome to AI&DS E-Library </h3>
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5 bg-body rounded flex" style="position: relative;">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffUserName" class="form-label"><i class="fa-solid fa-user fa-i"></i> UserName</label>
                            <input type="text" class="form-control custom-control " id="staffuserNameId" name="staffname" placeholder="Enter UserName">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffUserPassword" class="form-label"><i class="fa-solid fa-lock fa-i"></i> Password</label>
                            <input type="password" class="form-control custom-control" id="staffuserPasswordId" name="staffPassword" placeholder="Enter Password">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="idLogin" class="btn search mb-4">Submit</a>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>

<!-- main Content end-->


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
<?php
include_once "./CDN_Footer.php";
?>
<script src="../controller/LoginController.js"></script>
<script>
    setInterval(typeing, 150);
</script>