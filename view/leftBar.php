<?php
include_once "../session.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
$iActive = $_GET['iActive'] ? $_GET['iActive'] : '';

$iStaffAccess = $_GET['staffAccess'] ? $_GET['staffAccess'] : '';
?>

<!-- main container start -->

<div class="main-container">
    <!-- aside start  -->
    <div class="aside">
        <div class="logo">
            <a href="#" style="font-size: 14px;"><span>E</span>-library</a>
        </div>

        <div class="nav-toggler">
            <span></span>
        </div>

        <ul class="nav">
            <?php if ($iStaffAccess != 1) { ?>
                <li><a href="home.php?iActive=1" class="<?php echo ($iActive == 1 ? "active" : "") ?>"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="classRoom.php?iActive=6" class="<?php echo ($iActive == 6 ? "active" : "") ?>"><i class="fa-solid fa-school"></i> Class Room</a></li>
                
                <li><a href="home.php#contact" class="<?php echo ($iActive == 5 ? "active" : "") ?>"><i class="fa fa-comments"></i> Contact</a></li>

            <?php } else { ?>
                <?php
                if ($bIsLogin) {
                ?>
                    <li><a href="uploadScreen.php?iActive=2&staffAccess=1" class="<?php echo ($iActive == 2 ? "active" : "") ?>"><i class="fa-solid fa-upload"></i>Upload</a></li>
                    <li><a href="manageIssueBook.php?iActive=3&staffAccess=1" class="<?php echo ($iActive == 3 ? "active" : "") ?>"><i class="fa-solid fa-grip-vertical"></i>Dashboard</a></li>
                    <li><a href="folderManagement.php?iActive=5&staffAccess=1" class="<?php echo ($iActive == 5 ? "active" : "") ?>"><i class="fa-solid fa-folder-open"></i>Folder Management</a></li>
                    <li><a href="studentInfo.php?iActive=4&staffAccess=1" class="<?php echo ($iActive == 4 ? "active" : "") ?>"><i class="fa-solid fa-circle-info"></i> Student Info</a></li>
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
                <?php } ?>
                </div>
        </ul>

    </div>
    <!-- aside end -->