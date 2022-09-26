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
            alert(text);
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

// ====================================