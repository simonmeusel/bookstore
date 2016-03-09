<?php session_start(); ini_set('display_errors','off');

  // Check account
  if ($_SESSION["username"] != "") {
    //Recieve Post request
    $name = $_POST['name'];
    $notice = $_POST['notice'];
    $deadline = $_POST['deadline'];
    $book = $_POST['book'];

    $deadline = date("Y-m-d", strtotime($deadline));

    // Connect to MySQL database
    $connect = mysql_connect("localhost", "root", "") or die("Could not connect to database!");
    // Select batabase
    mysql_select_db("BookStore") or die("Table BookStore does not exist!");

    // Add book to database
    $sql = "INSERT INTO took (name, date, deadline, notice)
      VALUES ('$name', NOW(), '$deadline', '$notice')";

    // Run command
    $response = mysql_query($sql, $connect);
    $took = mysql_insert_id();

    echo "Took id = $took ; $book";

    $sql = "UPDATE book SET taken=$took WHERE id=$book";
    $response = mysql_query($sql, $connect);

  }

?>
<html>
	<head>
		<meta charset="utf-8">

		<title>BookStore</title>

		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>

		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="icon-bar"> </span>
							<span class="icon-bar"> </span>
							<span class="icon-bar"> </span>
						</button>
						<a class="navbar-brand" href="">BookStore</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar-collapse-1">
						<ul class="nav navbar-nav">
              <!-- Tabs -->
              <li><a href="index.php">Verfügbare Bücher</a></li>
							<?php
								if ($_SESSION["username"] != "") {
									echo '<li><a href="taken.php">Geliehene Bücher</a></li>';
								}
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
              <!-- Account Management -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                  <?php echo $_SESSION["username"] ?>
                  <span class="glyphicon glyphicon-user"></span>
                </a>
								<ul class="dropdown-menu">
									<?php
                    if ($_SESSION["username"] == "") {
                      echo '<li><a href="" data-toggle="modal" data-target="#loginModal">
                  			<span class="glyphicon glyphicon-edit"></span>
                  			Login
                  		</a></li>';
                    } else {
                      echo '<li><a href="" data-toggle="modal" data-target="#logoutModal">
                  			<span class="glyphicon glyphicon-edit"></span>
                  			Logout
                  		</a></li>';
											echo '<li><a href="addbook.php">
                  			<span class="glyphicon glyphicon-edit"></span>
                  			Buch hinzufügen
                  		</a></li>';
                    }
                  ?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="row toppadding">
				<div class="col-sm-12">
					<noscript>
						<div class="alert alert-danger alert-dismissible" role="alert">
							Dein Browser unterstützt kein Java-Script! <a href="" class="alert-link">Mehr dazu ...</a>
						</div>
					</noscript>
				</div>
			</div>
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

      <!-- Login Popup-->
    	<div id='loginModal' class='modal fade' role='dialog'>
    		<div class='modal-dialog modal-sm'>
  				<div class='modal-content'>
  					<div class='modal-header'>
    					<button type='button' class='close' data-dismiss='modal'>&times;</button>
    					<h4 class='modal-title'>Logge dich ein!</h4>
    				</div>
    				<div class='modal-body'>
    					<form  action='login.php' method='POST'>
  							<div class='form-group'>
  								Benutzer:<input type='text' name='username' class='form-control'>
    							<br>
    							Passwort:<input type='password' name='password' class='form-control'>
    						</div>
    						<button type='submit' class='btn btn-default'>Einloggen</button>
    					</form>
    				</div>
  				</div>
  			</div>
    	</div>
      <!-- Logout Popup -->
      <div id='logoutModal' class='modal fade' role='dialog'>
    		<div class='modal-dialog modal-sm'>
  				<div class='modal-content'>
  					<div class='modal-header'>
    					<button type='button' class='close' data-dismiss='modal'>&times;</button>
    					<h4 class='modal-title'>Logge dich aus!</h4>
    				</div>
    				<div class='modal-body'>
    					<form  action='logout.php' method='POST'>
    						<button type='submit' class='btn btn-default'>Ausloggen</button>
    					</form>
    				</div>
  				</div>
  			</div>
    	</div>
		</div>

    <!-- Footer with additional info -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						Created by Simon Meusel
					</div>
					<div class="col-sm-4">
						BookStrore
					</div>
					<div class="col-sm-4">
						Go back up
					</div>
				</div>
			</div>
		</footer>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
