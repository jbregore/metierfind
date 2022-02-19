$(document).ready(function() {
    $("#login-employer").click(function() {
        $("#modal-login").fadeIn();
    });

    $("#close-login").click(function() {
        $("#modal-login").fadeOut();
    });
});

var menuItems = document.getElementById("menuItems");

menuItems.style.maxHeight = "0px";

function menuToggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}

window.onload = function() {
    //Adding Employer

    var btnRegister = document.getElementById("btnRegister");

    btnRegister.addEventListener("click", function() {
        var txtcName = document.getElementById("login-employer-company-name").value;
        var txtcLocation = document.getElementById("login-employer-company-location").value;
        var txtcWebsite = document.getElementById("login-employer-company-site").value;
        var txtcContact = document.getElementById("login-employer-name").value;
        var txtcMobile = document.getElementById("login-employer-mobile").value;
        var txtcEmail = document.getElementById("login-user-username").value;
        var txtcPass = document.getElementById("login-user-password").value;
        var txtcPassConf = document.getElementById("login-user-conf-password").value;


        var EmployerData = {
            c_name: txtcName,
            c_location: txtcLocation,
            c_website: txtcWebsite,
            c_contactname: txtcContact,
            c_mobile: txtcMobile,
            c_email: txtcEmail,
            c_password: txtcPass,
        };

        var valid = 0;

        //validation
        if (txtcName == '' || txtcLocation == '' || txtcWebsite == '' || txtcContact == '' ||
            txtcMobile == '' || txtcEmail == '' || txtcPass == '' || txtcPass != txtcPassConf ||
            txtcMobile.length != 11
        ) {
            valid = 0;
        } else {
            if (txtcPass == txtcPassConf && txtcMobile.charAt(0) == '0' && txtcMobile.charAt(1) == '9') {
                valid = 1;
            }
        }

        if (valid == 0) {
            window.alert("Please try Again");
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/employer/create.php"
            );
            xhttp.send(JSON.stringify(EmployerData));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 201) {
                    alert("Record Added Successfully!");
                    window.location.href = "/metierfind/frontend/employer-site.php";
                } else if (this.readyState == 4 && this.status == 500) {
                    alert("Creation failed!");
                } else if (this.readyState == 4 && this.status == 404) {
                    alert("Fields must not be empty!");
                }
            };
        }




    });

    //login
    var btnLogin = document.getElementById("login");
    btnLogin.addEventListener("click", function() {
        var login_email = document.getElementById("employer-email-username").value;
        var login_password = document.getElementById("employer-pass-password").value;

        if (login_email == '' || login_password == '') {
            alert("Please fill all the fields.");
        } else {
            var login_data = {
                login_email: login_email,
                login_password: login_password
            };

            var xhttp = new XMLHttpRequest();
            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/employer/login.php"
            );
            xhttp.send(JSON.stringify(login_data));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 201) {
                    window.location.href = "/metierfind/frontend/employer-create-job.php";
                } else if (this.readyState == 4 && this.status == 500) {

                } else if (this.readyState == 4 && this.status == 404) {
                    alert("No account found.");
                }
            };
        }

    });

};