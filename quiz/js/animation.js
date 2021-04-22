let score = 0;

function updateScore(){
    let showScore = document.body.getElementsByClassName("score")[0];
    showScore.textContent = score;
}//fin funtion

function onClickDuck(event){
    console.log("click " + event.target.id);
    score += 10;
    updateScore();
    event.target.removeEventListener("click", onClickDuck);
    event.target.style.opacity=0;
}//fin funtion

function createDucks(qty, container, tag){
    for(let i=0; i<qty; i++){
        let tmp = document.createElement("div");
        tmp.classList.add("duck");
        tmp.id = tag+i;
        tmp.addEventListener("click", onClickDuck);

        container.appendChild(tmp);
        let containerWidth = container.style.width;
        container.style.width = (i+1) * 113.067 +"px";
    }//fin for
}//fin funtion

function moveTop(){
    let position = document.body.getElementsByClassName("top-ducks")[0];
    gsap.to(position, {
        duration: 60,
        repeat: 1,
        left: -2000
    });
}//Fin funtion
function moveBottom(){
    let position = document.body.getElementsByClassName("bottom-ducks")[0];
    gsap.to(position, {
        duration: 15,
        repeat: 1,
        left: -500
    });
}//Fin funtion

document.addEventListener('DOMContentLoaded', (event) => {

    updateScore();
    moveTop();
    moveBottom();

    let topDucks = document.body.getElementsByClassName("top-ducks")[0];
   createDucks(100, topDucks, "td");

   let bottomDucks = document.body.getElementsByClassName("bottom-ducks")[0];
   createDucks(100, bottomDucks, "bd");

});//fin