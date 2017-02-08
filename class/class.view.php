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
								'. $this->showOferta() .'
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Wróć do galerii</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addToCart(\' ' . $path . $file . ' \')">Dodaj do koszyka</button>
								</div>
							</div> <!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

				</div>
			';
		}

		private function showOferta()
		{
			// $offer = new Offer();
			//
			// $oferta = '<div class="container-fluid">';
			//
			// $oferta .= '<div class="row row-modal"><strong><div class="col-md-3">Zdjęcie portretowe</div><div class="col-md-3">Format</div> <div class="col-md-3">Cena</div><div class="col-md-3">Ilość</div></strong></div>';
			//
			// foreach ($offer->getZdjeciaPortretowe() as $format => $cena)
			// {
			// 	$oferta .= '<div class="row row-modal"><div class="col-md-3 col-md-offset-3">'.$format.' cm</div> <div class="col-md-3">'.$cena.' zł</div><div class="col-md-3"><input class="sztuki" type="text" name="szt" value="1" /></div></div>';
			// }
			//
			// $oferta .= '<div class="row row-modal"><strong><div class="col-md-3">Kartka świąteczna</div> <div class="col-md-3">Format</div> <div class="col-md-3">Cena</div><div class="col-md-3">Ilość</div></strong></div>';
			//
			// foreach ($offer->getKartkaSwiateczna() as $format => $cena)
			// {
			// 	$oferta .= '<div class="row row-modal"><div class="col-md-3 col-md-offset-3">'.$format.' cm</div> <div class="col-md-3">'.$cena.' zł</div><div class="col-md-3"><input class="sztuki" type="text" name="szt" value="1" /></div></div>';
			// }
			//
			// $oferta .= '<div class="row row-modal"><strong><div class="col-md-3">Zestaw kartek świątecznych</div> <div class="col-md-3">Format</div> <div class="col-md-3">Cena</div><div class="col-md-3">Ilość</div></strong></div>';
			//
			// foreach ($offer->getZestawKartek() as $format => $cena)
			// {
			// 	$oferta .= '<div class="row row-modal"><div class="col-md-3 col-md-offset-3">'.$format.' cm</div> <div class="col-md-3">'.$cena.' zł</div><div class="col-md-3">7 szt.</div></div>';
			// }
			//
			// $oferta .= '<div class="row row-modal"><strong><div class="col-md-3">Zdjęcie do portfela</div> <div class="col-md-3">Format</div> <div class="col-md-3">Cena</div><div class="col-md-3">Ilość</div></strong></div>';
			//
			// foreach ($offer->getZdjecieDoPortfela() as $format => $cena)
			// {
			// 	$oferta .= '<div class="row row-modal"><div class="col-md-3 col-md-offset-3">'.$format.' cm</div> <div class="col-md-3">'.$cena.' zł</div><div class="col-md-3">10 szt.</div></div>';
			// }
			//
			// $oferta .= '<div class="row row-modal"><strong><div class="col-md-3">Zdjęcie grupowe</div> <div class="col-md-3">Format</div> <div class="col-md-3">Cena</div><div class="col-md-3">Ilość</div></strong></div>';
			//
			// foreach ($offer->getZdjecieGrupowe() as $format => $cena)
			// {
			// 	$oferta .= '<div class="row row-modal"><div class="col-md-3 col-md-offset-3">'.$format.' cm</div> <div class="col-md-3">'.$cena.' zł</div><div class="col-md-3"><input class="sztuki" type="text" name="szt" value="1" /> szt.</div></div>';
			// }
			//
			// $oferta .= '</div> <!-- end container-fluid -->';
			//

			$oferta = '<table class="table table-striped">';
			$oferta .= '<tr> <th></th> <th>Format</th> <th>Cena</th> <th>Ilość</th> </tr>';

			$oferta .= $this->showOfertaForeach("ZdjeciaPortretowe", "Zdjęcie portretowe");
			$oferta .= $this->showOfertaForeach("KartkaSwiateczna", "Kartka świąteczna");
			$oferta .= $this->showOfertaForeach("ZestawKartek", "Zestaw 6 kartek świątecznych");
			$oferta .= $this->showOfertaForeach("ZdjecieDoPortfela", "Zestaw 10 zdjęć do portfela");
			$oferta .= $this->showOfertaForeach("ZdjecieGrupowe", "Zdjęcie grupowe");
			$oferta .= $this->showOfertaForeach("ZdjeciaWmagnesie", "Zdjęcie w formie magnesu");
			$oferta .= $this->showOfertaForeach("ObrazNaPlotnie", "Obraz na półtnie");

			$oferta .= '</table>';

			return $oferta;
		}

		// metoda jest używana przez metodę showOferta()
		private function showOfertaForeach($nazwaMetody, $naglowekTabeli)
		{
			$offer = new Offer();
			$index = 0;
			$oferta = "";

			// użyta jest tu nieistniejąca metoda getZdjecia(). Wywoła ona magiczną metode __call() w klasie Offer
			foreach ($offer->getZdjecia($nazwaMetody) as $format => $cena)
			{
				if($index == 0){
					//$oferta .= '<tr> <th scope="row" rowspan="'. count($offer->getZdjecia($nazwaMetody)) .'">'. $naglowekTabeli .'</th> <td><input type="checkbox">'.$format.' cm</td> <td>'.$cena.' zł</td> <td><input class="sztuki" type="text" name="szt" value="1" /> szt</td> </tr>';
					$oferta .= '<tr> <th scope="row">'. $naglowekTabeli .' <input type="checkbox"></th> <td>'.$format.' cm</td> <td>'.$cena.' zł</td> <td><input class="sztuki" type="text" name="szt" value="1" /> szt</td> </tr>';
				}
				else {
					$oferta .= '<tr> <th scope="row"><input type="checkbox"></th> <td>'.$format.' cm</td> <td>'.$cena.' zł</td> <td><input class="sztuki" type="text" name="szt" value="1" /> szt</td> </tr>';
				}
				$index++;
			}

			return $oferta;
		}

		public function showCart($photo, $id, $item)
		{
			//<td>' . $photo . '<div><button type="submit" class="btn btn-xs rm-form-cart" onclick="delFromCart(\'' . $photo . '\')"> <span>&times;</span> Usuń z koszyka</button></div> </td>
			//<td>' . $photo . '<div><a type="submit" class="btn btn-xs rm-form-cart" href="cart-show.php?action=del&id='. $id .'&photo='. $photo .'"> <span>&times;</span> Usuń z koszyka</a></div> </td>
			return '
				<tr id="item-'.$item.'">
					<td><div><img src="' . $photo . '" class="img-responsive"></div></td>
					<td>' . $photo . '<div><button type="submit" class="btn btn-xs rm-form-cart" onclick="delFromCart(\'' . $photo . '\', \'' . $id . '\')"> <span>&times;</span> Usuń z koszyka</button></div> </td>
					<td>10x15</td>
					<td>2.50 zł</td>
					<td>2 szt.</td>
					<td><b>5.00 zł</b></td>
				</tr>
			';
		}

	}