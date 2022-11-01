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
    request.onreadystatechange = function () {
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

function loginPage() {
    window.location = "index.php";
}

function signout() {
    let r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            // let t = r.responseText;
            // alert(t);
            location.reload();
        }
    }
    r.open("POST", "signoutProcess.php", true);
    r.send();
}

function userlog() {
    let loginEmail = document.getElementById("loginEmail");
    let loginPassword = document.getElementById("loginPassword");

    let form = new FormData();

    form.append("email", loginEmail.value);
    form.append("password", loginPassword.value);

    let request = new XMLHttpRequest();

    request.onreadystatechange = function () {
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
    r.onreadystatechange = function () {
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


// function verificationTimer() {
//     let start = setInterval(c, 1000);
//     let count = 181;

//     function c() {
//         if (count == 0) {
//             countdowntimer.innerHTML = "Time Out";
//             clearInterval(start);
//             window.location = "forgotPassword.php";
//         } else {
//             count--;
//             countdowntimer.innerHTML = count;
//         }
//     }

//     function trop() {
//         clearInterval(start);
//     }
// }


let start = setInterval(timer, 1000);
let count = 180;
function timer() {
    if (count == 0) {
        countdowntimer.innerHTML = "Time Out";
        clearInterval(start);
        window.location = "forgotPassword.php";
    } else {
        count--;
        countdowntimer.innerHTML = count;
    }
}

function resetPassword() {

    let code = document.getElementById("verificationCode");
    let newPwBox = document.getElementById("newPasswordInput");
    let vcCodeBox = document.getElementById("verificationCodeInput");


    var formData = new FormData();

    // edge2kk2@gmail.com
    formData.append("code", code.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "succeess") {
                clearInterval(start);
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


let icon1 = document.getElementById("togglePassword1");
let pw1 = document.getElementById("password1");
let icon2 = document.getElementById("togglePassword2");
let pw2 = document.getElementById("password2");

function switchPwType1() {
    icon1.classList.toggle("fa-eye-slash");
    icon1.classList.toggle("fa-eye");

    if (pw1.type === "password") {
        pw1.type = "text";
    } else {
        pw1.type = "password";
    }
}

function switchPwType2() {
    icon2.classList.toggle("fa-eye-slash");
    icon2.classList.toggle("fa-eye");

    if (pw2.type === "password") {
        pw2.type = "text";
    } else {
        pw2.type = "password";
    }
}

function setNewPassword() {

    var minNumberOfChars = 7;
    var maxNumberOfChars = 14;

    if (pw1.value == "") {
        alert("Please Enter Your New Password");
    } else if (pw2.value == "") {
        alert("Please Enter Your Confirmation Password");
    } else if (pw1.value.length < minNumberOfChars || pw1.value.length > maxNumberOfChars) {
        alert("Please Enter your password with minimum 8 characters and maximum 50 characters");
    } else if (pw1.value != pw2.value) {
        alert("Passwords aren't maching");
    } else {

        var r = new XMLHttpRequest();
        var f = new FormData();


        f.append("p1", pw1.value);
        f.append("p2", pw2.value);

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                let t = r.responseText;
                alert(t)
                if (t == "Password Updated Success") {
                    window.location = "index.php";
                }
            }
        }
        r.open("POST", "setNewPassword.php", true);
        r.send(f);

    }


}

// ====================================

// =========USER PROFILE========

var activityTab = document.getElementById("activityTab");
var ordersTab = document.getElementById("ordersTab");
var wishlistTab = document.getElementById("wishlistTab");

var activityBox = document.getElementById("activityBox");
var orderBox = document.getElementById("ordersBox");
var wishlistBox = document.getElementById("wishlistBox");

var scBtn = document.getElementById("saveChangesBtn");
var epBtn = document.getElementById("editProfileBtn");
var chngProPicBtn = document.getElementById("profPicChngBtn");

// textfields

var upCnfrmPwBx = document.getElementById("upCnfmPwBx");
var upLname = document.getElementById("upLName");
var upFname = document.getElementById("upFName");
var upEmail = document.getElementById("upEmail");
var upContact = document.getElementById("upContact");
var upPassword = document.getElementById("upPassword");
var upCnfrmPassword = document.getElementById("upCnfrmPassword");
var upAddLine1 = document.getElementById("upAddl1");
var upAddLine2 = document.getElementById("upAddl2");
var upCity = document.getElementById("upCity");
var upPostalCode = document.getElementById("upPostCode");
var img = document.getElementById("imageUploader");

function switchActivity() {
    activityTab.classList.add("active");
    ordersTab.classList.remove("active");
    wishlistTab.classList.remove("active");

    activityBox.classList.remove("d-none");
    orderBox.classList.add("d-none");
    wishlistBox.classList.add("d-none");
}
function switchOrders() {
    ordersTab.classList.add("active");
    activityTab.classList.remove("active");
    wishlistTab.classList.remove("active");

    orderBox.classList.remove("d-none");
    activityBox.classList.add("d-none");
    wishlistBox.classList.add("d-none");
}
function switchWishlist() {
    wishlistTab.classList.add("active");
    ordersTab.classList.remove("active");
    activityTab.classList.remove("active");

    wishlistBox.classList.remove("d-none");
    orderBox.classList.add("d-none");
    activityBox.classList.add("d-none");
}

function editProfileBtn() {
    epBtn.classList.add("d-none");
    scBtn.classList.remove("d-none");
    chngProPicBtn.classList.remove("d-none");
    upCnfrmPwBx.classList.remove("d-none");

    upLname.removeAttribute("readonly");
    upFname.removeAttribute("readonly");
    upEmail.removeAttribute("readonly");
    upContact.removeAttribute("readonly");
    upPassword.removeAttribute("readonly");
    upAddLine1.removeAttribute("readonly");
    upAddLine2.removeAttribute("readonly");
    upCity.removeAttribute("readonly");
    upPostalCode.removeAttribute("readonly");
    upCnfrmPassword.removeAttribute("readonly");

}

function upSaveChanges() {


    var upForm = new FormData();


    upForm.append("upLname", upLname.value);
    upForm.append("upLname", upLname.value);
    upForm.append("upFname", upFname.value);
    upForm.append("upContact", upContact.value);
    upForm.append("upEmail", upEmail.value);
    upForm.append("upPassword", upPassword.value);
    upForm.append("upCnfrmPassword", upCnfrmPassword.value);
    upForm.append("upAddline1", upAddLine1.value);
    upForm.append("upAddline2", upAddLine2.value);
    upForm.append("upCity", upCity.value);
    upForm.append("upPostalCode", upPostalCode.value);
    upForm.append("img", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;
            // alert(t);
            if (t == 'ok') {
                epBtn.classList.remove("d-none");
                scBtn.classList.add("d-none");
                chngProPicBtn.classList.add("d-none");
                upCnfrmPwBx.classList.add("d-none");

                upLname.setAttribute("readonly", "");
                upFname.setAttribute("readonly", "");
                upEmail.setAttribute("readonly", "");
                upContact.setAttribute("readonly", "");
                upPassword.setAttribute("readonly", "");
                upAddLine1.setAttribute("readonly", "");
                upAddLine2.setAttribute("readonly", "");
                upCity.setAttribute("readonly", "");
                upPostalCode.setAttribute("readonly", "");
                upCnfrmPassword.setAttribute("readonly", "");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateUserProfileProcess.php", true);
    r.send(upForm);
    // if (r.responseText == 1) {
    //     epBtn.classList.remove("d-none");
    //     scBtn.classList.add("d-none");
    //     chngProPicBtn.classList.add("d-none");
    //     upCnfrmPwBx.classList.add("d-none");

    //     upLname.setAttribute("readonly", "");
    //     upFname.setAttribute("readonly", "");
    //     upEmail.setAttribute("readonly", "");
    //     upContact.setAttribute("readonly", "");
    //     upPassword.setAttribute("readonly", "");
    //     upAddLine1.setAttribute("readonly", "");
    //     upAddLine2.setAttribute("readonly", "");
    //     upCity.setAttribute("readonly", "");
    //     upPostalCode.setAttribute("readonly", "");
    //     upCnfrmPassword.setAttribute("readonly", "");
    // }


    // console.log(upName.value);
    // console.log(upContact.value);
    // console.log(upEmail.value);
    // console.log(upPassword.value);
    // console.log(upCnfrmPassword.value);
    // console.log(upAddLine1.value);
    // console.log(upAddLine2.value);
    // console.log(upCity.value);
    // console.log(upPostalCode.value);
}

// make password visible and invisible
function revealPW() {
    var type = upPassword.type;

    if (type == "password") {
        upPassword.type = "text";
    } else {
        upPassword.type = "password"
    }
}

// make confirm password visible and invisible
function revealCnfmPW() {
    var type = upCnfrmPassword.type;

    if (type == "password") {
        upCnfrmPassword.type = "text";
    } else {
        upCnfrmPassword.type = "password"
    }
}

function profileImgUpload() {
    var img = document.getElementById("imageUploader");
    var view = document.getElementById("prev");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
    }
}

function switchHome(){
    window.location = "home.php";
}
// ====================================