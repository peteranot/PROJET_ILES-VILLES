<html>
	<head>
		<!-- TITRE -->
        <title>Nos Îles</title>

        <!-- JVSCRIPT -->
        <script src="assets/js/jquery.js"></script>
		<script language="javascript">

            $(document).ready(function(){


                //1ere évènement (ILES)
                $("#select_listIles").on("change", function(){
                    jsIles = $("#select_listIles").val();
                    getIles(jsIles);
                })


                //2em évènement (VILLES)
                // $("#select_listVilles").on("change", function(){
                //     jsVilles = $("#select_listVilles").val();
                //     getVilles(jsVilles);
                // })


            })


            //ILES
            function getIles(jsIles){

                $.ajax({
                    type: 'post',
                    url: 'assets/php/ajax.php',
                    data: {
                        'getIles': jsIles
                    },
                    datatype: 'json',
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#affiche').empty(); //vider l'element #affiche
                        $('#affiche').append //Afficher dans #affiche
						('<p><b><u>Les villes: </b></u></p><select id="show_ville"></select>');
                        $.each(data.data,function(idx,el){
                            
                            $('#show_ville').append('<option value="">'+el+'</option>');

                        })
                    }


                });
            }


            //VILLES
            // function getVilles(jsVilles){

            //     $.ajax({
            //         type: 'post',
            //         url: 'ajax.php',
            //         data: {
            //             'getVilles': jsVilles
            //         },
            //         datatype: 'json',
            //         success: function(){
            //             alert('success');
            //         },


            //     });
            // }


        </script>
	</head>
	
	<body>
		<a href="index_admin.php">Pannel Admin</a>
		<p>Selectionné une îles: </p>
		<?php

			require('assets/php/connexion.php');

			$req_listIles = "SELECT * from iles" ; //$sql : contient la requete sql 
			$res_listIles = $conn->query($req_listIles); //$result : execute la requete $sql

				//ILES
				echo '<select id="select_listIles">';

					foreach ($res_listIles as $value) {
						
						echo '<option value="'.$value["name"].'">';
							echo $value["name"];    
						echo '</option>';

					}

				echo '</select>';
				
				
				echo '<div id="affiche">';
					
				echo '</div>';
		?>
	</body>
</html>