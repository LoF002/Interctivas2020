function onBlurChange(){
    
    console.log("change");
    let correo = {email:document.getElementById("email").value};

    fetch("http://localhost/laboratorio3/newsletter.php", {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(correo)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        errorMessage(data);
    });
}

function errorMessage(data){
    if(data){
        document.getElementById("info").style.display="none";
        document.getElementById("email").className="";
    }
    else{
        document.getElementById("info").style.display="block";
        document.getElementById("email").className="error";
    }
}//Fin

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    let email = document.getElementById("email");
    email.addEventListener("blur", onBlurChange);

});