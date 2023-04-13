function calculateWeightLost(hours, caloriesBurned) {
    var calories = hours * caloriesBurned;
    var pounds = calories / 3500;
    return {pounds: pounds, calories: calories};
}

document.getElementById("weightcalc").addEventListener("submit", function (event) {
    event.preventDefault();

    const activities = [
        { fn: event.target.swimming.value, caloriesBurned: 275 },
        { fn: event.target.jogging.value, caloriesBurned: 475 },
        { fn: event.target.cycling.value, caloriesBurned: 200 },
    ];

    let pounds = 0;
    let calories = 0;

    for (const { fn, caloriesBurned } of activities) {
        let result = calculateWeightLost(fn, caloriesBurned);
        pounds += result.pounds;
        calories += result.calories;
    }

    //display weight lost
    document.getElementById('weightlostResult').innerHTML = `
      You will lose ${pounds.toFixed(2)} pounds<br>
      Calories burned: ${calories}
    `;

});