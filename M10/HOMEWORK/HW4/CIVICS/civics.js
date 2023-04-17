function validate() {
    var frm = document.getElementById("quiz");
    if (frm.q1.value == "choose" || frm.q2.value == "choose" || frm.q3.value == "choose") {
        alert("You must answer all questions!");
        return false;
    } else {
        scoreQuiz();
        return false;
    }
}

function scoreQuiz(form) {
    //This function needs to be coded ....
    var score = 0;
    var q1 = document.getElementById("q1");
    var q2 = document.getElementById("q2");
    var q3 = document.getElementById("q3");

    if (q1.value == "27") {
        score++;
    }
    if (q2.value == "Thomas Jefferson") {
        score++;
    }
    if (q3.value == "100") {
        score++;
    }

    var results = document.getElementById("results");
    results.innerHTML = "You scored " + score + " out of 3.";

}


document.getElementById("quiz").addEventListener("submit", function (event) {
    event.preventDefault();
    validate();

    scoreQuiz(event.target);


});
