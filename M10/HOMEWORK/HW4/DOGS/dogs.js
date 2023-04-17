




document.getElementById("dogQuiz").addEventListener("submit", function (event) {
    event.preventDefault();

    console.log(event.target.dog1);

    let ans1 = event.target.dog1.value;
    let ans2 = event.target.dog2.value;

    if (ans1 == "bloodhound") {
        document.getElementById("dog1Answer").style.color = "green";
        document.getElementById("dog1Answer").innerHTML = "Correct!";
    } else {
        document.getElementById("dog1Answer").style.color = "red";
        document.getElementById("dog1Answer").innerHTML = "Incorrect!";
    }

    if (ans2 == "beagle") {
        document.getElementById("dog2Answer").style.color = "green";
        document.getElementById("dog2Answer").innerHTML = "Correct!";
    } else {
        document.getElementById("dog2Answer").style.color = "red";
        document.getElementById("dog2Answer").innerHTML = "Incorrect!";
    }



});

