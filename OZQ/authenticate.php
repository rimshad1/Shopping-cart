<?php
session_start();
if (isset($_SESSION['auth'])){

?>


<?php
} else {
	header('Location: sign_up.php');
	exit();
}
?>