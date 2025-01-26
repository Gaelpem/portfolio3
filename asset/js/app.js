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

function toggleContainer(containerId, className,flecheId){
    const container = document.getElementById(containerId); 
    const fleche = document.getElementById(flecheId); 

    if(fleche){
        container.addEventListener('click', () =>{
        

            container.classList.toggle('open'); 
            container.style.height = container.classList.contains('open') ? "600px" : "auto"; 

            // fleche

            fleche.classList.toggle('rotated');
            fleche.style.transform = fleche.classList.contains('rotated') ? "rotated(180deg)" :  "rotated(0deg)"; 
            

        })
    }
}

toggleContainer('photos', 'carre1', 'fleche1'); 

toggleContainer('biographie', 'carre2', 'fleche2'); 



