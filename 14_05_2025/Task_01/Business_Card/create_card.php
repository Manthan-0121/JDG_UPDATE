<?php
include "./includes/header.php";
?>

<!-- business card css -->
<!-- Bootstrap css -->
<link href="assets/templates/css/bootstrap.min.css" media="screen" rel="stylesheet" />
<!-- Slick slider css -->
<link rel="stylesheet" href="assets/templates/css/slick.css" />
<link rel="stylesheet" href="assets/templates/css/slick-theme.css" />
<!-- Swiper slider css -->
<link rel="stylesheet" href="assets/templates/css/swiper.min.css" />
<!--font Awesome css -->
<link rel="stylesheet" href="assets/templates/css/font-awesome.css" />
<!-- Wow animations css -->
<link rel="stylesheet" href="assets/templates/css/animate.min.css" />

<!-- Main custom css -->
<link media="screen" rel="stylesheet" href="assets/templates/css/style.css" />

<!-- Shivraj css -->
<link media="screen" rel="stylesheet" href="assets/templates/css/shivraj.css" />

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Business Card</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <label>Basic Information</label>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" oninput="business_name()" id="business_name_l" class="form-control">
                                <label>About</label>
                                <textarea name="about" oninput="business_about()" class="form-control" id="business_about_l"></textarea>
                                <!-- <input type="text" class="form-control" oninput="business_about()" id="business_about_l"> -->
                                <label>Contact No</label>
                                <input type="text" class="form-control" oninput="business_contact()" id="business_contact_l">
                                <label>Email</label>
                                <input type="text" class="form-control">
                                <label>Logo</label>
                                <input type="file" class="form-control">
                            </div>
                            <hr>
                            <label>Address</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address line 1">
                                <input type="text" class="form-control mt-1" placeholder="Address line 2">
                                <input type="text" class="form-control mt-1" placeholder="City">
                                <input type="text" class="form-control mt-1" placeholder="State">
                                <input type="text" class="form-control mt-1" placeholder="Country">
                                <input type="text" class="form-control mt-1" placeholder="Pin-code">
                            </div>
                            <hr>
                            <label>Social links</label>
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control">
                                <label>Linkedin</label>
                                <input type="text" class="form-control">
                                <label>Instagram</label>
                                <input type="text" class="form-control">
                                <label>Twitter</label>
                                <input type="text" class="form-control">
                                <label>Youtube</label>
                                <input type="text" class="form-control">
                                <label>Skype</label>
                                <input type="text" class="form-control">
                                <label>Google Map</label>
                                <input type="text" class="form-control">
                            </div>
                            <hr>
                            <label>Other Links</label>
                            <div class="form-group">
                                <label>Link 1</label>
                                <input type="text" class="form-control">
                                <label>Link 2</label>
                                <input type="text" class="form-control">
                                <label>Link 3</label>
                                <input type="text" class="form-control">
                            </div>
                            <hr>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <!-- preview card -->
                    <div class="main preview">
                        <div class="banner">
                            <img src="assets/templates/img/home/bg-image.png" alt="" />
                        </div>

                        <div class="details">
                            <h2 id="business_name_r">John Doe</h2>
                            <h3>Quality Assurance Analyst</h3>
                            <p>Just Digital Gurus | <span>Rajkot, Gujarat, India</span></p>
                        </div>

                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/1.png" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/2.png" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/3.png" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/4.png" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/5.png" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/templates/img/social/6.png" alt="" /></a>
                                </li>
                            </ul>
                        </div>

                        <div class="about">
                            <h2>About Me</h2>
                            <div id="business_about_r">
                                <p>
                                    I'm Leslie Murphy, a seasoned Business Development Executive
                                    with a proven track record of driving revenue growth and
                                    forging strategic partnerships. With 4 years of experience,
                                    I am committed to helping businesses thrive in today's
                                    competitive landscape.
                                </p>
                            </div>
                        </div>

                        <div class="contact">
                            <h2>
                                <img src="assets/img/home/Component.png" alt="" /> Contact
                                Us
                            </h2>
                            <div class="contact__inner">
                                <a href="tel:+9876543211" id="business_contact_r_link" class="box">
                                    <div class="icon"><i class="bi bi-telephone"></i></div>
                                    <div class="text">
                                        <h3>Call us</h3>
                                        <p id="business_contact_r">+ 9876543211</p>
                                    </div>
                                </a>
                                <a href="mailto:contactme@domain.com" class="box">
                                    <div class="icon"><i class="bi bi-envelope"></i></div>
                                    <div class="text">
                                        <h3>E-mail</h3>
                                        <p>contactme@domain.com</p>
                                    </div>
                                </a>
                                <div class="box">
                                    <div class="icon"><i class="bi bi-geo-alt"></i></div>
                                    <div class="text">
                                        <h3>Address</h3>
                                        <p>
                                            738, R.K. World Tower,<br />
                                            Ring Road, Rajkot - 360005<br />
                                            Gujarat, India
                                        </p>
                                        <a href="#" class="box-btn"><i class="bi bi-cursor"></i> Direction</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="imgs">
                            <div class="img">
                                <img src="assets/templates/img/home/img1.png" alt="" />
                            </div>

                            <div class="img">
                                <img src="assets/templates/img/home/img2.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img3.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img2.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img3.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img1.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img1.png" alt="" />
                            </div>

                            <div class="img">
                                <img src="assets/templates/img/home/img2.png" alt="" />
                            </div>
                            <div class="img">
                                <img src="assets/templates/img/home/img3.png" alt="" />
                            </div>
                        </div>

                        <div class="links">
                            <div class="title">
                                <h2>Web Links</h2>
                                <p>Description</p>
                            </div>
                            <a href="#" class="links__inner">
                                <div class="icon">
                                    <i class="far fa-link"></i>
                                </div>
                                <div class="text">
                                    <h2>Title</h2>
                                    <p>Sub-title</p>
                                </div>
                            </a>
                            <a href="#" class="links__inner">
                                <div class="icon">
                                    <i class="far fa-link"></i>
                                </div>
                                <div class="text">
                                    <h2>Title</h2>
                                    <p>Sub-title</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- business card scripts -->

<!-- Jquery Library File -->
<script src="assets/templates/js/jquery-3.4.1.js"></script>
<!-- Bootstrap js file -->
<script src="assets/templates/js/bootstrap.min.js"></script>
<!-- Slick slider js file -->
<script src="assets/templates/js/slick.min.js"></script>
<!-- Swiper slider js file -->
<script src="assets/templates/js/swiper.min.js"></script>
<!-- Wow animation js file -->
<script src="assets/templates/js/wow.min.js"></script>
<!-- Main js file -->
<script src="assets/templates/js/script.js "></script>

<script src="assets/js/preview.js"></script>

<script>
    const menuLinks = document.querySelectorAll(".menu-link");

    menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            menuLinks.forEach((link) => {
                link.classList.remove("is-active");
            });
            link.classList.add("is-active");
        });
    });

    $(".imgs").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: false,
        responsive: [{
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });
</script>
<?php

include "./includes/footer.php";

?>