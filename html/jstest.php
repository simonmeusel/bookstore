<script>
var v;
function searchBooks () {
  var search = "title:Harry Potter";

  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "bookInfo.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var data = JSON.parse(xhttp.responseText);
      var table = "";
      v = data.items;
    }
  };
  xhttp.send("search=" + search);
}
searchBooks ();
</script>
