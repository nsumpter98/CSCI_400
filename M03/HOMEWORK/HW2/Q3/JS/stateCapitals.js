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
            formData.get("New Hampshire"),
            formData.get("Rhode Island"),
            formData.get("Vermont")
        ]
    }

    console.log("PAYLOAD: " + payload.capitals);



    dynamicAJAX("StateCapitals.php", payload, "POST", (response) => {
        console.log("RESPONSE: " + response);

    }
    );
}