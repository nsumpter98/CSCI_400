//import
import { dynamicAJAX } from '../../../../STATIC/TOOLS/JS/dynamicAJAX.js';

// //dynamic async AJAX
function submitForm() {
    let formData = new FormData(document.getElementById("form1"));
    dynamicAJAX("lab1.php", "POST", (response) => {
        console.log(response);
        document.getElementById("resultsCard").style.display = "block";
        let json = JSON.parse(response);
        document.getElementById("results").innerHTML = "<p>" + json.message + "</p>";
        if (json.pass) {
            document.getElementById("resultsCard").style.backgroundColor = "green";
        }
        else {
            document.getElementById("resultsCard").style.backgroundColor = "red";
        }
        if (json.status === "success") {
            document.getElementById("form1").reset();
        }
    }
    );
}



