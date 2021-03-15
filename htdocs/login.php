<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php include("connex.inc.php");?>
<?php include("header.php");?>

<?php
	$err="";
	$idcom=connex("myparam");
	if(isset($_POST['mdp']) && isset($_POST['login']))
	{
		//Echappe les caractères spéciaux des chaines utilisées dans la requête
		$mdp=mysqli_real_escape_string($idcom,$_POST['mdp']);
		$login=mysqli_real_escape_string($idcom,$_POST['login']);

		//Vérifie que les informations coincident 
		$requete="SELECT * FROM Utilisateur WHERE ID_Utilisateur='$login' && Mdp_U='$mdp'";
		$result=mysqli_query($idcom,$requete);
		if(mysqli_num_rows($result) == 1)
		{
			session_start();
            $_SESSION['login']=$login;
            header("Location: myaccount.php");
		} 
		else $err="Nom d'utilisateur ou mot de passe incorrect";
	}
?>

	<section class="wrapper">
		<form method="post" class="form" action="<?php echo $SERVER["PHP_SELF"]?>">
			<h1 class="form__title">Veuillez vous connecter</h1>
			<span class="form__err"><?php echo $err;?></span>
			<input class="form__input" type="text" name="login" placeholder="Identifiant"><br>
			<input class="form__input" type="password" name="mdp" placeholder="Mot de passe"><br>
			<br>
			<input class="form__input form__input--blue" type="submit" value="Me connecter"><br>
		</form>
	</section>

</body>
</html>