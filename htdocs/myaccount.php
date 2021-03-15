<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php include("connex.inc.php");?>
<?php include("header.php");?>
<?php include("card.php");?>
	
	<section class="wrapper">
		<?php
			if(!isset($_SESSION['login']))
			{
				header("Location: login.php");
			}
			else {
				$login=$_SESSION['login'];
				echo "<h1 class=\"page-title\">Bonjour $login</h1>";

				$idcom=connex("myparam");
				$requete= "SELECT ID_Expediteur, DATE_FORMAT(Date_M, '%d/%m/%Y à %H:%i'), Text_M
				FROM Message WHERE ID_Destinataire = '$login' ORDER BY Date_M Desc";

				//Affichage les messages de l'utlisateur connecté
				$result=mysqli_query($idcom,$requete);
				if($result){
					$numrow=mysqli_num_rows($result);
					echo "<h4 class=\"page-title\">$numrow messages</h4>";
					while ( $row = mysqli_fetch_array($result)) {
						echo_card_message("Message de $row[0]", "du $row[1]", $row[2], "send_message.php?to=$row[0]", "Répondre >");
					}
				}
				mysqli_free_result($result);

				$requete= "SELECT IMG1_A, IMG2_A, IMG3_A ,Nom_A, DATE_FORMAT(DATE_ADD(Date_A, INTERVAL 30 DAY), '%d/%m/%Y'), Prix_A, ID_Annonce 
				FROM Annonce WHERE ID_Utilisateur = '$login' ORDER BY Date_A Desc" ;

				//Affichage les annonces de l'utlisateur connecté
				$result=mysqli_query($idcom,$requete);
				$numrow=mysqli_num_rows($result);
				if($result){
					echo "<h4 class=\"page-title\">$numrow annonces</h4>";
					while ( $row = mysqli_fetch_array($result)) {
						echo_card($row[0],$row[1],$row[2],$row[3],"expire le $row[4]", $row[5],'',"supp_annonce.php?id=$row[6]","Supprimer >");
					}
				}
				mysqli_free_result($result);	
			}
		?>

	</section>
</body>
</html>