<?php
	session_start();
	require 'conectare.php';;//conectare la baza de date 
	$name = $_POST['name'];
	$password = $_POST['pass'];

	if( !empty($name) && !empty($password) && isset($name) && isset($password))//daca nu cumva sunt goale textbox-urile
	{
		$sql = "SELECT * FROM users WHERE name = '$name'";//selectam linie cu numele scris in textbox
		$result = mysqli_query($conectare,$sql);//este greu de explicat uitete la urmatorul tag si o sa iti dai seama
		$row = $result->fetch_assoc();//punem tot ce e pe linie respectiva intr-un vector
		$hash = $row['parola'];//punem intro variabila hash parola

		if($password != $hash)//daca parola din textbox nu este egala cu hasul nostru 
			header("Location: index.php?info=par");//il duce pe aceeasi pagina dar cu info = par (par de la parolele nu sunt egale)
		else
		{
			$sql = "SELECT * FROM users WHERE name = '$name' AND parola = '$password'";//selectam linie cu numele si parola 
			$result=mysqli_query($conectare,$sql);//exact ca si primul

			if(!$row == $result->fetch_assoc())//gen daca nu sunt egal astea doua , exista exceptii in care da se poate sa nu fie egal 
				echo 'eroare';
			else
			{
				$_SESSION['name'] = $row['name'];//memoreaza numele definitv , adica daca ai o alta pagina care nu are nicio legatura cu pagina asta si dai acolo echo $_SEESION['name'] iti da numele .
				$_SESSION['email'] = $row['familie'];//la fel ca ceea de sus
				$_SESSION['pass'] = $row['parola'];//la fel ca ceea de sus
			}
			$nume = $_SESSION['name'];
			header("Location: index.php?info=$nume");//ca sa arate numele in bara de navigare
		}
	} else {
		header("Location: index.php?info=gresit");
	}