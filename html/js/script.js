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

var lastBookDelete = 0;

// Datepicker
$(function () {
  $('#datetimepicker3').datetimepicker({
    format: 'YYYY-MM-DD'
  });
});

function goTop() {
  window.scrollTo(0, 0);
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

function takeBook(id) {
  document.getElementById("takeBookId").value = id;
  document.getElementById("takeBook").submit();
}

function infoBook(id) {
  document.getElementById("infoBookId").value = id;
  document.getElementById("infoBook").submit();
}

function extendbook(id) {
  document.getElementById("extendbookId").value = id;
  document.getElementById("extendbook").submit();
}

function giveback(id) {
  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "bookGivebackDatabase.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      location.reload();
    }
  }

  // Send request
  xhttp.send("id=" + id);
}
