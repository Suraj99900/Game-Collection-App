<?php
// include header section of template
require_once "../../config.php";
include_once ABS_PATH_TO_PROJECT . "./view/LifeHealer/HEADER.php";
if (LIFE_HEALER_ENABLE == false) {
    header("Location: " . INDEX_LOCATION, true, 301);
    exit();
}
// Timer Configuration
$eventYear = EVENT_YEAR; // Set your event year
$eventMonth = EVENT_MONTH; // Set your event month
$eventDay = EVENT_DAY; // Set your event day
$eventHour = EVENT_HOUR; // Set your event hour
$eventMinute = EVENT_MINUTE; // Set your event minute
?>

<div class="main-content">
    <section class="section overflow">
        <div class="dashboard dashboard_container p-5 mt-5">
            <div class="card-transparent shadow-lg p-4 rounded ">
                <div class="row justify-content-center">
                    <div class="main-box col-12 text-center mb-4">
                        <h2 class="font-weight-bold">10X Your Power Of Manifestation Within 2 Hours</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="admin-text lead-text">Unlock your true potential by learning powerful manifestation
                            techniques that can transform your life in just 2 hours. Join us for an enlightening session
                            that will change your approach to achieving your goals.</p>
                    </div>
                </div>
                <div class="card-black-transparent">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12 img-box">
                            <div class="row p-5" style="text-align: justify;">
                                <h3 class="text">
                                    Revealing the “4D Success Framework” that will help you get unstuck from an
                                    unfulfilling corporate job, restart your career at any age, and find your true
                                    calling, happiness & peace! Career growth, income hike, dream job manifestation,
                                    unexpected promotion - ready to push the restart button of your career.
                                </h3>
                                <div class="card main-box ">
                                    <div class="text-center p-5">
                                        <h3>
                                            Register Now to Manifest Your Dream <br>
                                            <span style="font-size: 16px;" class="red-flag">Live Masterclass on</span>
                                        </h3>
                                    </div>
                                    <div class="text-center">
                                        <div id="timer" class="timer"></div>
                                    </div>
                                    <div class="text-center p-5">
                                        <a class="btn btn-primary btn-lg" href="https://rzp.io/i/KNhuciEeUM"
                                            target="_blank">
                                            <span class="ffbtntxt"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                                Reserve your Spot @just 99/-<br />तुमचे स्थान राखा @केवळ ९९/- वर.
                                            </span>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <span class=""> Only Few Seat Left !</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-12 img-box p-5">
                            <img src="../../res/img/LifeHealer/user1.png" class="img-fluid rounded" alt="Manifestation">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-5 mt-5">


            <div class="card-black-transparent mb-4">
                <h3 class="text-center p-2">जीवनात यशस्वी होण्यासाठी तयार करा तुमच्या जिंकण्याची मानसिकता आमच्या बरोबर!
                </h3>
                <h3 class="text-center p-2">तुम्ही या मास्टरक्लास मध्ये का Join व्हावे ?</h3>

                <div class="card-transparent p-2 m-2">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 card-imag">
                            <img src="../../res/img/LifeHealer/user2.jpg" alt="मास्टरक्लास">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12" style="padding: 20px;">
                            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5 rounded flex"
                                style="position: relative;">
                                <ul>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i> आर्थिक अडचणीतून बाहेर
                                        पडायचे असेल तर.
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        जर तुम्हाला तुमच्या व्यवसायात/नोकरीमध्ये नंबर 1 व्हायचे असेल तर
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        तुम्हाला तुमचे कुटुंब आणि तुमच्या प्रियजनांसोबत आनंदी जीवन हवे असल्यास
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        जर तुम्हाला अधिक यशस्वी व्यक्ती व्हायचे असेल तर
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        तुम्हाला तुमची स्वप्ने पूर्ण करायची असतील तर
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        जर तुम्हाला तुमच्या मनाची शक्ती जाणून घ्यायची असेल तर
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        जर तुम्हाला भूतकाळ विसरायचा असेल आणि तुमचे जीवन पुन्हा सुरू करायचे असेल तर
                                    </li>
                                    <li class="p-2"><i class="fa-solid fa-caret-right mx-2"></i>
                                        गमावलेला आत्मविश्वास परत मिळवायचा असेल तर
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-black-transparent mb-4">

                <!-- Testimonial Slider Section -->
                <div id="testimonialCarousel" class="carousel slide card-black-transparent mb-4"
                    data-bs-ride="carousel">
                    <h3 class="text-center">100000+ men and women have already experienced massive success in their
                        careers using this exact formula!</h3>
                    <div class="carousel-inner p-4">
                        <!-- First Testimonial -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="https://img.flexifunnels.com/images/14218/320/u0nzy_720_2.jpg"
                                        class="img-fluid rounded" alt="Testimonial 1">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="p-4">
                                        <p class="lead">"Thank you for considering me to assist you on your journey to
                                            financial abundance
                                            through manifestation. I believe that with the right mindset and
                                            manifestation techniques, we can
                                            unlock incredible opportunities and transform your relationship with money.
                                            Together, we'll harness
                                            the power of manifestation to align your thoughts, beliefs, and actions with
                                            your financial goals. By
                                            tapping into your inner potential and manifesting abundance, we'll pave the
                                            way for prosperity and
                                            fulfillment in every aspect of your life. I'm excited to embark on this
                                            transformative journey with
                                            you and witness the magic of manifestation unfold!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second Testimonial -->
                        <div class="carousel-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="https://img.flexifunnels.com/images/14218/320/m1nza_576_1.jpg"
                                        class="img-fluid rounded" alt="Testimonial 2">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="p-4">
                                        <p class="lead">"I firmly believe that by tapping into the power of
                                            manifestation, we can heal,
                                            strengthen, and elevate your relationships to new heights. Together, we'll
                                            delve into your desires,
                                            intentions, and energy to manifest the loving, harmonious relationships you
                                            deserve. Through
                                            visualization, positive affirmations, and aligned action, we'll clear
                                            blockages, release negativity,
                                            and cultivate deep connections based on love, trust, and understanding. With
                                            manifestation as our
                                            tool, we'll navigate through challenges, manifesting the fulfilling
                                            relationships you desire. Let's
                                            embark on this transformative journey together, awakening the magic of
                                            manifestation to create the
                                            love and connection you've always envisioned."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="https://img.flexifunnels.com/images/14218/qxnza_684_56.jpg"
                                        class="img-fluid rounded" alt="Testimonial 2">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="p-4">
                                        <p class="lead">"Working with Life Coach Kavita has been an absolute
                                            game-changer for me. Her
                                            guidance, support, and expertise have helped me overcome obstacles and
                                            achieve my goals in ways I
                                            never thought possible. Kavita's compassionate approach, combined with her
                                            deep understanding of human
                                            behavior and motivation, has empowered me to make positive changes in my
                                            life. She listens
                                            attentively, provides invaluable insights, and offers practical strategies
                                            that yield tangible
                                            results. Kavita's dedication to her clients' success is truly inspiring, and
                                            I feel incredibly
                                            fortunate to have her as my coach. If you're ready to transform your life
                                            and unlock your full
                                            potential, I wholeheartedly recommend working with Kavita."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="https://img.flexifunnels.com/images/14218/c2oti_980_65.jpg"
                                        class="img-fluid rounded" alt="Testimonial 2">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="p-4">
                                        <p class="lead">"Life Coach Kavita is an absolute gem! Her wisdom, empathy, and
                                            unwavering support
                                            have been instrumental in guiding me through some of the toughest challenges
                                            in my life. Kavita has a
                                            unique ability to see the potential in people and empower them to reach new
                                            heights. Her coaching
                                            style is both nurturing and results-driven, and she goes above and beyond to
                                            ensure her clients'
                                            success. With Kavita's guidance, I've gained clarity, confidence, and a
                                            renewed sense of purpose. She
                                            truly cares about her clients' well-being and is committed to helping them
                                            thrive in all areas of
                                            life. If you're looking for a life coach who will inspire, motivate, and
                                            transform your life, look no
                                            further than Kavita!""Life Coach Kavita."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add more testimonials as needed -->
                    </div>
                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>


            </div>
        </div>
    </section>
</div>
<!-- include footer section -->
<?php include_once ABS_PATH_TO_PROJECT . "./view/LifeHealer/Footer.php"; ?>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo $eventYear; ?>-<?php echo $eventMonth; ?>-<?php echo $eventDay; ?> <?php echo $eventHour; ?>:<?php echo $eventMinute; ?>:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="timer"
        document.getElementById("timer").innerHTML = `<i class="fa-solid fa-calendar-days"></i> ` + days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>