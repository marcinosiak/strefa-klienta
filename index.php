<?php
	error_reporting(E_ALL - E_WARNING);

	/* ustaw ogranicznik pamięci podręcznej na 'private' */
	session_cache_limiter('private');
	$cache_limiter = session_cache_limiter();

	/* ustaw czas przedawnienia pamięci podręcznej na 30 minut */
	session_cache_expire(30);
	$cache_expire = session_cache_expire();

	/* rozpocznij sesję */
	session_start();

	var_dump($_SESSION);

	require_once('class/class.adres.php');
	require_once('class/class.db.php');
	require_once('class/class.folder.php');
	require_once('class/class.view.php');

	//łączę z bazą danych
	$db = new Db();
	$db->connectDb();

	//pobieram adres strony do wyświetlenia
	$adres = new Adres();
	$strona = $adres->getStrona();
	$katalog = $adres->getKatalog();
	$url = $adres->getUrl();

	//szukam w bazie strony do wyświetlenia
	$result = $db->queryDb("SELECT url_text, title, content, folder, pass FROM strony WHERE url_text='$strona' OR url='$strona'");

	if(isset($_SESSION['cart_id']))
	{
		//liczę ilość pozycji w koszyku dla podanego id koszyka
		$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}'");
	}

	$view = new View();
?>

<!DOCTYPE html>
<html lang="en">

<?php echo $view->showHeader(); ?>

<body>

	<div class="container">

		<!-- skrypt wywołuje cart.php i zwiększa licznik pozycji w koszyku -->
		<script>
			function addToCart(path)
			{
				$.ajax({
					type: 'post',
					url: 'cart.php?action=add',
					data: {'path':path},
					success: function(sucdata){
						$(".counter").html(sucdata);
					}
				});
			}
		</script>

		<a href="cart">Koszyk (<span class="counter"><?php echo (isset($count) ? $count->num_rows : '0'); ?></span>)</a>

		<?php

		if ($result->num_rows == 1)
		{
			//ustawiam adres tej strony jako poprzednia strona - potrzebna do wyświetlaenia w koszyku, aby zrobić powrót do poprzedniej strony
			$_SESSION['referer'] = $url;

			while ($row = $result->fetch_object())
			{
				echo "<h1> {$row->title} </h1>";

				//czy strona jest zabezpieczona hasłem? Jeśli nie to wyświetl ja
				if ($row->pass == "")
				{
					//------------- zdublowany blok kodu -------------------------------

					echo $row->content;

					//czy jest folder ze zdjęciami?
					if(!$row->folder == "")
					{
						$folder = new Folder($row->folder);
						echo '<div class="row gallery">';

						foreach ($folder->getFiles() as $file)
						{
							//http://www.dynamicdrive.com/style/csslibrary/item/css-popup-image-viewer/
							echo $view->showGallery($folder->getPath(), $file);
						}

						echo '</div>';
					}
					else
					{
						echo $view->alertInfo('Nie dołczono zdjęć lub niepoprawna nazwa katalogu ze zdjęciami');
					}
					//--------------------------------------------------------------------
				}


				//storna jest zabezpieczona hasłem
				else
				{
					//czy hasło zostało wpisane w formularzu na stronie
					if (isset($_POST["password"]))
					{
						$pass_site = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

						//czy hasła się zgadzaja
						if ($pass_site == $row->pass)
						{
							//------------- zdublowany blok kodu -------------------------------
							echo $row->content;

							//czy jest folder ze zdjęciami?
							if(!$row->folder == "")
							{
								$folder = new Folder($row->folder);
								echo '<div class="row gallery">';

								foreach ($folder->getFiles() as $file)
								{
									//http://www.dynamicdrive.com/style/csslibrary/item/css-popup-image-viewer/
									echo $view->showGallery($folder->getPath(), $file);
								}

								echo '</div>';
							}
							else
							{
								echo $view->alertInfo('Nie dołczono zdjęć lub niepoprawna nazwa katalogu ze zdjęciami');
							}
							//--------------------------------------------------------------------
						}
						//niepoprawne hasło
						else
						{
							echo $view->alertInfo('Błędne hasło. Wprowadź ponownie hasło');
							echo $view->passForm();
						}
					}
					//jeśli jasło nie zostało podane w formularzu, wyświetl formularz
					else
					{
						echo $view->passForm();
					}
				}
			}
		}
		// Wyświetla aktualną zawartość koszyka
		//Jeśli adres w przeglądarce jest = nazwa_domeny/strefa-klienta/cart
		elseif($strona == $katalog . "cart")
		{
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
							echo $view->showCart($item->photo);
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

		}
		else
		{
			//header("HTTP/1.0 404 Not Found");
			echo $view->alertInfo('404 Nie znalazłem takiej strony');
		}

		?>

	</div>
</body>
</html>
