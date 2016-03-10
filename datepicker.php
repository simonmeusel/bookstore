<?php include ("html/templateTop.php") ?>

<?php
// Declare variables
if ($datepickerMethod == "") {
  $datepickerMethod = "POST";
}
if ($datepickerFormDate == "") {
  $datepickerFormDate = "datepickerDate";
}
?>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#datepickerTabRelative">Relativ</a></li>
  <li><a data-toggle="tab" href="#datepickerTabAbsolute">Absolut</a></li>
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

<form action=<?php "'$datepickerAction'" ?> method=<?php "'$datepickerMethod'" ?> id="datepickerForm">
  <input type="hidden" name=<?php "'$datepickerFormDate'" ?> value="">
</form>

<?php include ("html/templateBottom.php") ?>
