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
                            <label>Web Links</label>
                            <div class="form-group">
                                <label>Link 1</label>
                                <input type="text" class="form-control" placeholder="Title">
                                <input type="text" class="form-control mt-1" placeholder="http://example.com">
                                <label>Link 2</label>
                                <input type="text" class="form-control" placeholder="Title">
                                <input type="text" class="form-control mt-1" placeholder="http://example.com">
                                <label>Link 3</label>
                                <input type="text" class="form-control" placeholder="Title">
                                <input type="text" class="form-control mt-1" placeholder="http://example.com">
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
                                    <img class="d-block w-75" src="assets/templates/img/slider/img1.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75" src="assets/templates/img/slider/img2.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75" src="assets/templates/img/slider/img3.png" alt="Third slide">
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
                        <!-- <div class="imgs" id="preview_gallery">
                            <div class="img"><img src="assets/templates/img/slider/img1.png" alt="" /></div>
                            <div class="img"><img src="assets/templates/img/slider/img1.png" alt="" /></div>
                            <div class="img"><img src="assets/templates/img/slider/img1.png" alt="" /></div>
                            <div class="img"><img src="assets/templates/img/slider/img1.png" alt="" /></div>
                        </div> -->


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


<!-- Jquery Library File -->

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
        let imageInputCounter = 0;
    let carouselItems = [];

    // Initialize carousel with default images
    document.addEventListener('DOMContentLoaded', function() {
        updateCarousel();
    });

    function addImageInput() {
        let inputHtml = `
        <div class="input-group mb-2">
            <input type="file" class="form-control image-input" accept="image/*">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger" onclick="removeInput(this)">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>`;
        document.getElementById('image_container').insertAdjacentHTML('beforeend', inputHtml);
    }

    function removeInput(button) {
        const inputGroup = button.closest('.input-group');
        const fileInput = inputGroup.querySelector('input[type="file"]');
        const inputId = fileInput.getAttribute('data-input-id');

        // Remove from carouselItems array
        if (inputId) {
            carouselItems = carouselItems.filter(item => item.id !== inputId);
        }

        // Remove the input group
        inputGroup.remove();

        // Update carousel
        updateCarousel();
    }

    document.getElementById('image_container').addEventListener('change', function(e) {
        if (e.target && e.target.matches('input.image-input[type="file"]')) {
            const fileInput = e.target;
            const files = fileInput.files;

            if (!fileInput.hasAttribute('data-input-id')) {
                imageInputCounter++;
                fileInput.setAttribute('data-input-id', imageInputCounter);
            }
            const inputId = fileInput.getAttribute('data-input-id');

            // Remove existing item from array if it exists
            carouselItems = carouselItems.filter(item => item.id !== inputId);

            if (files && files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    // Add to carouselItems array
                    carouselItems.push({
                        id: inputId,
                        src: event.target.result,
                        active: carouselItems.length === 0 // Make first item active
                    });

                    // Update carousel
                    updateCarousel();
                };
                reader.readAsDataURL(files[0]);
            } else {
                // If file selection was cleared, update carousel
                updateCarousel();
            }
        }
    });

    function updateCarousel() {
        const carouselInner = document.querySelector('#preview_gallery');
        let carouselHtml = '';

        // If no images uploaded, show default image
        if (carouselItems.length === 0) {
            carouselHtml = `
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/templates/img/slider/img1.png" alt="Default image">
                </div>`;
        } else {
            // Generate carousel items from carouselItems array
            carouselItems.forEach((item, index) => {
                carouselHtml += `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                    <img class="d-block w-100" src="${item.src}" alt="Uploaded image ${index + 1}">
                    <div class="carousel-caption">
                        <button class="btn btn-sm btn-danger" onclick="removeCarouselItem('${item.id}')">
                            <i class="fa fa-trash"></i> Remove
                        </button>
                    </div>
                </div>`;
            });
        }

        // Update carousel inner HTML
        carouselInner.innerHTML = carouselHtml;

        // If Bootstrap Carousel needs reinitialization
        if (typeof $().carousel === 'function') {
            $('#previewCarousel').carousel();
        }
    }

    function removeCarouselItem(inputId) {
        // Remove from carouselItems array
        carouselItems = carouselItems.filter(item => item.id !== inputId);

        // Remove corresponding file input
        const fileInput = document.querySelector(`input[data-input-id="${inputId}"]`);
        if (fileInput) {
            fileInput.value = ''; // Clear file selection
            fileInput.closest('.input-group').remove();
        }

        // Update carousel
        updateCarousel();
    }

    // Helper: check if any file input has a selected file
    function anyFileSelected() {
        const inputs = document.querySelectorAll('#image_container input.image-input[type="file"]');
        return Array.from(inputs).some(input => input.files && input.files.length > 0);
    }
