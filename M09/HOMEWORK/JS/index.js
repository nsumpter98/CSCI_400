/*
Q1: Create a function that calculates the weight lost based on the number of hours and calories burned per hour.
 */

function calculateWeightLost(hours, caloriesBurned) {
    var calories = hours * caloriesBurned;
    var pounds = calories / 3500;
    return pounds;
}


function calculateActivity(hours, activity) {
    var pounds = 0;
    switch (activity) {
        case "swimming":
            pounds = calculateWeightLost(hours, 275);
            break;
        case "running":
            pounds = calculateWeightLost(hours, 275);
            break;
        case "cycling":
            pounds = calculateWeightLost(hours, 275);
            break;
        default:
            pounds = 0;
    }
    return pounds;
}

/*
Q2: Create a function that takes a number and returns a message based on the table above.
 */

function getDayMessage(day) {
    var message = "";
    if (day >= 1 && day <= 10) {
        message = "It is Day " + day + ". It is early in the month";
    } else if (day >= 11 && day <= 20) {
        message = "It is Day " + day + ". It is middle of the month";
    } else if (day >= 21 && day <= 31) {
        message = "It is Day " + day + ". It is the end of the month";
    } else {
        message = "Invalid day";
    }
    return message;
}

/*
Q3: Create a function that takes a number and returns the tuition for that year.
 */

function getTuition(year) {
    var tuition = 10000;
    for (var i = 1; i <= year; i++) {
        tuition = tuition + (tuition * 0.05);
    }
    return tuition;
}

/*
Q4: Create a function that takes a number and returns the grade.
 */

function getGrade(average) {
    var grade = 0;
    if (average >= 90 && average <= 100) {
        grade = 4;
    } else if (average >= 80 && average <= 89) {
        grade = 3;
    } else if (average >= 70 && average <= 79) {
        grade = 2;
    } else if (average >= 60 && average <= 69) {
        grade = 1;
    } else {
        grade = 0;
    }
    return grade;
}

function loopGrades() {
    var average = prompt("Enter average");
    while (average != "stop") {
        var grade = getGrade(average);
        alert("Grade: " + grade);
        average = prompt("Enter average");
    }
}