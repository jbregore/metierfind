$(document).ready(function() {
    $(".view-job-btn").click(function() {
        $("#modal-view-job").fadeIn();
    });

    $("#close-view-job").click(function() {
        $("#modal-view-job").fadeOut();
    });
});

var myEmployerId = 0;
var previewNum = 0;
window.onload = function() {
    myEmployerId = 0;
    var xhttp = new XMLHttpRequest();
    //load session
    xhttp.open(
        "GET",
        "http://localhost/metierfind/backend/api/employer/session.php"
    );
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);

            document.getElementById("j_employerid").value = results.employerid;
            document.getElementById("j_name").value = results.c_name;
            document.getElementById("j_location").value = results.c_location;
            document.getElementById("j_website").value = results.c_website;
            document.getElementById("j_contactname").value = results.c_contactname;
            document.getElementById("j_mobile").value = results.c_mobile;
            document.getElementById("j_email").value = results.c_email;
            document.getElementById("j_password").value = results.c_password;
            document.getElementById("j_photo").value = results.c_photo;

            var preview = document.getElementById('my-company-profile-img');

            var cc_name = document.getElementById('text-company-name');
            var cc_location = document.getElementById('text-company-location');
            var cc_website = document.getElementById('text-company-website');
            var cc_contactname = document.getElementById('text-company-contact-name');
            var cc_mobile = document.getElementById('text-company-contact-num');
            var cc_email = document.getElementById('email-company-email');
            var cc_password = document.getElementById('password-company-password');
            var cc_password_conf = document.getElementById('password-company-conf-password');

            //fetch data 
            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/employer/fetchDetails.php"
            );
            xhttp.send(JSON.stringify({ employerid: document.getElementById("j_employerid").value }));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    myEmployerId = results.employerid;
                    preview.src = results.c_photo;
                    cc_name.value = results.c_name;
                    cc_location.value = results.c_location;
                    cc_website.value = results.c_website;
                    cc_contactname.value = results.c_contactname;
                    cc_mobile.value = results.c_mobile;
                    cc_email.value = results.c_email;
                    cc_password.value = results.c_password;
                    cc_password_conf.value = results.c_password;
                }
            };
        }
    }


};


//update
var updateDetails = document.getElementById("update-details");
updateDetails.addEventListener("click", function() {
    var compName = document.getElementById("text-company-name").value;
    var compLocation = document.getElementById("text-company-location").value;
    var compWebsite = document.getElementById("text-company-website").value;
    var compContactName = document.getElementById("text-company-contact-name").value;
    var compContactNum = document.getElementById("text-company-contact-num").value;
    var compEmail = document.getElementById("email-company-email").value;
    var compPassword = document.getElementById("password-company-password").value;
    var compConfPassword = document.getElementById("password-company-conf-password").value;



    var valid = 0;

    //validation
    if (compName == '' || compLocation == '' || compWebsite == '' || compContactName == '' ||
        compContactNum == '' || compEmail == '' || compPassword == '' || compConfPassword == '' ||
        compContactNum.length != 11) {
        valid = 0;
    } else {
        if (compPassword == compConfPassword && compContactNum.charAt(0) == '0' && compContactNum.charAt(1) == '9') {
            valid = 1;
        }
    }

    if (valid == 0) {
        window.alert("Please try Again");
    } else {

        if (confirm('Are you sure you want to update?')) {

            if (previewNum == 1) {
                var xhttp = new XMLHttpRequest();
                var compImg = document.getElementById("comp-img").files[0];
                var formData = new FormData();
                formData.append('comp-img', compImg);
                fetch('http://localhost/metierfind/backend/api/fileupload.php', { method: "POST", body: formData });

                xhttp.open(
                    "POST",
                    "http://localhost/metierfind/backend/api/fileupload.php"
                );
                xhttp.send(formData);
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        var compData = {
                            employerid: myEmployerId,
                            c_name: compName,
                            c_location: compLocation,
                            c_website: compWebsite,
                            c_contactname: compContactName,
                            c_mobile: compContactNum,
                            c_email: compEmail,
                            c_password: compPassword,
                            c_photo: results.url
                        };

                        xhttp.open(
                            "PUT",
                            "http://localhost/metierfind/backend/api/employer/update.php"
                        );
                        xhttp.send(JSON.stringify(compData));
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 201) {
                                alert("Company Successfully Updated.");
                                location.reload();
                            } else if (this.readyState == 4 && this.status == 500) {
                                // alert("Creation failed! Job Title already exist!");
                            } else if (this.readyState == 4 && this.status == 404) {
                                alert("Fields must not be empty!");
                            }
                        };
                    }
                }
            } else {
                var xhttp = new XMLHttpRequest();
                var preview = document.getElementById('my-company-profile-img');
                var compData = {
                    employerid: myEmployerId,
                    c_name: compName,
                    c_location: compLocation,
                    c_website: compWebsite,
                    c_contactname: compContactName,
                    c_mobile: compContactNum,
                    c_email: compEmail,
                    c_password: compPassword,
                    c_photo: preview.src
                };

                xhttp.open(
                    "PUT",
                    "http://localhost/metierfind/backend/api/employer/update.php"
                );
                xhttp.send(JSON.stringify(compData));
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 201) {
                        alert("Company Successfully Updated.");
                        location.reload();
                    } else if (this.readyState == 4 && this.status == 500) {
                        // alert("Creation failed! Job Title already exist!");
                    } else if (this.readyState == 4 && this.status == 404) {
                        alert("Fields must not be empty!");
                    }
                };
            }






        } else {

        }

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

function previewFile() {
    var preview = document.getElementById('my-company-profile-img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
        previewNum = 1;
    } else {
        preview.src = "";
    }
}