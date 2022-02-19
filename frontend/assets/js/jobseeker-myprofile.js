var previewNum = 0;
window.onload = function() {

    var xhttp = new XMLHttpRequest();
    //load session
    xhttp.open(
        "GET",
        "http://localhost/metierfind/backend/api/jobseeker/session.php"
    );
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);
            document.getElementById("js_id").value = results.js_id;
            console.log(document.getElementById("js_id").value);

            //fetch data 
            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/jobseeker/fetchDetails.php"
            );
            xhttp.send(JSON.stringify({ js_id: document.getElementById("js_id").value }));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    console.log(results);

                    //mainprofile
                    document.getElementById("my-profile-img").src = results.js_photo;
                    document.getElementById("my-profile-name").innerHTML = results.js_name;
                    document.getElementById("my-profile-number").innerHTML = results.js_mobile;
                    document.getElementById("my-profile-email").innerHTML = results.js_email;


                    //job preferences
                    if (results.js_jp_availability == '') {

                    } else {
                        document.querySelector('#prefer-checkbox').checked = true;
                    }

                    if (results.js_jp_job_type == '') {

                    } else if (results.js_jp_job_type == 'Full Time') {
                        document.querySelector('#fulltime-prefer').checked = true;
                    } else if (results.js_jp_job_type == 'Part Time') {
                        document.querySelector('#parttime-prefer').checked = true;
                    } else if (results.js_jp_job_type == 'Contract') {
                        document.querySelector('#contract-prefer').checked = true;
                    }

                    var strDesc = results.js_jp_expected_sal.split(",");
                    document.getElementById("expected-prefer").value = strDesc[0];

                    if (strDesc[1] == 'per hour') {
                        document.getElementById("per-prefer").value = strDesc[1];
                    } else if (strDesc[1] == 'per day') {
                        document.getElementById("per-prefer").value = strDesc[1];
                    } else if (strDesc[1] == 'per week') {
                        document.getElementById("per-prefer").value = strDesc[1];
                    } else if (strDesc[1] == 'per month') {
                        document.getElementById("per-prefer").value = strDesc[1];
                    }

                    //about me
                    document.getElementById("about-me-email").value = results.js_email;
                    document.getElementById("about-me-number").value = results.js_mobile;
                    document.getElementById("about-me-name").value = results.js_name;
                    document.getElementById("about-me-education").value = results.js_am_highest_education;
                    if (results.js_am_gender == "Male") {
                        document.querySelector('#about-me-male').checked = true;
                    } else if (results.js_am_gender == "Female") {
                        document.querySelector('#about-me-female').checked = true;
                    }

                    var current_date = results.js_am_birthday;
                    console.log(results.js_am_birthday);
                    document.getElementById("about-me-birthday").value = current_date.substring(0, 10);
                    document.getElementById("about-me-intro").value = results.js_am_introduce;

                    document.getElementById("view-resume").href = results.js_resume;


                }
            };
        }
    }
}


//change profile 
var changeProfile = document.getElementById("change-profile");
changeProfile.addEventListener("click", function() {

    if (confirm('Are you sure you want to update changes?')) {

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
                    console.log(results);
                    var jobseekerData = {
                        js_id: document.getElementById("js_id").value,
                        js_photo: results.url
                    };

                    console.log(JSON.stringify(jobseekerData));

                    xhttp.open(
                        "PUT",
                        "http://localhost/metierfind/backend/api/jobseeker/updatePhoto.php"
                    );
                    xhttp.send(JSON.stringify(jobseekerData));
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 201) {
                            alert("Profile Updated.");
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

        }
    } else {

    }

});

