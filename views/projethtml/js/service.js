/* Nombre d onglets  */

var taille = 2; 


let tableauOnglet = document.getElementsByClassName('onglet'); 
let  tableauContenu = document.getElementsByClassName('contenu'); 
let grilleContenu = document.getElementsByClassName('contenu_nav'); 


function tabOnClick(eventSource){

    for(var i = 0 ; i < tableauOnglet.length ; i++){
        tableauOnglet[i].style.backgroundColor = "black"; 
        tableauOnglet[i].style.color = "white"; 
    }
    cacherElementGrille(); 
    eventSource.target.style.backgroundColor = "white"; 
    eventSource.target.style.color = "black"; 

    switch(eventSource.target.id){    
        case 'ongletHebergement':
            afficherElementGrille(0);
            break;  
        case 'ongletEmail':
            afficherElementGrille(1); 
            break; 
        default:
            break; 
    }
}

function cacherElementGrille(){

    var chaine = " "; 
    for(var i = 0 ; i < taille ; i++){
        chaine += " 0vw"; 
        tableauContenu[i].style.visibility = "hidden"; 
    }
    tableauContenu[0].style.gridTemplateRows = chaine; 
}

function afficherElementGrille( entier ){

    var chaine = " "; 
    cacherElementGrille(); 
    for(var i = 0 ; i < taille ; i++){
        if(i == entier){
            chaine += " 20vw "; 
            tableauContenu[i].style.visibility = "visible";  
        }else{
            chaine += "  0vw "; 
            tableauContenu[i].style.visibility = "hidden";  
        }
    }
    grilleContenu[0].style.gridTemplateRows = chaine; 
}

cacherElementGrille(); 
afficherElementGrille(0); 

for(var i = 0 ; i < tableauOnglet.length ; i++){
    tableauOnglet[i].addEventListener('click' , tabOnClick , false);
}

