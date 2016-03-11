<?php include ("include/templateTop.php"); ?>

<!-- Availible Books -->
<table class="table table-hover">
	<!-- Table header -->
	<thead>
		<tr>
			<th>Name</th>
			<th>Author</th>
			<th>ISBN</th>
			<th></th>
		</tr>
	</thead>
	<!-- Table body -->
	<tbody>
		<?php
		$connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
		mysql_select_db("BookStore") or die("Table BookStore does not exist!");

		// Book has to be availible
		$query = mysql_query("SELECT * FROM book"); // WHERE hidden=0

		$numrow = mysql_num_rows($query);

		// Add all books to table
		while ($row = mysql_fetch_assoc($query)) {
			$id = $row["id"];
			$bookname = $row["name"];
			$bookauthor = $row["author"];
			$bookisbn = $row["isbn"];
			// Mark taken books red
			$color = "";
			if ($row["taken"] != 0) {
				$color = 'class="danger"';
			}
			echo "<tr $color>
			<th onclick='alert($id)'>$bookname</th>
			<th onclick='alert($id)'>$bookauthor</th>
			<th onclick='alert($id)'>$bookisbn</th>
			<th>
			<button onclick='deleteBook($id)' class='btn btn-danger'><span class='glyphicon glyphicon-pencil'></span></button>
			<button onclick='takebook($id)' class='btn btn-primary'><span class='glyphicon glyphicon-tags'></span></button>
			</th>
			</tr>";
		}
		?>
	</tbody>
</table>

<!-- JavaScript forms-->

<form id="takebook" action="bookTake.php" method="POST">
	<input type="hidden" name="book" id="takebookId">
</form>

<?php include ("include/templateBottom.php"); ?>
