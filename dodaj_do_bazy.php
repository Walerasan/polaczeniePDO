<?php
//dodaj_do_bazy.php ma znajdować się w tym samym
//folderze co plik index.php

//empty() funkcja sprawdza czy superglobalna $_POST jest pusta - jeśli tak to robi przekierowanie
//to pliku index.php aby podać wartości niepuste

if(empty($_POST['imie']) or empty($_POST['nazwisko']) or empty($_POST['adres'])){
	header('Location: index.php');
} else {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$adres = $_POST['adres'];

	//teraz dodajemy do bazy danych
	include_once("polaczenie.php");

	$dodaj_do_bazy = "INSERT INTO uczniowie(Imie,Nazwisko,Adres) values('$imie','$nazwisko','$adres');";

	if($polaczenie->exec($dodaj_do_bazy)){
		echo "Dodano do bazy $imie $nazwisko $adres";
		header('Location: index.php');//i błyskawicznie przekierowuje mnie do index.php tablica z danymi się powiększyła ;)
	}else {
		echo "Error dodania do bazy danych";
	}

	$polaczenie=null;
}




?>