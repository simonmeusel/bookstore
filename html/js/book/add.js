var book;

function searchBooks () {
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
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var data = JSON.parse(xhttp.responseText);
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
