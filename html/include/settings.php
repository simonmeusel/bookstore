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

<?php
{ // Language
  // Available languages
  $lang_available = [
    // language => image availible
    // Save the image to lang/[ISO 639-3 language code].png
    // Example lang/deu.png
    "deu" => false,
  ];
  // Language for new users
  $lang_default = "deu";
}

{ // MySQL
  // Username of MySQL user with read and write permissions at database bookstore
  $mysqlUsername = "root";
  // Password of MySQL user with read and write permissions at database bookstore
  $mysqlPassword = "gof82";
}

{ // Google Book API
  $bookApiLanguage = "de";
}
?>
