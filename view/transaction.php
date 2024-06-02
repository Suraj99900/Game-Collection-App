<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName;
    $sUserMobileNo = $oSessionManager->sUserMobileNo;
}
?>

<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bank Details</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Bank Details</h2>
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
                        <a href="Transaction.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-user-tie"></i>
                            <h5>Orders</h5>
                        </a>
                    </li>
                    <li>
                        <a href="accountSecurity.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
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
                    <li>
                        <a href="sharedScreen.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-tarp"></i>
                            <h5>Refer and Earn</h5>
                        </a>
                    </li>
                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low col userInfo padd-15">
                    <div class="row">
                        <h3 class="col-lg-4 col-md-4 col-sm-12 mt-3" style="text-align: center;"><a class="c-text badge"
                                data-bs-toggle="collapse" href="#collapseAllId" role="button" aria-expanded="true"
                                aria-controls="collapseAllId" id="allOrderID">
                                All Order
                            </a></h3>
                        <h3 class="col-lg-4 col-md-4 col-sm-12 mt-3" style="text-align: center;"><a class="c-text badge "
                                data-bs-toggle="collapse" href="#collapseSuccessfulId" role="button"
                                aria-expanded="false" aria-controls="collapseSuccessfulId" id="successOrderfulId">
                                Successful Order
                            </a></h3>
                        <h3 class="col-lg-4 col-md-4 col-sm-12 mt-3" style="text-align: center;"><a class="c-text badge"
                                data-bs-toggle="collapse" href="#collapseFailId" role="button" aria-expanded="false"
                                aria-controls="collapseFailId"  id="failOrderId">
                                Fail Order
                            </a></h3>
                    </div>
                    <div class="collapse show mt-4 p-3 custom-table" id="collapseAllId">
                        <div class="card">
                            <h4 class="text-center">All Transaction</h4>
                            <table id="allTransactionTable" class="display" style="width: 100%;">
                                <thead>
                                    <th>UserId</th>
                                    <th>OrderId</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="collapse mt-4 p-3 custom-table" id="collapseSuccessfulId">
                        <div class="card">
                            <h4 class="text-center">Successful Transaction</h4>
                            <table id="successfulTransactionTable" class="display" style="width: 100%;">
                                <thead>
                                    <th>UserId</th>
                                    <th>OrderId</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="collapse mt-4 p-3 custom-table" id="collapseFailId">
                        <div class="card">
                            <h4 class="text-center">Fail Transaction</h4>
                            <table id="failTransactionTable" class="display" style="width: 100%;">
                                <thead>
                                    <th>UserId</th>
                                    <th>OrderId</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>

            </main>

        </div>
    </section>

</div>



<!-- main Content end-->

<!-- manage book update modal -->




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
    var RAZORPAY_KEY_ID = "<?php echo RAZORPAY_KEY_ID ?>";
    var iUserID = "<?php echo $iUserID ?>";
    var sUserName = "    <?php echo $sUserName ?>";
    var sUserMobileNo = "<?php echo $sUserMobileNo ?>";
</script>
<script src="../controller/transactionController.js"></script>