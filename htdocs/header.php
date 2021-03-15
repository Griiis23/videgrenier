<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon vide grenier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="stylesheet" type="text/css" href="css/style.css?ver=2">

<body>
	<nav class="nav">
		<div class="nav__inner">
			<ul class="nav__list">
				<li class="nav__item">
					<a href="index.php" class="nav__link nav__link-title">Mon vide grenier</a>
				</li>
				<li class="nav__item">
					<a href="creer_annonce.php" class="nav__link">Déposer une annonce</a>
				</li>
				<?php if (isset($_SESSION['login'])) {?>
					<li class="nav__item">
						<a href="myaccount.php" class="nav__link">Mon compte</a>
					<li class="nav__item">
						<a href="disconnect.php" class="nav__link">Se déconnecter</a>
					</li>
				<?php } else { ?>
					<li class="nav__item">
						<a href="login.php" class="nav__link">Se connecter</a>
					</li>
					<li class="nav__item">
						<a href="register.php" class="nav__link">Créer un compte</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
