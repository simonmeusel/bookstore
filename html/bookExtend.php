<?php include ("include/templateTop.php"); ?>

<!-- Extend book -->
<div class="row">
	<!-- Book information -->
	<form action="bookExtendDatabase.php" method="POST">
		Abgabedatum: <input type="date" name="deadline" class="form-control"> <br>
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
