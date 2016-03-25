<?php include ("include/init.php");

if ($_SESSION['username'] != "") {
  $id = $_POST['id'];

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Delete book from database (Hide the book)
  //$sql = "DELETE FROM book WHERE id = $id";
  $sql = "UPDATE book SET hidden=true WHERE id=$id";

  // Run command
  $response = mysql_query($sql, $connect);
}
?>
