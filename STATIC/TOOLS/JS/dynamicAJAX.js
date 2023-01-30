//dynamic async AJAX
function dynamicAJAX(url, target, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(target).innerHTML = xmlhttp.responseText;
            if (callback) {
                callback();
            }
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}