<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Все фильмы</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  
<h3><a href="/adminAddFilm">Добавить фильм</a></h3>
<table style="width:100%">

<tr>
  <th>Название</th>
  <th>Описание</th>
  <th>Постер</th>

  <th></th>
</tr>

<?php foreach ($films as $film) { ?>
<tr>
  <td><?=$film['name']?></td>
  <td><?=$film['description']?></td>
  <td><img style="width:200px;" src='/storage/<?=$film['poster']?>'></td>
  <td><small><a href='/adminEditFilm?id=<?=$film['id']?>'>[edit]</a> <a href='/adminDeleteFilm?id=<?=$film['id']?>'>[delete]</a></small></td>
</tr>
<?php } ?>




</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>