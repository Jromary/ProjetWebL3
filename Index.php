<html>
<?php
include "Donnees.inc.php";
?>

<head>
    <meta charset="UTF-8"/>
</head>

<script type="text/javascript">



    function insert( element ,  type) {
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data:{action:'seconde_category' , number: type +1  , node: element },
            dataType: 'html',
            success:function(data) {
                var node = document.createElement("div");
                node.classList.add("col-3");
                taille = $("#Choice div").length;
                
                for(i=type+1 ; i<=taille ; i++)
                    document.getElementById("list"+i).parentElement.remove();

                $("#Choice").append(node);
                node.innerHTML+=data;
                recettes(element);

            }

        });


    }



    function recettes(value) {

        //this.selectedIndex.value
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data: {
                action: 'recettes',
                ingredient: value
            },
            dataType: 'html',
            success: function (data) {
                document.getElementById("recettes").innerHTML = '';
                document.getElementById("recettes").innerHTML += data;
            }

        });
    }





</script>

<link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Css/jquery.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>




<body>

<div class="container">


    <div id="Choice" class="row">

        <!-- sous categorie1 -->

        <div class="col-3" id="sg1">
            <select id="list1" class="form-control" onchange='insert(this.options[selectedIndex].value , 1)' >

                <?php
                foreach($Hierarchie as $H => $hs){
                    if($H == 'Aliment'){
                        foreach ($hs as $k1 => $v1){
                            if($k1 == 'sous-categorie'){
                                foreach ($v1 as $k2 => $v2) {
                                    echo "<option value='".$v2."'  >".$v2."</option>";
                                }
                                break;
                            }
                        }


                        break;
                    }


                }
                ?>
            </select>
        </div>
    </div>

    <div id="recettes">
    </div>


</div>

</body>
</html>