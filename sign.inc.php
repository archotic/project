<?php
	require 'conectare.php';

	$email = $_POST['email'];//variabila pentru email
	$name = $_POST['name'];//variabila pentru nume 
	$password = $_POST['pass'];//variabila pentru parola
	$carti = 0;
	if(!empty($email) && !empty($name) && !empty($password) && isset($email) && isset($name) && isset($password))//da la login.inc.php ca e fix la fel
	{
		$name1 = "SELECT name FROM users WHERE name = '$name'";//tot asa ca si la login.inc.php
		$result = mysqli_query($conectare,$name1);//este greu de explicat uitete la urmatorul tag si o sa iti dai seama
		$check = mysqli_num_rows($result);//aici numaram de cate ori se mai gaseste numele asta in baza de date
		if($check > 0)//daca numarul de nume gasite la fel ca si cel introdus este mai mare decat zero de intampla aia 
			header("Location: signup.php?info=nume");
		else
		{
			$sql = "INSERT INTO users (name , familie , parola) VALUES ('$name' , '$email' , '$password' )";//se insereaza numele emaiulul parola 
			$result = mysqli_query($conectare,$sql);//este greu de explicat
			header("Location: signup.php?info=correct");
		}
	} else {
		header("Location: signup.php?info=gresit");
	}


