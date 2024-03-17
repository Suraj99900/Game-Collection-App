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
                <li class="breadcrumb-item active" aria-current="page">Report/Complaints & Suggetion</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Report/Complaints & Suggetion</h2>
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
                        <a href="accountSecurity.php?iActive=3" class="shadow-lg p-3 mb-5 rounded "><i
                                class="fa-solid fa-tarp"></i>
                            <h5>Account Security</h5>
                        </a>
                    </li>
                    <li>
                        <a href="ReportComplaintsSuggetion.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
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
                    <div class="row">
                        <h3 class="col-lg-4 col-md-4 col-sm-12 my-4" style="text-align: center;"><a class="c-text badge"
                                data-bs-toggle="collapse" href="#collapseAllId" role="button" aria-expanded="true"
                                aria-controls="collapseAllId" id="complitedReportDataId">
                                COMPLETED
                            </a></h3>
                        <h3 class="col-lg-4 col-md-4 col-sm-12 my-4" style="text-align: center;"><a
                                class="c-text badge " data-bs-toggle="collapse" href="#collapseSuccessfulId"
                                role="button" aria-expanded="false" aria-controls="collapseSuccessfulId" id="penddiongDataReportId">
                                PENDDING
                            </a></h3>
                        <h3 class="col-lg-4 col-md-4 col-sm-12 my-4" style="text-align: center;"><a class="c-text badge"
                                data-bs-toggle="offcanvas" href="#SuggetionBoxID" role="button"
                                aria-controls="SuggetionBoxID">
                                <i class="fa-solid fa-plus"></i>
                            </a></h3>

                    </div>
                    <div class="collapse show mt-4 p-3" id="collapseAllId">
                        <div class="card ">
                            <h4 class="text-center">COMPLETED</h4>

                            <table id="complitedReportId" class="display" style="width: 100%;">
                                <thead>
                                    <th>Type</th>
                                    <th>Order Id</th>
                                    <th>Description</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="collapse mt-4 p-3" id="collapseSuccessfulId">
                        <div class="card ">
                            <h4 class="text-center">PENDDING</h4>

                            <table id="PendingReportId" class="display" style="width: 100%;">
                                <thead>
                                    <th>Type</th>
                                    <th>Order Id</th>
                                    <th>Description</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-start  bg-card-high" tabindex="-1" id="SuggetionBoxID"
                        aria-labelledby="SuggetionBoxIDLabel" style="width: 80%; overflow-y: auto;">
                        <div class="offcanvas-header">
                            <h3 class="offcanvas-title  c-text" id="SuggetionBoxIDLabel">Report/Complaints & Suggetion
                                Form</h3>
                            <a type="button" class="btn c-text" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                    class="fa-solid fa-xmark"></i></a>
                        </div>
                        <div class="offcanvas-body bg-card-low">
                            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-card-low rounded">
                                <div>
                                    <div class="row align-items-center p-3">
                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                            <label for="type" class="form-label c-text-vl"><i
                                                    class="fa-solid fa-signature"></i> Type</label>
                                            <select class="form-select custom-control c-text-vl" id="typeId"
                                                name="type">
                                                <option value="suggestion">Suggestion</option>
                                                <option value="complain">Complaint</option>
                                                <option value="withdrawal">Withdrawal Problem</option>
                                                <option value="credit">Credit Problem</option>
                                                <option value="gift">Gift Received Problem</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                            <label for="orderId" class="form-label c-text-vl"><i
                                                    class="fa-solid fa-hashtag"></i> Order ID</label>
                                            <input type="text" class="form-control custom-control c-text-vl"
                                                id="orderId" name="orderId" placeholder="Enter Order ID">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                            <label for="email" class="form-label c-text-vl"><i
                                                    class="fa-solid fa-envelope"></i> Email</label>
                                            <input type="email" class="form-control custom-control c-text-vl" id="email"
                                                name="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="row align-items-center p-3">
                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                            <label for="PhomneNumber" class="form-label c-text-vl"><i
                                                    class="fa-solid fa-envelope"></i> Phone Number</label>
                                            <input type="number" class="form-control custom-control c-text-vl"
                                                id="phoneNumberId" name="number" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                            <label for="description" class="form-label c-text-vl"><i
                                                    class="fa-solid fa-file-alt"></i>
                                                Description</label>
                                            <textarea class="form-control c-text-vl" id="description" name="description"
                                                placeholder="Enter Description" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <label for="select" class="form-label"><i
                                                    class="fa-solid fa-file-arrow-up"></i> Select File </label>
                                            <input type="file" class="form-control custom-control btn-primary"
                                                id="FileId" name="File">
                                        </div>
                                        <div class="text-center col-sm-12 col-md-6 col-lg-4 my-3">
                                            <button type="submit" class="btn search mb-1"
                                                id="idSubmitForm">Submit</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </main>

        </div>
    </section>

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
    var iUserID = "<?php echo $iUserID ?>";
    var sUserName = "    <?php echo $sUserName ?>";
    var sUserMobileNo = "<?php echo $sUserMobileNo ?>";
</script>
<script src="../controller/reportComplaintsSuggetionController.js"></script>