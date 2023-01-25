function submitForm(){
    let formData = new FormData(document.getElementById("form1"));
    let xhr = new XMLHttpRequest();


    let path = (window.location.pathname).split("/");
    path.pop();
    path = path.join("/");

    xhr.open("POST", path + "/lab1.php", true);

    console.log(path + "/lab1.php");


    xhr.send(formData);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);

            document.getElementById("resultsCard").style.display = "block";

            let json = JSON.parse(xhr.responseText);

            document.getElementById("results").innerHTML = "<p>" + json.message + "</p>";

            if(json.pass){
                document.getElementById("resultsCard").style.backgroundColor = "green";
            }
            else{
                document.getElementById("resultsCard").style.backgroundColor = "red";
            }

            if(json.status === "success"){
                document.getElementById("form1").reset();
            }

        }
    }
}