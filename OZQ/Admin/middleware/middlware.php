<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include '../Functions/myfunctions.php';

?>


<?php
} else {
	header('Location: index.php');
	exit();
}
?>