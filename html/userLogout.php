<?php include ("include/init.php");
$_SESSION["username"] = "";
// Logout
session_destroy();
?>

<?php include ("include/templateTop.php"); ?>

<!-- Login again? -->
<div class="alert alert-danger alert-dismissible" role="alert">
	Ausgeloggt! <a data-toggle="modal" data-target="#loginModal">Neu einloggen</a>
</div>

<?php include ("include/templateBottom.php"); ?>
