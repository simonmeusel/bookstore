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

// Check account
if ($_SESSION["username"] != "") {
  //Recieve Post request
  $deadline = $_POST['deadline'];
  $took = $_POST['took'];

  // Connect to MySQL database
  $connect = mysqli_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysqli_select_db($connect, "BookStore") or die("Table BookStore does not exist!");

  // Get old extensions
  $query = "SELECT extensions FROM took WHERE id = $took";

  $result = mysql_query($query);

  while ($row = mysql_fetch_assoc($result)) {
    $extensions = $row["extensions"];
  }
  $extensions = $extensions . "// " . $deadline . " ";

  // Update extensions
  $sql = "UPDATE took SET extensions='$extensions' WHERE id=$took";
  mysql_query($sql, $connect);

  // Update deadline
  $sql = "UPDATE took SET deadline='$deadline' WHERE id=$took";
  $response = mysql_query($sql, $connect);

}

?>

<?php include ("include/templateTop.php"); ?>

<!-- Login complete? -->

<?php
if ($_SESSION["username"] != "") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Buch verlängert!
  <p>Befehl: '.$sql.'<p>
  <p>Antwork: '.$response.'</p>
  </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Du hast nicht die Erlaubnis ein Buch zu verlängern! <a data-toggle="modal" data-target="#loginModal">Login</a>
  </div>';
}
?>

<?php include ("include/templateBottom.php"); ?>
