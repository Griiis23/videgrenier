<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php include("connex.inc.php");?>
<?php
	session_start ();
	if(!isset($_SESSION['login']))
	{
		header("Location: login.php");
	}
	else {
		if (isset($_GET['id'])) {
			$login=$_SESSION['login'];
			$idcom=connex("myparam");
			$id=$_GET['id'];

			//Vérifie que l'utilisateur connecté est bien le propriétaire de l'annonce
			$requete= "SELECT IMG1_A, IMG2_A, IMG3_A FROM Annonce WHERE ID_Annonce = '$id' AND ID_Utilisateur = '$login'";
			$result=mysqli_query($idcom,$requete);
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result); 
				unlink("img/$row[0]");
				unlink("img/$row[1]");
				unlink("img/$row[2]");
			}
			$requete= "DELETE FROM Annonce WHERE ID_Annonce = '$id' AND ID_Utilisateur = '$login'";
			$result=mysqli_query($idcom,$requete);


			mysqli_free_result($result);
		}
		header ('location: myaccount.php');
	}
	
?>