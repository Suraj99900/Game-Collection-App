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
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
            </ol>
        </nav>
        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Wallet</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="userDashboard.php?iActive=3" class="shadow-lg p-3 mb-5 rounded "><i
                                class="fa-regular fa-id-card"></i>
                            <h5>Personal Info</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageWallet.php" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Wallet</h5>
                        </a>
                    </li>
                    <li>
                        <a href="bankDetails.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
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
                    <div class="mb-3 mt-3 row px-5">
                        <h2 class=''> Current Balance</h2>
                        <div class="col ml-5 mt-2 form-control-plaintext c-text-vl m-2 flex-item">
                            <i class="fa-solid fa-wallet fa-lg m-1 p-2"></i>
                            <h3 class="form-control-plaintext c-text-vl m-2 p-2" style=" display: inline;"> <input
                                    type="text" readonly class="form-control-plaintext c-text-vl"
                                    style=" display: inline;" id="walletBalanceID"> </h3>
                        </div>
                    </div>
                </div>

                <div class="card shadow bg-card-low col userInfo padd-15 mt-5">
                    <div class="mb-3 mt-3 row-lg-6 row-md-6 row-sm-12">
                        <div class="row px-5">
                            <div class="col">
                                <h2 class='form-control-plaintext c-text-vl m-2 p-2'> Credit / Withdraw</h2>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary float-end" data-bs-toggle="offcanvas" href="#debitOffCanvasId"
                                    role="button" id="userDebitRecordId" aria-controls="debitOffCanvasId">
                                    Debit Amount
                                </a>
                            </div>
                        </div>
                        <div class="container text-center Wallet-container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 card bg-card-high">

                                    <div class="container text-center">
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-credit-card fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Credit</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 creditCoinId">$100</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-credit-card fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Credit</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 creditCoinId">$200</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-credit-card fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Credit</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 creditCoinId">$500</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-credit-card fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge ">Credit</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 creditCoinId">$1000</span></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 card bg-card-high">
                                    <div class="container text-center">
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-money-bill-transfer fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Withdraw</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 debitAmount">$100</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-money-bill-transfer fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Withdraw</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 debitAmount">$200</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-money-bill-transfer fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge">Withdraw</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 debitAmount">$500</span></h1>
                                            </div>
                                        </div>
                                        <div class="row m-5">
                                            <div class="col">
                                                <i class="fa-solid fa-money-bill-transfer fa-lg mt-3 p-2"></i>
                                            </div>
                                            <div class="col m-2">
                                                <span class="badge ">Withdraw</span>
                                            </div>
                                            <div class="col">
                                                <h1><span class="badge btn py-3 px-5 debitAmount">$1000</span></h1>
                                            </div>
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
<!-- main Content end-->


<div class="offcanvas offcanvas-end" tabindex="-1" id="debitOffCanvasId" aria-labelledby="debitOffCanvasIdLabel"
    style="width: 80%;">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title c-text" id="offcanvasAddStaffLabel">Debit Amount</h3>
        <i data-bs-dismiss="offcanvas" aria-label="Close"
            class="c-text btn-close text-reset btn c-text fa-solid fa-circle-xmark" style="font-size: 1.5rem;"></i>
    </div>
    <div class="offcanvas-body">
        <div class="card col custom-table">
            <h4 class="text-center">Debit Record</h4>
            <table id="debitUserRecordTableId" class="display" style="width: 100%;">
                <thead>
                    <th class="text-center">Sr. no</th>
                    <th class="text-center">Debit Amount</th>
                    <th class="text-center">status</th>
                    <th class="text-center">Date</th>
                </thead>
            </table>
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
    var RAZORPAY_KEY_ID = "<?php echo RAZORPAY_KEY_ID ?>";
    var iUserID = "<?php echo $iUserID ?>";
    var sUserName = "<?php echo $sUserName ?>";
    var sUserMobileNo = "<?php echo $sUserMobileNo ?>";
</script>
<script src="../controller/walletController.js"></script>