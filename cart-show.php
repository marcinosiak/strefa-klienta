<?php
	error_reporting(E_ALL - E_WARNING);

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

	/* rozpocznij sesję */
	require_once('class/class.session.php');

	require_once('class/class.db.php');
	require_once('class/class.view.php');
	require_once('class/class.adres.php');

?>

	<!DOCTYPE html>
	<html lang="pl">

	<?php echo $view->showHeader("Koszyk", null); ?>

	<body>
		<!-- skrypt wywołuje cart-action.php i usuwa pozycję z koszyka -->
		<script>
			function delFromCart(path, id, cena)
			{
				var _id = id;
				$.ajax({
					type: 'post',
					url: 'cart-action.php?action=del',
					data: {'path':path, 'id':id, 'cena':cena},
					success: function(sucdata){
						//pobieram z tabeli pole wartość dla usuwanej pozycji
						var wartosc = $("#item-cena-" + _id).html();
						//console.log('Wartosc = ' + wartosc);

						//zamieniam przecinek na kropkę ponieważ Funkcja parseFloat wymaga,
						//aby punktem dziesiętnym była kropka, a nie przecinek.
						//Zastosowanie przecinka spowoduje pominięcie części ułamkowej.
						wartosc = wartosc.replace(",", ".");
						//Przetwarza argument w postaci łańcucha znaków zwracając liczbę zmiennoprzecinkową.
						wartosc = parseFloat(wartosc);

						var suma = $("#suma").html();
						suma = suma.replace(",", ".");
						suma = parseFloat(suma);
						suma = suma - wartosc;
						//formatowanie do 2 miejsc po przecinku
						suma = suma.toFixed(2);
						suma = suma.replace(".", ",");
						$("#suma").html(suma + " zł");

						$(".counter").html(sucdata);
						//usuwam kliknięty wiersz z tabeli
						$("#item-" + _id).remove();
					}
				});
			}
		</script>

		<?php
			if(isset($_SESSION['cart_id']))
			{
				// głowny SELECT do wyświetlania koszyka
				$count = $db->queryDb("SELECT photo, id, rodzaj, format, cena, ilosc, tekst FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
			}
		?>

		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<?php  //liczę ilość pozycji w koszyku dla podanego id koszyka  ?>
				<a href="cart-show">Koszyk (<span class="counter"><?php echo (isset($count) ? $count->num_rows : '0'); ?></span>)</a>

				<?php
					if(!$session->is_logged_in())
					{
						echo '<a href="login" class="fright">Logowanie</a>';
					} else {
						echo '<a class="fright" href="logout">Wyloguj</a>';
					}
				?>

			</div>
		</div>



		<div class="container">

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
									<th class='col-xs-2'>Zdjęcie</th> <th>Nazwa zdjęcia</th> <th>Rodzaj</th> <th>Format</th> <th>Cena</th> <th>Ilość</th> <th>Wartość</th>
								</tr>
						";

					//głowna pętla wyświetlająca pozycje w koszyku
					if (isset($count))
					{
						$suma = 0;
						while ($item = $count->fetch_object())
						{
								echo $view->showCart($item->photo, $item->id, $item->id, $item->rodzaj, $item->format, $item->cena, $item->ilosc, $item->tekst);
								$suma = $suma + ($item->ilosc * $item->cena);
								$_SESSION['total_orders'] = $suma;
						}
					}

					//wyświetla stopkę tabeli
					echo
						'
					 		<tr class="active">
								<th colspan="5"></th> <th>Łącznie:</th> <th id="suma" style="font-size: 1.3em;">' . number_format($suma, 2, ',', ' ') . ' zł</th>
							</tr>

							</table>
						';
				}
				else
				{
					echo $view->alertInfo('Twoj koszyk jest pusty.');
				}

				if(isset($_SESSION["referer"]))
				{
					echo "<a class='btn btn-default' href='http://" . $_SESSION["referer"] . "' role='button'>Wróć do galerii</a>";
				}
				else
				{
					echo "<a class='btn btn-default' href='http://annaosiak.pl/oferta' role='button'>Zobacz ofertę</a>";
				}

				//jeśli jest coś w koszyku wyświetl przycisk "Realizuj zamowienie"
				if (isset($count))
				{
					if(!$session->is_logged_in())
					{
						echo '<a href="login" class="btn btn-primary fright">Zaloguj się <br> aby zrealizować zamówienie</a>';
					} else {
						echo "<form action='order' method='post' class='pull-right'><button type='submit' name='submit' class='btn btn-primary'><span style='font-size: 1.3em;'>Zamawiam</span> <br> z obowiązkiem zapłaty</button></form>";
					}

				}


				//echo "<input class='btn btn-default' type='button' value='Wróć do galerii' onClick='history.back();' />";

			?>
			<br><br><br>
			
		</div>
	</body>
	</html>
