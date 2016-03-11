<?php include ("html/init.php");

// Check account
if ($_SESSION["username"] != "") {
  //Recieve Post request
  $name = $_POST['name'];
  $author = $_POST['author'];
  $isbn =  $_POST['isbn'];
  $date = $_POST['date'];
  $message = $_POST['message'];

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Add book to database
  $sql = "INSERT INTO book (name, isbn, author, message, date, taken)
  VALUES ('$name', '$isbn', '$author', '$message', NOW(), 0)";

  // Run command
  $response = mysql_query($sql, $connect);
}

?>

<?php include ("html/templateTop.php"); ?>

<!-- Book added? -->
<?php
if ($_SESSION["username"] != "") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Buch hinzugefügt!
  <p>Befehl: '.$sql.'<p>
  <p>Antwork: '.$response.'</p>
  </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Du hast nicht die Erlaubnis ein Buch hinzuzufügen! <a data-toggle="modal" data-target="#loginModal">Login</a>
  </div>';
}
?>

<?php include ("html/templateBottom.php"); ?>
