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

<nav class="navbar navbar-default navbar-fixed-top unselectable">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
      </button>
      <a class="navbar-brand" href="about.php"> BookStore</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- Tabs -->
        <li><a href="bookListAvailable.php">Verfügbare Bücher</a></li>
        <?php
          if ($_SESSION["username"] != "") {
            echo '<li><a href="bookListTaken.php">Geliehene Bücher</a></li>';
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- Account Management -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
            <?php echo $_SESSION["username"] ?>
            <span class="glyphicon glyphicon-user"></span>
          </a>
          <ul class="dropdown-menu">
            <?php
              if ($_SESSION["username"] == "") {
                echo '<li><a href="" data-toggle="modal" data-target="#loginModal">
                  <span class="glyphicon glyphicon-edit"></span>
                  Login
                </a></li>';
              } else {
                echo '<li><a href="" data-toggle="modal" data-target="#logoutModal">
                  <span class="glyphicon glyphicon-edit"></span>
                  Logout
                </a></li>';
                echo '<li><a href="bookAdd.php">
                  <span class="glyphicon glyphicon-edit"></span>
                  Buch hinzufügen
                </a></li>';
              }
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
