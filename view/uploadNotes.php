<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
?>



<!-- main Content start -->
<div class="main-content">
    <section class="upload-Note section">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="LMS-Dashboard.php">LMS Dashboard</a></li>
                <li class="breadcrumb-item"><a href="uploadScreen.php?iActive=2&staffAccess=1">Upload Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Notes</li>
            </ol>
        </nav>

        <div class="container">

            <!-- upload Note section start -->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload Notes</h2>
                </div>
            </div>
            <!-- upload Note section end -->

            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-body rounded">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteName" class="form-label"><i class="fa-solid fa-signature"></i> Note Name</label>
                            <input type="text" class="form-control custom-control" id="NoteNameId" name="Notename" placeholder="Enter Note Name">
                            <input type="hidden" class="form-control custom-control" id="userId" name="user" value="<?php echo $_SESSION['username'] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteRelatedToSubject" class="form-label"><i class="fa-solid fa-hashtag"></i> Related To Subject</label>
                            <input type="text" class="form-control custom-control" id="noteRelatedToSubjectId" name="noteRelatedTosubject" placeholder="Enter Related To Subject">

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i>Semester</label>
                            <select class="form-select custom-control" id="semesterId" name="semester">
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteDescription" class="form-label"><i class="fa-solid fa-quote-left"></i> note Description</label>
                            <textarea name="notedescription" class="form-control" placeholder="Enter note Description" id="noteDescriptionId" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectnote" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Select Note </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="noteFileId" name="noteFile">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="uploadNoteId" class="btn search mb-1">Submit</a>
                    </div>
                </form>
            </div>
        </div>



    </section>

    <!-- Note search form  end-->


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

<script src="../controller/UploadNoteController.js"></script>