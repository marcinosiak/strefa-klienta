<?php
	error_reporting(E_ALL - E_WARNING);

	//przy każdym włączeniu przeglądarki sesja jest kończona
	ini_set('session.cookie_lifetime',0);

  /* rozpocznij sesję */
	require_once('class/class.session.php');
	var_dump($_SESSION);

	//require_once('class/class.db.php');
	require_once('class/class.view.php');


  	if(!$session->is_logged_in())
  	{
  		header("Location: login");
  	}
?>

	<!DOCTYPE html>
	<html lang="pl">

	<?php echo $view->showHeader("Zamwówienie", null); ?>

	<body>
		<!-- Live Reload Script -->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

		<div class="container">
      <a class="fright" href="logout">Wyloguj</a>

			<h1>Twoje zamówienie</h1>

			<a href="cart-show" class="btn btn-primary">Wróć do koszyka</a>

    </div>
	</body>
	</html>
