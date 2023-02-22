//dynamic async AJAX
function dynamicAJAX(url, payload, method, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function () {
        if (this.status === 200) {
            callback(this.responseText);
        }
    }

    console.log(payload);

    xhr.send(JSON.stringify(payload));

}


export { dynamicAJAX };

