console.log('Jeu démarré') //echo en php//

let box = document.querySelector('.box');
console.log(box);
let click = 0;
let scoreElement = document.querySelector('#score');

let chrono = 10;
let chronoElement = document.querySelector('#chrono');
chronoElement.innerHTML = chrono;

const refreshButton = document.querySelector('#restart');


/*box.addEventListener("click", () =>*/ function handleClick(){
    console.log('click sur la box !');
    click += 1;
    scoreElement.innerHTML = click;
    
    let top = Math.floor(Math.random() * window.innerHeight);
    let left = Math.floor(Math.random() * window.innerWidth);

    // box.style.top = top + "px";
    box.style.top = `${top}px`;
    // box.style.backgroundColor = "gray";
    box.style.left = `${left}px`;
};
box.addEventListener('click', handleClick);

setInterval (() => {
    console.log("timer");
    if(chrono !=0){
    chrono--;
    chronoElement.innerHTML = chrono;
    }

    if(chrono === 0) {
        box.removeEventListener('click', handleClick);
        clearInterval("timer");
        console.log("Temps écoulé !");
        
    }
}, 1000)

refreshButton.addEventListener('click', () => {
    location.reload();
});


//celulle stockage .. Pour avoir un meilleur score