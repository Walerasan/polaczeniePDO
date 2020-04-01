<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Polaczenie przez PDO</title>
	<meta charset="utf-8">
	<style type="text/css">
		.tabela_head{
			font-weight: bold;
		}
		td{
			padding: 10px;
		}
		.formularz{
			width: 600px;
			margin: auto;
		}
		input[name='imie'], input[name='nazwisko'], input[name='adres']{
			width: 400px;
			height: 25px;
			margin: 10px;
		}
		input[type='submit']{
			float: right;
			background-color: orange;
			width: 80px;
			height: 25px;
			border: 2px solid black;
		}
		.box{
			width: 300px;
			margin:auto;
		}
	</style>
</head>
<body>
	<div class="formularz">
		<fieldset>
			<legend>Dodaj do bazy danych</legend>
			<form action="dodaj_do_bazy.php" method="post">
				<input type="text" name="imie" placeholder="podaj imie"><br>
				<input type="text" name="nazwisko" placeholder="podaj nazwisko"><br>
				<input type="text" name="adres" placeholder="podaj adres"><br>
				<input type="submit" value="dodaj">
			</form>
		</fieldset>	
	</div>
	<?php include_once("polaczenie.php"); ?>
	<div class="box">
		<?php
			$zapytanie = "SELECT Imie,Nazwisko,Adres FROM uczniowie";
			echo "<table border=1>";
			echo "<tr class='tabela_head'><td>Imię</td><td>Nazwisko</td><td>Adres</td>";
			foreach ($polaczenie->query($zapytanie) as $wiersz){
				echo "<tr><td>".$wiersz['Imie']."<td>".$wiersz['Nazwisko']."</td><td>".$wiersz['Adres']."</td></tr>";
			}
			echo "</table>";
		?>
	</div>
	<?php $polaczenie=null; //zamykam połączenie z PDO do mysql?>
</body>
</html>