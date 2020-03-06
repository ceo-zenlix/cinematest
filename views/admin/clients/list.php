<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Все клиенты</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  

<table style="width:100%">

<tr>
  <th>Имя</th>
  <th>Почта</th>
  <th>Тел</th>
  <th>Дата регистрации</th>

</tr>

<?php foreach ($clients as $client) { ?>
<tr>
  <td><?=$client['name']?></td>
  <td><?=$client['email']?></td>
  <td><?=$client['telephone']?></td>
  <td><?=$client['created_at']?></td>
  
</tr>
<?php } ?>




</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>