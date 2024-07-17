<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once '../classes/class.Input.php';

if (!$bIsLogin) {
    header("Location: loginScreen.php", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
}

$iId = input::request('id')?input::request('id'):'';

?>

<style>
    @media (max-width:767px) {
        img{
            width: 100%;
            height: 30vh;
        }
    }
</style>

<!-- main Content start -->
<div class="main-content">

    <!-- About section start -->
    <section class="about section " id="about">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="MyPortfolio.php">Home</a></li>
                <li class="breadcrumb-item"><a href="renderBlog.php">Blog</a></li>
                <li class="breadcrumb-item active" id="blogTitleId" aria-current="page"></li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="section-title padd-15" >
                    <h2 id="BlogHeadingTitleId"></h2>
                </div>
            </div>
            <div class="about-content padd-15" id="idContentId">
               <div class="content_data" id="blogContentId">

               </div>
            </div>
        </div>
    </section>
    <!-- About section end -->

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


<script>
    var iId = "<?php echo $iId?>";
</script>

<!-- include footer section -->
<?php include_once "./CDN_Footer.php" ?>
<script src="../controller/BlogController.js"></script>