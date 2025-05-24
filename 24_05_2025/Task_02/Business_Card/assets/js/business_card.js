$(document).ready(function () {
    $('#platformDropdown').on('change', function () {
        let selectedOption = $(this).find('option:selected');
        let id = selectedOption.val();
        let name = selectedOption.data('name');
        let social_links_default = $('#social_links_default');
        let social_links_custom = $('#social_links_custom');

        if (id) {
            let inputHtml = `
    <div class="form-group platform-input" data-id="${id}">
        <div class="input-group mb-2">
            <input type="hidden" name="platform_ids[]" value="${id}">
            <input type="text" name="platform_links[${id}]" class="form-control" placeholder="${name} Link" required>
            <button type="button" class="btn btn-danger remove-platform-btn">
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </div>`;

            // Check if the platform already exists
            $('#platformInputs').append(inputHtml);
            social_links_default.addClass('d-none');
            $.ajax({
                url: "ajax/select_icon.php",
                type: "POST",
                data: { id: id },
                success: function (response) {
                    social_links_custom.append(response);
                }
            })

            // Remove selected option from dropdown
            selectedOption.remove();
        }
    });

    $('#platformInputs').on('click', '.remove-platform-btn', function () {
        let inputGroup = $(this).closest('.platform-input');
        let id = inputGroup.data('id');
        let name = inputGroup.find('input[placeholder]').attr('placeholder').replace(' Link', '');

        // Remove input field
        inputGroup.remove();

        // Remove corresponding social icon from custom links
        $('#social_links_custom').find(`.social-icon[data-id="${id}"]`).remove();

        // Re-add to dropdown
        $('#platformDropdown').append(`<option value="${id}" data-name="${name}">${name}</option>`);

        // If no platform inputs are left, show default links
        if ($('#platformInputs .platform-input').length === 0) {
            $('#social_links_default').removeClass('d-none');
            $('#social_links_custom').empty(); // Optional: clear custom links completely
        }
    });

    $('#platformInputs').on('input', 'input[name^="platform_links["]', function () {
        let input = $(this);
        let rawValue = input.val();
        let id = input.closest('.platform-input').data('id');

        // Add https:// if missing and value is not empty
        let value = rawValue.trim();
        if (value && !/^https?:\/\//i.test(value)) {
            value = 'https://' + value;
        }

        // Simple URL validation
        const isValidUrl = /^(https?:\/\/)[^\s/$.?#].[^\s]*$/i.test(value);

        // Update the corresponding social icon link
        if (isValidUrl) {
            $(`#link_${id}`).attr('href', value);
            input.removeClass('is-invalid'); // optional: Bootstrap class for valid input
        } else {
            $(`#link_${id}`).attr('href', '#');
            input.addClass('is-invalid'); // optional: Bootstrap class for invalid input
        }
    });

});

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

document.getElementById('image_container').addEventListener('change', function (e) {
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
            reader.onload = function (event) {
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
    $('.imgs').slick('unslick');

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
document.addEventListener('DOMContentLoaded', function () {
    showOldImages(true);
});