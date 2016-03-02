<?php session_start();
  if ($_SESSION['username'] != "") {
    $id = $_POST['id'];

    // Connect to MySQL database
    $connect = mysql_connect("localhost", "root", "root") or die("Could not connect to database!");
    // Select batabase
    mysql_select_db("BookStore") or die("Table BookStore does not exist!");

    // Add book to database
    $sql = "DELETE FROM book WHERE id = $id";

    // Run command
    $response = mysql_query($sql, $connect);
  }
?>
