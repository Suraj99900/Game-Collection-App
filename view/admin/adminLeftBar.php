<?php
require_once "../../config.php";
include_once ABS_PATH_TO_PROJECT . "classes/adminSessionCheck.php";
if (session_status() == PHP_SESSION_NONE) {
    $bIsLogin = $oAdminSessionManager->isStaffLoggedIn ? $oAdminSessionManager->isStaffLoggedIn : false;
} else {
    $bIsLogin = false;
}
$iActive = isset($_GET['iActive']) ? $_GET['iActive'] : '';
?>

<!-- main container start -->

<div class="main-container">
    <!-- aside start  -->
    <div class="aside">
        <div class="logo">
            <a href="#" style="font-size: 14px;"><span><?php echo FIRST_NAME?></span><?php echo OTHER_NAME?></a>
        </div>

        <div class="nav-toggler">
            <span></span>
        </div>

        <ul class="nav">
            <li><a href="adminDashboard.php?iActive=1" class="<?php echo ($iActive == 1 ? "active" : "") ?>"><i
                        class="fa fa-home"></i>Home</a></li>

            <?php
            if ($bIsLogin) {
                ?>
                <li><a href="adminDashboard.php?iActive=3" class="<?php echo ($iActive == 3 ? "active" : "") ?>"><i
                            class="fa-solid fa-grip-vertical"></i>Dashboard</a></li>
            <?php } ?>
            <div class="container px-4">
                <div class="row gx-2">
                    <?php
                    if ($bIsLogin) {
                        ?>
                        <a href="./adminLogOut.php" class="btn auth">Log Out</a>
                    <?php } else { ?>
                        <div class="col mb-3">
                            <a href="adminLoginScreen.php" class="btn auth login">Log in
                            </a>
                        </div>
                        <div class="col">
                            <a href="adminRegistrationForm.php" class="btn auth register">Register</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </ul>

    </div>
    <!-- aside end -->