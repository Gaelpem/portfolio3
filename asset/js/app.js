"use strict"; 

const burgerMenuButton = document.querySelector('.burger-menu-button'); 
const burgerMenuP = document.querySelector('.burger-menu-button p');
const burgerMenu = document.querySelector('.burger-menu'); 
const elementText = document.querySelector('.menu'); 

burgerMenuButton.addEventListener('click', ()=>{
    burgerMenu.classList.toggle('open'); 
   elementText.textContent = burgerMenu.classList.contains('open') ? 'menu' : 'ferme'; 
})



const links = document.querySelectorAll('.nav-links a'); // Sélectionne tous les liens dans `.links`

if (burgerMenu) { // Vérifie que l'élément existe
  links.forEach(link => {
    link.addEventListener('click', () => {
      burgerMenu.classList.toggle('open');
    });
  });
}





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



