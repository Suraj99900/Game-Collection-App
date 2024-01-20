<?php
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

$iActive = $_GET['iActive'] ? $_GET['iActive'] : '';

$iStaffAccess = $_GET['staffAccess'] ? $_GET['staffAccess'] : '';
?>

<!-- main container start -->

<div class="main-container">
    <!-- aside start  -->
    <div class="aside">
        <div class="logo">
            <a href="#" style="font-size: 14px;"><span>G</span>-Project</a>
        </div>

        <div class="nav-toggler">
            <span></span>
        </div>

        <ul class="nav">
            <li><a href="Dashboard.php?iActive=1" class="<?php echo ($iActive == 1 ? "active" : "") ?>"><i class="fa fa-home"></i>Home</a></li>

            <?php
            if ($bIsLogin) {
            ?>
                <li><a href="manageIssueBook.php?iActive=3&staffAccess=1" class="<?php echo ($iActive == 3 ? "active" : "") ?>"><i class="fa-solid fa-grip-vertical"></i>Dashboard</a></li>
            <?php } ?>
            <div class="container px-4">
                <div class="row gx-2">
                    <?php
                    if ($bIsLogin) {
                    ?>
                        <a href="logOut.php" class="btn auth">Log Out</a>
                    <?php } else { ?>
                        <div class="col mb-3">
                            <a href="loginScreen.php?staffAccess=<?php echo $iStaffAccess; ?>" class="btn auth login">Login Staff</a>
                        </div>
                        <div class="col">
                            <a href="registrationForm.php?staffAccess=<?php echo $iStaffAccess; ?>" class="btn auth register">Register Staff</a>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </ul>

    </div>
    <!-- aside end -->