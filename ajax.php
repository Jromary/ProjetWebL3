<?php
include "Donnees.inc.php";
require "Donnees.inc.php";

//recuperation des donnees de la liste 2

if ($_POST['action'] == 'seconde_category') {
    $hierarchie = $_POST['Hierarchie'];
    $msg = "";
    foreach ($Hierarchie as $h => $hs) {
        if ($hierarchie == $h) {
            foreach ($hs as $k1 => $v1) {
                if ($k1 == 'sous-categorie') {
                    foreach ($v1 as $k2 => $v2) {
                        $msg = $msg . "<option value='" . $v2 . "'  >" . $v2 . "</option>";
                    }
                    break;
                }
            }


            break;
        }
    }

    echo $msg;

}


function getRecettes($ingredient){
    require "Donnees.inc.php";

    $msg = "";
    if (isset($Hierarchie[$ingredient]["sous-categorie"]) and !($Hierarchie[$ingredient]["sous-categorie"] == null)){
        foreach($Hierarchie[$ingredient]["sous-categorie"] as $key => $value){
            $msg = $msg . getRecettes($value);
        }
    }else{
        foreach ($Recettes as $key => $value){
            foreach ($value["index"] as $key2 => $value2){
                if ($value2 == $ingredient){
                    $msg = $msg . "<div class='card'>";
                    $msg = $msg . "<div class='card-body'>";
                    foreach ($value as $key3 => $value3) {
                        switch ($key3){
                            case "titre":
                                $msg = $msg . "<h4 class='card-title'>" . $value3 . "</h4>";
                                break;
                            case "ingredients":
                                $msg = $msg . "<ul class='list-group list-group-flush'>";
                                $list = explode("|", $value3);
                                foreach ($list as $elem){
                                    $msg = $msg . "<li class='list-group-item'>" . $elem . "</li>";
                                }
                                $msg = $msg . "</ul>";
                                break;
                            case "preparation":
                                $msg = $msg . "<p class='card-text'>" . $value3 . "</p>";
                                break;
                            case "index":
                                foreach ($value3 as $key4 => $value4){
                                    $msg = $msg . "<a href='#' class='card-link'>" . $value4 . "</a>";
                                }
                                break;
                            default:
                                break;
                        }
                    }
                    $msg = $msg . "</div>";
                    $msg = $msg . "</div><br/>";
                }
                break;
            }
        }
    }
    return $msg;
}


if ($_POST["action"] == "recettes") {
    $ingredient = $_POST["ingredient"];
    //$msg = "<div class='card-deck'>";
    echo getRecettes($ingredient);
}

/**
if ($_POST["action"] == "recettes") {
    $ingredient = $_POST["ingredient"];
    $msg = "";
    foreach ($Recettes as $key => $value){
        foreach ($value["index"] as $key2 => $value2){
            if ($value2 == $ingredient){
                $msg = $msg . "<div class='card' style='width: 33%'>";
                $msg = $msg . "<div class='card-body'>";
                foreach ($value as $key3 => $value3) {
                    switch ($key3){
                        case "titre":
                            $msg = $msg . "<h4 class='card-title'>" . $value3 . "</h4>";
                            break;
                        case "ingredients":
                            $msg = $msg . "<ul class='list-group list-group-flush'>";
                            $list = explode("|", $value3);
                            foreach ($list as $elem){
                                $msg = $msg . "<li class='list-group-item'>" . $elem . "</li>";
                            }
                            $msg = $msg . "</ul>";
                            break;
                        case "preparation":
                            $msg = $msg . "<p class='card-text'>" . $value3 . "</p>";
                            break;
                        case "index":
                            foreach ($value3 as $key4 => $value4){
                                $msg = $msg . "<a href='#' class='card-link'>" . $value4 . "</a>";
                            }
                            break;
                        default:
                            break;
                    }
                }
                $msg = $msg . "</div>";
                $msg = $msg . "</div>";
            }
            break;
        }
    }
    echo $msg;
}**/


?>