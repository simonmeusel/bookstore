<?php include ("include/init.php");

// Check account
if ($_SESSION["username"] != "") {
  //Recieve Post request
  $deadline = $_POST['deadline'];
  $took = $_POST['took'];

  $deadline = date("Y-m-d", strtotime($deadline));

  // Connect to MySQL database
  $connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
  // Select batabase
  mysql_select_db("BookStore") or die("Table BookStore does not exist!");

  // Get old extensions
  $query = "SELECT extensions FROM took WHERE id = $took";

  $result = mysql_query($query);

  while ($row = mysql_fetch_assoc($result)) {
    $extensions = $row["extensions"];
  }
  $extensions = $extensions . "// " . $deadline . " ";

  // Update extensions
  $sql = "UPDATE took SET extensions='$extensions' WHERE id=$took";
  mysql_query($sql, $connect);

  // Update deadline
  $sql = "UPDATE took SET deadline='$deadline' WHERE id=$took";
  $response = mysql_query($sql, $connect);

}

?>

<?php include ("include/templateTop.php"); ?>

<!-- Login complete? -->

<?php
if ($_SESSION["username"] != "") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Buch verlängert!
  <p>Befehl: '.$sql.'<p>
  <p>Antwork: '.$response.'</p>
  </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  Du hast nicht die Erlaubnis ein Buch zu verlängern! <a data-toggle="modal" data-target="#loginModal">Login</a>
  </div>';
}
?>

<?php include ("include/templateBottom.php"); ?>
