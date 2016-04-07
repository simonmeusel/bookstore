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

<!-- Took -->
<div class="row">
  <!-- Took information -->
  <?php

  if ($_SESSION["username"] != "") {
    echo "<form action='bookTookEditDatabase.php' method='POST'>";

    $id = $_POST["id"];
    $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
    mysql_select_db("BookStore") or die("Table BookStore does not exist!");

    $query = mysql_query("SELECT * FROM took WHERE id=$id");

    while ($row = mysql_fetch_assoc($query)) {
      // Basic Info
      // MySQL id
      echo "<input type='hidden' name='id' class='form-control' value='$id'>";
      // Name
      $name = $row["name"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Name</div>
      <div class=\"panel-body\">
      <input type='text' name='name' class='form-control' value='$name' autofocus>
      </div>
      </div>";
      // Class
      $name = $row["class"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Klasse</div>
      <div class=\"panel-body\">
      <input type='text' name='class' class='form-control' value='$class' autofocus>
      </div>
      </div>";
      // Notice
      $name = $row["notice"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Notiz</div>
      <div class=\"panel-body\">
      <input type='text' name='notice' class='form-control' value='$notice' autofocus>
      </div>
      </div>";

      echo "<button class='btn btn-primary'>Änderungen speichern</button>";

      echo "</form> <hr>";
      // Debug info
      echo '<div onclick="toggleHide()" class="alert alert-danger alert-dismissible" role="alert">';
      echo 'Du siehst hier Debug-Informationen. Sie können dem System-Administrator helfen, Probleme zu lösen. <div id="hide"> <hr>';
      foreach($row as $key=>$value) {
        echo "<p>$key : $value</p>";
      }
      echo '</div></div>';
    }
  }
  ?>
</div>

<script src="js/book/info.js"></script>

<?php include ("include/templateBottom.php"); ?>
