$(document).ready(function() {

    $("#login-employer").click(function() {
        $('#modal-login').fadeIn();
    });

    $("#close-login").click(function() {
        $('#modal-login').fadeOut();
    });


});


var jobseekerRegBtn = document.getElementById("jobseeker-reg-btn");
jobseekerRegBtn.addEventListener("click", function() {

    var txtJobseekerName = document.getElementById("reg-jobseeker-name").value;
    var txtJobseekerMobile = document.getElementById("reg-jobseeker-mobile").value;
    var txtJobseekerEmail = document.getElementById("reg-jobseeker-email").value;
    var txtJobseekerPassword = document.getElementById("reg-jobseeker-password").value;
    var txtJobseekerConfPassword = document.getElementById("reg-jobseeker-conf-password").value;


    var JobseekerData = {
        js_name: txtJobseekerName,
        js_mobile: txtJobseekerMobile,
        js_email: txtJobseekerEmail,
        js_password: txtJobseekerPassword,
        js_photo: ""
    };

    var valid = 0;

    //validation
    if (txtJobseekerName == '' || txtJobseekerMobile == '' ||
        txtJobseekerEmail == '' || txtJobseekerPassword == '' ||
        txtJobseekerMobile.length != 11
    ) {
        valid = 0;
    } else {
        if (txtJobseekerPassword == txtJobseekerConfPassword && txtJobseekerMobile.charAt(0) == '0' && txtJobseekerMobile.charAt(1) == '9') {
            valid = 1;
        }
    }

    if (valid == 0) {
        window.alert("Please try Again");
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "POST",
            "http://localhost/metierfind/backend/api/jobseeker/create.php"
        );
        xhttp.send(JSON.stringify(JobseekerData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                let results = JSON.parse(this.response);
                alert("Registered Successfully you can now Login");
                window.location.href = "/metierfind/frontend/index.php";
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Creation failed! Email already exist!");
            } else if (this.readyState == 4 && this.status == 404) {
                alert("Fields must not be empty!");
            }
        };
    }
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