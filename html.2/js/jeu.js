console.log('Jeu démarré') //echo en php//

let box = document.querySelector('.box');
console.log(box);
let click = 0;
let scoreElement = document.querySelector('#score');

let chrono = 10;
let chronoElement = document.querySelector('#chrono');
chronoElement.innerHTML = chrono;

box.addEventListener("click", () => {
    console.log('click sur la box !');
    click += 1;
    scoreElement.innerHTML = click;
    
    let top = Math.floor(Math.random() * window.innerHeight);
    let left = Math.floor(Math.random() * window.innerWidth);

    // box.style.top = top + "px";
    box.style.top = `${top}px`;
    // box.style.backgroundColor = "gray";
    box.style.left = `${left}px`;
});

setInterval (() => {
    console.log("timer");
    if(chrono !=0){
    chrono--;
    chronoElement.innerHTML = chrono;
    }

    if(chrono === 0) {
        box.removeEventListener('click', () =>{});
        clearInterval("timer");
    }
}, 1000)

//celulle stockage .. Pour avoir un meilleur score