<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
include_once "../session.php";

$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
}
?>



<!-- main Content start -->
<div class="main-content">




    <!-- home section start -->
    <section class="upload section " id="upload">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="LMS-Dashboard.php">LMS Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Dashboard</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload</h2>
                </div>
            </div>

            <h3 class="contact-title padd-15">AI&DS STAFF UPLOAD SECTION</h3>
            <div class="upload-btn-section shadow p-3 mb-5 bg-body rounded flex">
                <div class="row p-2">
                    <div class="card m-2" style="width: 18rem;">
                        <img src="../res/img/notes.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Class Room Notes</h5>
                            <a href="./uploadClassRoom.php?iActive=2&staffAccess=1" class="btn btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="../res/img/upload2.svg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Upload Books</h5>
                            <a href="uploadBook.php?iActive=2&staffAccess=1" class="btn btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="../res/img/upload1.png" class="card-img-top mt-5" alt="...">
                        <div class="card-body flot-bottom text-center">
                            <h5 class="card-title mb-5">Upload Notes</h5>
                            <a href="./uploadNotes.php?iActive=2&staffAccess=1" class="btn btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="../res/img/upload3.svg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Upload Assignment</h5>
                            <a href="./uploadAssignment.php?iActive=2&staffAccess=1" class="btn btn-primary">Upload</a>
                        </div>
                    </div>
                </div>
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