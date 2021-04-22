function openMobileMenu(){
    let nav = document.body.getElementsByClassName('top-nav')[0];
    nav.style.left="0";
}//Fin funtion

function closeMobileMenu(){
    let nav = document.body.getElementsByClassName('top-nav')[0];
    nav.style.left="24em";
}


function onSelectImage(event){
    let reader = new FileReader();
    reader.onload = function(e){
        let preview = document.getElementById("preview");
        preview.src = e.target.result;
    }

    reader.readAsDataURL(event.target.files[0]);
}

function hiddenLogin(){
    let row = document.getElementsByClassName('row')[0];
    row.style.display="none";
}

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    
    let upload = document.getElementById("upload");
    upload.addEventListener("change", onSelectImage);
    

});