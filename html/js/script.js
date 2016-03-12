var lastBookDelete = 0;

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
