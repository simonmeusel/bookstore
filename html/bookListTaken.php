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
			<th>Mitglied</th>
			<th>Verlängerungen</th>
			<th>Überziehungsgebühren</th>
			<th>Abgabedatum</th>
			<th></th>
		</tr>
	</thead>
	<!-- Table body -->
	<tbody>
		<?php
		$connect = mysql_connect("localhost", "$mysqlUsername", "$mysqlPassword") or die("Could not connect to database!");
		mysql_select_db("BookStore") or die("Table BookStore does not exist!");

		// Book has to be taken
		$query = mysql_query("SELECT * FROM book WHERE taken!=0 AND hidden=false");

		//$numrow = mysql_num_rows($query);

		// Add all books to table
		while ($row = mysql_fetch_assoc($query)) {
			$id = $row["taken"];
			$bookname = $row["name"];

			$query2 = mysql_query("SELECT * FROM took WHERE id=$id");

			$row = mysql_fetch_assoc($query2);
			$deadline = $row["deadline"];
			$extensions = $row["extensions"];
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
			<th>$extensions</th>
			<th>$notice</th>
			<th>$deadline</th>
			<th>
			<button onclick='giveback($id)' class='btn btn-success'><span class='glyphicon glyphicon-ok'></span></button>
			<button onclick='extendbook($id)' class='btn btn-primary'><span class='glyphicon glyphicon-fast-forward'></span></button>
			<th>
			</tr>";
		}
		?>
	</tbody>
</table>

<!-- JavaScript forms-->

<form id="extendbook" action="bookExtend.php" method="POST">
	<input type="hidden" name="took" id="extendbookId">
</form>

<?php include ("include/templateBottom.php"); ?>
