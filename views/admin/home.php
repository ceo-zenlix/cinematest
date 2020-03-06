<?php
include 'views/admin/layout/header.php';?>


<?php
include 'views/admin/layout/navbar.php';?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>Все заказы</h2>
  <!-- <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3> -->
  

<table style="width:100%">

<tr>
  <th>Фильм</th>
  <th>Время</th>
  <th>Ряд</th>
  <th>Место</th>
  <th>Клиент</th>
  <th>Оплата</th>
</tr>

<?php foreach ($sessions as $session) { ?>
<tr>
  <td><?=$session['fname']?></td>
  <td><?=$session['time']?></td>
  <td><?=$session['row']?></td>
  <td><?=$session['place']?></td>
  <td><?=$session['name']?> (mail: <?=$session['email']?>, tel: <?=$session['telephone']?>)</td>
  <td><?=$session['payed']?></td>
</tr>
<?php } ?>




</table>



</div>

<?php
include 'views/admin/layout/footer.php';?>