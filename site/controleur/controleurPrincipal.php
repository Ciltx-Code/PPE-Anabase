<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.menu.php";
    $lesActions["hello"] = "controleur.hello.php";
    $lesActions["congressiste"]="controleur.congressiste.php";
    $lesActions["listecongressiste"] = "controleur.liste.php";
    

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>