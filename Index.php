<html>
<?php
	include "Donnees.inc.php";
?>

<script type="text/javascript">



function seconde_category() {
      $.ajax({
           type: "POST",
           url: 'ajax.php',
           data:{action:'seconde_category' , Hierarchie: document.getElementById("superClass").options[document.getElementById("superClass").selectedIndex].text },
           dataType: 'html',
           success:function(data) {
           	document.getElementById("list2").innerHTML='';
           	document.getElementById("list3").innerHTML='';
			document.getElementById("list2").innerHTML += data;
           }

      });
 
 }
</script>

<link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Css/jquery.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>


<head>
	
</head>

<body>
     
     <div class="container">

     <div id="Menu" class="row">
     
    <!-- sous categorie1 -->

    <div class="col-3" id="sg1">
	        <select id="superClass" class="form-control" onchange='seconde_category()' >

	        <?php
	        foreach($Hierarchie as $H => $hs){
	        	echo "<option value='".$H."'  >".$H."</option>";
	        }
	        ?>
	        </select>
	</div>

	<!-- sous categorie2 -->

	<div class="col-3" id="sg2">
		<select id="list2" class="form-control"></select>
	</div>
	
     <!-- sous categorie3 -->

	<div class="col-3" id="sg3">
		<select id="list3" class="form-control"></select>
	</div>
     <!-- boutton ajouter -->
	
	<div class="col-3" id="sg3">
		<button type="button" class="btn btn-success">Ajouter</button>
	</div>		
	
    </div>

   </div>
      
</body>
</html>