<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
?>

<!-- main Content start -->
<div class="main-content">

    <!-- home section start -->
    <section class="Student-Info section " id="studentInfoId">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Student Info</li>
            </ol>
        </nav>

        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Manage Student Info</h2>
                </div>
            </div>

            <div class="right-flex">
                <a href="addStudentInfo.php?iActive=4&staffAccess=1" class="btn mb-5 m-2">Add Student Info</a>
                <a href="StudentBulkUpload.php?iActive=4&staffAccess=1" class="btn mb-5">Bulk Upload</a>
            </div>

            <div class="student-info-table">
                <table id="studentTableId" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Name</th>
                            <th>ZPRN</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
<script src="../controller/studentInfoController.js"></script>