<?php

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

	session_start();
	//print_r($_REQUEST);

	require_once('class/class.db.php');
	require_once('class/class.cart.php');

	if(!isset($_SESSION['cart_id']))
	{
		$cart->setCartId();
		$_SESSION['cart_id'] = $cart->getCartId();
	}

	if(isset($_GET['action']))
	{
		//sprawdzam zmienne
		$cart_id = $db->escape_value($_SESSION['cart_id']);
		$photo = trim($db->escape_value($_POST['path']));


		if($_GET['action'] == "add")
		{
			$rodzaj = trim($db->escape_value($_POST['rodzaj']));
			$format = trim($db->escape_value($_POST['format']));
			$cena = trim($db->escape_value($_POST['cena']));
			$ilosc = trim($db->escape_value($_POST['ilosc']));
			$tekst = trim($db->escape_value($_POST['tekst']));

			//dodaję do bazy
			if ($db->queryDb("INSERT INTO cart (cart_id, photo, rodzaj, format, cena, ilosc, tekst, status) VALUES ('{$cart_id}', '{$photo}', '{$rodzaj}', '{$format}', '{$cena}', '{$ilosc}', '{$tekst}', '1')"))
			{
				//sprawdzam aktualną ilość pozycji w koszyku
				$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
				//zwracam ilość pozycji do skryptu .js
				echo $count->num_rows;
			}
		}

		if($_GET['action'] == "del")
		{
			$id = $db->escape_value($_POST['id']);
			//aktualizuję bazę
			if ($db->queryDb("UPDATE cart SET status='0' WHERE cart_id='{$cart_id}' AND id='{$id}' AND photo='{$photo}' "))
			{
				//sprawdzam aktualną ilość pozycji w koszyku
				$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
				//zwracam ilość pozycji do skryptu .js
				echo $count->num_rows;
			}
		}

	}

	//var_dump($_SESSION);
