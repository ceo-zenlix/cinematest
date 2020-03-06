<?php

$controller = new BaseController;

$routes = explode('/', strtok($_SERVER["REQUEST_URI"], '?'));

$path = $routes[1];
//$action = $routes[2];


if (empty($path)) {
	return $controller->showHome();
}
else {

	switch($path) {

				case 'adminMain': 	return $controller->showAdmin();	break;

				//adminAddFilm
				case 'adminAddFilm': 	return $controller->createAdminFilm();	break;
				case 'adminStoreFilm': 	return $controller->storeAdminFilm();	break;

				case 'adminEditFilm': 	return $controller->editAdminFilm();	break;
				case 'adminUpdateFilm': return $controller->updateAdminFilm();	break;

				case 'adminDeleteFilm': return $controller->destroyAdminFilm();	break;


				case 'adminClients': return $controller->showAdminClients();	break;

				case 'adminPlaces': return $controller->showAdminPlaces();	break;
				case 'adminTimes': return $controller->showAdminTimes();	break;



				case 'film': 	return $controller->showFilm();		break;

				case 'session': return $controller->storeSession();		break;



				case 'adminFilms': 	return $controller->showFilmList();		break;
	
	}


}
