<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Все временные сеансы</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  

<table style="width:100%">

<tr>
  <th>ID</th>
  <th>Время</th>


</tr>

<?php foreach ($times as $time) { ?>
<tr>
  <td><?=$time['id']?></td>
  <td><?=$time['time']?></td>
  
  
</tr>
<?php } ?>




</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>