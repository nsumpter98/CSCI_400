function calculateWeightLost(hours, caloriesBurned) {
    var calories = hours * caloriesBurned;
    var pounds = calories / 3500;
    return {pounds: pounds, calories: calories};
}


function calculateActivity(hours, activity) {
    let result = {pounds: 0, calories: 0}
    switch (activity) {
        case "swimming":
            result = calculateWeightLost(hours, 275);
            break;
        case "jogging":
            result = calculateWeightLost(hours, 475);
            break;
        case "cycling":
            result = calculateWeightLost(hours, 200);
            break;
        default:
            result = {pounds: 0, calories: 0};
    }
    return result;
}


document.getElementById("weightcalc").addEventListener("submit", function (event) {
    event.preventDefault();
    var swimming = document.getElementById("swimming").value;
    var jogging = document.getElementById("jogging").value;
    var cycling = document.getElementById("cycling").value;

    const activities = [
        { fn: swimming, name: 'swimming' },
        { fn: jogging, name: 'jogging' },
        { fn: cycling, name: 'cycling' },
    ];

    let pounds = 0;
    let calories = 0;

    for (const { fn, name } of activities) {
        const result = calculateActivity(fn, name);
        pounds += result.pounds;
        calories += result.calories;
    }

    //display weight lost
    document.getElementById('weightlostResult').innerHTML = `
      You will lose ${pounds.toFixed(2)} pounds<br>
      Calories burned: ${calories}
    `;

});