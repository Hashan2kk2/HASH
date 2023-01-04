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
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});