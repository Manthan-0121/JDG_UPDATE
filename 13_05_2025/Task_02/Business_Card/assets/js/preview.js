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