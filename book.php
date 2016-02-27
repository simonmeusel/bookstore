<?php
  $search = urlencode ($_POST['search']);
  $page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search&maxResults=40&langRestrict=de");

  echo "$page";
?>
