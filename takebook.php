<?php include ("html/templateTop.php"); ?>

<!-- Take book -->
<div class="row">
	<!-- Book information -->
	<form action="takebookdb.php" method="POST">
		Name: <input type="text" name="name" class="form-control" value="Test"> <br>
		Notiz: <input type="text" name="notice" class="form-control"> <br>
		Abgabedatum: <input type="date" name="deadline" class="form-control"> <br>
		<input type="hidden" name="book" value=
		<?php
		$book = $_POST["book"];
		echo '"'.$book.'"';
		?>
		>
		<button class="btn btn-primary" action="submit">Buch ausleihen</button>
	</form>
</div>

<?php include ("html/templateBottom.php"); ?>
