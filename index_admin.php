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
		
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>PANNEL ADMINISTRATEUR</b></u>
				</label>
			</div>
		</div>
		
		<br/><br/>
		
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>AJOUTER UNE LANGUE</b></u>
				</label>
			</div>
		</div>
		
		
		
		<div class="row" align="center">
			<div class="col-md-12 divAddLangue">
                <?php
				// <!-- FORM ADD NEW LANGUE -->
					echo '<form  method="POST">';
						echo '<br/>';
						echo '<p>';
							echo '<input type="text" name="name" placeholder="Nom">';
						echo '</p>';

						echo '<p>';
							echo '<input type="text" name="translate" placeholder="translate">';
						echo '</p>';

						echo '<p>';
							echo '<input type="submit" name="btn" value="Valider">';
						echo '</p>';
					echo '</form>';
                ?>
            </div>
		</div>

		
		<br/><br/>
		
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>LISTE DES LANGUES ET LA TRADUCTION</b></u>
				</label>
			</div>
		</div>
		
        <div class="row"  align="center">
            <div class="col-md-12 divListeLangue">
				<!-- Display list langue-->
                <?php
					if ($res_lang->num_rows > 0) {
						echo "<table>";
							echo "<th>";
								echo "Name";
							echo "</th>";

							echo "<th>";
								echo "Translate";
							echo "</th>";

							echo "<th>";
								echo "Actions";
							echo "</th>";
							echo "<th>";
							echo "</th>";
						foreach ($res_lang as $valeur) { 

							if (($etat == "ouvrir") && ($id_clique == $valeur['id'])) {
								echo '<form method="post">';
										echo "<input type='hidden' name='id_langue' value=" . $valeur['id'] . ">";
										echo "<tr>";
											echo "<td>";
												echo "<input type='text' name='new_name'  value='" . $valeur['name'] . "'>";
											echo "</td>";

											echo "<td>";
												echo "<input type='text' name='new_translate'  value='" . $valeur['translate'] . "'>";
											echo "</td>";

											echo "<td>";
												echo "<input type='submit' name='btn' value='Confirmer'/>";
											echo "</td>";
										echo "<tr>";
								echo '</form>';

							} 
							else {
								echo '<form method="post">';
									echo "<tr>";
										echo "<td>";
											echo $valeur['name'];
										echo "</td>";

										echo "<td>";
											echo $valeur['translate'];
										echo "</td>";

										echo "<td>";
												echo "<input type='submit' name='btn' value='Modifier'/>";
												echo "<input type='hidden' name='id_langue' value=" . $valeur['id'] . ">";
										echo "</td>";
										
										echo "<td>";
												echo "<input type='hidden' name='id_langue' value=" . $valeur['id'] . ">";
												echo "<input type='submit' name='btn' value='Supprimer'/>";
										echo "</td>";
									echo "</tr>";
								echo '</form>';	
							}
						}
						echo "</table>";
					} 
					else { 
						echo "Il n'y a aucun résultats";
					}
                ?>
            </div>
		</div>         
    </body>
</html>