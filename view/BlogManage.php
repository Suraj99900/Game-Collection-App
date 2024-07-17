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
}
?>


<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Manage</li>
            </ol>
        </nav>

        <div class="">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Blog Manage</h2>
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
                        <a href="BlogManage.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i
                                class="fa-solid fa-blog"></i>
                            <h5>Blog</h5>
                        </a>
                    </li>

                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low row userInfo padd-15 px-5">
                    <div class="row my-3">
                        <div class="col-12 float-right">
                            <a href="./addBlogPage.php" type="button" class="btn btn-primary float-end"> Add blog</a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col12">
                            <div class="card custom-table">
                                <h4 class="text-center">Manage Blog</h4>
                                <table id="blogManageTable" class="display" style="width: 100%;">
                                    <thead>
                                        <th>Sr No</th>
                                        <th>Title</th>
                                        <th>Author Name</th>
                                        <th>Action</th>
                                    </thead>
                                </table>
                            </div>
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
                        <select class="form-control custom-control" id="studentNameId" name="student"
                            placeholder="Select Student" style="width: 100%;">
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                        <input type="hidden" class="form-control custom-control" id="bookId" name="bookId">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name"
                            value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <select class="form-control custom-control" id="bookNameID" name="bookName"
                            placeholder="Select Book" style="width: 100%;">
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
    var iId;
</script>

<script src="../controller/BlogController.js"></script>