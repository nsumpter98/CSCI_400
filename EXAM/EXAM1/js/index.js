import {dynamicAJAX} from "../../../STATIC/TOOLS/JS/dynamicAJAX.js";

//going to validate the table name on the serverside to prevent sql injection
let currentlySelected = "";
let ok = false;

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

function generateTable(result) {
    //remove any existing table
    if (document.getElementById("resultsTable")) {
        document.getElementById("resultsTable").remove();
    }


    let table = document.createElement("table");
    table.setAttribute("id", "resultsTable");
    table.setAttribute("class", "table table-striped")
    document.getElementById("response").appendChild(table);

    //create table header
    let header = document.createElement("tr");
    header.setAttribute("id", "header");
    header.setAttribute("class", "thead-dark");
    document.getElementById("resultsTable").appendChild(header);

    //create table body
    let body = document.createElement("tbody");
    body.setAttribute("id", "body");
    body.setAttribute("class", "table-striped");
    document.getElementById("resultsTable").appendChild(body);

    //create table footer
    let footer = document.createElement("tr");
    footer.setAttribute("id", "footer");
    footer.setAttribute("class", "thead-dark");
    document.getElementById("resultsTable").appendChild(footer);

    //create table header cells
    let headerCells = [];
    for (let i = 0; i < Object.keys(result[0]).length; i++) {
        headerCells[i] = document.createElement("th");
        headerCells[i].innerHTML = Object.keys(result[0])[i];
        document.getElementById("header").appendChild(headerCells[i]);
    }

    //create table body rows
    let bodyRows = [];
    for (let i = 0; i < result.length; i++) {
        bodyRows[i] = document.createElement("tr");
        bodyRows[i].setAttribute("id", "row" + i);
        document.getElementById("body").appendChild(bodyRows[i]);
    }

    //create table body cells
    let bodyCells = [];
    for (let i = 0; i < result.length; i++) {
        for (let j = 0; j < Object.keys(result[0]).length; j++) {
            bodyCells[j] = document.createElement("td");
            bodyCells[j].innerHTML = Object.values(result[i])[j];
            document.getElementById("row" + i).appendChild(bodyCells[j]);
        }
    }



}

form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (ok) {

        let input = document.getElementById(currentlySelected).value;


        dynamicAJAX(
            "lab3.php",
            {input: {table: currentlySelected, dropdownValue: input}},
            "POST",
            function (response) {
                response = JSON.parse(response);
                console.log(response);

                generateTable(response.result);
            }
        );
    }


});