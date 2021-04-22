function generatorPassword(){
    return "password" + Math.round( Math.random()*1000);
    
    
}//fin del metodo

function newPassword(){

let correo=document.getElementById("email").value;
let password= generatorPassword();

console.log(password);
console.log(correo);



let info = {
    email:document.getElementById("email").value, 
    pass: password
    
};

fetch("http://localhost/phothonM/cambiarContra.php", {
    method: 'POST',
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
        'Accept': 'application/json, text/plain, */*',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(info)
})
.then(response => response.json())

.then(data => {  

    console.log(data);
    if(data===400){
 alert("Wrong email");

    }

    else{
        alert("Your new password is:"+data);

    }


});



}
document.addEventListener('DOMContentLoaded', (event) =>{

    let email = document.getElementById("email");
    email.addEventListener("blur", newPassword);

    console.log("DOM loaded");


    
   
    

});