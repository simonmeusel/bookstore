<?php include ("include/init.php");

// Check account
if ($_SESSION["username"] != "") {
  //Recieve Post request
  $bid = $_POST['bid'];
  $name = $_POST['name'];
  $isbn =  $_POST['isbn'];
  $author = $_POST['author'];
  $message = $_POST['message'];
  // SQL function NOW() $date = $_POST['date'];
  $publisher = $_POST['publisher'];
  $giver = $_POST['giver'];
  $field = $_POST['field'];
  $publishingdate = $_POST['publishingdate'];
  $price = $_POST['price'];

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Add book to database
  $sql = "INSERT INTO book (bid, name, isbn, author, message, date, publisher, giver, field, publishingdate, price, taken)
  VALUES ('$bid', '$name', '$isbn', '$author', '$message', NOW(), '$publisher', '$giver', '$field', '$publishingdate', '$price', 0)";

  // Run command
  $response = mysql_query($sql, $connect);
}

?>

<?php include ("include/templateTop.php"); ?>

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

<?php include ("include/templateBottom.php"); ?>