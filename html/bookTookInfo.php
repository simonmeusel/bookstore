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
    $id = $_POST["id"];
    $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
    mysql_select_db("BookStore") or die("Table BookStore does not exist!");

    $query = mysql_query("SELECT * FROM took WHERE id=$id");

    while ($row = mysql_fetch_assoc($query)) {
      // Basic Info
      // Name
      $name = $row["name"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Name</div>
      <div class=\"panel-body\">
      $name
      </div>
      </div>";
      // Class
      $class = $row["deadline"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Klasse</div>
      <div class=\"panel-body\">
      $class
      </div>
      </div>";
      // Date
      $date = $row["date"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Datum</div>
      <div class=\"panel-body\">
      $date
      </div>
      </div>";
      // Deadline
      $deadline = $row["deadline"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Abgabedatum</div>
      <div class=\"panel-body\">
      $deadline
      </div>
      </div>";
      // Extensions
      $extensions = $row["extensions"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Verlängerungen</div>
      <div class=\"panel-body\">
      $extensions
      </div>
      </div>";
      // Notice
      $notice = $row["notice"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Notiz</div>
      <div class=\"panel-body\">
      $notice
      </div>
      </div>";
      // Debug info
      echo '<div onclick="toggleHide()" class="alert alert-danger alert-dismissible" role="alert">';
      echo 'Du siehst hier Debug-Informationen. Sie können dem System-Administrator helfen, Probleme zu lösen. <div id="hide"> <hr>';
      foreach($row as $key=>$value) {
        echo "<p>$key : $value</p>";
      }
      echo '</div></div>';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    Du hast nicht die Erlaubnis diese Informationen zu sehen! <a data-toggle="modal" data-target="#loginModal">Login</a>
    </div>';
  }
  ?>
</div>

<script src="js/book/info.js"></script>

<?php include ("include/templateBottom.php"); ?>
