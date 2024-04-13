<?php

// include header section of template
require_once "../../config.php";
include_once ABS_PATH_TO_PROJECT . "view/admin/ADMIN_CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/admin/adminLeftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/adminSessionCheck.php";

$bIsLogin = $oAdminSessionManager->isStaffLoggedIn ? $oAdminSessionManager->isStaffLoggedIn : false;

if (!$bIsLogin) {
    header("Location: adminLoginScreen.php", true, 301);
    exit;
} else {
    $iStaffId = $oAdminSessionManager->iStaffID;
}
?>

<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="adminDashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Dashboard</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Payment Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="adminDashboard.php" class="shadow-lg p-3 mb-5 rounded "><i
                                class="fa-regular fa-id-card"></i>
                            <h5>Dashboard</h5>
                        </a>
                    </li>
                    <li>
                        <a href="adminStaff.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Manage Staff</h5>
                        </a>
                    </li>
                    <li>
                        <a href="adminGameManagement.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-book-open-reader"></i>
                            <h5>Game Management</h5>
                        </a>
                    </li>
                    <li>
                        <a href="transaction.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-Staff-tie"></i>
                            <h5>User Queries</h5>
                        </a>
                    </li>
                    <li>
                        <a href="paymentDashboard.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-tarp"></i>
                            <h5>User Debit </h5>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="ReportComplaintsSuggetion.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Report/Complaints & Suggetion</h5>
                        </a>
                    </li>
                    <li>
                        <a href="about.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>About</h5>
                        </a>
                    </li> -->
                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low row StaffInfo padd-15 p-2 ">
                    <div class="card col custom-table">
                        <h4 class="text-center">Debit User Amount</h4>
                        <table id="allDebitRecordId" class="display" style="width: 100%;">
                            <thead>
                                <th class="text-center">Sr. no</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </main>

        </div>
    </section>
</div>
<!-- main Content end-->

<div class="offcanvas offcanvas-end bg-card-high" tabindex="-1" id="offcanvasUpdateDebitRecordId"
    aria-labelledby="offcanvasUpdateDebitRecordIdLabel" style="width: 60%;">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title c-text" id="offcanvasUpdateDebitRecordIdLabel">Update Debit Record</h3>
        <i data-bs-dismiss="offcanvas" aria-label="Close"
            class="c-text btn-close text-reset btn c-text fa-solid fa-circle-xmark" style="font-size: 1.5rem;"></i>
    </div>
    <div class="offcanvas-body bg-card-high ">
        <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-card-high rounded">
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5  rounded flex"
                style="position: relative;">
                <form>
                    <input type="hidden" id="rowId">
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="name" class="form-label card-title-change"><b>User Name : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="userNameId"> suraj</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="phoneNumber" class="form-label card-title-change"><b>Phone Number : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="phoneNumberId">7387997294</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="actualName" class="form-label card-title-change"><b>Actual Name : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="actualNameId">suraj jaiswal</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="ifscCode" class="form-label card-title-change"><b>IFSC Code : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="ifscCodeId">ICICI</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="accountNumber" class="form-label card-title-change"><b>Account Number :
                                </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="accountNumberId">1234567891234</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="bankName" class="form-label card-title-change"><b>Bank Name : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="bankNameId">ICICI</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="state" class="form-label card-title-change"><b>State : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="stateId">Maharashtra</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="city" class="form-label card-title-change"><b>City : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="cityId">Pune</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="address" class="form-label card-title-change"><b>Address : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="addressId">Narhe gaon pune</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="mobileNumber" class="form-label card-title-change"><b>Mobile Number :
                                </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="mobileNumberId">7387997294</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="email" class="form-label card-title-change"><b>Email : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="emailId">jaiswaljesus384@gmail.com</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="upiId" class="form-label card-title-change"><b>UPI ID : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="upiId">jaiswal@icici</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="upiId" class="form-label card-title-change"><b>Value : </b></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="form-label card-title-change" id="valueId">jaiswal@icici</h5>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-3 col-md-3 col-lg-3">

                            <label class="form-label card-title-change" for="flexSwitchCheckDefault">Finalize the
                                payment.</label>
                            <input class="form-check-input" type="checkbox" value="" id="idCheckboxCompleted">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="updateRecordBtn" class="btn mb-4">Update</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






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
include_once "./ADMIN_CDN_Footer.php";
?>

<script>
    var ABS_URL = '<?php echo ABS_URL ?>';
    var iStaffID = "<?php echo $iStaffId; ?>"
</script>

<script src="../../controller/paymentController.js"></script>