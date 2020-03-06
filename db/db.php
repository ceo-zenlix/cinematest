<?php

Class DB {

    public $sql;
    public $dbConnection;

    private $DB_HOST = '127.0.0.1';
    private $DB_NAME = 'films';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '372423';

    function __construct()
    {



    $dbConnection = new PDO(
    'mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME,
    $this->DB_USERNAME,
    $this->DB_PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$this->dbConnection = $dbConnection;


/*
$mysqli = new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_NAME);


if ($mysqli->connect_errno) {

    return $this->exceptSql($mysqli);
}

$this->sql = $mysqli;
*/
    }


public function make() {

    return $this->dbConnection;
}



public function exceptSql($sql) {

    echo "Извините, возникла проблема на сайте";
    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n";
    echo "Номер ошибки: " . $sql->connect_errno . "\n";
    echo "Ошибка: " . $sql->connect_error . "\n";
    
    exit;

}



}