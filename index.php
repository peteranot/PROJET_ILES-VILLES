<html>
	<head>
		<!-- TITRE -->
        <title>Nos Îles & Villes</title>

        <!-- JVSCRIPT -->
        <script src="assets/js/jquery.js"></script>
		<script language="javascript">
            $(document).ready(function(){
                //1ere évènement (ILES)
                $("#select_listIles").on("change", function(){
                    jsIles = $("#select_listIles").val();
                    getIles(jsIles);
                })
            })


            //fonction AJAX qui va afficher les villes de l'ile concerné
            function getIles(jsIles){
                $.ajax({
					//methode POST
                    type: 'post',
					//fichier contenant la fonction php ajax
                    url: 'assets/php/ajax.php',
                    data: {
                        'getIles': jsIles
                    },
					//format de données
                    datatype: 'json',
                    success: function(data) {
                        data = JSON.parse(data);
						//vider l'element #affiche
                        $('#affiche').empty(); 
						//Afficher dans #affiche
                        $('#affiche').append 
						('<p><b><u>Les villes: </b></u></p><select id="show_ville"></select>');
                        $.each(data.data,function(idx,el){
                            
                            $('#show_ville').append('<option value="">'+el+'</option>');

                        })
                    }
                });
            }
        </script>
	</head>
	
	<body>
		<p>Selectionné une îles: </p>
		<?php

			require('assets/php/connexion.php');
			
			//$req_listIles : contient la requete sql  qui recupere tout les iles
			$req_listIles = "SELECT * from iles" ; 
			//$res_listIles : execute la requete $sql
			$res_listIles = $conn->query($req_listIles); 

				//Liste déroulante contenant tout les iles
				echo '<select id="select_listIles">';
					foreach ($res_listIles as $value) {
						echo '<option value="'.$value["name"].'">';
							echo $value["name"];    
						echo '</option>';
					}
				echo '</select>';
				
				
                //bloc d'affichage des villes de l'ile concerné
				echo '<div id="affiche">';
					
				echo '</div>';
		?>
	</body>
</html>