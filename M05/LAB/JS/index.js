import {dynamicAJAX} from "../../../STATIC/TOOLS/JS/dynamicAJAX.js";

//going to validate the table name on the serverside to prevent sql injection
let currentlySelected = "";
let ok = false;


let payload = {
    input: {
        table: "books",
        dropdownValue: "title"
    }

};

document.getElementById("books").addEventListener("change", function (e) {
    document.getElementById("authors").value = 0;
    currentlySelected = "books";
    ok = true;
});

document.getElementById("authors").addEventListener("change", function (e) {
    document.getElementById("books").value = 0;
    currentlySelected = "authors";
    ok = true;
});


let form = document.getElementById("sqlForm");

form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (ok) {

        let input = document.getElementById(currentlySelected).value;


        const t = {
            input: {
                table: currentlySelected,
                dropdownValue: input
            }
        };
        console.log(t);


        dynamicAJAX(
            "lab3.php",
            {input: {table: currentlySelected, dropdownValue: input}},
            "POST",
            function (response) {
                response = JSON.parse(response);
                console.log(response);
                if (response.valid) {
                    document.getElementById("response").innerHTML = response;
                } else {
                    document.getElementById("response").innerHTML = response;
                }
            }
        );
    }


});