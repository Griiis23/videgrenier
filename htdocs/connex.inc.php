<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>


<?php
function connex($param)
{
	include($param.".inc.php");
	$idcom=mysqli_connect(MYHOST,MYUSER,MYPASS,MYDB);
	if(!$idcom)
	{
    echo "<script type=text/javascript>";
		echo "alert('Connexion Impossible a la base')</script>";
	}
	return $idcom;
}
?>

