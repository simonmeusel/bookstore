<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
      </button>
      <a class="navbar-brand" href="">BookStore</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- Tabs -->
        <li><a href="index.php">Verfügbare Bücher</a></li>
        <?php
          if ($_SESSION["username"] != "") {
            echo '<li><a href="taken.php">Geliehene Bücher</a></li>';
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
                echo '<li><a href="addbook.php">
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
