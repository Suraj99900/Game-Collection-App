<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
include_once "../session.php";

$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
}
?>



<!-- main Content start -->
<div class="main-content">




    <!-- home section start -->
    <section class="upload section " id="upload">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="LMS-Dashboard.php">LMS Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Folder Management</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Folder Management</h2>
                </div>
            </div>

            <div class="Folder-section shadow p-3 mb-5 bg-body rounded flex">
                <!-- Button trigger modal -->

                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#idSubFolder" id="Subfolder"><i class="fa-solid fa-plus"></i> Create Sub Folder</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 " style="display: flex; justify-content: right; align-items: flex-end; ">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#idAddFolderMaster" id="AddFolderMaster"><i class="fa-solid fa-plus"></i> Create Master Folder</button>
                    </div>
                </div>
                <div class="row p-2">
                    <table id="idFolderManagement" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Folder Name</th>
                                <th>Added By</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>

<!-- Add Modal Box -->

<!-- Modal -->
<div class="modal fade" id="idAddFolderMaster" tabindex="-1" aria-labelledby="FolderMasterLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="FoldeNameLabel">Create Folder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-regular fa-folder"></i> Folder Name</label>
                        <input type="text" class="form-control custom-control" id="folderId" name="folder_name" placeholder="Enter folder name">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="idCreate">Create</button>
            </div>
        </div>
    </div>
</div>

<!--!Add Sub folder  -->
<div class="modal fade" id="idSubFolder" tabindex="-1" aria-labelledby="SubFolderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SubFolderLabel">Add Sub Folder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-solid fa-folder-tree"></i> Sub Folder Name</label>
                        <input type="text" class="form-control custom-control" id="subFolderId" name="folder_name" placeholder="Enter folder name">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-solid fa-folder"></i> Folder Name</label>
                        <select class="form-select custom-control" id="masterFolderId" name="masterFolder">
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="idSubmitSubFolder" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- view modal -->
<div class="modal fade" id="idviewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModallLabel">Map Sub Folders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <table id="idSubFolderManagement" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Folder Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="idSubFolderBody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
<script src="../controller/subFolderController.js"></script>