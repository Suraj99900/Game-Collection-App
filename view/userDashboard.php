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
}else{
    $iUserID = $oSessionManager->iUserID;
}
?>

<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>User Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="userDashboard.php" class="shadow-lg p-3 mb-5 rounded active"><i class="fa-regular fa-id-card"></i>
                            <h5>Personal Info</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageWallet.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Wallet</h5>
                        </a>
                    </li>
                    <li>
                        <a href="bankDetails.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-book-open-reader"></i>
                            <h5>Bank Details</h5>
                        </a>
                    </li>
                    <li>
                        <a href="transaction.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-user-tie"></i>
                            <h5>Orders</h5>
                        </a>
                    </li>
                    <li>
                        <a href="accountSecurity.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Account Security</h5>
                        </a>
                    </li>
                    <li>
                        <a href="ReportComplaintsSuggetion.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Report/Complaints & Suggetion</h5>
                        </a>
                    </li>
                    <li>
                        <a href="about.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>About</h5>
                        </a>
                    </li>
                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low row userInfo padd-15">
                    <div class="mb-3 row">
                        <label for="ID" class="col-sm-4 col-form-label c-text"><b>ID:</b> </label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext c-text-vl" id="userID" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="MobileNumber" class="col-sm-4 col-form-label c-text"><b>Mobile:</b> </label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext c-text-vl" id="mobileNumberID" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="UserName" class="col-sm-4 col-form-label c-text"><b>UserName:</b> </label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext c-text-vl" id="userNameId" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Balance" class="col-sm-4 col-form-label c-text"><b>Available balance:</b> </label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext c-text-vl" id="balanceID" value="">
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </section>

</div>
<!-- main Content end-->

<!-- manage issues book modal -->
<!-- Add Modal -->
<div class="modal fade" id="AddBookIssuesModalId" tabindex="-1" aria-labelledby="AddBookIssuesModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddBookIssuesModal">Book Issues</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <!-- <label class="form-label"><i class="fa-solid fa-user"></i>Select Student</label> -->
                        <select class="form-control custom-control" id="studentNameId" name="student" placeholder="Select Student" style="width: 100%;">
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                        <input type="hidden" class="form-control custom-control" id="bookId" name="bookId">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <select class="form-control custom-control" id="bookNameID" name="bookName" placeholder="Select Book" style="width: 100%;">
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="idAddIssues" class="btn btn-primary">Add</button>
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
include_once "./CDN_Footer.php";
?>

<script>
    var ABS_URL = '<?php echo ABS_URL ?>';
    var iUserID = "<?php echo $iUserID; ?>"
</script>

<script src="../controller/userController.js"></script>