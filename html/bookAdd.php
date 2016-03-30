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
      <?php echo $lang["BOOK:NAME"]; ?>:
      <input type="text" name="name" class="form-control" id="bookAddFormName" autofocus> <br>
      <?php echo $lang["BOOK:ISBN"]; ?>:
      <input type="text" name="isbn" class="form-control" id="bookAddFormISBN"> <br>
      <?php echo $lang["BOOK:AUTHOR"]; ?>:
      <input type="text" name="author" class="form-control" id="bookAddFormAuthor"> <br>
      <?php echo $lang["BOOK:PUBLISHER"]; ?>:
      <input type="text" name="publisher" class="form-control" id="bookAddFormPublisher"> <br>
      <!-- Search for matching books (Google APIs) -->
      <button class="btn btn-warning" onclick="searchBooks()" type="button">Google books durchsuchen</button> <br> <hr>
      <?php echo $lang["BOOK:BID"]; ?>:
      <input type="text" name="bid" class="form-control" id="bookAddFormBid"> <br>
      <?php echo $lang["BOOK:GIVER"]; ?>:
      <input type="text" name="giver" class="form-control" id="bookAddFormGiver"> <br>
      <?php echo $lang["BOOK:FIELD"]; ?>:
      <input type="text" name="field" class="form-control" id="bookAddFormField"> <br>
      <?php echo $lang["BOOK:PUBLISHINGDATE"]; ?>:
  		<div class="form-group">
  			<div class='input-group date' id='datetimepicker3'>
  				<input type='text' class="form-control" name="publishingdate" id="bookAddFormPublishingdate">
  				<span class="input-group-addon">
  					<span class="glyphicon glyphicon-calendar"></span>
  				</span>
  			</div>
  		</div> <br>
      <?php echo $lang["BOOK:PRICE"]; ?>:
      <input type="text" name="price" class="form-control" id="bookAddFormPrice"> <br>
      <?php echo $lang["BOOK:MESSAGE"]; ?>:
      <input type="text" name="message" class="form-control" id="bookAddFormMessage"> <br>
      <button class="btn btn-primary" action="submit"><?php echo $lang["BOOK_ADD:ADD"]; ?>:</button>
    </form>
  </div>
  <!-- Google API Auto complete-->
  <div class="col-sm-12 col-lg-8">
    <!-- Search results-->
    <h2>
      <span class="glyphicon glyphicon-search"></span>
      <span id="bookCount"></span>
    </h2>

    <table class="table table-hover">
      <!-- Table header -->
      <thead>
        <tr>
          <th><?php echo $lang["BOOK:NAME"]; ?></th>
          <th><?php echo $lang["BOOK:AUTHOR"]; ?></th>
          <th><?php echo $lang["BOOK:ISBN"]; ?></th>
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
