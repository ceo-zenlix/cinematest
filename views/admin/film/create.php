<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Добавление фильма</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  <?php
if(isset($_SESSION['message'])){ ?>
    <center> <h1 style="color:<?=$_SESSION['messageStyle']?>;">
      <?=$_SESSION['message']?></h1></center>
    <?php unset($_SESSION['message']); 
    unset($_SESSION['messageStyle']);
    // clear the value so that it doesn't display again
}
?>



<form action="/adminStoreFilm" method="POST" enctype="multipart/form-data"> 
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

<tr>
  <td ><label for="description">Постер *:</label></td>
  <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
</tr>

<hr>
<tr>
  <td ></td>
  <td><input type="submit" value="Добавить"></td>
</tr>



</table>
</form>


</div>

<?php
include 'views/admin/layout/footer.php';?>