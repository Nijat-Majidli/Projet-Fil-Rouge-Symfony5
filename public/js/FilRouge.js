var espaceClient = document.getElementsByClassName("dropDownMenu");

var i;

for(i=0; i<espaceClient.length; i++)
{
    espaceClient[i].addEventListener("click", openMenu);
}


// Pour ouvrir "dropdown menu" on peut écrire le fonction openMenu(event) deux façon différent:

// 1ere façon: 
function openMenu(event)
{
    console.log(event.target);
    
    var myDropdown = document.querySelectorAll(".menuContent");
    
    var i;

    for(i=0; i<myDropdown.length; i++)
    {
        myDropdown[i].classList.add("hide");    
    }

    event.target.nextElementSibling.classList.remove("hide");
    event.target.nextElementSibling.classList.toggle("show");
}



// 2eme façon:
// function openMenu(event)
// { 
//     event.target.nextElementSibling.classList.toggle("show");

//     var myDropdown = document.querySelectorAll(".menuContent");
    
//     var i;

//     for(i=0; i<myDropdown.length; i++)
//     {
//         if (myDropdown[i].classList.contains("show") && myDropdown[i].previousElementSibling != event.target) 
        
//         myDropdown[i].classList.remove("show");    
//     }
// }




// Close the "dropdown menu" if the user clicks outside of it
window.onclick = function(event) 
{  
    if (!event.target.matches(".dropDownMenu")) 
    {
        var myDropdown = document.querySelectorAll(".menuContent");
        
        var i;

        for(i=0; i<myDropdown.length; i++)
        {
            if (myDropdown[i].classList.contains("show")) 
            {
                myDropdown[i].classList.remove("show");
            }
        }
    }
}


// Hamburger icon show-hide
var hamburgerIcon = document.getElementById("hamburger_icon");
var navbars= document.getElementById("navbars");
var pageBody = document.getElementById("pageBody");

hamburgerIcon.addEventListener("click", showHamburgerIcon);

function showHamburgerIcon(){
    
    if(navbars.style.display=="none") {
        navbars.style.display="block";
        pageBody.style.opacity=0.4;
    } else {
        navbars.style.display="none";
        pageBody.style.opacity=1;
    }
}

