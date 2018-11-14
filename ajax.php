<?php 
include "Donnees.inc.php";

  //recuperation des donnees de la liste 2

if($_POST['action'] == 'seconde_category') {
    $hierarchie = $_POST['Hierarchie'];
     $msg ="";
  	     foreach($Hierarchie as $h => $hs){
  	     	    if($hierarchie == $h){
  	     	        foreach ($hs as $k1 => $v1){ 
  	     	        	if($k1 == 'sous-categorie'){
  	     	        	  foreach ($v1 as $k2 => $v2) {
  	     	        	      $msg = $msg."<option value='".$v2."'  >".$v2."</option>";
  	     	               }
                         break;
                        }
  	     	        }


  	     	        break;
  	     	     }
  		}
	
     echo $msg;

}




?>