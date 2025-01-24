"use strict"; 

const burgerMenuButton = document.querySelector('.burger-menu-button'); 
const burgerMenuP = document.querySelector('.burger-menu-button p');
const burgerMenu = document.querySelector('.burger-menu'); 
const elementText = document.querySelector('.menu'); 

burgerMenuButton.addEventListener('click', ()=>{
    burgerMenu.classList.toggle('open'); 
    const isOpen = burgerMenu.classList.contains('open'); 
    if(isOpen){
        elementText.textContent = 'close'; 
    }
    else{
        elementText.textContent = 'menu'; 
    }
})


const accueil = document.getElementById('accueil'); 
accueil.addEventListener('click', ()=>{
     
    burgerMenu.style.display = "none"; 

})




// Projet-photo




