<html>
<?php
	include "Donnees.inc.php";
?>

<script type="text/javascript">
	function seconde_category( ){
			/*foreach($categorie as $H => $hs){
				var option = document.createElement("option");
				option.text=$hs
				document.getElementById("sousCategorie").appendChild("<option value='".$H."' onchange='seconde_category(".$H.")' >".$H."</option>");*/
				alert(document.getElementById("superClass").options[document.getElementById("superClass").selectedIndex].text);
				//alert("Hello! I am an alert box!!");

                      
	
	}
</script>

<head>
	
</head>

<body>
	<select id="superClass" onchange='seconde_category()' >

	<?php
	foreach($Hierarchie as $H => $hs){
		echo "<option value='".$H."'  >".$H."</option>";
			

		/**foreach ($Recette as $key => $value) {
			echo "<option value='".."' >".."</option>";
			echo $key ." ".$value."<br/>";
		}**/
	}

	?>
	</select>

		<select id="sousCategorie" ></select>
      
</body>
</html>