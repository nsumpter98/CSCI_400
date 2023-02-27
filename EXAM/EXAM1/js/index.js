import {dynamicAJAX} from "../../../STATIC/TOOLS/JS/dynamicAJAX.js";


function clearValidationStyles(inputId) {
    const input = document.getElementById(inputId);
    input.classList.remove('error');
    input.classList.remove('success');
}

function showValidationError(inputId, message) {
    const input = document.getElementById(inputId);
    input.classList.remove('success');
    input.classList.add('error');

}


//fill table
function fillTable(data) {

    //append rows to existing table
    let tbody = document.getElementById('tbody');
    for (let i = 0; i < data.length; i++) {
        let row = document.createElement('tr');
        let fname = document.createElement('td');
        let lname = document.createElement('td');
        fname.innerHTML = data[i].fname;
        lname.innerHTML = data[i].lname;
        lname.setAttribute('class', 'text-white');
        fname.setAttribute('class', 'text-white');
        row.appendChild(fname);
        row.appendChild(lname);
        tbody.appendChild(row);
    }
}


//onload
window.onload = function () {
    dynamicAJAX('exam1.php', {}, 'GET', function (response) {
        console.log(JSON.parse(response));
        fillTable(JSON.parse(response));
    });
}

//form submit event listener
let form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
    console.log('form submitted');
    let payload = [{fname: document.getElementById('fname').value, lname: document.getElementById('lname').value}];
    console.log(JSON.stringify(payload));

    dynamicAJAX('exam1.php', payload, 'POST', function (response) {
        console.log(response);
        let json = JSON.parse(response);

        if (json.response.code === 'success') {
            fillTable(payload);
            // Reset form
            form.reset();

            // Clear validation styles
            clearValidationStyles('fname');
            clearValidationStyles('lname');

            // Refocus on fname input
            document.getElementById('fname').focus();
        } else {
            if (json.response.code === 'fnameerr') {
                // Show validation error for fname input
                showValidationError('fname', 'Please enter a valid first name.');
                document.getElementById('fname').focus();
            } else {
                // Clear validation error for fname input
                clearValidationStyles('fname');
            }

            if (json.response.code === 'lnameerr') {
                // Show validation error for lname input
                showValidationError('lname', 'Please enter a valid last name.');
                document.getElementById('lname').focus();
            } else {
                // Clear validation error for lname input
                clearValidationStyles('lname');
            }
        }


    });


});

