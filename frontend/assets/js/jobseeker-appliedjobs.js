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
                "POST",
                "http://localhost/metierfind/backend/api/appliedjobs/fetchAllSaved.php"
            );
            xhttp1.send(JSON.stringify({ js_id: document.getElementById("js_id").value }));
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    console.log(results);
                    for (let row of results) {
                        var strDesc = row.j_desc.split(", ");
                        var strQuali = row.j_quali.split(", ");
                        document.getElementById("fetch-saved").insertAdjacentHTML(
                            "beforeend",
                            `
                            <div class="row">
                            <div class="col-70">
                                <h1>${row.j_title}</h1>
                                <h2>Job Description</h2>
                                <ul>
                                    <li>- ${strDesc[0]}</li>
                                    <li>- ${strDesc[1]}</li>
                                    <li>- ${strDesc[2]}</li>
                                </ul>
                                <h2>Job Qualifications</h2>
                                <ul>
                                    <li>- ${strQuali[0]}</li>
                                    <li>- ${strQuali[1]}</li>
                                    <li>- ${strQuali[2]}</li>
                                </ul>
                                <h2>Additional Details</h2>
                                <div class="additional-details">
                                    <p>Vacancies : <span>${row.j_vacancies}</span></p>
                                    <p>Location : <span>${row.j_location}</span></p>
                                    <p>Job Type : <span>${row.j_type}</span></p>
                                </div>
                            </div>

                            <div class="col-30">
                                <img src="${row.c_photo}" width="200px">
                                <h1>${row.c_name}</h1>
                                <h2>${row.c_location}</h2>
                                <p><i class="fa fa-clipboard"></i>${row.j_posted_date}</p> 
                                <p><i class="fa fa-globe "></i>${row.c_website}</p>
                                <p><i class="fa fa-search"></i>More Jobs at ${row.c_website} Inc</p>
                                <h1 class="salary" style="color: #ff3e97;">Php ${row.j_salary}</h1> 
                                <div class="buttons">
                                    <button class="remove-job-btn" id="${row.j_id}" onclick="RemoveJob()">Remove</button><br>
                                </div>
                            </div>
                            </div>
                            `
                        );


                    }

                }
            }


        }
    }
}

function RemoveJob() {
    var RemoveData = {
        js_id: document.getElementById("js_id").value,
        j_id: event.srcElement.id
    };

    if (confirm('Are you sure you want to remove this job ?')) {

        var xhttp = new XMLHttpRequest();
        xhttp.open(
            "DELETE",
            "http://localhost/metierfind/backend/api/appliedjobs/delete.php"
        );
        xhttp.send(JSON.stringify(RemoveData));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                alert("Job successfully remove.");
                location.reload();
            } else if (this.readyState == 4 && this.status == 500) {
                alert("Job already remove");
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

var menuItems = document.getElementById("menuItems");

menuItems.style.maxHeight = "0px";

function menuToggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}