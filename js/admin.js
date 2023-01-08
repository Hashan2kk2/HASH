
function adminLogIn() {
    var email = document.getElementById("adminEmail");
    var password = document.getElementById("adminPassword");

    var f = new FormData();

    f.append("email", email.value);
    f.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 'exist') {
                window.location = 'adminDashboard.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminLoginProcess.php", true);
    r.send(f);
}

// side nav
(function ($) {

    "use strict";

    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

})(jQuery);

// profile pic update
// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
//             $('#imagePreview').hide();
//             $('#imagePreview').fadeIn(650);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $("#imageUpload").change(function () {
//     readURL(this);
// });

function profileImgUploadAdmin() {
    var img = document.getElementById("imageUploadAdmin");
    var view = document.getElementById("avatarPreview");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
        console.log(url);
    }
}

// Edit Profile

function editProfile() {
    var fname = document.getElementById("fName");
    var lname = document.getElementById("lName");
    var email = document.getElementById("email");
    var contact = document.getElementById("contact");
    var profDetails = document.getElementById("profileDetails");
    var editProfDetails = document.getElementById("editProfileDetails");
    var editProfPic = document.getElementById("profilePicEdit");
    console.log("ok");

    profDetails.classList.toggle("d-none");
    editProfDetails.classList.toggle("d-none");
    editProfPic.classList.remove("d-none");
    fname.removeAttribute('readonly');
    lname.removeAttribute('readonly');
    email.removeAttribute('readonly');
    contact.removeAttribute('readonly');
    Swal.fire('You can Edit your profile now.');
}

function adminSaveChanges() {

    var fname = document.getElementById("fName");
    var lname = document.getElementById("lName");
    var email = document.getElementById("email");
    var contact = document.getElementById("contact");
    var profPic = document.getElementById("imageUploadAdmin");

    console.log(fname.value);
    console.log(lname.value);
    console.log(email.value);
    console.log(contact.value);
    console.log(profPic.files[0]);
    // upForm.append("img", img.files[0]);


    var adminUpdateForm = new FormData();
    adminUpdateForm.append("fname", fname.value);
    adminUpdateForm.append("lname", lname.value);
    adminUpdateForm.append("email", email.value);
    adminUpdateForm.append("contact", contact.value);
    adminUpdateForm.append("profPic", profPic.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            let t = req.responseText;

            if (t == "Success") {
                setTimeout(() => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Profile has been Updated',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }, 5000);
                window.location = "adminUserProfile.php";
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: t,
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        }
    }

    req.open("POST", "../admin/updateAdminProfileProcess.php", true);
    req.send(adminUpdateForm);
}

function revealOldPwAdmin() {
    var oldpw = document.getElementById("adminOldPw");
    var adminOldPwBtn = document.getElementById("adminOldPwBtn");
    var type = oldpw.type;

    if (type == "password") {
        oldpw.type = "text";
        adminOldPwBtn.innerHTML = "Hide";
    } else {
        oldpw.type = "password";
        adminOldPwBtn.innerHTML = "Show";
    }
}

function revealNewPwAdmin() {
    var newpw = document.getElementById("adminNewPw");
    var adminNewPwBtn = document.getElementById("adminNewPwBtn");
    var type = newpw.type;

    if (type == "password") {
        newpw.type = "text";
        adminNewPwBtn.innerHTML = "Hide";
    } else {
        newpw.type = "password";
        adminNewPwBtn.innerHTML = "Show";
    }
}
function revealCnfmPwAdmin() {
    var cnfmpw = document.getElementById("adminCnfmPw");
    var adminCnfmPwBtn = document.getElementById("adminCnfmPwBtn");
    var type = cnfmpw.type;

    if (type == "password") {
        cnfmpw.type = "text";
        adminCnfmPwBtn.innerHTML = "Hide";
    } else {
        cnfmpw.type = "password";
        adminCnfmPwBtn.innerHTML = "Show";
    }
}

function updateAdminPassword() {
    var oldpw = document.getElementById("adminOldPw");
    var newpw = document.getElementById("adminNewPw");
    var cnfmpw = document.getElementById("adminCnfmPw");

    var pwForm = new FormData();

    pwForm.append("oldPw", oldpw.value);
    pwForm.append("newPw", newpw.value);
    pwForm.append("cnfmPw", cnfmpw.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;

            if (t != "Success") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your Password Changed Successfully'
                });
            }
        }
    }

    r.open("POST", "../admin/updateAdminPasswordProcess.php", true);
    r.send(pwForm);
}

