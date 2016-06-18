/*
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
*/

var book;

// Animation
function startAnimation() {
  stopAnimation();
  var amount = Math.floor($(window).width() / 100);
  var parent = document.getElementById("load");
  var loadScreen = document.createElement("div");
  loadScreen.className = "loadScreen";
  parent.appendChild(loadScreen);
  for (var i = 0; i < amount; i++) {
    var child = document.createElement("div");
    child.className = "loadSquare";
    child.style.animation = "loadSquare " + (Math.random() / 2 + 0.5) + "s linear infinite";
    child.style.opacity = Math.random();
    child.style.width = (100 / amount) + "%";
    child.style.marginLeft = (100 / amount * i) + "%";
    loadScreen.appendChild(child);
  }
  var child = document.createElement("div");
  child.innerHTML = "Buchinformationen werden geladen";
  child.className = "loadText";
  loadScreen.appendChild(child);
}

function stopAnimation() {
  $("#load").empty();
}

function searchBooks () {

  startAnimation();

  // Search criterias
  var search = "";

  var name = document.getElementById("bookAddFormName").value;
  var author = document.getElementById("bookAddFormAuthor").value;
  var isbn = document.getElementById("bookAddFormISBN").value;
  var publisher = document.getElementById("bookAddFormPublisher").value;

  if (name != "") {
    search = search + "title:" + name;
  }
  if (author != "") {
    if (search != "") {
      search = search + "------";
    }
    search = search + "author:" + author;
  }
  if (isbn != "") {
    if (search != "") {
      search = search + "------";
    }
    search = search + "isbn:" + isbn;
  }
  if (publisher != "") {
    if (search != "") {
      search = search + "------";
    }
    search = search + "inpublisher:" + publisher;
  }

  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "bookGoogleAPI.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
      stopAnimation();
    }
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var jsonData = xhttp.responseText.substring(xhttp.responseText.indexOf("{"));
      console.log(jsonData);
      var data = JSON.parse(jsonData);
      document.getElementById("bookCount").innerHTML = " " + data.totalItems + " Bücher gefunden!";
      var table = "";
      data.items.forEach(function (book, _, _){

        var name = getBookName (book);
        var isbn = getBookISBN (book);
        var author = getBookAuthor (book);
        var publisher = getBookPublisher (book);
        var publisheddate = getBookPublishingdate (book);
        var price = getBookPrice (book);

        table = table + "<tr onclick='setInfoBook(\"" + name + "\",\"" + isbn +"\",\"" + author + "\",\"" + publisher + "\",\"" + publisheddate + "\",\"" + price + "\")'>";

        // Table entry: Name, Author, ISBN
        table = table + "<th>" + name + "</th>";
        table = table + "<th>" + author + "</th>";
        table = table + "<th>" + isbn + "</th>";

        table = table + "</tr>";
      });
      document.getElementById("tablebody").innerHTML = table;
    }
  };

  // Send request
  xhttp.send("search=" + search);
}

function setInfoBook(name, isbn, author, publisher, publisheddate, price) {
  document.getElementById("bookAddFormName").value = name;
  document.getElementById("bookAddFormISBN").value = isbn;
  document.getElementById("bookAddFormAuthor").value = author;
  document.getElementById("bookAddFormPublisher").value = publisher;
  document.getElementById("bookAddFormPublishingdate").value = publisheddate;
  document.getElementById("bookAddFormPrice").value = price;
}

function getBookName (book) {
  return book.volumeInfo.title
}

function getBookISBN (book) {
  try {
    var industryIdentifiers = book.volumeInfo.industryIdentifiers;
    var entriesII = industryIdentifiers.entries();
    var isbnent = entriesII.next();
    return isbnent.value[1].identifier;
  } catch (err) {
    return "";
  }
}

function getBookAuthor (book) {
  return book.volumeInfo.authors;
}

function getBookPublisher (book) {
  return book.volumeInfo.publisher;
}

function getBookPublishingdate (book) {
  return book.volumeInfo.publishedDate;
}

function getBookPrice (book) {
  try {
    return book.saleInfo.listPrice.amount + "" + book.saleInfo.listPrice.currencyCode;
  } catch (e) {
    return "";
  }
}
