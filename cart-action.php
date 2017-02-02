<?php
	session_start();
	//print_r($_REQUEST);

	require_once('class/class.db.php');
	require_once('class/class.cart.php');

	$cart = new Cart();

	if(!isset($_SESSION['cart_id']))
	{
		$cart->setCartId();
		$_SESSION['cart_id'] = $cart->getCartId();
	}

	if(isset($_GET['action']))
	{
		$db = new Db();
		$db->connectDb();
		$mysqli = $db->getMysqli();

		//sprawdzam zmienne
		$cart_id = $mysqli->real_escape_string($_SESSION['cart_id']);
		$photo = trim($mysqli->real_escape_string($_POST['path']));

		if($_GET['action'] == "add")
		{
			//dodaję do bazy
			if ($db->queryDb("INSERT INTO cart (cart_id, photo, status) VALUES ('{$cart_id}', '{$photo}', '1')"))
			{
				//sprawdzam aktualną ilość pozycji w koszyku
				$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
				//zwracam ilość pozycji do skryptu .js
				echo $count->num_rows;
			}
		}



	}

	//var_dump($_SESSION);
