$(document).ready(function() {
    $(".view-job-btn").click(function() {
        $("#modal-view-job").fadeIn();
    });

    $("#close-view-job").click(function() {
        $("#modal-view-job").fadeOut();
    });

});


window.onload = function() {

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


            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/employer/fetchDetails.php"
            );
            xhttp.send(JSON.stringify({ employerid: document.getElementById("j_employerid").value }));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);

                    document.getElementById("j_name").value = results.c_name;
                    document.getElementById("j_location").value = results.c_location;
                    document.getElementById("j_website").value = results.c_website;
                    document.getElementById("j_contactname").value = results.c_contactname;
                    document.getElementById("j_mobile").value = results.c_mobile;
                    document.getElementById("j_email").value = results.c_email;
                    document.getElementById("j_password").value = results.c_password;
                    document.getElementById("j_photo").value = results.c_photo;


                    document.getElementById("company-name").innerHTML = results.c_name;
                    document.getElementById("company-location").innerHTML = results.c_location;
                    document.getElementById("company-website").innerHTML = results.c_website;
                    document.getElementById("company-corp").innerHTML = 'More jobs at ' + results.c_website + ' Inc';

                    var preview = document.getElementById('company-img');
                    preview.src = results.c_photo;
                }
            }



            var xhttp1 = new XMLHttpRequest();
            //fetch data
            xhttp1.open(
                "POST",
                "http://localhost/metierfind/backend/api/jobs/fetchAll.php"
            );
            xhttp1.send(JSON.stringify({ c_employerid: results.employerid }));
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    for (let row of results) {
                        document.getElementById("fetch-job").insertAdjacentHTML(
                            "beforeend",
                            `

                        <div class="col-3">
                        <h1>${row.j_title.substring(0,20) + "..."}</h1>
                        <h3>${row.j_location}</h3>
                        <div class="categories-small">
                        <small>
                            ${row.j_desc.substring(0,50) + "..."}<br>
                            ${row.j_quali.substring(0,50) + "..."}
                        </small>
                        </div>
                        <div class="categories-p">
                        <p>${row.j_vacancies} VACANCIES</p>
                        <p>${row.j_type}</p>
                        </div>
                        <div class="categories-p2">
                        <p>Posted ${row.j_posted_date}</p>
                        <p>Ends at Feb 25, 2021</p>
                        </div>
                        <button id="${row.j_id}"class="view-job-btn" onclick="viewJob()">View</button> 
                    `
                        );

                    }
                }
            };
        }
    };




};

//Adding job
var postJob = document.getElementById("post-job-btn");
postJob.addEventListener("click", function() {
    // console.log(document.getElementById("j_employerid").value);
    // console.log(document.getElementById("j_name").value);

    var jobTitle = document.getElementById("text-job-title").value;

    var jobDesc1 = document.getElementById("text-job-desc1").value;
    var jobDesc2 = document.getElementById("text-job-desc2").value;
    var jobDesc3 = document.getElementById("text-job-desc3").value;
    var jobDescAll = jobDesc1 + ", " + jobDesc2 + ", " + jobDesc3;

    var jobQuali1 = document.getElementById("text-job-quali1").value;
    var jobQuali2 = document.getElementById("text-job-quali2").value;
    var jobQuali3 = document.getElementById("text-job-quali3").value;
    var jobQualiAll = jobQuali1 + ", " + jobQuali2 + ", " + jobQuali3;

    var jobVacancies = document.getElementById("text-job-vacancies").value;
    var jobLocation = document.getElementById("text-job-location").value;

    var jobType = document.getElementById("sel-job-type").value;
    var jobSalary = document.getElementById("text-job-salary").value;


    var jobData = {
        j_title: jobTitle,
        c_employerid: document.getElementById("j_employerid").value,
        c_person_name: document.getElementById("j_name").value,
        j_desc: jobDescAll,
        j_quali: jobQualiAll,
        j_vacancies: jobVacancies,
        j_location: jobLocation,
        j_type: jobType,
        j_salary: jobSalary
    };

    var valid = 0;

    //validation
    if (jobTitle == '' || jobDescAll == '' || jobQualiAll == '' || jobVacancies == '' ||
        jobLocation == '' || jobType == '' || jobSalary == '' || jobVacancies == 0 || jobSalary == 0) {
        valid = 0;
    } else {
        valid = 1;
    }

    if (valid == 0) {
        window.alert("Please try Again");
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "POST",
            "http://localhost/metierfind/backend/api/jobs/create.php"
        );
        xhttp.send(JSON.stringify(jobData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Job Successfully Posted.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Creation failed! Job Title already exist!");
            } else if (this.readyState == 4 && this.status == 404) {
                alert("Fields must not be empty!");
            }
        };
    }

});



//open update modal
var myJobId = 0;

