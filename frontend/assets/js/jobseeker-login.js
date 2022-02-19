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
    //login
    var btnLogin = document.getElementById("jobseeker-login-btn");
    btnLogin.addEventListener("click", function() {
        var login_email = document.getElementById("login-user-email").value;
        var login_password = document.getElementById("login-user-password").value;

        if (login_email == '' || login_password == '') {
            alert("Please fill all the fields.");
        } else {
            var login_data = {
                js_email: login_email,
                js_password: login_password
            };

            var xhttp = new XMLHttpRequest();
            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/jobseeker/login.php"
            );
            xhttp.send(JSON.stringify(login_data));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 201) {
                    window.location.href = "/metierfind/frontend/jobseeker-findjob.php";
                } else if (this.readyState == 4 && this.status == 500) {

                } else if (this.readyState == 4 && this.status == 404) {
                    alert("No account found.");
                }
            };
        }

    });
};