<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>


<?php include("connex.inc.php");?>
<?php include("header.php");?>
<?php include("card.php");?>
   
	<?php
		if (isset($_GET['mot']) && isset($_GET['cat']) && isset($_GET['min']) && isset($_GET['max']) && isset($_GET['tri']) ) {
			//Récupère les données du formulaire
			$mot = trim(htmlspecialchars($_GET['mot']));
			$cat = trim(htmlspecialchars($_GET['cat']));
			$min = trim(htmlspecialchars($_GET['min']));
			$max = trim(htmlspecialchars($_GET['max']));
			$tri = trim(htmlspecialchars($_GET['tri']));
		}
	?>

	<section class="wrapper">
        <h1 class="page-title">Que recherchez-vous ?</h1>
		<form class="form" method="get" action="<?php echo $SERVER["PHP_SELF"]?>">
			<input class="form__input" type="search" name="mot" placeholder="Tappez un mot-clé" value="<?php echo $mot;?>" >
			<select class="form__input form__input--small" name="cat">
				<option value="all">Toutes les catégories</option>
				<option value="Véhicule" <?php if($cat=="Véhicule") echo "selected";?>>Véhicule</option>
				<option value="Immobilier" <?php if($cat=="Immobilier") echo "selected";?>>Immobilier</option>
				<option value="Loisir" <?php if($cat=="Loisir") echo "selected";?>>Loisir</option>
				<option value="Mode" <?php if($cat=="Mode") echo "selected";?>>Mode</option>
				<option value="Multimedia" <?php if($cat=="Multimedia") echo "selected";?>>Multimedia</option>
				<option value="Maison" <?php if($cat=="Maison") echo "selected";?>>Maison</option>
				<option value="Matériel" <?php if($cat=="Matériel") echo "selected";?>>Matériel professionnel</option>
				<option value="Divers" <?php if($cat=="Divers") echo "selected";?>>Divers</option>
			</select>
			<select class="form__input form__input--small" name="tri">
				<option value="date" <?php if($tri=="date") echo "selected";?>>Tri : Date</option>
				<option value="prix" <?php if($tri=="prix") echo "selected";?>>Tri : Prix</option>
			</select>
			<input class="form__input form__input--small" type="number" name="min" placeholder="Prix Min" min="0" max="99999" size="5" value="<?php echo $min;?>" >
			<input class="form__input form__input--small" type="number" name="max" placeholder="Prix Max" min="0" max="99999" size="5" value="<?php if(isset($_GET['max'])) echo $_GET['max'];?>">
			<input class="form__input form__input--blue form__input--small" type="submit">
		</form>
	
		<?php

			$idcom=connex("myparam");
			$requete= "SELECT IMG1_A, IMG2_A, IMG3_A ,Nom_A, ID_Utilisateur, DATE_FORMAT(Date_A, '%d/%m/%Y à %H:%i'), Prix_A, ID_Annonce 
			FROM Annonce WHERE 1";

			//Complete la requete
			if(!empty($mot)){
				$mot = mysqli_real_escape_string($idcom,$mot);
				$requete .= " AND Nom_A LIKE '%$mot%' OR Desc_A LIKE '%$mot%'";
			}

			if(!empty($min)) $requete .= " AND Prix_A >= $min";
			if(!empty($max)) $requete .= " AND Prix_A <= $max";

			if(!empty($cat) && ($cat != "all")) $requete .= " AND Type='$cat'";

			if(empty($tri)) $requete .= " ORDER BY Date_A Desc";
			elseif ($tri=="date") $requete .= " ORDER BY Date_A Desc";
			elseif ($tri=="prix") $requete .= " ORDER BY Prix_A";

			//Affichage des résultats
			$result=mysqli_query($idcom,$requete);
			if($result){
				$numrow=mysqli_num_rows($result);
				echo "<h4 class=\"page-title\">$numrow résultats</h4>";
				while ( $row = mysqli_fetch_array($result)) {
					echo_card($row[0],$row[1],$row[2],$row[3],"par $row[4] le $row[5]", $row[6],'',"item.php?id=$row[7]","En savoir plus >");
				}
			}

			mysqli_free_result($result);
			
			
		?>


	</section>
</body>
</html>