import { dynamicAJAX } from '../../../../../STATIC/TOOLS/JS/dynamicAJAX.js';


//listen for form submit
document.getElementById("StateCapitalsForm").addEventListener("submit", (event) => {
    event.preventDefault();
    submitForm();
}
);



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
            formData.get("Connecticut"),
            formData.get("Maine"),
            formData.get("Massachusetts"),
            formData.get("NewHampshire"),
            formData.get("RhodeIsland"),
            formData.get("Vermont")
        ]
    }

    console.log(JSON.stringify(JSON.parse(JSON.stringify(payload)), null, 2));



    dynamicAJAX("StateCapitals.php", payload, "POST", (response) => {
        console.log(JSON.stringify(JSON.parse(response), null, 2));


    }
    );
}