//dynamic async AJAX
function dynamicAJAX(url, method, target, callback) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(target).innerHTML = xmlhttp.responseText;
            if (callback) {
                callback();
            }
        }
    };
    xmlhttp.open(method, url, true);
    xmlhttp.send();
}