<?php
	include ('assets/php/function.php');
?>

<html>
	<head>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<!-- CSS -->
		<link href="assets/css/style.css" rel="stylesheet">


		<title>Pannel Admin</title>

		<!-- BOOTSTRAP -->
		<!-- CSS -->
		<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- JS -->
		<script src="assets/bootstrap/js/popper.min.js"></script>
		<script src="assets/bootstrap/js/jquery-slim.min.js"></script>
		<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
		<script src="assets/bootstrap/js/bootstrap.js"></script>
		<script src="assets/bootstrap/js/util.js"></script>
	</head>

    <body>
		<label >
			<a href="index.php">Pannel Utilisateur</a>
		</label>
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>PANNEL ADMINISTRATEUR</b></u>
				</label>
			</div>
		</div>
		<br/><br/>
		<div class="row divListeIles" align="center">
			<div class="col-md-6">
				<label class="titleHead">
					<u><b>AJOUTER UNE ILE</b></u>
				</label>
				
					<?php
						// <!-- AJOUTER UNE LANGUE  -->
						echo '<div>';
							echo '<form  method="POST">';
								echo '<br/>';
								echo '<p>';
									echo '<input type="text" name="nameIle" placeholder="Nom">';
								echo '</p>';

								echo '<p>';
									echo '<input type="submit" name="btnIle" value="Valider">';
								echo '</p>';
							echo '</form>';
						echo '</div>';
					?>
				
			</div>
			
			<div class="col-md-6">
				<label class="titleHead">
					<u><b>AJOUTER UNE VILLE</b></u>
				</label>
				<div class="divAddVille">
					<?php
					// <!-- AJOUTER UNE LANGUE  -->
						echo '<form  method="POST">';
							echo '<br/>';
							echo '<p>';
								echo '<input type="text" name="nameVille" placeholder="Nom">';
							echo '</p>';

							echo '<p>';
								echo '<input type="submit" name="btnVille" value="Valider">';
							echo '</p>';
						echo '</form>';
					?>
				</div>
			</div>
			
			
		</div>
		<br/><br/>
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>LISTE DES ILES ET VILLES</b></u>
				</label>
			</div>
		</div>
		<br/>
        <div class="row"  align="center">
            <div class="col-md-6 divListeIles">
				<label class="titleHead">
					<u><b>LISTES DES ILES</b></u>
				</label>
                <?php
					// CONDITIONS \\
					// Afficher la liste des langues
					//si $res_lang contient au moins une données 
					if ($resIles->num_rows > 0) {
						//faire ceci
						echo "<table>";
							echo "<th>";
								echo "Name";
							echo "</th>";

							echo "<th>";
								echo "Actions";
							echo "</th>";
							echo "<th>";
							echo "</th>";

						foreach ($resIles as $valeur) { //Boucle : Pour chaque resultat 

							if (($etatIle == "ouvrir") && ($idIle == $valeur['id'])) {
								echo '<form method="post">';
									echo "<input type='hidden' name='idIle' value=" . $valeur['id'] . ">";
										echo "<tr>";

											echo "<td>";
												echo "<input type='text' name='new_name'  value='" . $valeur['name'] . "'>";
											echo "</td>";

											echo "<td>";
												echo "<input type='submit' name='btnIle' value='Confirmer'/>";
											echo "</td>";

										echo "<tr>";
								echo '</form>';

							} else {
								echo '<form method="post">';
									echo "<tr>";

										echo "<td>";
											echo $valeur['name'];
										echo "</td>";


										echo "<td>";
												echo "<input type='submit' name='btnIle' value='Modifier'/>";
												echo "<input type='hidden' name='idIle' value=" . $valeur['id'] . ">";
										echo "</td>";
										echo "<td>";
												echo "<input type='hidden' name='idIle' value=" . $valeur['id'] . ">";
												echo "<input type='submit' name='btnIle' value='Supprimer'/>";
										echo "</td>";

									echo "</tr>";
								echo '</form>';	
							}
						}
						echo "</table>";
					} else { //sinon
						//faire cela
						echo "Il n'y a aucun résultats";
					}
                ?>
            </div>
			
			<div class="col-md-6 divListeIles">
				<label class="titleHead">
					<u><b>LISTES DES VILLES</b></u>
				</label>
                <?php
					// CONDITIONS \\
					// Afficher la liste des langues
					//si $res_lang contient au moins une données 
					if ($resVilles->num_rows > 0) {
						//faire ceci
						echo "<table>";
							echo "<th>";
								echo "Name";
							echo "</th>";

							echo "<th>";
								echo "Actions";
							echo "</th>";
							echo "<th>";
							echo "</th>";

						foreach ($resVilles as $valeur) { //Boucle : Pour chaque resultat 

							if (($etatVille == "ouvrir") && ($idVille == $valeur['id'])) {
								echo '<form method="post">';
									echo "<input type='hidden' name='idVille' value=" . $valeur['id'] . ">";
										echo "<tr>";

											echo "<td>";
												echo "<input type='text' name='new_name'  value='" . $valeur['name'] . "'>";
											echo "</td>";

											echo "<td>";
												echo "<input type='submit' name='btnVille' value='Confirmer'/>";
											echo "</td>";

										echo "<tr>";
								echo '</form>';

							} else {
								echo '<form method="post">';
									echo "<tr>";

										echo "<td>";
											echo $valeur['name'];
										echo "</td>";


										echo "<td>";
												echo "<input type='submit' name='btnVille' value='Modifier'/>";
												echo "<input type='hidden' name='idVille' value=" . $valeur['id'] . ">";
										echo "</td>";
										echo "<td>";
												echo "<input type='hidden' name='idVille' value=" . $valeur['id'] . ">";
												echo "<input type='submit' name='btnVille' value='Supprimer'/>";
										echo "</td>";

									echo "</tr>";
								echo '</form>';	
							}
						}
						echo "</table>";
					} else { //sinon
						//faire cela
						echo "Il n'y a aucun résultats";
					}
                ?>
            </div>
		</div>
		<br/><br/>
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>LISTE DES ILES ET VILLES</b></u>
				</label>
			</div>
		</div>
		<br/>
		<div class="row divListeIles" >
			<form method="POST">
				<div class="col-md-5">
					<p>Selectionné une îles: </p>
						<?php

							require('assets/php/connexion.php');

							$req_listIles = "SELECT * from iles" ; //$sql : contient la requete sql 
							$res_listIles = $conn->query($req_listIles); //$result : execute la requete $sql
								
								//ILES
								echo '<select name="IleVille">';

									foreach ($res_listIles as $value) {
										
										echo '<option value="'.$value["id"].'">';
											echo $value["name"];    
										echo '</option>';

									}

								echo '</select>';
						?>
				</div>
				<div class="col-md-5">
				<p>Selectionné une ville: </p>
					<?php

						require('assets/php/connexion.php');

						$req_listIles = "SELECT * from villes" ; //$sql : contient la requete sql 
						$res_listIles = $conn->query($req_listIles); //$result : execute la requete $sql

							//ILES
							echo '<select id="select_listIles" name="villeParIle">';

								foreach ($res_listIles as $value) {
									
									echo '<option value="'.$value["id"].'">';
										echo $value["name"];    
									echo '</option>';

								}

							echo '</select>';
					?>
				</div>
				
				<div class="col-md-2">
					<p></p>
					<input type="submit" name='btnVilleParIle' value="Ajouter" ></input>
				</div>
			</form>
		</div>
    </body>
</html>