<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

if (!$bIsLogin) {
    header("Location: loginScreen.php", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName;
    $sUserMobileNo = $oSessionManager->sUserMobileNo;
}
$RAZORPAY_KEY_ID = RAZORPAY_KEY_ID;
?>

<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account Security</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Account Security</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="userDashboard.php" class="shadow-lg p-3 mb-5 rounded "><i
                                class="fa-regular fa-id-card"></i>
                            <h5>Personal Info</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageWallet.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Wallet</h5>
                        </a>
                    </li>
                    <li>
                        <a href="bankDetails.php?iActive=3" class="shadow-lg p-3 mb-5 rounded "><i
                                class="fa-solid fa-book-open-reader"></i>
                            <h5>Bank Details</h5>
                        </a>
                    </li>
                    <li>
                        <a href="transaction.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-user-tie"></i>
                            <h5>Orders</h5>
                        </a>
                    </li>
                    <li>
                        <a href="accountSecurity.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-tarp"></i>
                            <h5>Account Security</h5>
                        </a>
                    </li>
                    <li>
                        <a href="ReportComplaintsSuggetion.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-tarp"></i>
                            <h5>Report/Complaints & Suggetion</h5>
                        </a>
                    </li>
                    <li>
                        <a href="about.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-tarp"></i>
                            <h5>About</h5>
                        </a>
                    </li>
                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low col userInfo padd-15">
                    <div class="mb-3 mt-3  row">
                        <h2 class=''> Reset Password</h2>
                        <div class="row align-items-center P-2 m-2">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="mobileNo" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i>
                                    Mobile No</label>
                                <input type="number" class="form-control custom-control c-text-vl" id="phoneNoId"
                                    name="phoneNo" placeholder="Enter Phone Number">
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <label for="verifyCode" class="form-label c-text-vl"><i
                                        class="fa-solid fa-signature"></i>
                                    Verify Code</label>
                                <input type="text" class="form-control custom-control c-text-vl" id="verifyCodeId"
                                    name="verifyCode" placeholder="Enter OTP">
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
                                <button class="btn btn-primary" type="button">
                                    OTP
                                </button>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-12 mt-3">
                                <label for="newPassword" class="form-label c-text-vl"><i
                                        class="fa-solid fa-signature"></i>
                                    New Password</label>
                                <input type="text" class="form-control custom-control c-text-vl" id="newPasswordId"
                                    name="newPassword" placeholder="Enter New Password">
                            </div>

                            <div class="flex search-btn mt-5 text-center">
                                <a id="idSubmit" class="btn search mb-1">Reset Password</a>
                            </div>
                        </div>

                    </div>
                </div>

            </main>

        </div>
    </section>

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