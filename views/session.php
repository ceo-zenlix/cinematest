<?php include 'views/layout/header.php'; ?>

<body>

<div class="header">
  <h1>Film Tickets</h1>
  <p>Start watching your actions!</p>
</div>

<?php include 'views/layout/navbar.php'; ?>

<div class="row">
  <div class="leftcolumn">










    <div class="card">
      <h2><?=$film['name']?></h2>
      <h5><?=$film['description']?></h5>
      <img style="height:200px;" src='/storage/<?=$film['poster']?>'>

      <form action="/session" method="POST"> 



<?php if  (array_key_exists('time', $_GET)) { ?>
  <input type="hidden" name="time" value="<?=$_GET['time']?>">
<?php } ?>
  <input type="hidden" name="film" value="<?=$film['id']?>">

<?php
if(isset($_SESSION['message'])){ ?>
    <center> <h1 style="color:<?=$_SESSION['messageStyle']?>;">
      <?=$_SESSION['message']?></h1></center>
    <?php unset($_SESSION['message']); 
    unset($_SESSION['messageStyle']);
    // clear the value so that it doesn't display again
}
?>



      <h1><center>Запись на сеанс</center></h1>
      <hr>
      <div>

  <h4>Время:</h4>

<ul>
  <?php foreach ($times as $time) { ?>
  <li><a 
      <?php if  ((array_key_exists('time', $_GET)) && ($_GET['time'] == $time['id'])) {?>

        class='active'

      <?php } ?>
    href="/film?id=<?=$film['id']?>&time=<?=$time['id']?>"><?=$time['time']?></a></li>
  <?php } ?>
</ul>

   <br><br>





<?php if (array_key_exists('time', $_GET)) { ?>

<h4>Укажите место:</h4>


<table style="width:100%">
<?php foreach ($places as $placeRow => $placeVal) { ?>

  <tr>
    <td><strong>Ряд <?=$placeRow?></strong></td>

    

<?php foreach ($placeVal as $pv) { ?>

<?php if (in_array($pv['id'], $sessionArr)) {?>
        <td style="
    border: red solid 1px;
">
          <small>Место <?=$pv['place']?> <input type="radio" disabled name="place" value="<?=$pv['id']?>" ></small>
        </td>
<?php } else {?>

        <td style="
    border: green solid 1px;
">
          <small>Место <?=$pv['place']?> <input type="radio" name="place" value="<?=$pv['id']?>" ></small>
        </td>

    <?php } }  ?>


  </tr>


  <?php } ?>

</table>




<table style="width:100%">



<tr>
  <td style="
    width: 100px;
"><label for="fname">Имя *:</label></td>
  <td><input type="text" id="fname" name="name"></td><br><br>
</tr>
 <tr> 
  <td><label for="email">Email *:</label></td>
  <td><input type="email" id="email" name="email"></td><br><br>
</tr>
<tr>
  <td><label for="tel">Телефон *:</label></td>
  <td><input type="text" id="tel" name="tel"></td>
</tr>
</table>
<hr>
<input type="submit" value="Забронировать">

<?php } ?>
      </div>



    </div>
</form>


  </div>
  <div class="rightcolumn">


    <div class="card">
      <h3>Follow Me</h3>
      <p>Fb / Github</p>
    </div>
  </div>
</div>

<?php include 'views/layout/footer.php'; ?>