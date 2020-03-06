<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Добавление фильма</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  

<table style="width:100%">

<tr>
  <td style="
    width: 100px;
"><label for="fname">Название *:</label></td>
  <td><input type="text" id="fname" name="name"></td><br><br>
</tr>
<tr>
  <td ><label for="description">Описание *:</label></td>
  <td><textarea rows="5" type="text" id="description" name="description"></textarea></td><br><br>
</tr>

<hr>
<input type="submit" value="Добавить">


</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>