function openForm(nom, prenom, adresse, hotel, organisme, tel, date,num) {
    nom = deguillemetiseurReguillemetiseur(nom);
    prenom = deguillemetiseurReguillemetiseur(prenom);
    adresse = deguillemetiseurReguillemetiseur(adresse);
    hotel = deguillemetiseurReguillemetiseur(hotel);
    organisme = deguillemetiseurReguillemetiseur(organisme);

    document.getElementById("main").style.filter="blur(2px)";
    document.getElementById("popup").style.filter="blur(0px)";

    document.getElementById('nomcongressiste').value=nom;
    document.getElementById('prenomcongressiste').value=prenom;
    document.getElementById('adrcongressiste').value=adresse;
    document.getElementById('hotel').selectedIndex=hotel;
    document.getElementById('organisme').selectedIndex=organisme;
    document.getElementById('telcongressiste').value=tel;
    document.getElementById('date').value=date;
    document.getElementById('idCongressiste').value=num;

    document.body.style.pointerEvents="none";
    document.getElementById("popup").style.pointerEvents="all";

    fadeIn(document.getElementById("popup"));
}

function closeForm() {
    document.getElementById("main").style.filter="blur(0px)";
    document.body.style.pointerEvents="all";
    fadeOut(document.getElementById("popup"));
    var ele = document.getElementsByName("choix");
    for(var i=0;i<ele.length;i++){
      ele[i].checked = false;
    }
}

function openAddForm(){
    document.getElementById("main").style.filter="blur(2px)";
    document.getElementById("popupAjout").style.filter="blur(0px)";
    document.body.style.pointerEvents="none";
    document.getElementById("popupAjout").style.pointerEvents="all";
    fadeIn(document.getElementById("popupAjout"));

}

function closeAddForm(){
    document.getElementById("main").style.filter="blur(0px)";
    document.body.style.pointerEvents="all";
    fadeOut(document.getElementById("popupAjout"));
}


function fadeOut(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 5);
}

function fadeIn(element) {
    var op = 0.1;  // initial opacity
    

    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.display = 'block';
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 5);

}

function deguillemetiseurReguillemetiseur(string){
    return string.replace("'", "\'");
}