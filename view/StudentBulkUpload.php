<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
}
?>

<!-- main Content start -->
<div class="main-content">

    <!-- home section start -->
    <section class="Student-Info section " id="studentInfoId">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="LMS-Dashboard.php">LMS Dashboard</a></li>
                <li class="breadcrumb-item"><a href="studentInfo.php?iActive=4&staffAccess=1">Manage Student Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student Bulk Upload</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2> Student Bulk Upload</h2>
                </div>
            </div>
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5 bg-body rounded flex" style="position: relative;">
                <form>
                    <div class="row align-items-center p-3">
                        
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectBook" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Upload Excel File </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="studentUploadId" name="StudentUpload">
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 right-flex">
                            <a class="btn mt-5 btn-info" id="BulkUploadStudentId">Download Refrence File</a>
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="idUploadSubmit" class="btn search  mb-4">Submit</a>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <!-- home section end -->


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
<?php
include_once "./CDN_Footer.php";
?>
<script src="../controller/StudentBulkUploadController.js"></script>