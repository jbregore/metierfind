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
        "http://localhost/metierfind/backend/api/jobseeker/session.php"
    );
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);
            document.getElementById("js_id").value = results.js_id;

            var xhttp1 = new XMLHttpRequest();
            xhttp1.open(
                "GET",
                "http://localhost/metierfind/backend/api/jobs/fetchAllFullTime.php"
            );
            xhttp1.send();
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
    }
}


function viewFullTime() {
    type1.style.color = '#fff';
    type1.style.border = '1px solid #05a9db';
    type1.style.backgroundColor = '#05a9db';

    type2.style.color = '#05a9db';
    type2.style.border = '1px solid #05a9db';
    type2.style.backgroundColor = '#fff';

    type3.style.color = '#05a9db';
    type3.style.border = '1px solid #05a9db';
    type3.style.backgroundColor = '#fff';

    var xhttp1 = new XMLHttpRequest();
    xhttp1.open(
        "GET",
        "http://localhost/metierfind/backend/api/jobs/fetchAllFullTime.php"
    );
    xhttp1.send();
    xhttp1.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);
            console.log(results);
            document.getElementById("fetch-job").innerHTML = '';
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

function viewPartTime() {
    type1.style.color = '#05a9db';
    type1.style.border = '1px solid #05a9db';
    type1.style.backgroundColor = '#fff';

    type2.style.color = '#fff';
    type2.style.border = '1px solid #05a9db';
    type2.style.backgroundColor = '#05a9db';

    type3.style.color = '#05a9db';
    type3.style.border = '1px solid #05a9db';
    type3.style.backgroundColor = '#fff';

    var xhttp1 = new XMLHttpRequest();
    xhttp1.open(
        "GET",
        "http://localhost/metierfind/backend/api/jobs/fetchAllPartTime.php"
    );
    xhttp1.send();
    xhttp1.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);
            document.getElementById("fetch-job").innerHTML = '';
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

function viewContract() {
    type1.style.color = '#05a9db';
    type1.style.border = '1px solid #05a9db';
    type1.style.backgroundColor = '#fff';

    type2.style.color = '#05a9db';
    type2.style.border = '1px solid #05a9db';
    type2.style.backgroundColor = '#fff';

    type3.style.color = '#fff';
    type3.style.border = '1px solid #05a9db';
    type3.style.backgroundColor = '#05a9db';

    var xhttp1 = new XMLHttpRequest();
    xhttp1.open(
        "GET",
        "http://localhost/metierfind/backend/api/jobs/fetchAllContract.php"
    );
    xhttp1.send();
    xhttp1.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.response);

            document.getElementById("fetch-job").innerHTML = '';
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


function viewJob() {



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


    var compImg = document.getElementById("comp-img-view");
    var compName = document.getElementById("comp-name-view");
    var compLocation = document.getElementById("comp-location-view");
    var postedDate = document.getElementById("posted-date");
    var compSite = document.getElementById("comp-site-view");
    var compSite2 = document.getElementById("comp-site-view-more");

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
            console.log(results);
            myJobId = results.j_id;

            jobTitle.innerHTML = results.j_title;

            var strDesc = results.j_desc.split(", ");
            jobDesc1.innerHTML = "- " + strDesc[0];
            jobDesc2.innerHTML = "- " + strDesc[1];
            jobDesc3.innerHTML = "- " + strDesc[2];

            var strQuali = results.j_quali.split(", ");
            jobQuali1.innerHTML = "- " + strQuali[0];
            jobQuali2.innerHTML = "- " + strQuali[1];
            jobQuali3.innerHTML = "- " + strQuali[2];

            jobVacancies.innerHTML = results.j_vacancies;
            jobLocation.innerHTML = results.j_location;
            jobType.innerHTML = results.j_type;
            jobSalary.innerHTML = "Php " + results.j_salary;

            postedDate.innerHTML = '<i class="fa fa-clipboard"> ' + results.j_posted_date;

            xhttp.open(
                "POST",
                "http://localhost/metierfind/backend/api/employer/fetchDetails.php"
            );
            xhttp.send(JSON.stringify({ employerid: results.c_employerid }));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    console.log(results);

                    compImg.src = results.c_photo;
                    compName.innerHTML = results.c_name;
                    compLocation.innerHTML = results.c_location;
                    compSite.innerHTML = '<i class="fa fa-globe"> ' + results.c_website;
                    compSite2.innerHTML = '<i class="fa fa-search"> More jobs at ' + results.c_website + " Inc";

                    document.getElementById("fetch-button").innerHTML = '';
                    document.getElementById("fetch-button").insertAdjacentHTML(
                        "beforeend",
                        `
    
                            <button class="save-job-btn" id="${myJobId}" onclick="SaveJob()">Save</button><br>
                            <button class="apply-job-btn" id="${myJobId}" onclick="ApplyJob()">Apply Now</button>
                           
                        `
                    );

                }
            }


            // company details



            $("#modal-view-job").fadeIn();
        }
    };
}


function SaveJob() {
    var SaveData = {
        js_id: document.getElementById("js_id").value,
        j_id: event.srcElement.id
    };

    if (confirm('Are you sure you want to save this job for later?')) {

        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "POST",
            "http://localhost/metierfind/backend/api/savedjobs/create.php"
        );
        xhttp.send(JSON.stringify(SaveData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Job successfully saved.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Job already saved");
                location.reload();
            } else if (this.readyState == 4 && this.status == 404) {
                // alert("Fields must not be empty!");
            }
        };

        // window.alert("Application sent");
        // location.reload(true);
    } else {

    }


}

function ApplyJob() {
    var ApplyData = {
        js_id: document.getElementById("js_id").value,
        j_id: event.srcElement.id
    };

    if (confirm('Are you sure you want to apply for this job ?')) {

        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "POST",
            "http://localhost/metierfind/backend/api/appliedjobs/create.php"
        );
        xhttp.send(JSON.stringify(ApplyData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Job successfully applied.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Job already applied");
                location.reload();
            } else if (this.readyState == 4 && this.status == 404) {
                // alert("Fields must not be empty!");
            }
        };

        // window.alert("Application sent");
        // location.reload(true);
    } else {

    }


}

// //apply btn
// document.querySelector('.apply-job-btn').onclick = function() {
//     if (confirm('Are you sure you want to apply for this job?')) {
//         window.alert("Application sent");
//         location.reload(true);
//     } else {

//     }
// };


// //save btn
// document.querySelector('.save-job-btn').onclick = function() {
//     if (confirm('Are you sure you want to save this job for later?')) {
//         window.alert("Job has been saved");
//         location.reload(true);
//     } else {

//     }
// };



//nav
var menuItems = document.getElementById("menuItems");

menuItems.style.maxHeight = "0px";

function menuToggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}