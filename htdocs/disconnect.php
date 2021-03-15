<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php
	session_start ();
	session_unset();
	session_destroy();
	header ('location: index.php');
?>