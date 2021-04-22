
//gsap.to(".wagon", {duration: 5, x:460});

/*gsap.to(".wagon",{
    duration: 5,
    motionPath: {
        path: [
            {top: 166, left: 10},
            {top: 160, left: 25},
            {top: 150, left: 40}
        ]
    }
});*/

/*gsap.to(".wagon",{
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
        console.log("completed");
    }
});*/

function animateWagon() {

    gsap.to(".wagon", {
        duration: 6,
        delay: 1,
        motionPath: {
            path: "#path",
            align: "#path",
            autoRotate: true,
            alignOrigin: [0.5, 0.5]
        },
        onComplete: function () {
            gsap.to(".wagon", {
                left: 695,
                onComplete: function () {
                    animateWagon();
                }
            });
        }
    });
}

function rotateJoystick(el) {
    el.style.transform = "rotate(-45deg)";
    el.style.top = "2px";
    el.style.left = "2px";
}

function animateShipFront(){
    gsap.to(".left-arm", {
        duration: 3,
        rotate: 20,
        left: 15
    });

    gsap.to(".right-arm", {
        duration: 3,
        rotate: 15,
        left: 55
    });

    gsap.to(".pirate-top", {
        duration: 2,
        left: -30,
        onComplete: function () {
            animateShipBack();
        }
    });
}

function animateShipBack() {
    gsap.to(".left-arm", {
        duration: 3,
        rotate: -15,
        left: -10
    });

    gsap.to(".right-arm", {
        duration: 3,
        rotate: -15,
        left: 30
    });

    gsap.to(".pirate-top", {
        duration: 2,
        left: 30,
        onComplete: function () {
            animateShipFront();
        }
    });
}

function animateShip() {
    gsap.to(".pirate-arms", {
        duration: 2,
        height: 90,
        delay: 2
    });
    gsap.to(".pirate-ship", {
        duration: 2,
        top: 60,
        delay: 1.8,
        onComplete:function(){
            console.log("move the ship!");
            animateShipFront();
        }
    });
}

function animateHorseDown(el) {
    gsap.to(el, {
        duration: 2,
        top: 72,
        onComplete: function () {
            animateHorseUp(el);
        }
    });
}

function animateHorseUp(el) {
    gsap.to(el, {
        duration: 2,
        top: 50,
        onComplete: function () {
            animateHorseDown(el);
        }
    });
}

function animateCarouselBar() {
    gsap.to(".bar", {
        duration: 1,
        top: 38,
        onComplete: function () {
            gsap.to(".bar", {
                duration: 1,
                top: 30,
                onComplete: function () {
                    animateCarouselBar();
                }
            });
        }
    });
}

function animateCarousel() {
    let horse1 = document.getElementById('horse01');
    animateHorseDown(horse01);
    //
    let horse2 = document.getElementById('horse02');
    animateHorseUp(horse02);
    //
    animateCarouselBar();
}

function animateRobot(){
    gsap.to(".robot", {
        duration: 2,
        scale: 1,
        delay: 1,
        onComplete: function () {
            gsap.to(".robot", {
                duration: 4,
                left: 645,
                onComplete: function () {
                    
                    let robot = document.body.getElementsByClassName('robot')[0];
                    robot.style.left = "-45px";

                    gsap.to(".robot", {
                        duration: 3,
                        left: 18,
                        onComplete: function () {
                            let t = document.getElementById('t01');
                            rotateJoystick(t);
                            //
                            animateShip();
                            gsap.to(".robot", {
                                duration: 3,
                                left: 138,
                                onComplete: function () {
                                    let t = document.getElementById('t02');
                                    rotateJoystick(t);
                                    animateWagon();
                                    gsap.to(".robot", {
                                        duration: 6,
                                        left: 540,
                                        onComplete: function () {
                                            let t = document.getElementById('t03');
                                            rotateJoystick(t);
                                            animateCarousel();
                                            gsap.to(".robot", {
                                                duration: 3,
                                                left: 645,
                                                onComplete: function () {
                                                    //
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', (event) => {

    //animateRobot();
    //animateShip();
    //animateWagon();
    //animateCarousel();
    
});