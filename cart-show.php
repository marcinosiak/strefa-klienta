<?php
	error_reporting(E_ALL - E_WARNING);

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

	session_start();

	var_dump($_SESSION);

	require_once('class/class.db.php');
	require_once('class/class.view.php');

	//łączę z bazą danych
	$db = new Db();
	
	$view = new View();
?>

	<!DOCTYPE html>
	<html lang="pl">

	<?php echo $view->showHeader(); ?>

	<body>

		<div class="container">

			<!-- skrypt wywołuje cart-action.php i usuwa pozycję z koszyka -->
			<script>
				function delFromCart(path, id)
				{
					var _id = id;
					$.ajax({
						type: 'post',
						url: 'cart-action.php?action=del',
						data: {'path':path, 'id':id},
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

			<?php  //liczę ilość pozycji w koszyku dla podanego id koszyka  ?>
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
						}
					}

					//wyświetla stopkę tabeli
					echo
						'
					 		<tr class="active">
								<th colspan="5"></th> <th>Łącznie:</th> <th id="suma">' . number_format($suma, 2, ',', ' ') . ' zł</th>
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

				//echo "<input class='btn btn-default' type='button' value='Wróć do galerii' onClick='history.back();' />";

			?>

		</div>
	</body>
	</html>
