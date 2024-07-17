<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once "../classes/class.Input.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

if (!$bIsLogin) {
    header("Location: loginScreen.php", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
}

$blogId = Input::request("blogId") ? Input::request("blogId") : "";

?>

<script>
    var sUserName = "<?php echo $oSessionManager->sUserName; ?>";
    tinymce.init({
        selector: '#BlogTextAreaId',
        license_key: '87ziajgslefznkwf0ger86nt82bwwz9qiuc2gqpfazqa5etr',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        mergetags_list: [
            { value: sUserName },
            { value: 'jaiswaljesus384@gmail.com', title: 'jaiswaljesus384@gmail.com' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        height: 800,
        hidden_input: false,
        promotion: false,
    });
</script>

<!-- main Content start -->
<div class="main-content">

    <!-- home section start -->
    <section class="Student-Info section " id="ManageBlogId">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="BlogManage.php?iActive=4&staffAccess=1">Manage Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2> Update Blog</h2>
                </div>
            </div>
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5 bg-body rounded flex"
                style="position: relative;">
                <form>
                    <div class="form-group my-2">
                        <label for="BlogTitleId" class="p-1">Blog Title</label>
                        <input type="text" id="BlogTitleId" class="form-control" placeholder="Enter blog title">
                    </div>

                    <textarea id="BlogTextAreaId"></textarea>
                    <div class="flex search-btn mt-5">
                        <a id="idUpdateBlogSubmit" class="btn search  mb-4">Update</a>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>


<!-- main container end  -->

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
    var iId;
    $(document).ready(() => {
        fetchAllBlogRecordById(<?php echo $blogId ?>);
        $("#idUpdateBlogSubmit").on('click', () => {
            UpdateBlogRecordById(<?php echo $blogId ?>);
        });
    });

    function fetchAllBlogRecordById(iId) {
        console.log(iId);
        $.ajax({
            url: "../ajaxFile/ajaxBlog.php?sFlag=fetchPostById&id=" + iId,
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    var aData = response.data;
                    $('#BlogTitleId').val(aData.title);
                    $('#BlogTextAreaId').html(aData.blog_data);
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                }

            },
            error: function (error) {
                // Handle Ajax error for session.php
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    }

    function UpdateBlogRecordById(iId) {
        var aData = tinymce.get('BlogTextAreaId').getContent();
        var sTitle = $('#BlogTitleId').val();
        var sUserName = "<?php echo $oSessionManager->sUserName; ?>";
        $.ajax({
            url: "../ajaxFile/ajaxBlog.php?sFlag=updatePost&id=" + iId,
            method: "POST",
            data: {
                "authorName": sUserName,
                "content": aData,
                "title": sTitle
            },
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    responsePop('Success', aData.message, 'success', 'ok');
                    setTimeout(() => {
                        window.location.href = "../view/BlogManage.php?iActive=3";
                    }, 500);
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                }

            },
            error: function (error) {
                // Handle Ajax error for session.php
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    }
</script>

<!-- <script src="../controller/BlogController.js"></script> -->