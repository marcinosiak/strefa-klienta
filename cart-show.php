<?php
	error_reporting(E_ALL - E_WARNING);

	session_start();

	var_dump($_SESSION);

	require_once('class/class.db.php');
	require_once('class/class.view.php');

	//łączę z bazą danych
	$db = new Db();
	$db->connectDb();
	$mysqli = $db->getMysqli();

	$view = new View();
?>

	<!DOCTYPE html>
	<html lang="pl">

	<?php echo $view->showHeader(); ?>

	<body>

		<div class="container">

			<?php
				if(isset($_SESSION['cart_id']))
				{
					if(isset($_GET['action']))
					{
						if($_GET['action'] == "del")
						{
							if(isset($_GET['id']))
							{
								$id = $mysqli->real_escape_string($_GET['id']);
								//$id = "milion";
							}

							$cart_id = $mysqli->real_escape_string($_SESSION['cart_id']);

							if(isset($_GET['photo']))
							{
								$photo = $mysqli->real_escape_string($_GET['photo']);

								//aktualizuję rekord
								if ($exe = $db->queryDb("UPDATE cart SET status='0' WHERE cart_id='{$_SESSION['cart_id']}' AND id='{$id}' AND photo='{$photo}' "))
								{
									echo $view->alertInfo('Pozycja została usunięta');
									//echo $view->alertInfo($exe);
								}
								else
								{
									echo $view->alertInfo('Nie mogę usunąć tej pozycji');
									//echo $view->alertInfo($exe);
									//var_dump($exe);
								}
							}
						}
					}
					//liczę ilość pozycji w koszyku dla podanego id koszyka
					$count = $db->queryDb("SELECT id, photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
				}
			?>

			<a href="cart-show">Koszyk (<span class="counter"><?php echo (isset($count) ? $count->num_rows : '0'); ?></span>)</a>

			<?php
				//Wyświetla aktualną zawartość koszyka
				if(isset($_SESSION['cart_id']))
				{
					//wyświetla nagłówek tabeli
					echo
						"
							<h1> Koszyk </h1>
							<table class='table'>
						 		<tr class='active'>
									<th class='col-xs-2'>Zdjęcie</th> <th>Nazwa zdjęcia</th> <th>Format</th> <th>Cena</th> <th>Ilość</th> <th>Wartość</th>
								</tr>
						";

					//wyświetla pozycje w koszyku
					if (isset($count))
					{
						while ($item = $count->fetch_object())
						{
								echo $view->showCart($item->photo, $item->id);
								//echo $view->showCart(trim($item->photo));
						}
					}

					//wyświetla stopkę tabeli
					echo
						"
					 		<tr class='active'>
								<th colspan='4'></th> <th>Łącznie</th> <th>1 500.00 zł</th>
							</tr>

							</table>
						";
				}
				else
				{
					echo $view->alertInfo('Twoj koszyk jest pusty.');
				}

				echo "<a class='btn btn-default' href='http://" . $_SESSION["referer"] . "' role='button'>Wróć do galerii</a>";
				//echo "<input class='btn btn-default' type='button' value='Wróć do galerii' onClick='history.back();' />";

			?>

		</div>
	</body>
	</html>
