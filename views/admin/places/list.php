<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Все места</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  
<h4>Ряды</h4>
<table style="width:100%">

<tr>
  <th>id</th>
  <th>Ряд</th>
  
</tr>

<?php foreach ($rs as $row) { ?>
<tr>
  <td><?=$row['id']?></td>
  <td><?=$row['row']?></td>
</tr>
<?php } ?>


<h4>Места</h4>
<table style="width:100%">

<tr>
  <th>id</th>

  <th>Ряд</th>
  <th>Место</th>
  
</tr>

<?php foreach ($places as $place) { ?>
<tr>
  <td><?=$place['id']?></td>
  <td><?=$place['r']?></td>
  <td><?=$place['place']?></td>
</tr>
<?php } ?>

</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>