function viewJob() {
    var xhttpview = new XMLHttpRequest();


    xhttpview.open(
        "POST",
        "http://localhost/metierfind/backend/api/employer/fetchDetails.php"
    );
    xhttpview.send(JSON.stringify({ employerid: document.getElementById("j_employerid").value }));
    xhttpview.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);


            document.getElementById("company-name-view").innerHTML = results.c_name;
            document.getElementById("company-location-view").innerHTML = results.c_location;
            document.getElementById("company-website-view").innerHTML = results.c_website;
            document.getElementById("company-corp-view").innerHTML = 'More jobs at ' + results.c_website + ' Inc';

            var preview = document.getElementById('company-img-view');
            preview.src = results.c_photo;
        }
    }















    var jobTitle = document.getElementById("text-job-title-view");

    var jobDesc1 = document.getElementById("text-job-desc1-view");
    var jobDesc2 = document.getElementById("text-job-desc2-view");
    var jobDesc3 = document.getElementById("text-job-desc3-view");
    var jobDescAll = jobDesc1 + ", " + jobDesc2 + ", " + jobDesc3;

    var jobQuali1 = document.getElementById("text-job-quali1-view");
    var jobQuali2 = document.getElementById("text-job-quali2-view");
    var jobQuali3 = document.getElementById("text-job-quali3-view");
    var jobQualiAll = jobQuali1 + ", " + jobQuali2 + ", " + jobQuali3;

    var jobVacancies = document.getElementById("text-job-vacancies-view");
    var jobLocation = document.getElementById("text-job-location-view");

    var jobType = document.getElementById("sel-job-type-view");
    var jobSalary = document.getElementById("text-job-salary-view");


    var jobData = {
        j_id: event.srcElement.id
    };

    var xhttp = new XMLHttpRequest();
    xhttp.open(
        "POST",
        "http://localhost/metierfind/backend/api/jobs/fetchOne.php"
    );
    xhttp.send(JSON.stringify(jobData));
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);

            myJobId = results.j_id;

            jobTitle.value = results.j_title;

            var strDesc = results.j_desc.split(", ");
            jobDesc1.value = strDesc[0];
            jobDesc2.value = strDesc[1];
            jobDesc3.value = strDesc[2];

            var strQuali = results.j_quali.split(", ");
            jobQuali1.value = strQuali[0];
            jobQuali2.value = strQuali[1];
            jobQuali3.value = strQuali[2];

            jobVacancies.value = results.j_vacancies;
            jobLocation.value = results.j_location;
            jobType.value = results.j_type;
            jobSalary.value = results.j_salary;


            // company details



            $("#modal-view-job").fadeIn();
        }
    };
}

//update
var updateJob = document.getElementById("update-job-btn");
updateJob.addEventListener("click", function() {

    var jobTitle = document.getElementById("text-job-title-view").value;

    var jobDesc1 = document.getElementById("text-job-desc1-view").value;
    var jobDesc2 = document.getElementById("text-job-desc2-view").value;
    var jobDesc3 = document.getElementById("text-job-desc3-view").value;
    var jobDescAll = jobDesc1 + ", " + jobDesc2 + ", " + jobDesc3;

    var jobQuali1 = document.getElementById("text-job-quali1-view").value;
    var jobQuali2 = document.getElementById("text-job-quali2-view").value;
    var jobQuali3 = document.getElementById("text-job-quali3-view").value;
    var jobQualiAll = jobQuali1 + ", " + jobQuali2 + ", " + jobQuali3;

    var jobVacancies = document.getElementById("text-job-vacancies-view").value;
    var jobLocation = document.getElementById("text-job-location-view").value;

    var jobType = document.getElementById("sel-job-type-view").value;
    var jobSalary = document.getElementById("text-job-salary-view").value;

    var jobData = {
        j_id: myJobId,
        j_title: jobTitle,
        c_employerid: document.getElementById("j_employerid").value,
        c_person_name: document.getElementById("j_name").value,
        j_desc: jobDescAll,
        j_quali: jobQualiAll,
        j_vacancies: jobVacancies,
        j_location: jobLocation,
        j_type: jobType,
        j_salary: jobSalary
    };

    var valid = 0;

    //validation
    if (jobTitle == '' || jobDescAll == '' || jobQualiAll == '' || jobVacancies == '' ||
        jobLocation == '' || jobType == '' || jobSalary == '' || jobVacancies == 0 || jobSalary == 0) {
        valid = 0;
    } else {
        valid = 1;
    }

    if (valid == 0) {
        window.alert("Please try Again");
    } else {

        if (confirm('Are you sure you want to update?')) {
            var xhttp = new XMLHttpRequest();
            xhttp.open(
                "PUT",
                "http://localhost/metierfind/backend/api/jobs/update.php"
            );
            xhttp.send(JSON.stringify(jobData));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 201) {
                    alert("Job Successfully Updated.");
                    location.reload();
                } else if (this.readyState == 4 && this.status == 500) {
                    alert("Creation failed! Job Title already exist!");
                } else if (this.readyState == 4 && this.status == 404) {
                    alert("Fields must not be empty!");
                }
            };
        } else {

        }

    }

});


//delete
var deleteJob = document.getElementById("delete-job-btn");
deleteJob.addEventListener("click", function() {


    if (confirm('Are you sure you want to delete?')) {
        var jobData = {
            j_id: myJobId
        };

        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "DELETE",
            "http://localhost/metierfind/backend/api/jobs/delete.php"
        );
        xhttp.send(JSON.stringify(jobData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Job Successfully Deleted.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Creation failed! Job Title already exist!");
            } else if (this.readyState == 4 && this.status == 404) {
                alert("Fields must not be empty!");
            }
        };

    } else {

    }

});



//nav toggle
var menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight = "0px";

function menuToggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}