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

<!-- Add book -->
<div class="row">
  <!-- Book information -->
  <div class="col-sm-12 col-lg-4">
    <form action="bookAddDatabase.php" method="POST">
      Name:               <input type="text" name="name" class="form-control" id="bookAddFormName" autofocus> <br>
      ISBN:               <input type="text" name="isbn" class="form-control" id="bookAddFormISBN"> <br>
      Author:             <input type="text" name="author" class="form-control" id="bookAddFormAuthor"> <br>
      Verlag:             <input type="text" name="publisher" class="form-control" id="bookAddFormPublisher"> <br>
      <button class="btn btn-warning" onclick="searchBooks()" type="button">Google books durchsuchen</button> <br> <hr>
      Buch ID             <input type="text" name="bid" class="form-control" id="bookAddFormBid"> <br>
      Spender:            <input type="text" name="giver" class="form-control" id="bookAddFormGiver"> <br>
      Fachgebiet:         <input type="text" name="field" class="form-control" id="bookAddFormField"> <br>
      Veröffentlichung:   <input type="text" name="publishingdate" class="form-control" id="bookAddFormPublishingdate"> <br>
      Preis:              <input type="text" name="price" class="form-control" id="bookAddFormPrice"> <br>
      Notiz:            <input type="text" name="message" class="form-control" id="bookAddFormMessage"> <br>
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
    </table>
  </div>
</div>

<script src="js/book/add.js"></script>

<?php include ("include/templateBottom.php"); ?>
