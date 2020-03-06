<?php 
//include ('functions/views.php');



/**
 * 
 */
class BaseController
{


	public $view;
	public $core;
	public $db;


	function __construct()
	{
		$this->view = new View();
		$this->core = new Core();
		$this->db = new DB();
}

	public function showHome() {
		
		//echo $this->core->init();


$allFilms = "SELECT * FROM films";


$stmt = $this->db
			 ->make()
			 ->prepare('SELECT * from films order by created_at desc');
$stmt->execute();
$films = $stmt->fetchAll();


$stmtTop = $this->db
			 ->make()
			 ->prepare('SELECT films.id, name, poster, description, count(films.id) as c from films, sessions where films.id=sessions.film_id group by sessions.film_id order by c desc');
$stmtTop->execute();
$filmsTop = $stmtTop->fetchAll();



		return $this->view->make('home',[

			'films'=>$films,
			'top'=>$filmsTop

		]);


	}




public function createAdminFilm() {

return $this->view->make('admin/film/create',[

			//'films'=>$films

		]);

}



public function storeAdminFilm() {



$errFlag = false;
$_SESSION['messageStyle'] = "red";

if (empty($_REQUEST['name'])) {
	$_SESSION['message'] = "Заполните название пожалуйста.";
	$errFlag = true;
}

$fbasename = null;

$target_dir = "storage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$basename = md5(time()).'.'.$imageFileType;

$target_file_name = $target_dir.$basename;

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
        
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file_name)) {
			$fbasename = $basename;
			}
        
    } 


if ($errFlag == false) {



            $stmtFilm = $this->db
			 ->make()
			 ->prepare('insert into films (name, poster, description, created_at, updated_at) values (:name, :poster, :description, now(), now())');

            $stmtFilm->execute([
            	':name'=>$_REQUEST['name'],
                ':poster'=>$fbasename,
                ':description'=>$_REQUEST['description']

            ]);



	$_SESSION['message'] = "Запись успешно добавлена!";
	$_SESSION['messageStyle'] = "green";

}





return header('Location: ' . $_SERVER['HTTP_REFERER']);


}



public function editAdminFilm() {

$filmID = $_REQUEST['id'];
$stmtFilm = $this->db
			 ->make()
			 ->prepare('select * from films where id=:id');
            $stmtFilm->execute([
                            ':id'=>$filmID
            ]);
            $film = $stmtFilm->fetch(PDO::FETCH_ASSOC);

return $this->view->make('admin/film/edit',[
				'film'=>$film
		]);

}



public function updateAdminFilm() {

$filmID = $_REQUEST['id'];
$errFlag = false;
$_SESSION['messageStyle'] = "red";

if (empty($_REQUEST['name'])) {
	$_SESSION['message'] = "Заполните название пожалуйста.";
	$errFlag = true;
}

$fbasename = $_REQUEST['poster'];

$target_dir = "storage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$basename = md5(time()).'.'.$imageFileType;

$target_file_name = $target_dir.$basename;

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
        
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file_name)) {
			$fbasename = $basename;
			}
        
    } 


if ($errFlag == false) {



            $stmtFilm = $this->db
			 ->make()
			 ->prepare('update films set name=:name, poster=:poster, description=:description, updated_at=now() where id=:id');

            $stmtFilm->execute([
            	':id'=>$filmID,
            	':name'=>$_REQUEST['name'],
                ':poster'=>$fbasename,
                ':description'=>$_REQUEST['description']

            ]);



	$_SESSION['message'] = "Запись успешно сохранена!";
	$_SESSION['messageStyle'] = "green";

}





return header('Location: ' . $_SERVER['HTTP_REFERER']);


}



public function destroyAdminFilm() {
$filmID = $_REQUEST['id'];



$stmtFilm = $this->db
			 ->make()
			 ->prepare('delete from films where id = :id');

            $stmtFilm->execute([
            	':id'=>$filmID

            ]);

$stmtSession = $this->db
			 ->make()
			 ->prepare('delete from sessions where film_id = :id');

            $stmtSession->execute([
            	':id'=>$filmID

            ]);

return header('Location: ' . $_SERVER['HTTP_REFERER']);
}




public function showAdminClients() {


$stmtClients = $this->db
			 ->make()
			 ->prepare('SELECT * from clients');
$stmtClients->execute();
$clients = $stmtClients->fetchAll();

return $this->view->make('admin/clients/list',[

			'clients'=>$clients

		]);


}




public function showAdminPlaces() {


$stmtPlaces = $this->db
			 ->make()
			 ->prepare('SELECT places.id, places.place, `rows`.row as r from places, `rows` where places.row_id = `rows`.id');
$stmtPlaces->execute();
$places = $stmtPlaces->fetchAll();


$stmtRows= $this->db
			 ->make()
			 ->prepare('SELECT * from `rows`');
$stmtRows->execute();
$rows = $stmtRows->fetchAll();



return $this->view->make('admin/places/list',[

			'places'=>$places,
			'rs'=>$rows

		]);


}
public function showAdminTimes() {


$stmtTimes = $this->db
			 ->make()
			 ->prepare('SELECT * from session_times');
$stmtTimes->execute();
$times = $stmtTimes->fetchAll();

return $this->view->make('admin/times/list',[

			'times'=>$times

		]);


}


