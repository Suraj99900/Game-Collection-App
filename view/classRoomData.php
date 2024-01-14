<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
include_once "../session.php";
$iSubBookId = $_GET['SubFolderId'] ? $_GET['SubFolderId'] : 0;
$sSubFolderName = $_GET['SubFolderName'] ? $_GET['SubFolderName'] : "";

?>



<!-- main Content start -->
<div class="main-content">




    <!-- home section start -->
    <section class="upload section " id="upload">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="classRoom.php?iActive=6">Class Rooms</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $sSubFolderName; ?></li>
            </ol>
        </nav>
        <div class="container">

            <!-- Class room Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2><?php echo $sSubFolderName; ?></h2>
                </div>
            </div>
            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 rounded">
                <div class="row p-5">
                    <input type="search" class="form-control custom-control" id="searchSubFolderById" name="searchSubFolder" placeholder="Seacrh...">
                </div>
                <div class="row align-items-center p-3" id="idFolderData">

                </div>
            </div>



        </div>
    </section>
    <!-- home section end -->


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
include_once "./CDN_Footer.php";
?>
<script src="../controller/folderManagementController.js"></script>
<script src="../controller/classRoomController.js"></script>

<script>
var iSubBookId = <?php echo $iSubBookId; ?>;
$(document).ready(() => {

    fetchFolderData(iSubBookId);

    $('#searchSubFolderById').on('input', function () {
        var searchValue = $(this).val().toLowerCase();

        // Clear the previous timeout
        clearTimeout(searchTimeout);

        // Set a new timeout
        searchTimeout = setTimeout(function () {
            // Call fetchFolder after a brief delay
            fetchFolderData(iSubBookId,searchValue);
        }, 1000); // Adjust the delay time as needed (in milliseconds)
    });

});
</script>