import {dynamicAJAX} from "../../../../STATIC/TOOLS/JS/dynamicAJAX.js";


let form = document.getElementById("dayForm");
form.addEventListener("submit", function (e) {
    e.preventDefault();

    //get the value of the input field
    let input = document.getElementById("day").value;

    console.log(input);
    dynamicAJAX(
        "quiz1.php",
        {input: input},
        "POST",
        function (response) {
            response = JSON.parse(response);
            console.log(response);

            if(response.valid){
                let text = "You were born on " + response.input + " which was a " + response.english + ", and " + response.french + " in French.";
                document.getElementById("response").innerHTML = text;
            }else{
                document.getElementById("response").innerHTML = "Please enter a valid day.";
            }
        }
    );
});