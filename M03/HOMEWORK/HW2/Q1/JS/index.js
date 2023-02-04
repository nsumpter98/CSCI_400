import {dynamicAJAX} from '../../../../../STATIC/TOOLS/JS/dynamicAJAX.js';

document.getElementById("ArraysAndFunctionsForm").addEventListener("submit", (event) => {
    event.preventDefault();
    submitForm();
});


function submitForm() {
    let formData = new FormData(document.getElementById("ArraysAndFunctionsForm"));

    let payload = {
        courseID: formData.get("courseID").trim().toUpperCase()
    };

    console.log("PAYLOAD: " + JSON.stringify(JSON.parse(JSON.stringify(payload)), null, 2));

    dynamicAJAX("ArraysAndFunctions.php", payload, "POST", (response) => {
            console.log("RESPONSE: " + JSON.stringify(JSON.parse(response), null, 2));
            let responseObj = JSON.parse(response);

            let responseString = responseObj.results.exists ? "This course is available!" : "This course is not available.";

            document.getElementById("results").innerHTML = `<h3>${responseString}</h3>`;
        }
    );
}