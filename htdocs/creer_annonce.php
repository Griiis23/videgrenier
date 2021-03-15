<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php include("connex.inc.php");?>
<?php include("header.php");?>

<?php
	
	if(!isset($_SESSION['login']))
	{
		header("Location: login.php");
	}
	else{
		$err=array();
		if(isset($_POST['submit']))
		{
			$login=$_SESSION['login'];
			$idcom=connex("myparam");
			
			//Vérifie les champs requis
			if(!empty($_POST['desc'])) $desc=trim(htmlspecialchars($_POST['desc']));
			else $err['desc']="Veuillez saisir une description";

			if(!empty($_POST['prix'])) $prix=trim(htmlspecialchars($_POST['prix']));
			else $err['prix']="Veuillez saisir un prix";

			if(!empty($_POST['nom'])) $nom=trim(htmlspecialchars($_POST['nom']));
			else $err['nom']="Veuillez saisir un titre";

			if(!empty($_POST['cat'])) $cat=trim(htmlspecialchars($_POST['cat']));
			else $err['cat']="Veuillez selectionner une catégorie";

			foreach ($_FILES as $key => $file) {
				//Vérifie la taille du fichier
				if($file['size'] > 50000) $err[$key]="Votre fichier est trop volumineux";
				//Autorise que les fichiers de type png
				if($file['type'] != 'image/png') $err[$key]="Votre ficher doit être une image png";
			}
			
			//Si il n'y a pas d'erreur, on essaie d'enregistrer dans la base de données
			if (empty($err)) {
				//Echappe les caractères spéciaux des chaines utilisées dans la requête
				$desc=mysqli_real_escape_string($idcom,$desc);
				$nom=mysqli_real_escape_string($idcom,$nom);
				$cat=mysqli_real_escape_string($idcom,$cat);
				$prix=mysqli_real_escape_string($idcom,$prix);

				//Génère un id aléatoire et unique en fonction du login pour l'annonce
				$id=uniqid($login);

				//Définie le nouveau nom des fichiers en fonction de l'id
				$img1=$id."1.png";
				$img2=$id."2.png";
				$img3=$id."3.png";

				$requete="INSERT INTO Annonce 
				VALUES ('$id', '$login', '$cat', '$nom', $prix, NOW(),'$desc', '$img1', '$img2', '$img3')";
				$result=mysqli_query($idcom,$requete);

				//Si tout est OK on upload les fichiers et on redirige vers index.php
				if ($result) {
					move_uploaded_file($_FILES["img1"]["tmp_name"], "img/$img1");
					move_uploaded_file($_FILES["img2"]["tmp_name"], "img/$img2");
					move_uploaded_file($_FILES["img3"]["tmp_name"], "img/$img3");

					header ('location: index.php');
				}
			}
		}
	}
?>

	<section class="wrapper">
		
		<form method="post" enctype="multipart/form-data" class="form" action="<?php echo $SERVER["PHP_SELF"]?>">
			<h1 class="form__title">Créer une nouvelle annonce</h1>

			<label class="form__label">Titre de votre annonce : </label><br>
			<input class="form__input" type="text" name="nom" value="<?php echo $nom;?>"><br>
			<span class="form__err"><?php echo $err['nom'];?></span><br>

			<label class="form__label">Description : </label><br>
        	<textarea class="form__input" name="desc" rows="10"><?php echo $desc;?></textarea><br>
        	<span class="form__err"><?php echo $err['desc'];?></span><br>

			<label class="form__label">Catégorie : </label><br>
			<select class="form__input" name="cat"><br>
				<option selected disabled>Choisissez une catégorie</option>
            	<option value="Véhicule" <?php if($cat=="Véhicule") echo "selected";?>>Véhicule</option>
				<option value="Immobilier" <?php if($cat=="Immobilier") echo "selected";?>>Immobilier</option>
				<option value="Loisir" <?php if($cat=="Loisir") echo "selected";?>>Loisir</option>
				<option value="Mode" <?php if($cat=="Mode") echo "selected";?>>Mode</option>
				<option value="Multimedia" <?php if($cat=="Multimedia") echo "selected";?>>Multimedia</option>
				<option value="Maison" <?php if($cat=="Maison") echo "selected";?>>Maison</option>
				<option value="Matériel" <?php if($cat=="Matériel") echo "selected";?>>Matériel professionnel</option>
				<option value="Divers" <?php if($cat=="Divers") echo "selected";?>>Divers</option>
        	</select><br>
        	<span class="form__err"><?php echo $err['cat'];?></span><br>

        	<label class="form__label">Prix : </label><br>
			<input class="form__input" type="number" name="prix" min="0" max="99999" step="0.01" value="<?php echo $prix;?>"><br>
			<span class="form__err"><?php echo $err['prix'];?></span><br>

			<label class="form__label">Images : </label><br>
        	<input class="form__input" type="file" name="img1" accept="image/png" size="50"><br>
        	<span class="form__err"><?php echo $err['img1'];?></span><br>
        	<input class="form__input" type="file" name="img2" accept="image/png" size="50"><br>
        	<span class="form__err"><?php echo $err['img2'];?></span><br>
        	<input class="form__input" type="file" name="img3" accept="image/png" size="50"><br>
        	<span class="form__err"><?php echo $err['img3'];?></span><br>

        	<input class="form__input form__input--blue" type="submit" value="Envoyer" name="submit"><br>
		</form>
	</section>

</body>
</html>