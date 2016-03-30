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

<!-- Delete Popup-->
<div id='deleteModal' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'><?php echo $lang["MODAL:CONFIRMDELETE"]; ?></h4>
      </div>
      <div class='modal-body'>
        <button class='btn btn-danger' onclick='deleteBookDB()'><?php echo $lang["MODAL:DELETE"]; ?></button>
          <button class='btn btn-default' data-dismiss='modal' autofocus><?php echo $lang["MODAL:CANCEL"]; ?></button>
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
        <h4 class='modal-title'><?php echo $lang["MODAL:LOGIN"]; ?></h4>
      </div>
      <div class='modal-body'>
        <form  action='userLogin.php' method='POST'>
          <div class='form-group'>
            <?php echo $lang["MODAL:USERNAME"]; ?>:<input type='text' name='username' class='form-control' autofocus>
            <br>
            <?php echo $lang["MODAL:PASSWORD"]; ?>:<input type='password' name='password' class='form-control'>
          </div>
          <button type='submit' class='btn btn-default'><?php echo $lang["MODAL:LOGIN"]; ?></button>
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
        <h4 class='modal-title'><?php echo $lang["MODAL:LOGOUT"]; ?></h4>
      </div>
      <div class='modal-body'>
        <form  action='userLogout.php' method='POST'>
          <button type='submit' class='btn btn-default' autofocus><?php echo $lang["MODAL:LOGOUT"]; ?></button>
        </form>
      </div>
    </div>
  </div>
</div>
