<!-- Datepicker Popup-->
<div id='datepickerModal' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Datum eingeben?</h4>
      </div>
      <div class='modal-body'>
        <?php include ("include/datepicker.php"); ?>
      </div>
    </div>
  </div>
</div>

<!-- Delete Popup-->
<div id='deleteModal' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Wirklich löschen?</h4>
      </div>
      <div class='modal-body'>
        <button class='btn btn-default' data-dismiss='modal' autofocus>Abbrechen</button>
        <button class='btn btn-danger' onclick='deleteBookDB()'>Löschen</button>
      </div>
    </div>
  </div>
</div>

<!-- Login Popup-->
<div id='loginModal' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Logge dich ein!</h4>
      </div>
      <div class='modal-body'>
        <form  action='userLogin.php' method='POST'>
          <div class='form-group'>
            Benutzer:<input type='text' name='username' class='form-control' autofocus>
            <br>
            Passwort:<input type='password' name='password' class='form-control'>
          </div>
          <button type='submit' class='btn btn-default'>Einloggen</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Logout Popup -->
<div id='logoutModal' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Logge dich aus!</h4>
      </div>
      <div class='modal-body'>
        <form  action='userLogout.php' method='POST'>
          <button type='submit' class='btn btn-default' autofocus>Ausloggen</button>
        </form>
      </div>
    </div>
  </div>
</div>
