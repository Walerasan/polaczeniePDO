<?php
$serwer = "localhost";
$port = 3306;
$username = "root";
$passsword = "";
$bazadanych = "szkola";

try{
	$polaczenie = new PDO('mysql:host='.$serwer.';dbname='.$bazadanych.';port='.$port.";charset=utf8",$username,$passsword);
	echo("<h1>Połączono z bazą danych</h1>");
}catch(PDOException $e){
	echo("<h1>Error połączenia z bazą danych</h1><br>");
	echo($e.getMessage());
	die();//jak nie ma połączenia z bazą danych to rozłączam się...
}

?>