//update prefer 
var updatePrefer = document.getElementById("update-prefer");
updatePrefer.addEventListener("click", function() {

    var js_jp_availability = "";
    if (document.querySelector('#prefer-checkbox').checked == false) {
        js_jp_availability = '';
    } else {
        js_jp_availability = 'YES';
    }

    var js_jp_job_type = "";
    if (document.querySelector('#fulltime-prefer').checked == true) {

    } else if (document.querySelector('#parttime-prefer').checked == true) {
        js_jp_job_type = "Part Time";
    } else if (document.querySelector('#contract-prefer').checked == true) {
        js_jp_job_type = "Contract";
    }

    var js_jp_expected_sal = "";
    js_jp_expected_sal = document.getElementById("expected-prefer").value + "," +
        document.getElementById("per-prefer").value;

    if (confirm('Are you sure you want to update changes?')) {
        var jobseekerData = {
            js_id: document.getElementById("js_id").value,
            js_jp_availability: js_jp_availability,
            js_jp_job_type: js_jp_job_type,
            js_jp_expected_sal: js_jp_expected_sal

        }
        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "PUT",
            "http://localhost/metierfind/backend/api/jobseeker/updatePrefer.php"
        );
        xhttp.send(JSON.stringify(jobseekerData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Profile Updated.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                // alert("Creation failed! Job Title already exist!");
            } else if (this.readyState == 4 && this.status == 404) {
                alert("Fields must not be empty!");
            }
        };

    } else {

    }

});

//update about me
var updateAboutMe = document.getElementById("update-about-me");
updateAboutMe.addEventListener("click", function() {

    const isValidEmail = document.getElementById("about-me-email").checkValidity();
    if (isValidEmail) {
        var valid = 0;
        var myEmail = document.getElementById("about-me-email").value;
        var myNumber = document.getElementById("about-me-number").value;
        var myName = document.getElementById("about-me-name").value;

        //validation
        if (myEmail == '' || myNumber == '' || myName == '' || myNumber.length != 11) {
            valid = 0;
        } else {
            if (myNumber.charAt(0) == '0' && myNumber.charAt(1) == '9') {
                valid = 1;
            }
        }

        if (valid == 0) {
            alert("Please try again");
        } else {


            if (confirm('Are you sure you want to update changes?')) {

                var gender = "";
                if (document.querySelector('#about-me-male').checked == true) {
                    gender = "Male";
                } else if (document.querySelector('#about-me-female').checked == true) {
                    gender = "Female";
                }

                var jobseekerData = {
                    js_id: document.getElementById("js_id").value,
                    js_email: document.getElementById("about-me-email").value,
                    js_mobile: document.getElementById("about-me-number").value,
                    js_name: document.getElementById("about-me-name").value,
                    js_am_highest_education: document.getElementById("about-me-education").value,
                    js_am_gender: gender,
                    js_am_birthday: document.getElementById("about-me-birthday").value,
                    js_am_introduce: document.getElementById("about-me-intro").value
                }

                console.log(jobseekerData);

                var xhttp = new XMLHttpRequest();
                xhttp.open(
                    "PUT",
                    "http://localhost/metierfind/backend/api/jobseeker/updateAboutMe.php"
                );
                xhttp.send(JSON.stringify(jobseekerData));
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 201) {
                        alert("Profile Updated.");
                        location.reload();
                    } else if (this.readyState == 4 && this.status == 400) {
                        alert("Update failed!");
                    } else if (this.readyState == 4 && this.status == 404) {
                        alert("Fields must not be empty!");
                    }
                };

            } else {

            }
        }
    } else {
        alert("Please try again");
    }


});



//update-resume
var updateResume = document.getElementById("update-resume");
updateResume.addEventListener("click", function() {


    if (confirm('Are you sure you want to update changes?')) {
        var compImg = document.getElementById("comp-img-file").files[0];
        var formData = new FormData();
        formData.append('comp-img-file', compImg);
        fetch('http://localhost/metierfind/backend/api/fileupload-docs.php', { method: "POST", body: formData });

        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "POST",
            "http://localhost/metierfind/backend/api/fileupload-docs.php"
        );
        xhttp.send(formData);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let results = JSON.parse(this.response);

                var jobseekerData = {
                    js_id: document.getElementById("js_id").value,
                    js_resume: results.url
                };

                xhttp.open(
                    "PUT",
                    "http://localhost/metierfind/backend/api/jobseeker/updateResume.php"
                );
                xhttp.send(JSON.stringify(jobseekerData));

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.readyState == 4 && this.status == 201) {
                            alert("Profile Updated.");
                            location.reload();
                        } else if (this.readyState == 4 && this.status == 400) {
                            alert("Update failed!");
                        } else if (this.readyState == 4 && this.status == 404) {
                            alert("Fields must not be empty!");
                        }
                    }
                }

            }
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
    var preview = document.getElementById('my-profile-img');
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