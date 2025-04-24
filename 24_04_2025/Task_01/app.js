let fname = document.getElementById("fname");
let lname = document.getElementById("lname");
let email = document.getElementById("email");
let mobile = document.getElementById("mobile");
let hobbies = document.getElementById("hobbies");
let txt_ddl_other = document.getElementById("txt_ddl_other");
//buttons
let btn_one = document.getElementById("btn_one");
let btn_two = document.getElementById("btn_two");
let btn_three = document.getElementById("btn_three");
let btn_four = document.getElementById("btn_four");
let btn_five = document.getElementById("btn_five");
let btn_submit = document.getElementById("btn_submit");

const frm_data = {};

let txt_fname = "";
let txt_lname = "";
let txt_email = "";
let txt_mobile = "";
let txt_hobbies = "";
let txt_skills = "";

function stage_one() {

    txt_fname = fname.value;
    // console.log(txt_fname);
    document.getElementById("stage_one").style.display = "none";
    document.getElementById("stage_two").style.display = "block"
    btn_two.style.display = "block";
    btn_one.style.display = "none";
}

function stage_two() {
    txt_lname = lname.value;
    // console.log(txt_lname);
    document.getElementById("stage_two").style.display = "none";
    document.getElementById("stage_three").style.display = "block";
    document.getElementById("stage_one").style.display = "none";
    btn_three.style.display = "block";
    btn_two.style.display = "none";
}

function stage_three() {
    txt_email = email.value;
    // console.log(txt_email);
    document.getElementById("stage_three").style.display = "none";
    document.getElementById("stage_four").style.display = "block";
    btn_four.style.display = "block";
    btn_three.style.display = "none";
}

function stage_four() {
    txt_mobile = mobile.value;
    // console.log(txt_mobile);
    document.getElementById("stage_four").style.display = "none";
    document.getElementById("stage_five").style.display = "block";
    btn_five.style.display = "block";
    btn_four.style.display = "none";
}

function stage_five() {
    txt_hobbies = hobbies.value;
    // console.log(txt_hobbies);
    document.getElementById("stage_five").style.display = "none";
    document.getElementById("stage_six").style.display = "block";
    btn_submit.style.display = "block";
    btn_five.style.display = "none";
    document.getElementById("stage_five_other").style.display = "none";
    btn_submit.removeAttribute("disabled", false);
}


// function submitForm() {
// }