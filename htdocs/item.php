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
			$idcom=connex("myparam");
			if (isset($_GET['id'])) {

				$id=$_GET['id'];
				$requete= "SELECT IMG1_A, IMG2_A, IMG3_A ,Nom_A, ID_Utilisateur, DATE_FORMAT(Date_A, '%d/%m/%Y à %H:%i'), Prix_A, Desc_A 
				FROM Annonce WHERE ID_Annonce = '$id'";
				$result=mysqli_query($idcom,$requete);
				if($result){
					$row = mysqli_fetch_array($result); 
					echo_card($row[0],$row[1],$row[2],$row[3],"par $row[4] le $row[5]",$row[6],$row[7],"send_message.php?to=$row[4]","Envoyer un message à $row[4] >");
				}
				mysqli_free_result($result);
			}	
		?>

	</section>
</body>
</html>