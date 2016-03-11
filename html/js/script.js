var lastBookDelete = 0;

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

  xhttp.open("POST", "bookInfo.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var data = JSON.parse(xhttp.responseText);
      document.getElementById("bookCount").innerHTML = " " + data.totalItems + " Bücher gefunden!";
      var table = "";
      data.items.forEach(function (v, _, _){
        // ISBN (annoying?!)
        var isbn;
        try {
          var industryIdentifiers = v.volumeInfo.industryIdentifiers;
          var entriesII = industryIdentifiers.entries();
          var isbnent = entriesII.next();
          isbn = isbnent.value[1].identifier;
        } catch (err) {
          isbn = "-"
        }

        table = table + "<tr onclick='setInfoBook(\"" + v.volumeInfo.title + "\", \"" + v.volumeInfo.authors + "\", \"" + isbn +"\")'>";

        // Name
        table = table + "<th>" + v.volumeInfo.title + "</th>";
        // Author
        table = table + "<th>" + v.volumeInfo.authors + "</th>";
        //ISBN

        table = table + "<th>" + isbn + "</th>";

        table = table + "</tr>";
      });
      document.getElementById("tablebody").innerHTML = table;
    }
  };

  // Send request
  xhttp.send("search=" + search);
}

function setInfoBook(name, author, isbn) {
  document.getElementById("formTitle").value = name;
  document.getElementById("formAuthor").value = author;
  document.getElementById("formISBN").value = isbn;
}

function deleteBook (id) {
  lastBookDelete = id;
  $('#deleteModal').modal({ show: false})
  $('#deleteModal').modal("show");
}

function deleteBookDB () {
  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "bookDeleteDatabase.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      location.reload();
    }
  }

  // Send request
  xhttp.send("id=" + lastBookDelete);
}

function takebook(id) {
  document.getElementById("takebookId").value = id;
  document.getElementById("takebook").submit();
}

function giveback(id) {
  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "bookGivebackDtatabase.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      location.reload();
    }
  }

  // Send request
  xhttp.send("id=" + id);
}
