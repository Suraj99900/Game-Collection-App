<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";

$sZPRN_No = $_GET['ZPRN'] ? $_GET['ZPRN'] : '';
?>

<!-- main Content start -->
<div class="main-content">

    <!-- home section start -->
    <section class="Student-Info section " id="studentInfoId">
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2> Update Student Info</h2>
                </div>
            </div>
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5 bg-body rounded flex" style="position: relative;">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="studentUserName" class="form-label"><i class="fa-solid fa-user"></i> Student Full Name </label>
                            <input type="text" class="form-control custom-control " id="studentuserNameId" name="studentname" placeholder="Enter student full name">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="studentZPRNNO" class="form-label"><i class="fa-solid fa-graduation-cap"></i> ZPRN No </label>
                            <input type="text" class="form-control custom-control " id="ZPRNid" name="studentzprn" placeholder="Enter student ZPRN no" readonly>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Email </label>
                            <input type="email" class="form-control custom-control " id="emailId" name="studentEmail" placeholder="Enter student Email">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="phone no" class="form-label"><i class="fa-solid fa-phone"></i> Phone No </label>
                            <input type="number" class="form-control custom-control " id="phoneId" name="studentPhoneNo" placeholder="Enter student Phone">
                        </div>
                    </div>

                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i> Semester</label>
                            <select class="form-select custom-control" id="semesterId" name="semester">
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="address" class="form-label"><i class="fa-solid fa-location-dot"></i> Address </label>
                            <textarea class="form-control" id="addressid" name="address" placeholder="Enter student Address" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="idUpdateSubmit" class="btn search  mb-4">Submit</a>
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
<script>
    // populate User for update
    var sZPRN = '<?php echo $sZPRN_No ?>';
</script>
<script src="../controller/studentInfoController.js"></script>

<script>
    $(document).ready(() => {
        getStudentInfoAndPopulateForm(sZPRN);
    });
</script>