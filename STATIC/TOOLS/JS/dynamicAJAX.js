//dynamic async AJAX
function dynamicAJAX(url, method, callback) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
           // document.getElementById(target).innerHTML = xmlhttp.responseText;
            if (callback) {
                callback(xmlhttp.responseText);
            }
        }
    };
    xmlhttp.open(method, url, true);
    xmlhttp.send();
}

//export
export {dynamicAJAX};