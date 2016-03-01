function searchBooks () {
  // Search criterias
  var search = "";

  var title = document.getElementById("formTitle").value;
  var author = document.getElementById("formAuthor").value;
  var isbn = document.getElementById("formISBN").value;
  if (title != "") {
    search = search + "title:" + title;
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

  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "book.php", true);
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
