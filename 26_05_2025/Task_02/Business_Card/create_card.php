<?php
include "./includes/header.php";

if ($_SESSION['role'] == "1") {
    echo "<script>window.location.href = 'index.php';</script>";
}
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
<style>
    .mlc {
        margin-left: 95px;
    }
</style>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-4">
                    <form method="post" id="business_card_form" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Business Card</h4>
                            </div>
                            <div class="card-body">
                                <hr>
                                <label>Basic Information</label>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" oninput="business_name()" id="business_name_l" class="form-control" required>

                                    <label>About</label>
                                    <textarea name="about" oninput="business_about()" class="form-control" id="business_about_l" required></textarea>

                                    <label>Contact No</label>
                                    <input type="text" class="form-control" oninput="business_contact()" id="business_contact_l">

                                    <label>Email</label>
                                    <input type="email" class="form-control" id="business_email_l" oninput="business_email()">

                                    <label>Logo</label>
                                    <input type="file" class="form-control" id="logo_input" accept="image/png, image/jpeg, image/gif" onchange="previewLogo(this)">

                                    <label>Business Category</label>
                                    <select class="form-control" id="business_category" id="business_category" onchange="updateCategoryPreview()">
                                        <?php
                                        $sel_sql = "SELECT * FROM tbl_business_category WHERE status = 1";
                                        $sel_res = $conn->prepare($sel_sql);
                                        $sel_res->execute();
                                        $sel_res = $sel_res->fetchAll(pdo::FETCH_ASSOC);
                                        foreach ($sel_res as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <hr>
                                <label>Address</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address line 1" id="address_line1" oninput="updateAddressPreview()">
                                    <input type="text" class="form-control mt-1" placeholder="Address line 2" id="address_line2" oninput="updateAddressPreview()">
                                    <input type="text" class="form-control mt-1" placeholder="City" id="city" oninput="updateAddressPreview()">
                                    <input type="text" class="form-control mt-1" placeholder="State" id="state" oninput="updateAddressPreview()">
                                    <input type="text" class="form-control mt-1" placeholder="Country" id="country" oninput="updateAddressPreview()">
                                    <input type="text" class="form-control mt-1" placeholder="Pin-code" id="pincode" oninput="updateAddressPreview()">
                                </div>

                                <hr>
                                <label>Social links</label>
                                <div class="form-group">
                                    <div class="form-group">
                                        <div id="platformInputs" class="mt-3"></div>

                                        <label>Select Platform</label>
                                        <select class="form-control" id="platformDropdown">
                                            <option value="">Select Platform</option>
                                            <?php
                                            $sel_sql = "SELECT * FROM tbl_social_category WHERE status = 1";
                                            $sel_res = $conn->prepare($sel_sql);
                                            $sel_res->execute();
                                            $sel_res = $sel_res->fetchAll(pdo::FETCH_ASSOC);

                                            foreach ($sel_res as $row) {
                                                echo '<option value="' . $row['id'] . '" data-name="' . $row['platform_name'] . '">' . $row['platform_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <hr>

                                <label>Other Images</label>
                                <div class="form-group" id="image_container">
                                </div>

                                <button type="button" class="btn btn-primary" onclick="addImageInput()"><i class="bi bi-plus"></i></button>

                                <hr>
                                <!-- Input Form Section -->
                                <label>Web Links</label>
                                <div class="form-group" id="webLinksContainer">
                                    <!-- Dynamic links will be added here -->
                                </div>
                                <button type="button" class="btn btn-primary mt-2" onclick="addWebLink()">
                                    <i class="bi bi-plus"></i>
                                </button>
                                <hr>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" class="btn btn-primary mr-1" value="Save" id="save_button">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                    <!-- preview card -->
                    <div class="main preview">
                        <div class="banner">
                            <img id="logo_preview" src="assets/templates/img/home/bg-image.png" alt="Logo Preview">
                        </div>

                        <div class="details">
                            <h2 id="business_name_r">John Doe</h2>
                            <h3 id="business_category_preview">Quality Assurance Analyst</h3>
                            <p><span id="address_preview">Rajkot, Gujarat, India</span></p>
                            <!-- <p>Just Digital Gurus | <span>Rajkot, Gujarat, India</span></p> -->
                        </div>

                        <div class="social-media">
                            <ul id="social_links_default">
                                <?php
                                $sel_sql = "SELECT icon FROM `tbl_icons` LIMIT 6";
                                $sel_res = $conn->prepare($sel_sql);
                                $sel_res->execute();
                                $sel_res = $sel_res->fetchAll(pdo::FETCH_ASSOC);

                                foreach ($sel_res as $row) {
                                    echo '<li><a href="#" target="_blank"><img src="assets/templates/img/social/' . $row['icon'] . '" alt="" /></a></li>';
                                }
                                ?>
                            </ul>
                            <ul id="social_links_custom">
                                <!-- Custom social links will be added here dynamically -->
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
                                <a href="mailto:contactme@domain.com" class="box" id="business_email_r_link">
                                    <div class="icon"><i class="bi bi-envelope"></i></div>
                                    <div class="text">
                                        <h3>E-mail</h3>
                                        <p id="business_email_r">contactme@domain.com</p>
                                    </div>
                                </a>
                                <div class="box">
                                    <div class="icon"><i class="bi bi-geo-alt"></i></div>
                                    <div class="text">
                                        <h3>Address</h3>
                                        <p id="full_address">
                                            738, R.K. World Tower,<br />
                                            Ring Road, Rajkot - 360005<br />
                                            Gujarat, India
                                        </p>
                                        <a href="#" class="box-btn" id="direction_btn" target="_blank">
                                            <i class="bi bi-cursor"></i> Direction
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="carouselExampleIndicators3" class="carousel slide text-center" data-ride="carousel">
                            <div class="carousel-inner ">
                                <div class="carousel-item active">
                                    <img class="d-block w-75 mlc" src="assets/templates/img/slider/img1.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75 mlc" src="assets/templates/img/slider/img2.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75 mlc" src="assets/templates/img/slider/img3.png" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>



                        <div class="links" id="linksPreview">
                            <div class="title">
                                <h2>Web Links</h2>
                                <p>Description</p>
                            </div>
                            <!-- Dynamic preview links will be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Jquery Library File -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

<script src="assets/js/business_card.js"></script>
<?php

include "./includes/footer.php";

?>

<script>
    document.getElementById('#business_card_form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Collect basic info
        const formData = new FormData(this);
        formData.append('business_name', document.getElementById('business_name_l').value);
        // Collect social links
        const socialLinks = [];
        document.querySelectorAll('.social-link-group').forEach(group => {
            socialLinks.push({
                platform_id: group.querySelector('.platform-id').value,
                link: group.querySelector('.social-link').value
            });
        });
        formData.append('social_links', JSON.stringify(socialLinks));

        // Collect web links
        const webLinks = [];
        document.querySelectorAll('.link-group').forEach(group => {
            webLinks.push({
                title: group.querySelector('.link-title').value,
                subtitle: group.querySelector('.link-subtitle').value,
                url: group.querySelector('.link-url').value
            });
        });
        formData.append('web_links', JSON.stringify(webLinks));

        // Collect other images
        const imageInputs = document.querySelectorAll('#image_container input[type="file"]');
        imageInputs.forEach((input, index) => {
            if (input.files[0]) {
                formData.append('other_images[]', input.files[0]);
            }
        });

        // console.log('Form Data:', formData);
        // for (const [key, value] of formData.entries()) {
        //     console.log(`${key}: ${value}`);
        // }


        $.ajax({
            url: 'ajax/create_card_submit.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {   
                for (const [key, value] of Object.entries(response)) {
                    console.log(`${key}: ${value}`);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("An error occurred while creating the business card.");
            }
        });
    });
</script>