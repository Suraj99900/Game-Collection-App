<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
include_once "../session.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
?>

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="main-content">
            <!-- home section start -->
            <section class="home section " id="home">
                <div class="container">

                    <!-- book search form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Search Book</h2>
                        </div>
                    </div>
                    <form>
                        <div class="row align-items-center p-3">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By Book Name</label>
                                <input type="search" class="form-control custom-control" id="searchBookByNameId" name="searchbook" placeholder="Enter Book Name">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By ISBN</label>
                                <input type="search" class="form-control custom-control" id="searchBookByISBNId" name="searchbook" placeholder="Enter ISBN Number">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-1">
                                <label for="type" class="form-label">Search Type</label>
                                <select name="type" class="form-select custom-control" id="typeId">
                                    <option value="0">Select Any</option>
                                    <option value="1">Book</option>
                                    <option value="2">Notes</option>
                                    <option value="3">Assignment</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By Semester</label>
                                <select class="form-select custom-control" id="semesterId" name="semester">
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 d-none-custom">
                                <label for="searchBook" class="form-label">Search By FromDate</label>
                                <input type="date" class="form-control custom-control" id="searchBookByFromDateId" name="searchbook" placeholder="Enter FromDate Number">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 d-none-custom">
                                <label for="searchBook" class="form-label">Search By ToDate</label>
                                <input type="date" class="form-control custom-control" id="searchBookByToDateId" name="searchbook" placeholder="Enter ToDate Number">

                            </div>

                        </div>

                        <div class="flex search-btn" style="display: flex; justify-content: right; align-items: flex-end; ">
                            <a class="btn search" id="idSearch">Search</a>
                        </div>

                    </form>


                    <!-- book search form  end-->

                    <!-- Book table By search start -->

                    <div class="row mt-5" id="showBookId">

                    </div>
                    <div class="p-2 m-2 right-flex">
                        <div id="paginationContainer" class="pagination"></div>
                    </div>

                </div>
            </section>
            <!-- home section end -->



            <!-- FAQ section Start -->

            <section class="faq section " id="faq">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>FAQ</h2>
                        </div>
                    </div>

                    <div class="faq_box ">
                        <div class="row">
                            <div class="faq_img padd-15">
                                <img src="../res/img/faq_1.png" alt="">
                                <div class="faq_img__inner">
                                    <img src="../res/img/faq_2.png">
                                </div>
                            </div>
                            <div class="faq_content padd-15">
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>What Is a Portfolio Website?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            Simply said, your portfolio website is a portal to showcase the online
                                            portfolio we were mentioning above to the world. It's the vehicle that lets
                                            your individual work be shared on a public platform. A portfolio website is
                                            a unique way to tell your own story, give potential clients basic
                                            information on who you are, allow you to showcase your work, and gives them
                                            a way to contact you.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>Is it easy to learn HTML and CSS ?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            The foundation of HTML and CSS are not that difficult. You can start getting
                                            comfortable with HTML in a matter of hours. Basic CSS is also not that
                                            difficult, however, CSS can get complicated when trying to build advanced
                                            layouts.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>what is javascript ?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            JavaScript is a text-based programming language used both on the client-side
                                            and server-side that allows you to make web pages interactive.
                                        </p>
                                    </div>
                                </div>

                                <div class="faq_items">
                                    <div class="question">
                                        <h3>Is JavaScript easier than PHP?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            While PHP is easier to learn, it is capable of building complete websites.
                                            On the other hand, we have more complex JavaScript, but it is one of the
                                            most popular languages. For front-end development, you should definitely
                                            choose JavaScript as PHP is only for server-side development.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </section>

            <!-- FAQ section end -->




            <!-- Contact section start -->
            <section class="contact section  " id="contact">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Contact Me</h2>
                        </div>
                    </div>
                    <h3 class="contact-title padd-15">Have you any Question ?</h3>
                    <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
                    <div class="row">
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <h4>Call Us On</h4>
                            <p>+91 7387997294</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                            <h4>Address</h4>
                            <p> Rayatwari collery chnadrapur , maharashtra</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <h4>Email</h4>
                            <p>jaiswaljesus384@gmail.com</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-globe-europe"></i></div>
                            <h4>Website</h4>
                            <p>www.samrtpolys.com</p>
                        </div>
                        <!-- contact info item end -->
                    </div>
                    <h3 class="contact-title padd-15">SEND ME EMAIL</h3>
                    <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MESSAGES</h4>

                    <!-- CONTACT FORM -->
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea name="" class="form-control" id="" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <button type="submit" class="btn"> Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Contact section end -->

        </div>

        <!-- main Content end-->

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
    <?php include_once "./CDN_Footer.php" ?>
    <script src="../controller/SearchController.js"></script>