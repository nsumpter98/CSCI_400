//regex function to validate strings only
function validateString(str) {
    let regex = /^[a-zA-Z]+$/;
    return regex.test(str);
}

//regex function to validate numbers only
function validateNumber(num) {
    let regex = /^[0-9]+$/;
    return regex.test(num);
}

//regex function to validate email
function validateEmail(email) {
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return regex.test(email);
}

//regex function to validate phone number
function validatePhone(phone) {
    let regex = /^\d{3}-\d{3}-\d{4}$/;
    return regex.test(phone);
}

//regex function to validate date
function validateDate(date) {
    let regex = /^\d{2}\/\d{2}\/\d{4}$/;
    return regex.test(date);
}

//regex function to validate time
function validateTime(time) {
    let regex = /^\d{2}:\d{2} (AM|PM)$/;
    return regex.test(time);
}

export { validateString, validateNumber, validateEmail, validatePhone, validateDate, validateTime };