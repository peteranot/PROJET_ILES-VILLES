<html>
	<head>
		<!-- TITRE -->
        <title>Nos Îles & Villes</title>

        <!-- JVSCRIPT -->
        <script src="assets/js/jquery.js"></script>
		<script language="javascript">
            $(document).ready(function(){
                //get values Iles into select
                $("#select_listIles").on("change", function(){
                    jsIles = $("#select_listIles").val();
                    getIles(jsIles);
                })
            })


            //function ajax : get Ville by Iles
            function getIles(jsIles){
                $.ajax({
					//method POST
                    type: 'post',
                    url: 'assets/php/ajax.php',
                    data: {
                        'getIles': jsIles
                    },
					//json format data
                    datatype: 'json',
                    success: function(data) {
                        data = JSON.parse(data);
						//clear #affiche
                        $('#affiche').empty(); 
						//display #affiche
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
			
			//get all iles
			$req_listIles = "SELECT * from iles" ; 
			//$res_listIles : execute sql requete
			$res_listIles = $conn->query($req_listIles); 

				//display iles into select
				echo '<select id="select_listIles">';
					foreach ($res_listIles as $value) {
						echo '<option value="'.$value["name"].'">';
							echo $value["name"];    
						echo '</option>';
					}
				echo '</select>';
				
				
                //display data 
				echo '<div id="affiche">';
					
				echo '</div>';
		?>
	</body>
</html>