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
  $id = mysql_real_escape_string($_POST["id"]);
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  $query = mysql_query("SELECT * FROM book WHERE id=$id");

  while ($row = mysql_fetch_assoc($query)) {
    // Basic Info
    // Book id
    $bid = $row["bid"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Name</div>
    <div class=\"panel-body\">
    $bid
    </div>
    </div>";
    // Name
    $name = $row["name"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Name</div>
    <div class=\"panel-body\">
    $name
    </div>
    </div>";
    // ISBN
    $isbn = $row["isbn"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Isbn</div>
    <div class=\"panel-body\">
    $isbn
    </div>
    </div>";
    // Author
    $author = $row["author"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Author</div>
    <div class=\"panel-body\">
    $author
    </div>
    </div>";
    // Publisher
    $publisher = $row["publisher"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Verlag</div>
    <div class=\"panel-body\">
    $publisher
    </div>
    </div>";
    // Publishing date
    $publishingDate = $row["publishingDate"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Herausgabedatum</div>
    <div class=\"panel-body\">
    $publishingDate
    </div>
    </div>";
    // Field
    $field = $row["field"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Gebiet</div>
    <div class=\"panel-body\">
    $field
    </div>
    </div>";
    // Price
    $price = $row["price"];
    echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">Preis</div>
    <div class=\"panel-body\">
    $price
    </div>
    </div>";

    if ($_SESSION["username"] != "") {
      // More info
      // Giver
      $giver = $row["giver"];
      echo "<div class=\"panel panel-default\">
      <div class=\"panel-heading\">Spender</div>
      <div class=\"panel-body\">
      $giver
      </div>
      </div>";
      // Edit
      echo "
      <form action='bookEdit.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <button action='submit' class='btn btn-warning'>Buchinformationen bearbeiten</button>
      </form>
      <hr>
      ";
      // Debug info
      echo '<div onclick="toggleHide()" class="alert alert-danger alert-dismissible" role="alert">';
      echo 'Du siehst hier Debug-Informationen. Sie können dem System-Administrator helfen, Probleme zu lösen. <div id="hide"> <hr>';
      foreach($row as $key=>$value) {
        echo "<p>$key : $value</p>";
      }
      echo '</div></div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
      Einige Informationen sind nicht sichtbar. Melden sie sich hier an, um sie freizuschalten <a data-toggle="modal" data-target="#loginModal">Login</a>.
      </div>';
    }
  }
  ?>
</div>

<script src="js/book/info.js"></script>

<?php include ("include/templateBottom.php"); ?>
