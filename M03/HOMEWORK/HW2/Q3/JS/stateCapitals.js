import { dynamicAJAX } from '../../../../../STATIC/TOOLS/JS/dynamicAJAX.js';


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
});



function submitForm(){
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


    }
    );
}

//function to calculate the percentage of correct answers
function calculatePercentage(correct, total){
    return (correct/total)*100;
}