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
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="adminDashboard.php" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-regular fa-id-card"></i>
                            <h5>Dashboard</h5>
                        </a>
                    </li>
                    <li>
                        <a href="adminStaff.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
                                class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Staff/User</h5>
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
                    <a href="paymentDashboard.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i
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
                <div class="card shadow bg-card-low row StaffInfo padd-15">
                    <div class="row align-items-center p-3" id="accountDetailsId">
                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                            <div class="card p-3 shadow">
                                <div class="icon-fa padd-15">
                                    <h4><i class="fa-solid fa-user"></i></h4>
                                </div>
                                <div class="labelbox padd-15 mt-1">
                                    <h4>Total User</h4>
                                </div>
                                <div class="count padd-15 mt-1">
                                    <h4 id="idUserCount" class="userCount"></h4>
                                </div>
                                <div class="more padd-15 mt-1 flex rounded text-center">
                                    <a id="userDetailsId" class="box-more admin-text rounded"> See in Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 my-3 ">
                            <div class="card p-3 shadow">
                                <div class="icon-fa padd-15">
                                    <h4><i class="fa-solid fa-indian-rupee-sign"></i></h4>
                                </div>
                                <div class="labelbox padd-15 mt-1">
                                    <h4>Pending Recharges</h4>
                                </div>
                                <div class="count padd-15 mt-1 felx flex-row" style="display: flex !important;">
                                    <i class="fa-solid fa-indian-rupee-sign pt-2"></i>
                                    <h4 id="idRechargeCount" class="RechargeCount"> 1</h4>
                                </div>
                                <div class="more padd-15 mt-1 flex rounded text-center">
                                    <a id="rechargeDetailsId" class="box-more admin-text rounded"> See in Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                            <div class="card p-3 shadow">
                                <div class="icon-fa padd-15">
                                    <h4><i class="fa-solid fa-indian-rupee-sign"></i></h4>
                                </div>
                                <div class="labelbox padd-15 mt-1">
                                    <h4>Success Recharge</h4>
                                </div>
                                <div class="count padd-15 mt-1 flex-row" style="display: flex !important;">
                                    <i class="fa-solid fa-indian-rupee-sign pt-2"></i>
                                    <h4 id="idUserCount" class="userCount">1</h4>
                                </div>
                                <div class="more padd-15 mt-1 flex rounded text-center">
                                    <a id="userDetailsId" class="box-more admin-text rounded"> See in Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center p-3" id="accountDetailsId">
                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                            <div class="card p-3 shadow">
                                <div class="icon-fa padd-15">
                                <h4><i class="fa-solid fa-indian-rupee-sign"></i></h4>
                                </div>
                                <div class="labelbox padd-15 mt-1">
                                    <h4>Total Withdrawal</h4>
                                </div>
                                <div class="count padd-15 mt-1 felx flex-row" style="display: flex !important;">
                                    <i class="fa-solid fa-indian-rupee-sign pt-2"></i>
                                    <h4 id="idWithdrawalCount" class="WithdrawalCount"> 1</h4>
                                </div>
                                <div class="more padd-15 mt-1 flex rounded text-center">
                                    <a id="WithdrawalDetailsId" class="box-more admin-text rounded"> See in Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 my-3 ">
                            <div class="card p-3 shadow">
                                <div class="icon-fa padd-15">
                                    <h4><i class="fa-solid fa-indian-rupee-sign"></i></h4>
                                </div>
                                <div class="labelbox padd-15 mt-1">
                                    <h4>Withdrawal Requests</h4>
                                </div>
                                <div class="count padd-15 mt-1 felx flex-row" style="display: flex !important;">
                                    <i class="fa-solid fa-indian-rupee-sign pt-2"></i>
                                    <h4 id="idWithdrawalRequest" class="withdrawalRequestCount"> 1</h4>
                                </div>
                                <div class="more padd-15 mt-1 flex rounded text-center">
                                    <a id="withdrawalRequestDetailsId" class="box-more admin-text rounded"> See in Detail</a>
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
    var iStaffID = `<?php echo $iStaffID; ?>`;
</script>

<script src="../../controller/adminDashboardController.js"></script>