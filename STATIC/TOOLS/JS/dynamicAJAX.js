//dynamic async AJAX
export function dynamicAJAX(url, payload, method, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onload = function () {
        if (this.status === 200) {
            callback(this.responseText);
        }
    }
    xhr.send(payload);



}

