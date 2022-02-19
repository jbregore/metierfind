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
            console.log(results);
            document.getElementById("j_employerid").value = results.employerid;
            document.getElementById("j_name").value = results.c_name;
            document.getElementById("j_location").value = results.c_location;
            document.getElementById("j_website").value = results.c_website;
            document.getElementById("j_contactname").value = results.c_contactname;
            document.getElementById("j_mobile").value = results.c_mobile;
            document.getElementById("j_email").value = results.c_email;
            document.getElementById("j_password").value = results.c_password;
            document.getElementById("j_photo").value = results.c_photo;

            var xhttp1 = new XMLHttpRequest();
            xhttp1.open(
                "POST",
                "http://localhost/metierfind/backend/api/appliedjobs/fetchAllSavedEmployer.php"
            );
            xhttp1.send(JSON.stringify({ c_employerid: results.employerid }));
            // console.log(JSON.stringify({ c_employerid: results.c_employerid }));
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results = JSON.parse(this.response);
                    console.log(results);

                    for (let row of results) {
                        document.getElementById("fetch-jobseekers").insertAdjacentHTML(
                            "beforeend",
                            `
                            <div class="col-3">
                                <img src="${row.js_photo}" width="400px" height="270px">
                                <h2>${row.j_title}</h2>
                                <p>${row.js_name}</p>
                                <p>${row.js_mobile}</p> 
                                <p style="margin-bottom: 10px;">${row.js_email}</p>
                                <a href="${row.js_resume}"><button>View Resume</button></a>
                            </div>

                    `
                        );

                    }

                }
            }


        }
    }


};












var menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight = "0px";

function menuToggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}