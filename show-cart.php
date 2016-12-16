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
		if($_GET['action'] == "add")
		{

			$db = new Db();
			$db->connectDb();
			$mysqli = $db->getMysqli();

			$cart_id = $mysqli->real_escape_string($_SESSION['cart_id']);
			$photo = $mysqli->real_escape_string($_POST['path']);


			if ($db->queryDb("INSERT INTO cart (cart_id, photo) VALUES ('{$cart_id}', '{$photo}')"))
			{
				$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}'");
				echo $count->num_rows;
			}


			//echo "<br>" . $_POST['path'];

		}
	}

	//var_dump($_SESSION);
