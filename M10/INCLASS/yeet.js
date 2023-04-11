function computeCelcius(fahrenheit) {
    return (5/9) * (fahrenheit-32);
}

function computeFahrenheit(celcius) {
    return (9/5) * celcius + 32;
}






document.getElementById("fahrenheit_to_celcius").addEventListener("submit", function (event) {
    event.preventDefault();
    document.getElementById("celciusResult").innerHTML = computeCelcius(event.target.fText.value);
    //inject image
    var img = document.createElement("img");
    img.src = "https://media.giphy.com/media/3o7TKSjRrfIPjeiVyQ/giphy.gif";
    document.getElementById("celciusResult").appendChild(img);
});

document.getElementById("celcius_to_fahrenheit").addEventListener("submit", function (event) {
    event.preventDefault();
    document.getElementById("fahrenheitResult").innerHTML = computeFahrenheit(event.target.cText.value);
});