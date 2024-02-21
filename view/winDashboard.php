<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php?staffAccess=1", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName;
    $sUserMobileNo = $oSessionManager->sUserMobileNo;
}
?>

<style>
    .appHeader1 {
        background-color: #fff !important;
        border-color: #fff !important;
    }

    .appContent3 {
        background-color: #2196f3 !important;
        border-color: #2196f3 !important;
        padding: 10px;
        border-radius: 20px;
        font-size: 16px;
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 21%);
    }

    .user-block img {
        width: 40px;
        height: 40px;
        float: left;
        margin-right: 10px;
        background: #333;
    }

    .img-circle {
        border-radius: 50%;
    }

    .reaload {
        box-shadow: none;
    }

    .ion-md-refresh {
        font-size: 30px !important;
    }

    .responsive {
        height: 300px;
        overflow-x: auto;
    }

    .vcard {
        box-shadow: none;
    }

    h5 {
        color: #888;
        font-size: 20px;
        font-weight: normal;
    }

    h5 span {
        color: #333;
        font-size: 20px;
    }

    .divsize4 .btn {
        padding: 0 10px;
        width: 100px;
    }

    .left-addon input {
        padding-left: 20px;
    }

    .error {
        top: 45px;
    }

    .containerrecord {
        border-bottom: solid 2px #565EFF;
    }

    .recordlink {
        font-size: 30px;
        color: #333;
        border-bottom: solid 2px #565EFF;
    }

    .recordlink .title {
        font-size: 14px;
        font-weight: 500;
    }

    #alert h4 {
        font-size: 1rem;
    }

    #alert p {
        font-size: 13px;
        margin-top: 30px;
    }

    #alert .modal-content {
        border-radius: 3px
    }

    #alert .modal-dialog {
        padding: 30px;
        margin-top: 200px;
    }

    #payment .modal-dialog {
        padding: 10px;
        margin-top: 60px;
    }

    #loader .modal-dialog {
        padding: 30px;
        margin-top: 200px;
    }


    .divsize00 {
        border-radius: 3px 20px 3px 20px;
        border: 1px solid white;
        transition: 0.5s;
    }

    .btn-violet-red {
        background: linear-gradient(to bottom left, red 50%, #8c0063 50%);
        color: #ffffff;
    }

    .divsize22 {
        border-radius: 3px 20px 3px 20px;
        border: 1px solid white;
        transition: 0.5s;
        color: #d9d5db;
    }

    .btn-red {
        background-color: red;
        color: #ffffff;
    }

    .btn-green {
        background-color: #05ff00;
        color: #ffffff;
    }

    .btn-blue {
        background-color: #ffb700;
    }

    .btn-violet0 {
        background-color: #8c0063;
        color: #ffffff;
    }

    .divsize11 {
        border-radius: 3px 20px 3px 20px;
        border: 1px solid white;
        transition: 0.5s;
        color: #d9d5db;
    }

    .divsize55 {
        border-radius: 3px 20px 3px 20px;
        border: 1px solid white;
        transition: 0.5s;
    }

    .btn-violet-green {
        background: linear-gradient(to bottom left, #05ff00 50%, #8c0063 50%);
        color: #ffffff;
    }

    .mySlides {
        display: none;
        border-radius: 20px;
    }

    .wrapper {
        box-sizing: content-box;
        background-color: #ffffff;
        height: 18px;
        padding: 18px 10px;
        display: flex;
        border-radius: 8px;
    }

    .words {
        overflow: hidden;
    }

    span1 {
        display: block;
        height: 100%;
        padding-left: 10px;
        color: red;
        animation: spin_words 7s infinite;
    }

    @keyframes spin_words {
        10% {
            transform: translateY(-112%);
        }

        25% {
            transform: translateY(-100%);
        }

        35% {
            transform: translateY(-212%);
        }

        50% {
            transform: translateY(-200%);
        }

        60% {
            transform: translateY(-312%);
        }

        75% {
            transform: translateY(-300%);
        }

        85% {
            transform: translateY(-412%);
        }

        100% {
            transform: translateY(-400%);
        }
    }


    .btn6 {
        border-radius: 20px 20px 20px 20px;
        border: 0px solid white;
        padding: 100px 100px;
        transition: 0.5s;

    }

    .btn7 {

        background-color: #FFD700;
        padding-bottom: 4px;
        padding-top: 4px;
        padding-left: 15px;
        padding-right: 15px;
        border: 1px solid #F8F9FA;
        transition: 0.5s;

    }

    .btn5 {
        border-radius: 30px 30px 30px 30px;
        border: 0px solid white;

        transition: 0.5s;

    }

    .btn3 {
        border-radius: 30px 30px 30px 30px;
        border: 0px solid white;

        transition: 0.5s;
        background-image: linear-gradient(#FF3324, #9c27b0);
    }

    .btn4 {
        border-radius: 30px 30px 30px 30px;
        border: 0px solid white;

        transition: 0.5s;
        background-image: linear-gradient(#1DCC70, #9c27b0);
    }

    .text1 {
        padding-top: 10px;
    }

    .btn1 {
        background-color: #F8F3D4;
        color: black;
        border-radius: 15px 15px 15px 15px;

        padding-bottom: 4px;
        padding-top: 4px;
        padding-left: 25px;
        padding-right: 25px;
        transition: 0.5s;

    }
</style>


<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Win</li>
            </ol>
        </nav>


        <div class="vcard">
            <div class="appContent3 text-white crad">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 mb-1" style="font-size:20px; color:var(--text-black-900);">Available
                            Balance:<br><br> ₹ <span id="balance"
                                style="font-size: 30px;font-weight: bold;font-family:Fantasy;">
                                <?php //echo number_format(wallet($con, 'amount', $iUserID), 2);                            ?>
                                0
                            </span></div>
                        <div class="col-12">
                            <div> <a href="recharge.php" class="btn btn-sm btn-primary m-0">Recharge</a>
                                <a data-toggle="modal" href="#rule" data-backdrop="static" data-keyboard="false"
                                    class="btn btn-sm btn-blue" style="border-radius: 20px 20px 20px 20px;">Read
                                    Rule</a><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $iUserID; ?>);"
                                    class="reaload text-white pull-right mt-1"
                                    onclick="getResultbyCategory(parity,parity)"> <i
                                        class="icon ion-md-refresh"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- App Capsule -->
        <div class="bg-card-high padd-15 pt-3 mt-3">
            <div class="tabs row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="tab shadow rounded m-3" onclick="openTab('parityId')">Parity</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="tab shadow rounded m-3" onclick="openTab('sapreId')">Sapre</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="tab shadow rounded m-3" onclick="openTab('bconeId')">Bcone</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="tab shadow rounded m-3" onclick="openTab('emerdId')">Emerd</div>
                </div>
            </div>

            <div id="parityId" class="tab-content active padd-15 py-3 rounded">
                <div class="row  padd-15">
                    <div class="col-12 mb-3">
                        <i class="fa-solid fa-trophy fa-md"> Parity</i>
                    </div>
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col">
                                <h5 class='c-text-vl'>20240213286</h5>
                            </div>
                            <div class="col">
                                <div class="gameidtimer text-right">
                                    <h5 class="mb-2"><i class="icon ion-md-timer"></i> Count Down</h5>
                                    <h5 class="gbutton2" id="parityCount"></h5> <button type="button"
                                        style="color:black;" href="javascript:void(0);" onclick="reloadbtn(77);"
                                        class="gbutton1 btn7" hidden=""><i
                                            class="fa fa-spinner fa-spin"></i>Loading</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3" id="greenBtnPeroid" style="background-color: #05ff00;">
                                Green</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="violetBtnPeroid"
                                style=" background-color: #565EFF;">Violet</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="redBtnPeroid" style=" background-color: red;">Red
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">0</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">1</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">2</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">3</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">4</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">5</div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">6</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">7</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">8</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">9</div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="sapreId" class="tab-content padd-15 py-3 rounded">
                <div class="row  padd-15">
                    <div class="col-12 mb-3">
                        <i class="fa-solid fa-trophy fa-md"> Sapre</i>
                    </div>
                    <div class="col">
                        <h5 class='c-text-vl'>20240213286</h5>
                    </div>
                    <div class="col">
                        <div class="gameidtimer text-right">
                            <h5 class="mb-2"><i class="icon ion-md-timer"></i> Count Down</h5>
                            <h5 class="gbutton2" id="sapreCount"></h5> <button type="button" style="color:black;"
                                href="javascript:void(0);" onclick="reloadbtn(77);" class="gbutton1 btn7" hidden=""><i
                                    class="fa fa-spinner fa-spin"></i>Loading</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="greenBtnSapre" style="background-color: #05ff00;">
                                Green</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3" id="violetBtnSapre"
                                style=" background-color: #565EFF;">Violet</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="redBtnSapre" style=" background-color: red;">Red
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">0</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">1</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">2</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">3</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">4</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">5</div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">6</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">7</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">8</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">9</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bconeId" class="tab-content padd-15 py-3 rounded">
                <div class="row  padd-15">
                    <div class="col-12 mb-3">
                        <i class="fa-solid fa-trophy fa-md"> Bcone</i>
                    </div>
                    <div class="col">
                        <h5 class='c-text-vl'>20240213286</h5>
                    </div>
                    <div class="col">
                        <div class="gameidtimer text-right">
                            <h5 class="mb-2"><i class="icon ion-md-timer"></i> Count Down</h5>
                            <h5 class="gbutton2" id="bconeCount"></h5> <button type="button" style="color:black;"
                                href="javascript:void(0);" onclick="reloadbtn(77);" class="gbutton1 btn7" hidden=""><i
                                    class="fa fa-spinner fa-spin"></i>Loading</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3" id="greenBtnBcone" style="background-color: #05ff00;">
                                Green</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="violetBtnBcone"
                                style=" background-color: #565EFF;">Violet</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="redBtnBcone" style=" background-color: red;">Red
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">0</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">1</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">2</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">3</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">4</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">5</div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">6</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">7</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">8</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">9</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="emerdId" class="tab-content padd-15 py-3 rounded">
                <div class="row  padd-15">
                    <div class="col-12 mb-3">
                        <i class="fa-solid fa-trophy fa-md"> Emerd</i>
                    </div>
                    <div class="col">
                        <h5 class='c-text-vl'>20240213286</h5>
                    </div>
                    <div class="col">
                        <div class="gameidtimer text-right">
                            <h5 class="mb-2"><i class="icon ion-md-timer"></i> Count Down</h5>
                            <h5 class="gbutton2" id="emerdCount"></h5> <button type="button" style="color:black;"
                                href="javascript:void(0);" onclick="reloadbtn(77);" class="gbutton1 btn7" hidden=""><i
                                    class="fa fa-spinner fa-spin"></i>Loading</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3" id="greenBtnEmerd" style="background-color: #05ff00;">
                                Green</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="violetBtnEmerd"
                                style=" background-color: #565EFF;">Violet</div>
                        </div>
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 color-modal">
                            <div class="btn shadow rounded mb-3 " id="redBtnEmerd" style=" background-color: red;">Red
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">0</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">1</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">2</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">3</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">4</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">5</div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">6</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">7</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">8</div>
                        </div>

                        <div class="col-3 col-sm-1 col-md-1 col-lg-1 number-selection">
                            <div class="btn shadow rounded mb-3" style="background-color: gray;">9</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow bg-card-low col userInfo padd-15 mt-3 mb-5">
                <div class="row">
                    <h3 class="col-lg-12 col-md-12 col-sm-12 mt-3" style="text-align: center;">
                        <a class="c-text badge" data-bs-toggle="collapse" href="#collapseAllId" role="button"
                            aria-expanded="true" aria-controls="collapseAllId" id="allOrderID">
                            Record
                        </a>
                    </h3>
                </div>
                <div class="collapse show mt-4 p-3" id="collapseAllId">
                    <div class="card">
                        <h4 class="text-center">Today Record</h4>
                        <table id="allTransactionTable" class="display">
                            <thead>
                                <th>Peroid</th>
                                <th>number</th>
                                <th>result</th>
                            </thead>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <!-- appCapsule -->

    </section>

</div>


<!-- modal for win -->
<!-- main Content end-->

<!-- OFFCanvas -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="addAmountId" aria-labelledby="addAmountLabel"
    style="width: 50%;  overflow-y: auto;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addAmountLabel">Apply Amount</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="alert alert-dark" role="alert">
            Contract money
        </div>
        <div class="card shadow tab-amount">
            <div class="row justify-content-center">
                <h3 class="text-center c-text">Select amount</h3>
                <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn-active btn m-2">10</button>
                <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2">100</button>
                <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2">1000</button>
                <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2">10000</button>
            </div>

            <div class="number-selection mt-5 p-5">
                <h3 class="text-center c-text mb-5">Number</h3>
                <div class="row" style="justify-content: space-around;">
                    <button class="col-1 col-sm-1 col-md-1 col-lg-1 btn mt-1">
                        <i class=" fa-solid fa-minus "></i>
                    </button>

                    <input type="number" class="col-1 col-sm-1 col-md-1 col-lg-1" value="10" disabled>
                    <button class="col-1 col-sm-1 col-md-1 col-lg-1 btn mt-1">
                        <i class=" fa-solid fa-plus "></i>
                    </button>
                </div>
            </div>

            <div class="alert alert-dark label-amount-selected m-5 text-center" id="selectedId" role="alert">
                100 Selected amount
            </div>
            <div class="row justify-content-center">
                <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2">Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- Loder Modal -->

<div id="loader" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background:transparent; border:none;">
            <div class="text-center pb-1">
                <a type="button" id="closbtnloader" data-dismiss="modal">
                    <div class="spinner-grow text-success"></div>
                </a>
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

<script>
    function openTab(tabName) {
        var i, tabContent;
        tabContent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = "none";
            tabContent[i].classList.remove('active');
        }
        document.getElementById(tabName).style.display = "block";
        var oTab = document.getElementById(tabName);
        oTab.classList.add('active');
    }
</script>


<?php
include_once "./CDN_Footer.php";
?>
<script>

    var iiUserID = "<?php echo $iUserID ?>";
    var sUserName = "<?php echo $sUserName ?>";
    var sUserMobileNo = "<?php echo $sUserMobileNo ?>";
</script>

<script src="../controller/winController.js"></script>