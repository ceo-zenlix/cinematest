<ul>

<li><a 

  	href="/">На главную</a></li>



  <li><a 

  	<?php 
  	if (strpos($_SERVER["REQUEST_URI"], '/adminMain') !== false) { ?> 
  		class="active" 
  		<?php } ?> href="/adminMain">Заказы</a></li>
  <li><a

<?php 
  	if (strpos($_SERVER["REQUEST_URI"], '/adminFilms') !== false) { ?> 
  		class="active" 
  		<?php } ?>

   href="/adminFilms">Фильмы</a></li>


  <li><a

<?php 
  	if (strpos($_SERVER["REQUEST_URI"], '/adminClients') !== false) { ?> 
  		class="active" 
  		<?php } ?>


   href="/adminClients">Клиенты</a></li>



  <li><a 

<?php 
  	if (strpos($_SERVER["REQUEST_URI"], '/adminPlaces') !== false) { ?> 
  		class="active" 
  		<?php } ?>

  	href="/adminPlaces">Ряды и Места</a></li>
  <li><a 

<?php 
  	if (strpos($_SERVER["REQUEST_URI"], '/adminTimes') !== false) { ?> 
  		class="active" 
  		<?php } ?>

  	href="/adminTimes">Время</a></li>

</ul>