function addNewProductPg() {
    var overviewPg = document.getElementById("overviewPg");
    var addproductPg = document.getElementById("addproductPg");

    overviewPg.classList.add("d-none");
    addproductPg.classList.remove("d-none");
}

function productOverviewPg() {
    var overviewPg = document.getElementById("overviewPg");
    var addproductPg = document.getElementById("addproductPg");

    overviewPg.classList.remove("d-none");
    addproductPg.classList.add("d-none");
}

// Edit Profile

// add Product

function productImgUpload1() {
    var img = document.getElementById("pImgUpload1");
    var view = document.getElementById("img1Prev");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
        console.log(url);
    }
}
function productImgUpload2() {
    var img = document.getElementById("pImgUpload2");
    var view = document.getElementById("img2Prev");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
        console.log(url);
    }
}
function productImgUpload3() {
    var img = document.getElementById("pImgUpload3");
    var view = document.getElementById("img3Prev");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
        console.log(url);
    }
}
function productImgUpload4() {
    var img = document.getElementById("pImgUpload4");
    var view = document.getElementById("img4Prev");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
        console.log(url);
    }
}


function addProduct() {
    let prodName = document.getElementById("prodName");
    let category = document.getElementById("category");
    let type = document.getElementById("type");
    let brand = document.getElementById("brand");
    let prodDescription = document.getElementById("prodDescription");
    let pImgUpload1 = document.getElementById("pImgUpload1");
    let pImgUpload2 = document.getElementById("pImgUpload2");
    let pImgUpload3 = document.getElementById("pImgUpload3");
    let pImgUpload4 = document.getElementById("pImgUpload4");
    let prodPrice = document.getElementById("prodPrice");
    let deliveryCost = document.getElementById("deliveryCost");
    let date = document.getElementById("date");
    let qty = document.getElementById("prodQty");

    let img1 = document.getElementById("img1Prev");
    let img2 = document.getElementById("img2Prev");
    let img3 = document.getElementById("img3Prev");
    let img4 = document.getElementById("img4Prev");

    let addProdForm = new FormData();

    addProdForm.append("pName", prodName.value);
    addProdForm.append("pCat", category.value);
    addProdForm.append("pType", type.value);
    addProdForm.append("pBrand", brand.value);
    addProdForm.append("pDesc", prodDescription.value);
    addProdForm.append("pImg1", pImgUpload1.files[0]);
    addProdForm.append("pImg2", pImgUpload2.files[0]);
    addProdForm.append("pImg3", pImgUpload3.files[0]);
    addProdForm.append("pImg4", pImgUpload4.files[0]);
    addProdForm.append("pPrice", prodPrice.value);
    addProdForm.append("pDelCost", deliveryCost.value);
    addProdForm.append("pDate", date.value);
    addProdForm.append("prodQty", qty.value);

    let r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let text = r.responseText;

            if (text == "OK") {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Product Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                // window.location = "addProduct.php";
                prodName.value="";
                category.value=0;
                type.value=0;
                brand.value=0;
                prodDescription.value="";
                img1.src="../img/addImage.svg";
                img2.src="../img/addImage.svg";
                img3.src="../img/addImage.svg";
                img4.src="../img/addImage.svg";
                prodPrice.value="";
                deliveryCost.value="";
                qty.value="";
            } else {
                Swal.fire(
                    'Warning',
                    text,
                    'question'
                )
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(addProdForm);

}

// add Product