public function showFilmList() {


$stmtFilms = $this->db
			 ->make()
			 ->prepare('SELECT * from films');
$stmtFilms->execute();
$films = $stmtFilms->fetchAll();

return $this->view->make('admin/film/list',[

			'films'=>$films

		]);

}



	
	public function showAdmin() {
		



$stmtTickets = $this->db
			 ->make()
			 ->prepare('SELECT sessions.payed, session_times.time, clients.name, clients.email, clients.telephone, films.name as fname, places.place, `rows`.`row`
 				from sessions, session_times, clients, films, places,`rows`
 				where
 				sessions.`client_id` = clients.id and
 				sessions.`film_id` = films.id and
 				sessions.`time_id` = session_times.id and
 				sessions.`place_id` = places.id and
 				places.`row_id` = rows.id
 				group by sessions.id
 				order by session_times.time asc');
$stmtTickets->execute();
$tickets = $stmtTickets->fetchAll();


		return $this->view->make('admin/home',[

			'sessions'=>$tickets

		]);


	}

public function storeSession() {

$errFlag = false;
$_SESSION['messageStyle'] = "red";

if (empty($_REQUEST['name'])) {
	$_SESSION['message'] = "Заполните имя пожалуйста.";
	$errFlag = true;
}
if (empty($_REQUEST['tel'])) {
	$_SESSION['message'] = "Заполните телефон пожалуйста.";
	$errFlag = true;
}
if (empty($_REQUEST['email'])) {
	$_SESSION['message'] = "Заполните email пожалуйста.";
	$errFlag = true;
}
if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
	$_SESSION['message'] = "Email указан не верно.";
	$errFlag = true;
}


if ($errFlag == false) {

			$clientExists=[];
            $stmtC = $this->db
			 ->make()
			 ->prepare('select id from clients where email=:email and telephone=:telephone');
            $stmtC->execute([
                            ':email'=>$_REQUEST['email'],
                			':telephone'=>$_REQUEST['tel']
            ]);
            $clientExists = $stmtC->fetch(PDO::FETCH_ASSOC);


if (array_key_exists('id', $clientExists)) {
	$client_id = $clientExists['id'];
} else {
            $stmtClient = $this->db
			 ->make()
			 ->prepare('insert into clients (name, email, telephone, created_at, updated_at) values (:name, :email, :telephone, now(), now())');
			 
            $stmtClient->execute([
            	':name'=>$_REQUEST['name'],
                ':email'=>$_REQUEST['email'],
                ':telephone'=>$_REQUEST['tel']

            ]);
            $client_id = $this->db
			 			->make()
			 			->lastInsertId();
}



            //if ($clientExists['id'] != )





            $stmtSession = $this->db
			 ->make()
			 ->prepare('insert into sessions (time_id, client_id, place_id, film_id) values (:time_id, :client_id, :place_id, :film_id)');

            $stmtSession->execute([
            	':time_id'=>$_REQUEST['time'],
                ':client_id'=>$client_id,
                ':place_id'=>$_REQUEST['place'],
                ':film_id'=>$_REQUEST['film']

            ]);






$_SESSION['message'] = "Запись успешно добавлена!";

$_SESSION['messageStyle'] = "green";

}





return header('Location: ' . $_SERVER['HTTP_REFERER']);

}


	public function showFilm() {
		

$filmId = $_REQUEST['id'];


$stmt = $this->db
			 ->make()
			 ->prepare('SELECT * from films where id=:fid');
$stmt->execute(array(':fid'=>$filmId));
$film = $stmt->fetch(PDO::FETCH_ASSOC);


		
$stmtPlaces = $this->db
			 ->make()
			 ->prepare('SELECT places.`place`, places.id, rows.row as pr from places, `rows` where places.row_id = rows.id order by row asc, place asc');
$stmtPlaces->execute();
$places = $stmtPlaces->fetchAll();

$placeArr=[];




/*$some_array = array(
    'filters' => array()
);
$some_another_array = [];
array_push($some_array['filters'], $some_another_array);
*/



foreach ($places as $place) {

if (!array_key_exists($place['pr'], $placeArr)) {
	$placeArr[$place['pr']]=[];
}

array_push($placeArr[$place['pr']], [

'id'=>$place['id'],
'place'=>$place['place']

]);




}




$stmtTimes = $this->db
			 ->make()
			 ->prepare('SELECT * from session_times order by time');
$stmtTimes->execute();
$times = $stmtTimes->fetchAll();


if (array_key_exists('time', $_GET)) {
	$timeId = $_GET['time'];

$stmtSessions = $this->db
			 ->make()
			 ->prepare('SELECT place_id from sessions where film_id=:filmID and time_id=:timeID');
$stmtSessions->execute(array(':filmID'=>$filmId,
							'timeID'=>$timeId));
$sessions = $stmtSessions->fetchAll();
$sessionArr=[];
foreach ($sessions as $sessionOne) {
	$sessionArr[]=$sessionOne['place_id'];
}


} else {
	$sessionArr=[];
}




		return $this->view->make('session',[

			//'test'=>'OK film!',
			'film'=>$film,
			'places'=>$placeArr,
			'times'=>$times,
			'sessionArr'=>$sessionArr

		]);


	}



}