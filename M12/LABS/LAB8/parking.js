$(document).ready(function() {
    $("#calculate-charges").click(function() {
        var hours = parseInt($("#hours").val()); // Get number of hours parked
        var totalCharges = 0;

        if (hours <= 3) {
            totalCharges = 2.0; // Minimum fee for up to 3 hours
        } else if (hours > 3 && hours <= 24) {
            totalCharges = 2.0 + (hours - 3) * 0.5; // Additional $0.5 per hour after 3 hours
            totalCharges = Math.min(totalCharges, 10.0); // Maximum charge for any given 24-hour period is $10.00
        } else {
            totalCharges = 10.0; // Maximum charge for any given 24-hour period is $10.00
        }

        // Display the total charges to the user
        $("#total-charges").html("Total charges: $" + totalCharges.toFixed(2));
    });
});
