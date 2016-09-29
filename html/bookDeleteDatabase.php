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

if ($_SESSION['username'] != "") {
  $id = $_POST['id'];

  // Connect to MySQL database
  $connect = mysqli_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysqli_select_db($connect, "BookStore") or die("Table BookStore does not exist!");

  // Delete book from database (Hide the book)
  //$sql = "DELETE FROM book WHERE id = $id";
  $sql = "UPDATE book SET hidden=true WHERE id=$id";

  // Run command
  $response = mysql_query($sql, $connect);
}
?>
