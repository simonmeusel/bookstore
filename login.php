<?php include ("init.php");

$username = $_POST['username'];
$password = $_POST['password'];

$connect = mysql_connect("localhost", "root", "") or die("Could not connect to database!");
mysql_select_db("BookStore") or die("Table BookStore does not exist!");

$query = mysql_query("SELECT * FROM user WHERE name='$username' AND password='$password'");
if (mysql_num_rows($query) == 1) {
  $_SESSION["username"] = $username;
}
?>

<?php include ("html/templateTop.php"); ?>

<!-- Login complete? -->
<?php
if ($_SESSION["username"] == "") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Einloggen fehlgeschlagen! <a data-toggle="modal" data-target="#loginModal">Erneut versuchen</a>
  </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Einloggen erfolgreich! Vergiss nicht dich <a data-toggle="modal" data-target="#logoutModal">Auszuloggen</a>
  </div>';
}
?>

<?php include ("html/templateBottom.php"); ?>
