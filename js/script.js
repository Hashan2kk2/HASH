// =============================
// START OF SIGN IN SIGN UP FORM FIELDS
// =============================
const inputs = document.querySelectorAll(".input-field");

inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
    });
});

// ====================================
// END OF TEXT FIELDS IN SIGNUP SIGNIN FORMS
// ====================================

// ====================================
// Toggle View
// ====================================
function toggleView() {
    var userReg = document.getElementById("userReg");
    var userLog = document.getElementById("userLog");

    userReg.classList.toggle("d-none");
    userLog.classList.toggle("d-none");
}
// ====================================
// Toggle View
// ====================================

// ====================================
// USER REGISTRATION
// ====================================
var fName = document.getElementById("firstName");
var lName = document.getElementById("lastName");
var email = document.getElementById("email");
var contact = document.getElementById("contact");
var gender = document.getElementById("gender");
var password = document.getElementById("password");
var tac = document.getElementById("tac");

function cleanFields() {
    fName.value = "";
    lName.value = "";
    email.value = "";
    contact.value = "";
    gender.value = 0;
    password.value = "";
}


function userReg() {


    let form = new FormData();
    form.append("fname", fName.value);
    form.append("lname", lName.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("contact", contact.value);
    form.append("gender", gender.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            let text = request.responseText;
            if (text == "Success") {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: (text),
                    showConfirmButton: false,
                    timer: 2000
                })
                cleanFields();
                toggleView();
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: (text),
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }
    }

    request.open("POST", "userRegProcess.php", true);
    request.send(form);
}
// ====================================
// USER REGISTRATION
// ====================================

// ====================================
// USER LOGIN
// ====================================

function userlog() {
    let loginEmail = document.getElementById("loginEmail");
    let loginPassword = document.getElementById("loginPassword");

    let form = new FormData();

    form.append("email", loginEmail.value);
    form.append("password", loginPassword.value);

    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            let text = request.responseText;
            if (text == "success") {
                window.location = "home.php";
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: (text),
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }
    }
    request.open("POST", "userLoginProcess.php", true);
    request.send(form);
}

function forgotPassword() {

    window.location = "forgotPassword.php";

}

// ====================================
// USER LOGIN
// ====================================

// ====================================
// FORGOT PASSWORD
// ====================================

function passwordReset() {

    let email = document.getElementById("forgotPasswordEmail");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            if (text == "success") {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: ("Verification Code Sent to Your Entered Email Address"),
                    showConfirmButton: false,
                    timer: 2500
                })
                window.location = "verificationCode.php";
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: (text),
                    showConfirmButton: false,
                    timer: 2000
                })
                email.value = "";
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

// verification code timer
let countdowntimer = document.getElementById("countdowntimer");

function verificationTimer() {
    let count = 10;
    let start = setInterval(c, 1000);

    function c() {
        if (count == 0) {
            countdowntimer.innerHTML = "Time Out";
            clearInterval(start);
            window.location = "forgotPassword.php";
        } else {
            count--;
            countdowntimer.innerHTML = count;
        }
    }
}

function stop() {
    clearInterval(start);
}

function resetPassword() {

    let code = document.getElementById("verificationCode");
    let newPwBox = document.getElementById("newPasswordInput");
    let vcCodeBox = document.getElementById("verificationCodeInput");


    var formData = new FormData();

    // edge2kk2@gmail.com
    formData.append("code", code.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "succeess") {
                stop();
                vcCodeBox.classList.toggle("d-none");
                newPwBox.classList.toggle("d-none");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(formData);
}

function switchPwType1() {
    let icon = document.getElementById("togglePassword1");
    let pw = document.getElementById("password1");
    icon.classList.toggle("fa-eye-slash");
    icon.classList.toggle("fa-eye");

    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}

function switchPwType2() {
    let icon = document.getElementById("togglePassword2");
    let pw = document.getElementById("password2");
    icon.classList.toggle("fa-eye-slash");
    icon.classList.toggle("fa-eye");

    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}


// ====================================