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

	require_once('class/class.adres.php');
	require_once('class/class.db.php');
	require_once('class/class.folder.php');
	require_once('class/class.view.php');
	require_once('class/class.user.php');

	//pobieram adres strony do wyświetlenia
	$strona = $adres->get_strona();
	//$katalog = $adres->getKatalog();
	$url = $adres->get_url();

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

<?php echo $view->showHeader("Sklep ze zdjęciami", null); ?>

<body>
	<script>
		//skrypt wywołuje cart-action.php i zwiększa licznik pozycji w koszyku
		function addToCart(path, rodzaj, format, cena, sztuki_id, napis_id, tr_id)
		{
			sztuki_id = "#" + sztuki_id;
			var ilosc = $(sztuki_id).val();

			napis_id = "#" + napis_id;
			var napis = $(napis_id).val();

			tr_id = "#" + tr_id;
			//console.log(tr_id);
			//var tr = $(tr_id).val();

			// + 1 zł jeśli jest napis na zdjęciu
			if (napis != "" && napis != " ")
			{
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
					$(tr_id).css( "background-color", "#97d7f8" );
					//console.log(tr_id);
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

	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
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

				//var_dump($row->pass);

				// if(isset($_SESSION['pass_site'])){
				// 	var_dump($_SESSION['pass_site']);
				// } else {
				// 	var_dump("_SESSION['pass_site'] jest puste");
				// }

				//Sterowanie dostępęm do wyświetlenia strony
				//Jeśli strona jest zabezpieczona hasłem
				if(strlen($row->pass) > 0)
				{
					//czy do tej strony było już podane wcześniej hasło
					//np. wracam do strony z koszyka, więc wcześniej już podałem hasło
					if(isset($_SESSION['pass_site']))
					{
						$pass_site = $_SESSION['pass_site'];
					}	else {
						$pass_site = null;
					}

					//
					$_SESSION['access'] = $session->get_access();

					//jeśli wcześniej było już podane hasło to sprawdzam
					//czy to hasło jest faktycznie do tej strony
					//ten warunek zabezpiecza przed dostępem do innych stron z hasłem
					if($_SESSION['access'] == true && $pass_site == $row->pass)
					{
						$_SESSION['access'] = true;
						//$_SESSION['access-info'] = "t0";
					}
					//jeśli zostało wpisane hasło w formularzu
					elseif (isset($_POST["password"]))
					{
						//to przefiltruj je
						$pass_site = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

						//i jeśli hasło zgadza się z hasłem odczytanym z bazy, udziel dostępu
						if ($pass_site == $row->pass)
						{
							$_SESSION['access'] = true;
							//i zapamiętaj podane hasło
							$_SESSION['pass_site'] = $row->pass;
						} else {
							$_SESSION['access'] = false;
							echo $view->alertInfo('Błędne hasło. Wprowadź ponownie hasło');
							echo $view->passForm();
						}
					} else {
						//pierwsze wyświetlenie strony, czyli wcześniej nie było podane hasło
						$_SESSION['access'] = false;
						//$_SESSION['access-info'] = "f2";
						//wyświetl formularz do wpisania hasła dostępu do strony
						echo $view->passForm();
					}
				}
				//jeśli strona nie jest zabezpieczona hasłem udziel dostępu
				else {
					$_SESSION['access'] = true;
					//$_SESSION['access-info'] = "t2";
				}

				//wyświetlanie strony uzależnione od wcześnie przydzielinego dostępu
				if($_SESSION['access'])
				{
					echo $row->content;

					//czy jest folder ze zdjęciami?
					if(!$row->folder == "")
					{
						$folder = new Folder($row->folder);
						if($folder->get_is_folder())
						{
							echo '<div class="row gallery">';

							foreach ($folder->getFiles() as $file)
							{
								//http://www.dynamicdrive.com/style/csslibrary/item/css-popup-image-viewer/
								echo $view->showGallery($folder->getPath(), $file);
							}

							echo '</div>';
						} else {
							echo $view->alertInfo('Nie ma takiego katalogu ze zdjęciami ('. $folder->getPath() . ')');
						}
					} else {
						echo $view->alertInfo('Nie dołczono zdjęć lub niepoprawna nazwa katalogu ze zdjęciami');
					}
				}
			}
		} else {
			//header("HTTP/1.0 404 Not Found");
			echo $view->alertInfo('Wpisz proszę pełny adres strony, ktrą chcesz zobaczyć. Jeśli nie znasz adresu proszę o kontakt na foto.annaosiak@gmail.com');
		}

		?>

	</div>
</body>
</html>
