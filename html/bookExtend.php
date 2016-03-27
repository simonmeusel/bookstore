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

<!-- Extend book -->
<div class="row">
	<!-- Book information -->
	<form action="bookExtendDatabase.php" method="POST">
		Abgabedatum:
		<div class="form-group">
			<div class='input-group date' id='datetimepicker3'>
				<input type='text' class="form-control" name="deadline">
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</span>
			</div>
		</div> <br>

		<input type="hidden" name="took" value=
		<?php
		$book = $_POST["took"];
		echo '"'.$book.'"';
		?>
		>
		<button class="btn btn-primary" action="submit">Buch verlängern</button>
	</form>
</div>

<?php include ("include/templateBottom.php"); ?>
