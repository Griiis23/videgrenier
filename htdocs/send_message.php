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
	else {
		$login=$_SESSION['login'];
		
		if (isset($_GET['to'])) {
			//Récupère le destinataire du message
			$dest = $_GET['to'];
			
			if(isset($_POST['text']) && !empty($_POST['text'])){
				$text=trim(htmlspecialchars($_POST['text']));

				$idcom=connex("myparam");
				$text=mysqli_real_escape_string($idcom,$text);

				$requete="INSERT INTO Message VALUES (0,'$login','$dest',NOW(),'$text')";
				$result=mysqli_query($idcom,$requete);
				if ($result) {
					header ('location: index.php');
				}
			}
		}
		else {
			header("Location: index.php");
		}
	}


?>
	<section class="wrapper">
		<form method="post" class="form" action="<?php echo $SERVER["PHP_SELF"]?>">
			<h1 class="form__title">Envoyer un message à <?php echo $dest;?></h1>
        	<textarea class="form__input" name="text" rows="10"></textarea><br>
        	<input class="form__input form__input--blue" type="submit" value="Envoyer"><br>
		</form>
	</section>

</body>
</html>