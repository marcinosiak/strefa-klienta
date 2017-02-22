<?php

	require_once('class/class.offer.php');

	class View
	{

		public function showHeader()
		{
			return '
				<head>
					<meta charset="UTF-8">
					<title>Strefa klienta</title>

					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

					<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w==" crossorigin="anonymous">
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>


					<link rel="stylesheet" href="main.css">


				</head>
			';
		}


		public function alertInfo($info)
		{
			return '
				<br><br>
				<div class ="alert alert-info" role="alert">'.$info.'</div>
			';
		}


		public function passForm()
		{
			return '
				<br>
			    <div class="row">
			    	<div>
						<div class="col-md-4">
							<form method="POST">
								<div class="form-group">
									<p>Treść jest chroniona. Proszę podać hasło:</p>
								</div>

								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Strona zabezpieczona hasłem" required>
								</div>

								<div class="form-group">
									<button class="btn btn-primary" type="submit">Wyślij</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			';
		}


		public function showGallery($path, $file)
		{
			return '
				<div class="col-md-12 item-photo">
					<div class="img-shop">
						<img src="' . $path . $file . '" class="img-responsive" alt="Responsive image">
						<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#modal_' . substr($file, 0, -4) . '">Dodaj do koszyka</button>
					</div>

					<div class="modal fade" id="modal_' . substr($file, 0, -4) . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">' . substr($file, 0, -4) . '</h4>
								</div>
								<div class="modal-body">
								'. $this->showOferta($path, $file) .'
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Wróć do galerii</button>
								</div>
							</div> <!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

				</div>
			';
		}

		private function showOferta($path, $file)
		{
			$id_table = basename($file, ".jpg");

			$oferta = '<table id="'.$id_table.'" class="table table-striped">';
			$oferta .= '<tr> <th>&nbsp;</th> <th>Format</th> <th>Cena</th> <th>Ilość</th> <th>Tekst na zdjęciu</th> <th>&nbsp;</th></tr>';

			$oferta .= $this->showOfertaForeach("ZdjeciaPortretowe", "Zdjęcie portretowe", $path, $file);
			$oferta .= $this->showOfertaForeach("KartkaSwiateczna", "Kartka świąteczna", $path, $file);
			$oferta .= $this->showOfertaForeach("ZestawKartek", "Zestaw 6 kartek świątecznych", $path, $file);
			$oferta .= $this->showOfertaForeach("ZdjecieDoPortfela", "Zestaw 10 zdjęć do portfela", $path, $file);
			$oferta .= $this->showOfertaForeach("ZdjecieGrupowe", "Zdjęcie grupowe", $path, $file);
			$oferta .= $this->showOfertaForeach("ZdjeciaWmagnesie", "Zdjęcie w formie magnesu", $path, $file);
			$oferta .= $this->showOfertaForeach("ObrazNaPlotnie", "Obraz na półtnie", $path, $file);
			$oferta .= $this->showOfertaForeach("Plakat", "Plakat", $path, $file);

			$oferta .= '</table>';

			return $oferta;
		}

		// metoda jest używana przez metodę showOferta()
		private function showOfertaForeach($nazwaMetody, $naglowekTabeli, $path, $file)
		{
			$offer = new Offer();
			$index = 0;
			$oferta = "";
			//kasuję rozszerzenie pliku, jquery nie widzi id z kropką w nazwie id
			$file = basename($file, ".jpg");

			// użyta jest tu nieistniejąca metoda getZdjecia(). Wywoła ona magiczną metode __call() w klasie Offer
			foreach ($offer->getZdjecia($nazwaMetody) as $format => $cena)
			{
				//ustawiam id poszczegolnych elementów
				$check_id = 'cb-'.$nazwaMetody.'-'.$format.'-'.$file;
				$check_id = str_replace(".", "", $check_id); //kasuję kropki, w nazwie id nie może być kropki (jeśli jest nie działa javascript)
				$sztuki_id = $check_id.'-sztuki';
				$napis_id = $check_id.'-napis';
				$przycisk_id = $check_id.'-btn';

				if($index == 0){
					$oferta .= '<tr>
												<td scope="row">'. $naglowekTabeli .' <input type="checkbox" id="'.$check_id.'"></td>';
				}
				elseif($index > 0) {
					$oferta .= '<tr>
												<td scope="row"><input type="checkbox" id="'.$check_id.'"></td>';
				}

				$oferta .= '	<td>'.$format.' cm</td> <td>'.$cena.' zł</td>
											<td><input id="'.$sztuki_id.'" disabled="disabled" class="sztuki" type="text" name="szt" value="0" /> szt</td>
											<td><input id="'.$napis_id.'" class="napis" type="text" placeholder="Napis + 1zł" name="napis" /></td>
											<td><button type="button" class="btn btn-primary btn-xs" id="'.$przycisk_id.'" disabled="disabled" onclick="addToCart(\''. $path . $file . '.jpg\', \''.$naglowekTabeli.'\', \''.$format.'\', \''.$cena.'\', \''.$sztuki_id.'\', \''.$napis_id.'\')">Kupuję</button></td>
										</tr>';
				$index++;
			}

			return $oferta;
		}

		public function showCart($photo, $id, $item, $rodzaj, $format, $cena, $ilosc, $napis)
		{
			$photo_name = basename($photo, ".jpg");

			$row = '
				<tr id="item-'.$item.'">
					<td><div><img src="' . $photo . '" class="img-responsive"></div></td>
					<td>' . $photo_name . '<div><button type="submit" class="btn btn-xs rm-form-cart" onclick="delFromCart(\'' . $photo . '\', \'' . $id . '\')"> <span>&times;</span> Usuń z koszyka</button></div>
			';

			if($napis != ""){
				$row .= '<div class="napis text-primary">Z napisem: ' . $napis . '</div>';
			}

			$row .= '
					</td>
					<td>' . $rodzaj . '</td>
					<td>' . $format . '</td>
					<td>' . $cena . ' zł</td>
					<td>' . $ilosc . ' szt.</td>
					<td><b id="item-cena-'.$item.'">' . number_format($ilosc * $cena, 2, ',', ' ') . ' zł</b></td>
				</tr>
			';

			return $row;
		}

	}
