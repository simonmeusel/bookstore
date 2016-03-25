<?php include ("include/init.php");

// Check account
if ($_SESSION["username"] != "") {
  //Recieve Post request
  $name = $_POST['name'];
  $notice = $_POST['notice'];
  $deadline = $_POST['deadline'];
  $book = $_POST['book'];

  $deadline = date("Y-m-d", strtotime($deadline));

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Add book to database
  $sql = "INSERT INTO took (name, date, deadline, notice, book)
  VALUES ('$name', NOW(), '$deadline', '$notice', $book)";

  // Run command
  $response = mysql_query($sql, $connect);
  $took = mysql_insert_id();

  echo "Took id = $took ; $book";

  $sql = "UPDATE book SET taken=$took WHERE id=$book";
  $response = mysql_query($sql, $connect);

}

?>

<?php include ("include/templateTop.php"); ?>

<!-- Login complete? -->

<?php
if ($_SESSION["username"] != "") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Buch ausgeliehen!
  <p>Befehl: '.$sql.'<p>
  <p>Antwork: '.$response.'</p>
  </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Du hast nicht die Erlaubnis ein Buch auszuleihen! <a data-toggle="modal" data-target="#loginModal">Login</a>
  </div>';
}
?>

<?php include ("include/templateBottom.php"); ?>
