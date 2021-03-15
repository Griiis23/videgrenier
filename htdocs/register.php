<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php include("connex.inc.php");?>
<?php include("header.php");?>

<?php
	$err = array();
	
	if(isset($_POST['mdp']) && isset($_POST['confirm']) && isset($_POST['nom']) && isset($_POST['login']) && isset($_POST['prenom']))
	{
		$idcom=connex("myparam");
		
		//Vérifie si le mot de passe est bien formé
		if(preg_match("/^[a-zA-Z0-9!@#$%^&*]{8,20}$/",$_POST['mdp'])){
			//Vérifie si les mots de passe sont identiques
			if($_POST['mdp'] == $_POST['confirm']){
				$mdp=$_POST['mdp'];
			} 
			else $err['confirm']="Mot de passe non identique";
		} 
		else $err['mdp']="Le mot de passe doit contenir entre 8 et 20 caractères (lettre, chiffre, symbole)";

		//Vérifie si le login est bien formé
		if(preg_match("/^[a-zA-Z0-9]{2,10}$/",$_POST['login'])){
			$login=$_POST['login'];

			//Vérifie si le login n'est pas deja utilisé
			$requete="SELECT * FROM Utilisateur WHERE ID_Utilisateur='$login'";
			$result=mysqli_query($idcom,$requete);
        	
        	if(mysqli_num_rows($result) > 0) $err['login']="Nom d'utilisateur déja utilisé";
		} 
		else $err['login']="Le nom d'utilisateur doit contenir entre 2 et 10 caractères (lettre, chiffre)";

		//Vérifie les champs requis
		if(!empty($_POST['prenom'])){
			$prenom=trim(htmlspecialchars($_POST['prenom']));
		}
		else $err['prenom']="Veuillez renseigner tous les champs";

		if(!empty($_POST['nom'])){
			$nom=trim(htmlspecialchars($_POST['nom']));
		}
		else $err['nom']="Veuillez renseigner tous les champs";

		//Si il n'y a pas d'erreur, on essaie d'enregistrer dans la base de données
        if(empty($err)){
        	//Echappe les caractères spéciaux des chaines utilisées dans la requête
        	$login=mysqli_real_escape_string($idcom,$login);
        	$nom=mysqli_real_escape_string($idcom,$nom);
        	$prenom=mysqli_real_escape_string($idcom,$prenom);
        	$mdp=mysqli_real_escape_string($idcom,$mdp);

        	$requete="INSERT INTO Utilisateur VALUES ('$login','$nom','$prenom','$mdp',NOW()) ";
            $result=mysqli_query($idcom,$requete);
            if($result) {
            	session_start();
       			$_SESSION['login']=$login;
            	header("Location: index.php");
            }
        }     
	}
?>
	<section class="wrapper">
		<form method="post" class="form" action="<?php echo $SERVER["PHP_SELF"]?>">
			<h1 class="form__title">Créer un nouveau compte</h1>
			<label class="form__label">Nom d'utilisateur : </label><br>
			<input class="form__input" type="text" name="login" value="<?php echo $login;?>"><br>
			<span class="form__err"><?php echo $err['login'];?></span><br>

			<label class="form__label">Nom : </label><br>
			<input class="form__input" type="text" name="nom" value="<?php echo $nom;?>"><br>
			<span class="form__err"><?php echo $err['nom'];?></span><br>

			<label class="form__label">Prénom : </label><br>
			<input class="form__input" type="text" name="prenom" value="<?php echo $prenom;?>"><br>
			<span class="form__err"><?php echo $err['prenom'];?></span><br>
			
			<label class="form__label">Mot de passe : </label><br>
			<input class="form__input" type="password" name="mdp"><br>
			<span class="form__err"><?php echo $err['mdp'];?></span><br>
			
			<label class="form__label">Confirmez votre mot de passe : </label><br>
			<input class="form__input" type="password" name="confirm"><br>
			<span class="form__err"><?php echo $err['confirm'];?></span><br>
			<input class="form__input form__input--blue" type="submit" value="S'inscrire"><br>
		</form>
	</section>