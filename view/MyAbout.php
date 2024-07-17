<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/leftBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

?>


<!-- main Content start -->
<div class="main-content">

    <!-- About section start -->
    <section class="about section " id="about">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="MyPortfolio.php"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>About me</h2>
                </div>
            </div>
            <div class="about-content padd-15">
                <div class="row">
                    <div class="about-text">
                        <h3>My name is Suraj Jaiswal and I am a <span>Full Stack Developer</span></h3>
                        <p>I am a versatile web designer and full-stack developer with over a year of extensive
                            experience. My expertise encompasses website design, graphic design, and much more.
                            Additionally, I possess strong knowledge in web technologies, mobile app development, and
                            software development, backed by 2 years of hands-on experience in PHP. </p>
                        <p>I am passionate about creating visually stunning and highly functional digital experiences
                            tailored to meet the unique needs of each client. Whether you are looking to revamp your
                            existing website, develop a new mobile application, or require comprehensive software
                            solutions, I am here to help bring your vision to life.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="personal-info padd-15">
                        <div class="row">
                            <div class="info-item padd-15">
                                <p>Birthday: <span>14 april 2003</span></p>
                            </div>

                            <div class="info-item padd-15">
                                <p>Age: <span>21</span></p>
                            </div>

                            <div class="info-item padd-15">
                                <p>Website: <span>www.samrtpolys.com</span></p>
                            </div>

                            <div class="info-item padd-15">
                                <p>Email: <span>Jaiswaljesus384@gmail.com</span></p>
                            </div>

                            <div class="info-item padd-15">
                                <p>Diploma: <span>Computer Science & Engineering</span></p>
                            </div>
                            <div class="info-item padd-15">
                                <p>Phone: <span>+91 738-799-7294</span></p>
                            </div>

                            <div class="info-item padd-15">
                                <p>City: <span>Pune, maharashtra</span></p>
                            </div>


                        </div>

                        <div class="row">
                            <div class="buttons padd-15">
                                <a href="https://internshala.com/download/resume" target="_blank" class="btn">Download CV</a>
                                <a href="MyPortfolio.php#contact" class="btn">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="skills padd-15">
                        <div class="row">
                            <div class="skill-item padd-15">
                                <h5>Web Development</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 90%;"></div>
                                    <div class="skill-percent">90%</div>
                                </div>
                            </div>

                            <div class="skill-item padd-15">
                                <h5>Mobile App Development</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 50%;"></div>
                                    <div class="skill-percent">50%</div>
                                </div>
                            </div>

                            <div class="skill-item padd-15">
                                <h5>Data Visualization</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 50%;"></div>
                                    <div class="skill-percent">50%</div>
                                </div>
                            </div>

                            <div class="skill-item padd-15">
                                <h5>Rest API Development</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 80%;"></div>
                                    <div class="skill-percent">80%</div>
                                </div>
                            </div>

                            <div class="skill-item padd-15">
                                <h5>Page Design</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 76%;"></div>
                                    <div class="skill-percent">76%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="education padd-15">
                        <h3 class="title">Education</h3>
                        <div class="row">
                            <div class="timline-box padd-15">
                                <div class="timeline shadow-dark">
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date">
                                            <i class="fa fa-calendar"></i> 2023 - 2027
                                        </h3>
                                        <h4 class="timeline-title">
                                            Zeal College of Engineering & Research, Pune
                                        </h4>
                                        <p class="timeline-text">
                                            Bachelor of Engineering - BE, Artificial Intelligence and data science.
                                        </p>
                                    </div>

                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date">
                                            <i class="fa fa-calendar"></i> 2019 - 2022
                                        </h3>
                                        <h4 class="timeline-title">
                                            Diploma in computer science
                                        </h4>
                                        <p class="timeline-text">
                                            Maharashtra State Board of Technical Education (MSBTE)
                                            Diploma of Education, Computer science
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="experience padd-15">
                        <h3 class="title">
                            Experience
                        </h3>

                        <div class="row">
                            <div class="timline-box padd-15">
                                <div class="timeline shadow-dark">
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date">
                                            <i class="fa fa-calendar"></i> November 2022 - Present
                                        </h3>
                                        <h4 class="timeline-title">
                                            Plus91 Technologies Pvt. Ltd.
                                        </h4>
                                        <p class="timeline-text">
                                            PHP Developer.
                                        </p>
                                    </div>

                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date">
                                            <i class="fa fa-calendar"></i> August 2022 - November 2022
                                        </h3>
                                        <h4 class="timeline-title">
                                            Hashtag Systems Inc
                                        </h4>
                                        <p class="timeline-text">
                                            Intern
                                            August 2022 - November 2022 (4 months)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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


<!-- manu toggler end -->

<!-- include footer section -->
<?php include_once "./CDN_Footer.php" ?>