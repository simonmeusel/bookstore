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

<!-- Not in use yet -->

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#datepickerTabRelative">Relativ</a></li>
  <li><a data-toggle="tab" href="#datepickerTabAbsolute">Absolut (HTML 5)</a></li>
</ul>

<div class="tab-content">
    <div id="datepickerTabRelative" class="tab-pane fade in active">
      <br>
      <p style="color:#8e8e8e">
        Mit der relativen Eingabe kann man ein Datum relativ zur jetzigen Uhrzeit einstellen.
        Die Eingabe erfolgt in Monaten und Tagen.
      </p>
      <input type="number" placeholder="Monate" class="form-control"> <br>
      <input type="number" placeholder="Tage" class="form-control"> <br>
      <hr>
    </div>
    <div id="datepickerTabAbsolute" class="tab-pane fade">
      <br>
      <p style="color:#8e8e8e">
        Mit der absoluten Eingabe kann man ein Datum genau einstellen.
        Einige Browser unterstützen diese feature allerdings nicht. <a href="http://caniuse.com/#search=input%20date" target="_blank">(Welche?)</a>
      </p>
      <input type="date" class="form-control"> <br>
      <hr>
    </div>
</div>
