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

<div class="w3-content w3-display-container" style="max-width:800px">

<?php foreach ($top as $topfilm) { ?>
  <a href="/film?id=<?=$topfilm['id']?>"><img class="mySlides" src="/storage/<?=$topfilm['poster']?>" style="width:100%"></a>

<?php
}
?>


  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>
</div>



<?php foreach ($films as $film) { ?>

    <div class="card">
      <h2><a href="/film?id=<?=$film['id']?>"><?=$film['name']?></a></h2>
      <h5><?=$film['created_at']?></h5>
      <img style="height:200px;" src='/storage/<?=$film['poster']?>'>
      
      <p><?=rtrim(mb_strimwidth($film['description'], 0, 100, '', 'UTF-8')).'...'?></p>
    </div>

<?php
}
?>


  </div>
  <div class="rightcolumn">

    <div class="card">
      <h3>Популярные</h3>
      <?php foreach ($top as $topfilm) { ?>
      <div class="fakeimg" style="background-image: url('/storage/<?=$topfilm['poster']?>');"><p><?=$topfilm['name']?></p></div>
      <?php
}
?>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Fb / Github</p>
    </div>
  </div>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<?php include 'views/layout/footer.php'; ?>