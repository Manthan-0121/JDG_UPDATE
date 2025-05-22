//business name variable 
let business_name_l = document.getElementById("business_name_l");
let business_name_r = document.getElementById("business_name_r");

//business about variable 
let business_about_l = document.getElementById("business_about_l");
let business_about_r = document.getElementById("business_about_r");

//business contact variable
let business_contact_l = document.getElementById("business_contact_l");
let business_contact_r = document.getElementById("business_contact_r");
let business_contact_r_link = document.getElementById("business_contact_r_link");

//business email variable
let business_email_l = document.getElementById("business_email_l");
let business_email_r = document.getElementById("business_email_r");
let business_email_r_link = document.getElementById("business_email_r_link");

//business name value change
function business_name() {
    if (business_name_l.value == "") {
        business_name_r.innerHTML = "John Doe";
    } else {
        business_name_r.innerHTML = business_name_l.value;
    }
}

//business about value change
function business_about() {
    if (business_about_l.value == "") {
        business_about_r.innerHTML = `<p>
                                    I'm Leslie Murphy, a seasoned Business Development Executive
        with a proven track record of driving revenue growth and
                                    forging strategic partnerships.With 4 years of experience,
            I am committed to helping businesses thrive in today's
                                    competitive landscape.
                                </p > `;
    } else {
        business_about_r.innerHTML = business_about_l.value;
    }
}

// business contact value change
function business_contact() {
    if (business_contact_l.value == "") {
        business_contact_r.innerHTML = "+ 9876543211";
        business_contact_r_link.href = "tel:+9876543211";
    } else {
        business_contact_r.innerHTML = business_contact_l.value;
        business_contact_r_link.href = "tel:+" + business_contact_l.value;
    }
}

//business email value change
function business_email() {
    if (business_email_l.value == "") {
        business_email_r.innerHTML = "contactme@domain.com";
        business_email_r_link.href = "mailto:contactme@domain.com";
    } else {
        business_email_r.innerText = business_email_l.value;
        business_email_r_link.href = "mailto:" + business_email_l.value;
    }
}

// business image change
function previewLogo(input) {
    const file = input.files[0];
    const preview = document.getElementById("logo_preview");

    if (file) {
        const fileType = file.type;
        const validTypes = ["image/jpeg", "image/png", "image/gif"];

        if (validTypes.includes(fileType)) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            alert("Please select a valid image file (JPG, PNG, GIF).");
            input.value = ""; // reset file input
            preview.src = "assets/templates/img/home/bg-image.png"; // reset preview
        }
    }
}

//business category value change
function updateCategoryPreview() {
    const selectedCategory = document.getElementById("business_category");
    const previewHeading = document.getElementById("business_category_preview");

    previewHeading.innerText = selectedCategory.options[selectedCategory.selectedIndex].text;
}

// business address change
function updateAddressPreview() {
    const address_line1 = document.getElementById("address_line1").value;
    const address_line2 = document.getElementById("address_line2").value;
    const city = document.getElementById("city").value;
    const state = document.getElementById("state").value;
    const country = document.getElementById("country").value;
    const pincode = document.getElementById("pincode").value;
    const parts = [address_line1, address_line2, city, state, country, pincode].filter(Boolean);
    const preview = parts.join(", ");

    document.getElementById("address_preview").innerText = preview || "Rajkot, Gujarat, India";

    let fullAddress = '';
    if (address_line1) fullAddress += address_line1 + ',<br />';
    if (address_line2) fullAddress += address_line2 + ',<br />';
    if (city || pincode) fullAddress += (city ? city : '') + (pincode ? ' - ' + pincode : '') + '<br />';
    if (state || country) fullAddress += [state, country].filter(Boolean).join(', ');

    document.getElementById("full_address").innerHTML = fullAddress || `
        738, R.K. World Tower,<br />
        Ring Road, Rajkot - 360005<br />
        Gujarat, India`;
}


// business social links change




//business add and remove image field  in below
// function addImageInput() {
//     const container = document.getElementById("image_container");

//     const wrapper = document.createElement("div");
//     wrapper.className = "input-group mb-2";

//     const input = document.createElement("input");
//     input.type = "file";
//     input.className = "form-control";
//     input.onchange = function () {
//         previewImages(input);
//     };

//     const removeBtn = document.createElement("button");
//     removeBtn.type = "button";
//     removeBtn.className = "btn btn-danger";
//     removeBtn.innerHTML = "<i class=\"bi bi-trash\"></i>";
//     removeBtn.onclick = function () {
//         removeInput(removeBtn);
//     };

//     wrapper.appendChild(input);
//     wrapper.appendChild(removeBtn);
//     container.appendChild(wrapper);
// }

// function removeInput(button) {
//     const wrapper = button.parentNode;
//     wrapper.remove();
// }

// let hasUploaded = false;

// function previewImages(input) {
//     const files = input.files;
//     const previewContainer = document.getElementById("preview_gallery");

//     if (!hasUploaded && files.length > 0) {
//         previewContainer.innerHTML = "";
//         hasUploaded = true;
//     }

//     for (let file of files) {
//         if (file.type.startsWith("image/")) {
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 const div = document.createElement("div");
//                 div.className = "img";
//                 const img = document.createElement("img");
//                 img.src = e.target.result;
//                 img.alt = "";
//                 div.appendChild(img);
//                 previewContainer.appendChild(div);
//             };
//             reader.readAsDataURL(file);
//         }
//     }
// }
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

        // Assign a unique ID to the input if it doesn't have one
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
                    <img src="${event.target.result}" alt="Preview Image" />
                </div>`;
                // Append the new image preview to the gallery
                previewGallery.insertAdjacentHTML('beforeend', imgHtml);
            };
            reader.readAsDataURL(files[0]);
        } else {
            if (existingPreview) existingPreview.remove();
            if (!anyFileSelected()) {
                showOldImages(true);
            }
        }
    }
});

// Helper: check if any file input has a selected file
function anyFileSelected() {
    const inputs = document.querySelectorAll('#image_container input.image-input[type="file"]');
    return Array.from(inputs).some(input => input.files && input.files.length > 0);
}

// Helper: show or hide old images container
function showOldImages(show) {
    const oldImages = document.querySelectorAll('#preview_gallery .old-image');
    oldImages.forEach(imgDiv => {
        imgDiv.style.display = show ? 'block' : 'none';
    });
}