</script>

<style>
    #previewCarousel {
        max-width: 600px;
        margin: 0 auto;
    }

    .carousel-caption {
        right: auto;
        left: 10px;
        bottom: 10px;
        padding: 5px;
    }

    .carousel-caption button {
        font-size: 12px;
        padding: 2px 5px;
    }
</style>

<!-- <script>
    function addImageInput() {
        let inputHtml = `
    <div class="input-group mb-2">
        <input type="file" class="form-control image-input" accept="image/*">
        <button type="button" class="btn btn-danger" onclick="removeInput(this)">
            <i class="bi bi-trash"></i>
        </button>
    </div>`;
        document.getElementById('image_container').insertAdjacentHTML('beforeend', inputHtml);
    }

    function removeInput(button) {
        const inputGroup = button.closest('.input-group');
        const fileInput = inputGroup.querySelector('input[type="file"]');
        const previewGallery = document.getElementById('preview_gallery');

        // Remove preview image linked to this input if exists
        const inputId = fileInput.getAttribute('data-input-id');
        if (inputId) {
            const previewToRemove = previewGallery.querySelector(`.img[data-input-id="${inputId}"]`);
            if (previewToRemove) previewToRemove.remove();
        }

        // Remove the input group
        inputGroup.remove();

        // Reinitialize slick slider after removal
        reinitializeSlickSlider();

        // If no file inputs remain or none have files, show old images again
        if (!anyFileSelected()) {
            showOldImages(true);
        }
    }

    let imageInputCounter = 0;

    document.getElementById('image_container').addEventListener('change', function(e) {
        if (e.target && e.target.matches('input.image-input[type="file"]')) {
            const fileInput = e.target;
            const previewGallery = document.getElementById('preview_gallery');
            const files = fileInput.files;

            if (!fileInput.hasAttribute('data-input-id')) {
                imageInputCounter++;
                fileInput.setAttribute('data-input-id', imageInputCounter);
            }
            const inputId = fileInput.getAttribute('data-input-id');

            // Remove old preview for this input
            const existingPreview = previewGallery.querySelector(`.img[data-input-id="${inputId}"]`);
            if (existingPreview) existingPreview.remove();

            if (files && files[0]) {
                // Hide old images when first new image is selected
                showOldImages(false);

                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgHtml = `
                    <div class="img" data-input-id="${inputId}">
                        <img src="${event.target.result}" alt="Preview Image" height="100px" width="100px" />
                    </div>`;

                    // Append the new image preview to the gallery
                    previewGallery.insertAdjacentHTML('beforeend', imgHtml);

                    // Reinitialize slick slider after adding new image
                    reinitializeSlickSlider();
                };
                reader.readAsDataURL(files[0]);
            } else {
                if (existingPreview) existingPreview.remove();
                reinitializeSlickSlider();

                // If no files are selected, show old images
                if (!anyFileSelected()) {
                    showOldImages(true);
                }
            }
        }
    });

    // Function to reinitialize slick slider
    function reinitializeSlickSlider() {
        // Destroy existing slick slider
        // $('.imgs').slick('unslick');

        // Reinitialize with same settings
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
    }

    // Helper: check if any file input has a selected file
    function anyFileSelected() {
        const inputs = document.querySelectorAll('#image_container input.image-input[type="file"]');
        return Array.from(inputs).some(input => input.files && input.files.length > 0);
    }

    // Helper: show or hide old images
    function showOldImages(show) {
        const oldImages = document.querySelectorAll('#preview_gallery .img:not([data-input-id])');
        oldImages.forEach(imgDiv => {
            imgDiv.style.display = show ? 'block' : 'none';
        });

        // Reinitialize slick slider after showing/hiding old images
        reinitializeSlickSlider();
    }

    // Initialize by showing old images
    document.addEventListener('DOMContentLoaded', function() {
        showOldImages(true);
    });
</script> -->