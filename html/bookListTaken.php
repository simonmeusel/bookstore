<?php include ("include/templateTop.php"); ?>

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
		$connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
		mysql_select_db("BookStore") or die("Table BookStore does not exist!");

		// Book has to be available
		$query = mysql_query("SELECT * FROM book WHERE taken!=0");

		//$numrow = mysql_num_rows($query);

		// Add all books to table
		while ($row = mysql_fetch_assoc($query)) {
			$id = $row["taken"];
			$bookname = $row["name"];

			$query2 = mysql_query("SELECT * FROM took WHERE id=$id");

			$row = mysql_fetch_assoc($query2);
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
			<button onclick='alert(\"TODO: Add extend feature\")' class='btn btn-primary'><span class='glyphicon glyphicon-fast-forward'></span></button>
			<th>
			</tr>";
		}
		?>
	</tbody>
</table>

<?php include ("include/templateBottom.php"); ?>
