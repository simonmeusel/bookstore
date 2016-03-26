<!--
BookStrore is a library management software.
Copyright (C) 2016  Simon Meusel

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

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
		$query = mysql_query("SELECT * FROM book WHERE hidden=false");

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
			<th onclick='infoBook($id)'>$bookname</th>
			<th onclick='infoBook($id)'>$bookauthor</th>
			<th onclick='infoBook($id)'>$bookisbn</th>
			<th>
			<button onclick='deleteBook($id)' class='btn btn-danger' title='Buch löschen'><span class='glyphicon glyphicon-pencil'></span></button>
			<button onclick='takeBook($id)' class='btn btn-primary' title='Buch ausleihen'><span class='glyphicon glyphicon-tags'></span></button>
			</th>
			</tr>";
		}
		?>
	</tbody>
</table>

<!-- JavaScript forms-->

<form id="takeBook" action="bookTake.php" method="POST">
	<input type="hidden" name="book" id="takeBookId">
</form>

<form id="infoBook" action="bookInfo.php" method="POST">
	<input type="hidden" name="id" id="infoBookId">
</form>

<?php include ("include/templateBottom.php"); ?>
