<?php
	error_reporting(E_ALL - E_WARNING);

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

  /* rozpocznij sesję */
	require_once('class/class.session.php');
	//var_dump($_SESSION);

	require_once('class/class.view.php');
	require_once('class/class.db.php');
	require_once('class/class.phpmailer.php');

	if(!$session->is_logged_in())
	{
		header("Location: login");
	}

	$photo_item = null;

	if (isset($_POST['submit'])) {

		isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : $user_id = null;
		isset($_SESSION['cart_id']) ? $cart_id = $_SESSION['cart_id'] : $cart_id = null;

		if ($user_id && $cart_id)
		{
			//$result = $db->queryDb("SELECT `number_order` FROM `orders` ORDER BY `id` DESC LIMIT 1");
			//!empty($result) ? $last_number_order = $result->fetch_object() : $last_number_order = false;
			//$result = $db->queryDb("SELECT `id` FROM `orders` ORDER BY `id` DESC LIMIT 1");

			// odczytuję listę zdjęć z bazy dla podanego koszyka - do wysłania mejlem
			$photo_item = $db->queryDb("SELECT photo, id, rodzaj, format, cena, ilosc, tekst FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");

			// formatuję końcową cenę zamowienia
			isset($_SESSION['total_orders']) ? $total_orders = number_format($_SESSION['total_orders'], 2, ',', ' ') : $total_orders = "Błąd wyceny";

			// dodaję zamwóienie do bazy danych
			$new_order = $db->queryDb("INSERT INTO `orders` VALUES (NULL, '100-0', '{$user_id}', '{$cart_id}', '{$total_orders}')");

			if ($new_order) {
				//pobieram numer zamówienia = ostatni id dodany do bazy
				$last_number_order = mysqli_insert_id($db->get_mysqli());
				//ustawienie statusu koszyka na 0
				$db->queryDb("UPDATE cart SET status='0' WHERE cart_id='{$cart_id}' AND status='1'");

				//isset($_SESSION['total_orders']) ? $total_orders = number_format($_SESSION['total_orders'], 2, ',', ' ') : $total_orders = "Błąd wyceny";

				//odczytuję adres email z bazy na podstawie id użytkownika przechowywanego w kalsie sesji
				$result = $db->queryDb("SELECT email FROM users WHERE id='{$session->user_id}' LIMIT 1");
				$user = $result->fetch_object();
				$email = $user->email;

				//wysyłam email z potsumowaniem zamówienia
				$mail = new PHPMailer();
				$mail->SetLanguage('pl');
				$mail->CharSet = "UTF-8";
				$mail->IsSMTP();  // telling the class to use SMTP
				$mail->IsHTML(true);
				$mail->SMTPDebug  = 0; // enables SMTP debug information (for testing)
															 // 1 = errors and messages
															 // 2 = messages only
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "ssl";
				$mail->Host       = "az0024.srv.az.pl";    // sets the SMTP server
				$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
				$mail->Username   = "sklep@annaosiak.pl"; // SMTP account username
				$mail->Password   = "az_sklep-2017";        // SMTP account password

				$mail->SetFrom("sklep@annaosiak.pl", "Sklep - Anna Osiak");

				$mail->AddAddress($email);
				$mail->Subject  = "Podsumowanie zamówienia ze strony annaosiak.pl";

				// pozycje zamowienia w mailu odczytane z bazy
				$list_order = null;
				if (isset($photo_item))
				{
					$suma = 0;
					while ($item = $photo_item->fetch_object())
					{
							$list_order .= $view->order_summary($item->photo, $item->id, $item->id, $item->rodzaj, $item->format, $item->cena, $item->ilosc, $item->tekst);
							$suma = $suma + ($item->ilosc * $item->cena);
							$_SESSION['total_orders'] = $suma;
					}
				}

				$mail->MsgHTML("
					Dzień dobry.<br><br>
					Dziękuję za złożenia zamówienia.<br>
					Zamówienie obejmuje zdjęcia na łączną kwotę <strong>$total_orders</strong> zł.<br>
					Proszę o przelew tej kwoty na konto numer: <strong>83 1160 2202 0000 0002 8719 4194</strong><br>
					W tytule przelewu koniecznie proszę wpisać: <strong>Sesja fotograficzna. Zamówienie nr $last_number_order</strong><br><br>

					Pozostałe dane do przelewu:<br>
					Sky Studio - Marcin Osiak<br>
					ul. Dzięcielskiego 14/107, 84-200 Wejherowo<br><br>

					<h4>Podsumowanie zamówienia</h4>
					<table class='table'>
						<tr class='active'>
							<th class='col-xs-2'>Nazwa zdjęcia</th> <th>Rodzaj</th> <th>Format</th> <th>Cena</th> <th>Ilość</th> <th>Wartość</th>
						</tr>
						$list_order
						<tr class='active'>
							<th colspan='4'></th> <th>Łącznie:</th> <th id='suma' style='font-size: 1.3em;'>" . number_format($suma, 2, ',', ' ') . " zł</th>
						</tr>

						</table>
				");

				if(!$mail->Send()) {
						$message = "Mam problem z wysłaniem wiadomości z podsumowaniem zamówienia. Proszę poinformuj mnie o tym na adres foto.annaosiak@gmail.com podając numer swojego zamówienia.";
				}	else {
					$message = "Dziękuję za złożenie zamówienia. Na Twój email została wysłana wiadomość z podsumowaniem zamówienia.";
				}

			} else {
				$message = "Mam problem z dodaniem zamówienia do bazy danych";
			}
		} else {
			$message = "Zaloguj się i dodaj zdjęcia do koszyka.";
		}
	}
?>

	<!DOCTYPE html>
	<html lang="pl">

	<?php echo $view->showHeader("Zamwówienie", null); ?>

	<body>

		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
      	<a class="fright" href="logout">Wyloguj</a>
			</div>
		</div>


		<div class="container order">

			<h1>Twoje zamówienie</h1>

			<?php if(isset($message)){ echo $view->alertInfo($message); } ?>

			<div class="well">Zamówienie obejmuje zdjęcia na łączną kwotę <strong>
			<?php
			 echo (isset($_SESSION['total_orders']) ? number_format($_SESSION['total_orders'], 2, ',', ' ') : "Błąd wyceny");
			?> zł</strong>
			</div>
			<div class="well">
				<p>Proszę o przelew tej kwoty na konto numer: <strong>83 1160 2202 0000 0002 8719 4194</strong></p>
				<p>W tytule przelewu koniecznie proszę wpisać: <strong>"Sesja fotograficzna. Zamówienie nr <?php echo (isset($last_number_order) ? $last_number_order : "Brak zamówienia"); ?>"</strong></p>
				<br>
				<p>Pozostałe dane do przelewu:</p>
				<p>Sky Studio - Marcin Osiak</p>
				<p>ul. Dzięcielskiego 14/107, 84-200 Wejherowo</p>
			</div>
			<div class="well">Te informacje zostaną wysłane na Twój email.</div>

			<a class='btn btn-default' href='http://<?php echo $_SESSION["referer"]; ?>' role='button'>Wróć do galerii</a>

    </div>
	</body>
	</html>

	<?php
		if (isset($new_order)) {
			unset($_SESSION['cart_id']);
			unset($_SESSION['total_orders']);
		}
	?>
