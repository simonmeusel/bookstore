<?php session_start(); ini_set('display_errors','off'); ?>
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

			<!-- Availible Books -->
			<table class="table table-hover">
				<!-- Table header -->
				<thead>
					<tr>
						<th>Name</th>
						<th>Mitglied</th>
						<th>Notiz</th>
						<th>Abgabedatum</th>
						<th></th>
					</tr>
				</thead>
				<!-- Table body -->
				<tbody>
					<?php
						$connect = mysql_connect("localhost", "root", "") or die("Could not connect to database!");
						mysql_select_db("BookStore") or die("Table BookStore does not exist!");

						// Book has to be available
						$query = mysql_query("SELECT * FROM book WHERE taken!=0");

						//$numrow = mysql_num_rows($query);

						// Add all books to table
						while ($row = mysql_fetch_assoc($query)) {
							$id = $row["taken"];
							$bookname = $row["name"];

							$query = mysql_query("SELECT * FROM took WHERE id=$id");

							$row = mysql_fetch_assoc($query);
							$deadline = $row["deadline"];
							$notice = $row["notice"];
							$name = $row["name"];

							// Red color for overtime
							$color = "";
							if($deadline < date("Y-m-d H:i:s")) {
								$color = 'class="danger"';
							}

							echo "<tr $color>
								<th>$bookname</th>
								<th>$name</th>
								<th>$notice</th>
								<th>$deadline</th>
								<th>
									<button onclick='giveback($id)' class='btn btn-success'><span class='glyphicon glyphicon-ok'></span></button>
								<th>
							</tr>";
						}
					?>
				</tbody>
			</table>

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
