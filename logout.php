<?php include ("html/init.php");
$_SESSION["username"] = "";
// Logout
session_destroy();
?>

<?php include ("html/templateTop.php"); ?>

<!-- Login again? -->
<div class="alert alert-danger alert-dismissible" role="alert">
	Ausgeloggt! <a data-toggle="modal" data-target="#loginModal">Neu einloggen</a>
</div>

<?php include ("html/templateBottom.php"); ?>
