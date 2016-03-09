<?php include ("html/templateTop.php"); ?>

<!-- Add book -->
<div class="row">
  <!-- Book information -->
  <div class="col-sm-12 col-lg-4">
    <form action="addbookdb.php" method="POST">
      Name: <input type="text" name="name" class="form-control" id="formTitle"> <br>
      Author: <input type="text" name="author" class="form-control" id="formAuthor"> <br>
      ISBN: <input type="text" name="isbn" class="form-control" id="formISBN"> <br>
      Message: <input type="text" name="message" class="form-control" id="formMessage"> <br>
      <button class="btn btn-primary" action="submit">Buch hinzufügen</button>
    </form>
    <button class="btn btn-warning" onclick="searchBooks()" action="nothing">Google books durchsuchen</button>
  </div>
  <!-- Google API Auto complete-->
  <div class="col-sm-12 col-lg-8">
    <!-- Search results-->
    <h2>
      <span class="glyphicon glyphicon-search"></span>
      <span id="bookCount">0 Bücher gefunden</span>
    </h2>

    <table class="table table-hover">
      <!-- Table header -->
      <thead>
        <tr>
          <th>Name</th>
          <th>Author</th>
          <th>ISBN</th>
        </tr>
      </thead>
      <!-- Table body -->
      <tbody id="tablebody">
      </tbody>
    </table>
  </div>
</div>

<?php include ("html/templateBottom.php"); ?>
