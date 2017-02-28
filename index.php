<?php
	error_reporting(E_ALL - E_WARNING);

	/* ustaw ogranicznik pamięci podręcznej na 'private' */
//	session_cache_limiter('private');
//	$cache_limiter = session_cache_limiter();

	/* ustaw czas przedawnienia pamięci podręcznej na 30 minut */
	//session_cache_expire(30);
	//$cache_expire = session_cache_expire();

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

	/* rozpocznij sesję */
	require_once('class/class.session.php');
	var_dump($_SESSION);

	require_once('class/class.adres.php');
	require_once('class/class.db.php');
	require_once('class/class.folder.php');
	require_once('class/class.view.php');
	require_once('class/class.user.php');

	//pobieram adres strony do wyświetlenia
	$strona = $adres->getStrona();
	$katalog = $adres->getKatalog();
	$url = $adres->getUrl();

	//szukam w bazie strony do wyświetlenia
	$result = $db->queryDb("SELECT url_text, title, content, folder, pass FROM strony WHERE url_text='$strona' OR url='$strona'");

	if(isset($_SESSION['cart_id']))
	{
		//liczę ilość pozycji w koszyku dla podanego id koszyka
		$count = $db->queryDb("SELECT photo FROM cart WHERE cart_id='{$_SESSION['cart_id']}' AND status='1'");
	}
?>

<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Strefa klienta"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<div class="container">

		<script>
			//skrypt wywołuje cart-action.php i zwiększa licznik pozycji w koszyku
			function addToCart(path, rodzaj, format, cena, sztuki_id, napis_id)
			{
				sztuki_id = "#" + sztuki_id;
				var ilosc = $(sztuki_id).val();

				napis_id = "#" + napis_id;
				var napis = $(napis_id).val();

				// + 1 zł jeśli jest napis na zdjęciu
				if (napis != "" && napis != " ") {
					cena = eval(cena) + 1;
					//console.log('Cena zwiększona = ' + cena);
				}

				$.ajax({
					type: 'post',
					url: 'cart-action.php?action=add',
					data: {
						'path':			path,
						'rodzaj':		rodzaj,
						'format':		format,
						'cena':			cena,
						'ilosc':		ilosc,
						'tekst':		napis
					},
					success: function(sucdata){
						$(".counter").html(sucdata);
					}
				});
			}

			//obsługa kliknięcia w checkboxa na formularzu zamwóienia
			$(document).on('click', 'input[type="checkbox"]', function(){
    		//alert(this.id);
				var id_sztuki = "#" + this.id + "-sztuki";
				var id_przycisk = "#" + this.id + "-btn";

				if(document.getElementById(this.id).checked){
					$(id_sztuki).prop('disabled', false);
					$(id_sztuki).val('1');
					$(id_przycisk).prop('disabled', false);
				}
				else{
					$(id_sztuki).prop('disabled', true);
					$(id_sztuki).val('0');
					$(id_przycisk).prop('disabled', true);
				}
			});

			//obsługa klawisza w polu z napisem dla zdjęcia
			//$(document).on('keyup', 'input.napis', function(){
    		//alert(this.id);
			//});

		</script>

		<a href="cart-show">Koszyk (<span class="counter"><?php echo (isset($count) ? $count->num_rows : '0'); ?></span>)</a>

		<?php

		//ustawiam adres tej strony jako poprzednia strona - potrzebna do wyświetlaenia w koszyku, aby zrobić powrót do poprzedniej strony
		// if(isset($_SESSION['referer'])){
		// 	$_SESSION['referer'] = $url;
		// }
		// else{
		// 	$_SESSION['referer'] = "http://annaosiak.pl/strefa-klienta";
		// }

		if ($result->num_rows == 1)
		{
			$_SESSION['referer'] = $url;

			while ($row = $result->fetch_object())
			{
				echo "<h1> {$row->title} </h1>";

				//strona bez hasła
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
							//echo $view->showGallery($folder->getPath(), $file, $oferta);
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
		else
		{
			//header("HTTP/1.0 404 Not Found");
			echo $view->alertInfo('404 Nie znalazłem takiej strony');
		}

		?>

	</div>
</body>
</html>
