// first name validation
function validateFname() {
    if (fname.value === "" || !nameRegex.test(fname.value)) {
        fname.classList.add("is-invalid");
        document.getElementById("fname_error").style.display = "block";
        fname.focus();
        btn_one.setAttribute("disabled", true);
    }else {
        fname.classList.remove("is-invalid");
        document.getElementById("fname_error").style.display = "none";
        btn_one.removeAttribute("disabled", false);
    }
}
// Last name validation
function validateLname() {
    if (lname.value === "" || !nameRegex.test(lname.value)) {
        lname.classList.add("is-invalid");
        document.getElementById("lname_error").style.display = "block";
        lname.focus();
        btn_two.setAttribute("disabled", true);
    } else {
        lname.classList.remove("is-invalid");
        document.getElementById("lname_error").style.display = "none";
        btn_two.removeAttribute("disabled", false);
    }
}
// email validation
function validateEmail() {  
    if (email.value === "") {
        email.classList.add("is-invalid");
        document.getElementById("email_error").style.display = "block";
        email.focus();
        btn_two.setAttribute("disabled", true);
    } else {
        if (emailRegex.test(email.value) === false) {
            email.classList.add("is-invalid");
            document.getElementById("email_error").style.display = "block";
            email.focus();
            btn_two.setAttribute("disabled", true);
        } else {
            email.classList.remove("is-invalid");
            document.getElementById("email_error").style.display = "none";
            btn_three.removeAttribute("disabled", false);
        }
    }
}
// Mobile validation
function validateMobile() {
    if (mobile.value === "") {
        mobile.classList.add("is-invalid");
        document.getElementById("mobile_error").style.display = "block";
        mobile.focus();
        btn_four.setAttribute("disabled", true);
    } else {
        if (regexMobile.test(mobile.value) == false) {
            mobile.classList.add("is-invalid");
            document.getElementById("mobile_error").style.display = "block";
            mobile.focus();
            btn_four.setAttribute("disabled", true);
        } else {
            mobile.classList.remove("is-invalid");
            document.getElementById("mobile_error").style.display = "none";
            btn_four.removeAttribute("disabled", false);
        }
    }
}
// Hobby select validation
function hobby_sel() {
    if (hobbies.value == "other") {
        document.getElementById("stage_five_other").style.display = "block";
        hobbies.classList.remove("is-invalid");
        document.getElementById("hobbies_error").style.display = "none";
    } else if (hobbies.value == "0") {
        hobbies.classList.add("is-invalid");
        document.getElementById("hobbies_error").style.display = "block";
        hobbies.focus();
        btn_five.setAttribute("disabled", true);
        document.getElementById("stage_five_other").style.display = "none";
    } else {
        document.getElementById("stage_five_other").style.display = "none";
        hobbies.classList.remove("is-invalid");
        document.getElementById("hobbies_error").style.display = "none";
        btn_five.removeAttribute("disabled", false);
    }
}

// hobby other select textbox validation
function txt_ddl_other_event() {
    if (document.getElementById("txt_ddl_other").value == "") {
        txt_ddl_other.classList.add("is-invalid");
        txt_ddl_other.focus();
        btn_five.setAttribute("disabled", true);
    } else {
        txt_ddl_other.classList.remove("is-invalid");
        btn_five.removeAttribute("disabled", false);
    }
}

