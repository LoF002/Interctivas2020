//gsap.to(".wagon", {duration: 5, x:460});

/*gsap.to(".wagon", {
    duration: 1,
    motionPath: {
        path: [
            {top: 166, left: 10},
            {top: 160, left: 25},
            {top: 150, left: 40}
        ]
    }
})*/

/*gsap.to(".wagon", {
    duration: 5,
    repeat: 5,
    repeatDelay: 3,
    yoyo: true,
    motionPath: {
        path: "#path",
        align: "#path",
        autoRotate: true,
        alignOrigin: [0.5, 0.5]
    }, onComplete: function(){
        console.log("completed")
    }
})*/

gsap.to(".pirate-up-down", {duration: 3, height:68, delay:2});
gsap.to(".pirate-ship", {duration: 3, top:73, delay:1.8});

function animateIn(){

    gsap.to(".wagon", {
        duration: 5,
        motionPath: {
            path: "#path",
            align: "#path",
            autoRotate: true,
            alignOrigin: [0.5, 0.5]
    }, onComplete: function(){
        console.log("completed")
        gsap.to(".wagon", {left:695, onComplete:function(){
            animateIn();
        }});
    }
    })

}

//animateIn();