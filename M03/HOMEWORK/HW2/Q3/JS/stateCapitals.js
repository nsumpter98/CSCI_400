import {dynamicAJAX} from '../../../../../STATIC/TOOLS/JS/dynamicAJAX.js';


//listen for form submit
document.getElementById("StateCapitalsForm").addEventListener("submit", (event) => {
        event.preventDefault();
        submitForm();
    }
);

//listen for reset button
document.getElementById("resetButton").addEventListener("click", (event) => {
    event.preventDefault();
    document.getElementById("StateCapitalsForm").reset();
    document.getElementById("results").innerHTML = "";
    document.querySelectorAll(".check").forEach((element) => {
        element.innerHTML = "";
    });
});


let correct = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check2-circle\" viewBox=\"0 0 16 16\">\n" +
    "                        <path d=\"M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z\"/>\n" +
    "                        <path d=\"M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z\"/>\n" +
    "                    </svg>";

let incorrect = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-exclamation\" viewBox=\"0 0 16 16\">\n" +
    "  <path d=\"M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z\"/>\n" +
    "</svg>";


function submitForm() {
    let formData = new FormData(document.getElementById("StateCapitalsForm"));

    let payload = {
        states: [
            "Connecticut",
            "Maine",
            "Massachusetts",
            "New Hampshire",
            "Rhode Island",
            "Vermont"
        ],
        capitals: [
            formData.get("Connecticut").trim().toLowerCase(),
            formData.get("Maine").trim().toLowerCase(),
            formData.get("Massachusetts").trim().toLowerCase(),
            formData.get("NewHampshire").trim().toLowerCase(),
            formData.get("RhodeIsland").trim().toLowerCase(),
            formData.get("Vermont").trim().toLowerCase()
        ]
    }

    console.log("PAYLOAD: " + JSON.stringify(JSON.parse(JSON.stringify(payload)), null, 2));


    dynamicAJAX("StateCapitals.php", payload, "POST", (response) => {
            console.log("RESPONSE: " + JSON.stringify(JSON.parse(response), null, 2));
            let responseObj = JSON.parse(response);


            let percent = calculatePercentage(responseObj.results.filter((result) => result.correct).length, responseObj.results.length);
            percent = percent.toFixed(2);
            document.getElementById("results").innerHTML = `<p>You got ${percent}% correct</p>`;

            responseObj.results.forEach((result) => {
                let t = (result.state).replaceAll(' ', '');
                console.log(t);
                document.getElementById(t).innerHTML = result.correct ? correct : incorrect;
            });

        }
    );
}

//function to calculate the percentage of correct answers
function calculatePercentage(correct, total) {
    return (correct / total) * 100;
}