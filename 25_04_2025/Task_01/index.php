<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Centered Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .centered-form {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .form-card {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>

    <div class="centered-form">
        <form class="form-card" id="user_info_form">
            <h4 class="mb-4 text-center">User Info Form</h4>
            <div class="mb-3 anim_01" id="stage_one" z>
                <label for="fname" class="form-label ">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name"
                    oninput="validateFname()">
                <div id="fname_error" class="text-danger" style="display: none;">Please enter first name.</div>
            </div>

            <div class="mb-3 anim_02" id="stage_two" style="display: none;">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" oninput="validateLname()"
                    placeholder="Enter last name" required>
                <div id="lname_error" class="text-danger" style="display: none;">Please enter last name.</div>
            </div>

            <div class="mb-3 anim_03" id="stage_three" style="display: none;">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" oninput="validateEmail()" placeholder="Enter email"
                    required>
                <div id="email_error" class="text-danger" style="display: none;">Please enter a valid email.</div>
                <div id="email_error_exist" class="text-danger" style="display: none;">Email already exists.</div>
            </div>


            <div class="mb-3 anim_04" id="stage_four" style="display: none;">
                <label for="mobile" class="form-label">Mobile</label>
                <div class="input-group">
                    <select class="form-select w-auto" id="ddl_country_code" name="countryCode"
                        style="max-width: 100px;">
                        <option value="+91" selected>🇮🇳 +91</option>
                        <!-- <option value="+1">🇺🇸 +1</option>
                        <option value="+44">🇬🇧 +44</option>
                        <option value="+61">🇦🇺 +61</option> -->
                    </select>
                    <input type="number" class="form-control" name="mobile" id="mobile" oninput="validateMobile()"
                        placeholder="Enter 10-digit number" required>

                </div>
                <div id="mobile_error" class="text-danger" style="display: none;">Please enter a valid mobile
                    number.
                </div>
            </div>

            <div class="anim_05">
                <div class="mb-3" id="stage_five" style="display: none;">
                    <label for="hobby" class="form-label">Hobby</label>
                    <select class="form-select" onchange="hobby_sel()" id="hobbies" aria-label="Default select example">
                        <option value="0" selected>Open this select menu</option>
                        <option value="cricket">Cricket</option>
                        <option value="football">Football</option>
                        <option value="hockey">Hockey</option>
                        <option value="other">Other</option>
                    </select>
                    <div id="hobbies_error" class="text-danger" style="display: none;">Please select a hobby.</div>
                </div>
                <div class="mb-3" id="stage_five_other" style="display: none;">
                    <label for="txt_ddl_other" class="form-label">Other Hobby</label>
                    <input type="text" class="form-control" id="txt_ddl_other" oninput="txt_ddl_other_event()"
                        placeholder="Enter other Hobby" style>
                </div>
            </div>

            <div class="mb-3 anim_06" id="stage_six" style="display: none;">
                <label class="form-label">Skills</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="chkbox_skills" type="checkbox" id="skill1" value="HTML">
                    <label class="form-check-label" for="skill1">HTML</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="chkbox_skills" type="checkbox" id="skill2" value="CSS">
                    <label class="form-check-label" for="skill2">CSS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="chkbox_skills" type="checkbox" id="skill3" value="JavaScript">
                    <label class="form-check-label" for="skill3">JavaScript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="chkbox_skills" type="checkbox" id="skill4" value="PHP">
                    <label class="form-check-label" for="skill4">PHP</label>
                </div>
            </div>
            <div class="d-grid mt-4" id="btn_next">
                <button type="button" class="btn btn-primary" id="btn_one" onclick="stage_one()" disabled>Next</button>
                <button type="button" class="btn btn-primary" id="btn_two" onclick="stage_two()" style="display: none;"
                    disabled>Next</button>
                <button type="button" class="btn btn-primary" id="btn_three" onclick="stage_three()"
                    style="display: none;" disabled>Next</button>
                <button type="button" class="btn btn-primary" id="btn_four" onclick="stage_four()"
                    style="display: none;" disabled>Next</button>
                <button type="button" class="btn btn-primary" id="btn_five" onclick="stage_five()"
                    style="display: none;" disabled>Next</button>
                <button type="button" class="btn btn-primary" id="btn_six" onclick="stage_six()" style="display: none;"
                    disabled>Next</button>
                <button type="submit" class="btn btn-primary" id="btn_submit"
                    style="display: none;" disabled>Submit</button>
            </div>
        </form>
    </div>


    <div class="modal fade" id="customAlert" tabindex="-1" aria-labelledby="customAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="customAlertLabel">Success</h5>
                </div>
                <div class="modal-body">
                    Your form was submitted successfully!
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="index.php">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="app.js"></script>
    <script src="validate.js"></script>

    <script>
        $(document).ready(function() {
            // chk email
            $('#email').on('keyup', function() {
                let chk_txt_email = document.getElementById("email").value;
                $.ajax({
                    type: "POST",
                    url: "chk_email.php",
                    data: {
                        txt_email: chk_txt_email.toLowerCase()
                    },
                    success: function(data) {
                        if (data == 1) {
                            $('#email').addClass('is-invalid');
                            $('#email_error_exist').show();
                            $('#btn_three').prop('disabled', true);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#email_error_exist').hide();
                            $('#btn_three').prop('disabled', false);
                        }
                    }
                });
            });

            // form subbmit
            $('#user_info_form').on('submit', function(e) {

                if (txt_ddl_other_event() == 1) {
                    txt_hobbies = document.getElementById("txt_ddl_other").value;
                } else {
                    txt_hobbies = document.getElementById("hobbies").value;

                }
                e.preventDefault();
                const selectedValues = Array.from(document.querySelectorAll('input[name="chkbox_skills"]:checked')).map(cb => cb.value);
                frm_data["fname"] = txt_fname;
                frm_data["lname"] = txt_lname;
                frm_data["email"] = txt_email.toLowerCase();
                frm_data["mobile"] = txt_mobile;
                frm_data["hobbies"] = txt_hobbies;
                frm_data["skills"] = selectedValues.join(", ");
                frm_data['txt_ddl_other'] = txt_ddl_other.value;

                $.ajax({
                    type: "POST",
                    url: "submit.php",
                    data: frm_data,
                    success: function(data) {
                        if (data == 1) {
                            const myModal = new bootstrap.Modal(document.getElementById('customAlert'));
                            myModal.show();
                        } else {
                            alert("Error submitting form: " + data);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>