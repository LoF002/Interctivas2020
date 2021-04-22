function onBlurChange(){
    
    console.log("change");
    let info = {email: document.getElementById("email").value}; 

    fetch("http://localhost/lab_php/newsletter.php", {
        method: 'POST',
        mode: "same-origin", //para login
        credentials: "same-origin", //para login
        headers: {
            'Accept': 'application/json, text/plain, */*', //tipo de dato que acepta
            'Content-Type': 'application/json'             // tipo de dato que envia 
        },
        body: JSON.stringify(info)
    })


    .then(response => response.json())
    .then(data => {
            
        console.log(data);
        //pregunto si esta false
        if(!data){
            document.getElementById("info").style.display = "block";//hago visible el mensaje
            document.getElementById("email").className = "error";
        }
        else{
            document.getElementById("info").style.display = "none";//hago visible el mensaje
            document.getElementById("email").className = "";
        }
            
    });
}

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    let email = document.getElementById("email");
    email.addEventListener("blur", onBlurChange);


});
