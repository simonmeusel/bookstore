<?php include ("include/init.php");

if ($_SESSION['username'] != "") {
  $id = $_POST['id'];
  echo "ID: $id ";

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Add book to database
  $sql = "UPDATE book SET taken=0 WHERE taken=$id";

  // Run command
  echo "Response: ".mysql_query($sql, $connect);
}
?>
