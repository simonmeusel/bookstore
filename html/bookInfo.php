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

<?php include ("include/templateTop.php"); ?>

<!-- Book -->
<div class="row">
  <!-- Book information -->
  <?php
  $id = $_POST["id"];
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  $query = mysql_query("SELECT * FROM book WHERE id=$id");

  while ($row = mysql_fetch_assoc($query)) {
    // Basic Info

    if ($_SESSION["username"] != "") {
      // TODO More info
      // Debug info
      echo '<div class="alert alert-danger alert-dismissible" role="alert">';
      echo 'Du siehst hier Debug-Informationen. Sie können dem System-Administrator helfen, Probleme zu lösen.<hr>';
      foreach($row as $key=>$value) {
        echo "<p>$key : $value</p>";
      }
      echo '</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
      Einige Informationen sind nicht sichtbar. Melden sie sich hier an, um sie freizuschalten <a data-toggle="modal" data-target="#loginModal">Login</a>.
      </div>';
    }
  }
  ?>
</div>

<?php include ("include/templateBottom.php"); ?>
