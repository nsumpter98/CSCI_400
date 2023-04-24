/*
   Filename: order.js
*/

//Called on the load event of the form
function initForm() {
    //Code that displays the current date: MM-DD-YYYY
    const currentDate = new Date().toLocaleDateString();
    document.getElementById("date").value = currentDate;


    //Code that hides the phone field:
    document.getElementById("fSetSelection").style.display = "none";


    //Code that disablse the submit button
    document.getElementById("orders").submit.disabled = true;


    // Initialize the table with one blank row
    addRow();

}


function calculateTotal() {
    const inputs = Array.from(document.querySelectorAll('#orderTable input')).reverse();
    const products = inputs.slice(4)
        .reduce((acc, input, i, arr) => {
            if (i % 4 === 0) {
                let [name, price, qty, cost] = arr.slice(i, i + 4).map(input => input.value);
                acc.push({name, price: parseFloat(price), qty: parseInt(qty), cost: parseFloat(qty * price)});
                let row = Math.floor(i / 4) + 1;
                document.getElementById('cost' + (row + 4)).value = (qty * price).toFixed(2);
                validateInputRow(row);
            }
            return acc;
        }, []);


    const zip = document.getElementById('zipcode').value;
    let shipping = 0;
    switch (zip) {
        case '46901':
            shipping = 4.95;
            break;
        case '46902':
            shipping = 5.95;
            break;
        case '46903':
            shipping = 6.95;
            break;
        case '46904':
            shipping = 7.95;
            break;
        default:
            shipping = 0;
    }

    const subtotal = products.reduce((acc, product) => acc + product.cost, 0) + shipping;
    const tax = subtotal * 0.05;
    const total = subtotal + tax;



    document.getElementById('tax').value = tax.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);

    console.log(products);
    // Return the products array in JSON format
    return JSON.stringify(products);
}





function validateInputRow(row) {
    const inputs = Array.from(document.querySelectorAll('#orderTable input'));
    const [name, price, qty, cost] = inputs.slice((row - 1) * 4, row * 4).map(input => input.value);
    let valid = name && price && qty && cost;
    document.getElementById('orders').submit.disabled = !valid;
}






//Called on the submit event of the submit button.
function handleSubmit(event) {
    //DON'T VALIDATE PHONE IF THE CHECKBOX IS NOT CHECKED
    //Else validate the phone number using a regular expression
    if (document.getElementById("subscribe").checked) {
        const phone = document.getElementById("phone").value;
        const phonePattern = /^(\+?\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;
        if (!phonePattern.test(phone)) {
            alert("Invalid phone number");
            event.preventDefault();
        }
    }


    console.log("Event: " + event);

}


// Add a new row to the table
function addRow() {
    var table = document.getElementById("orderTable");
    var rowCount = table.rows.length;

    //insert at the top of the table
    var row = table.insertRow(1);

    // Add cells to the row
    var productCell = row.insertCell(0);
    var priceCell = row.insertCell(1);
    var qtyCell = row.insertCell(2);
    var costCell = row.insertCell(3);

    // Add inputs to the cells
    productCell.innerHTML = '<input name="product' + rowCount + '" id="product' + rowCount + '" size="20" value=""/>';
    priceCell.innerHTML = '<input name="price' + rowCount + '" id="price' + rowCount + '" size="8" value="0.00"/>';
    qtyCell.innerHTML = '<input name="qty' + rowCount + '" id="qty' + rowCount + '" size="8" value="0"/>';
    costCell.innerHTML = '<input name="cost' + rowCount + '" id="cost' + rowCount + '" size="12" value="0.00" readonly="readonly"/>';
}




/*EVENT LISTENERS*/

//ONLOAD EVENT LISTENER
window.addEventListener(
        "load",
        initForm,
        false
    );


//FORM SUBMIT EVENT LISTENER
document.getElementById("orders")
    .addEventListener(
        "submit",
        function (event) { handleSubmit(event); },
        false
    );


//CALCULATE BUTTON EVENT LISTENER
document.getElementById("calculate")
    .addEventListener(
        "click",
        calculateTotal,
        false
    );


//CHECKBOX EVENT LISTENER
const checkbox = document.getElementById("subscribe");
const selection = document.getElementById("fSetSelection");

checkbox.addEventListener("change", function() {
    selection.style.display = this.checked ? "block" : "none";
});



