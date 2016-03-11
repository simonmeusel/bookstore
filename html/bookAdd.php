<?php include ("include/templateTop.php"); ?>

<!-- Add book -->
<div class="row">
  <!-- Book information -->
  <div class="col-sm-12 col-lg-4">
    <form action="bookAddDatabase.php" method="POST">
      Name:               <input type="text" name="name" class="form-control" id="bookAddFormName"> <br>
      ISBN:               <input type="text" name="isbn" class="form-control" id="bookAddFormISBN"> <br>
      Author:             <input type="text" name="author" class="form-control" id="bookAddFormAuthor"> <br>
      Verlag:             <input type="text" name="publisher" class="form-control" id="bookAddFormPublisher"> <br>
      <button class="btn btn-warning" onclick="searchBooks()" type="button">Google books durchsuchen</button> <br> <hr>
      Buch ID             <input type="text" name="bid" class="form-control" id="bookAddFormBid"> <br>
      Spender:            <input type="text" name="giver" class="form-control" id="bookAddFormGiver"> <br>
      Fachgebiet:         <input type="text" name="field" class="form-control" id="bookAddFormField"> <br>
      Veröffentlichung:   <input type="text" name="publishingdate" class="form-control" id="bookAddFormPublishingdate"> <br>
      Preis:              <input type="text" name="price" class="form-control" id="bookAddFormPrice"> <br>
      Message:            <input type="text" name="message" class="form-control" id="bookAddFormMessage"> <br>
      <button class="btn btn-primary" action="submit">Buch hinzufügen</button>
    </form>
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
      <div>

      </div>
    </table>
  </div>
</div>

<?php include ("include/templateBottom.php"); ?>
