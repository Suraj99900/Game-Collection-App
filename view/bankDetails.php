<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
}else {
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
                        <a href="userDashboard.php" class="shadow-lg p-3 mb-5 rounded "><i class="fa-regular fa-id-card"></i>
                            <h5>Personal Info</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageWallet.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Wallet</h5>
                        </a>
                    </li>
                    <li>
                        <a href="bankDetails.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i class="fa-solid fa-book-open-reader"></i>
                            <h5>Bank Details</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageStaff.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-user-tie"></i>
                            <h5>Orders</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageLog.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Account Security</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageLog.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Report/Complaints & Suggetion</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageLog.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>About</h5>
                        </a>
                    </li>
                </ul>
            </aside>

            <main>
                <div class="card shadow bg-card-low col userInfo padd-15">
                    <div class="mb-3 mt-3  row">
                        <h2 class=''> Bank Details</h2>
                        <div class="col ml-5 mt-2 p-2form-control-plaintext c-text-vl m-2 p-2 flex-item" style="justify-content: left;">
                            <i class="fa-solid fa-building-columns fa-lg m-1 p-2"></i>
                            <div class="row align-items-center P-2 m-2">

                                <h3><label for="BookISBN" class="form-label">Pratik Kishor Kad</label></h3>
                                <h4><input type="text" class="form-control custom-control" readonly id="bookISBNId" name="bookisbn" value="986124562341265"></h4>

                                <div class="col-sm-1 col-md-6 col-lg-3">
                                    <button class="btn btn-primary  m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit

                                    </button>

                                    <div class="offcanvas offcanvas-start bg-card-high" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="width: 80%; overflow-y: auto;">
                                        <div class="offcanvas-header">
                                            <h3 class="offcanvas-title c-text" id="staticBackdropLabel">Edit Bank Details</h3>
                                            <a type="button" class="btn c-text" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></a>
                                        </div>
                                        <div class="offcanvas-body bg-card-low">
                                            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-card-low rounded">
                                                <form>
                                                    <div class="row align-items-center p-3">
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Actual Name</label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Actual Name">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookISBN" class="form-label c-text-vl"><i class="fa-solid fa-hashtag"></i> IFSC Code</label>
                                                            <input type="text" class="form-control custom-control c-text-vl " id="bookISBNId" name="bookisbn" placeholder="Enter IFSC Code">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="sem" class="form-label c-text-vl"><i class="fa-solid fa-hashtag"></i> Account Number</label>
                                                            <input type="number" class="form-select custom-control" id="semesterId" name="semester" placeholder="Enter Account Number">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center p-3">
                                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Bank Name </label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Bank Name">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> State</label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter State">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> City</label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter City">

                                                        </div>

                                                    </div>

                                                    <div class="row align-items-center p-3">
                                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Address</label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Address">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Mobile No.</label>
                                                            <input type="number" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Mobile No.">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                            <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Email</label>
                                                            <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Email">

                                                        </div>
                                                        <div class="row align-items-center p-3">
                                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                                <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> UPI Id</label>
                                                                <input type="text" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter UPI Id">
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                                                                <label for="BookName" class="form-label c-text-vl"><i class="fa-solid fa-signature"></i> Verification Code</label>
                                                                <div class="row align-items-center p-3">
                                                                    <div class="col-sm-12 col-md-9 col-lg-9">
                                                                        <input type="number" class="form-control custom-control c-text-vl" id="bookNameId" name="bookname" placeholder="Enter Verification Code">
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                        <button class="btn btn-primary" type="button">
                                                                            OTP
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>

                                                    <div class="flex search-btn mt-5">
                                                        <a id="idUploadBook" class="btn search mb-1">Submit</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-1 col-md-6 col-lg-3 p-3 - m2">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
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

<script src="../controller/manageAvailableBookController.js"></script>