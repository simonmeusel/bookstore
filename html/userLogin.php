<!--
BookStrore is a library management software.
Copyright (C) 2016  Simon Meusel

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<?php include ("include/init.php");

$username = $_POST['username'];
$password = $_POST['password'];

$connect = mysqli_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
mysqli_select_db($connect, "BookStore") or die("Table BookStore does not exist!");

$query = mysqli_query($connect, "SELECT * FROM user WHERE name='$username' AND password='$password'");
if (mysqli_num_rows($query) == 1) {
  $_SESSION["username"] = $username;
}
?>

<?php include ("include/templateTop.php"); ?>

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

<?php include ("include/templateBottom.php"); ?>
