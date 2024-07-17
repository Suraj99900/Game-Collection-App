<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

?>
<style>
    .blog-section .card-body img {
        width: 100%;
        height: 30vh;
    }
</style>

<!-- main Content start -->
<div class="main-content">
    <!-- home section start -->
    <section class="home section " id="home">
        <div class="container">
            <div class="row">
                <div class="home-info padd-15">
                    <h3 class="hello">
                        Hello, my name is <span class="name">Suraj Jaiswal</span>
                    </h3>
                    <h3 class="my-profession"><span class="typing">Full Stack Developer</span></h3>
                    <p>I am a versatile web designer and full-stack developer with over a year of extensive experience.
                        My expertise encompasses website design, graphic design, and much more. Additionally, I possess
                        strong knowledge in web technologies, mobile app development, and software development, backed
                        by 2 years of hands-on experience in PHP.</p>
                    <a href="#contact" class="btn hire-me">Conatct me</a>
                </div>
                <div class="home-img padd-15">
                    <img src="../res/img/dashboardLogo.png">
                </div>
            </div>
        </div>
    </section>
    <!-- home section end -->


    <!-- Blog section start -->
    <section class="section blog-section" id="BlogSectionId">
        <div class="container">
        <div class="row">
                <div class="section-title padd-15">
                    <h2>Blog</h2>
                </div>
            </div>
            <div class="card">
                <div class="row p-5" id="blogBoxId">
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->





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
            <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICE</h4>
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
                    <p> Pune , maharashtra</p>
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


<!-- style switcher start -->
<div class="style-switcher">
    <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
    </div>
    <div class="chat-Bot s-icon " data-bs-toggle="offcanvas" data-bs-target="#ChatbotoffCanvas"
        aria-controls="ChatbotoffCanvas">
        <i class="fa-solid fa-robot"></i>
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

<div class="offcanvas offcanvas-end bg-card-low" tabindex="-1" id="ChatbotoffCanvas" aria-labelledby="ChatbotoffCanvas">
    <div class="offcanvas-header card-title-change">
        <h5 id="offcanvasTopLabel card-title-change">Hi My Name is Selly</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="ChatbotoffCanvasBody">
        <div class="chatboxClass" id="chatbot">
        </div>

        <div class="usermsgBox">
            <div class="row msg">
                <div class="col-8 msg_type">
                    <div class="form-group">
                        <textarea type="text" name="msg" id="usermsg" placeholder="enter your msg" class="form-control"
                            placeholder="Name"></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary mb-3" id="send">
                        send
                    </button>
                </div>
            </div>
        </div>
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


<!-- manu toggler end -->

<!-- include footer section -->
<?php include_once "./CDN_Footer.php" ?>
<script src="../controller/ChatBot.js"></script>

<script>

    $(document).ready(() => {
        fetchAllBlogRecord();
    });

    function fetchAllBlogRecord() {
        $.ajax({
            url: "../ajaxFile/ajaxBlog.php?sFlag=fetchAllPosts&iLimit=10",
            method: "GET",
            dataType: "json",
            success: function (response) {
                var sTemplate = "";
                if (response.status === 'success') {
                    response.data.forEach(ele => {
                        // Limit blog_data to 200 words
                        var limitedBlogData = ele.blog_data.split(" ").slice(0, 80).join(" ") + '...';

                        sTemplate += `
                        <div class="col-lg-6 col-sm-12 col-md-6 p-2">
                            <a href = 'BlogPage.php?iActive=2&id=${ele.id}'><div class="card p-3">
                                <h3>${ele.title}</h3>
                                <div class="card-body">
                                    <p class="card-text">${limitedBlogData}</p>
                                </div>
                            </div></a>
                        </div>`;
                    });
                    $("#blogBoxId").html(sTemplate);
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