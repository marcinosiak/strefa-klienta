<?php
  error_reporting(E_ALL - E_WARNING);

  require_once('class/class.view.php');
  require_once('class/class.user.php');

  if(isset($_GET['id'])){ $id = $db->escape_value($_GET['id']);}
  if(isset($_GET['code'])){ $code = $db->escape_value($_GET['code']);}

  if (isset($id) && isset($code))
  {
    $check_activate = User::find_by_sql("SELECT id, activate FROM users WHERE id='{$id}' AND activate='1' LIMIT 1");
    $is_activate = mysqli_num_rows($check_activate);

    if($is_activate == 0)
    {
      $user = User::find_by_sql("SELECT id, activation_key FROM users WHERE id='{$id}' AND activation_key='{$code}' LIMIT 1");
  		$check_num = mysqli_num_rows($user);

  		if($check_num == 1)
      {
        $activate = User::find_by_sql("UPDATE users SET activate='1' WHERE id='{$id}'");
  			$message = "Twoje konto zaosało aktywowane. Teraz możesz w pełni korzystać z serwisu.";
        $button  = '<a class="btn btn-primary" href="login">Zaloguj się</a>';
  		}	else {
  			$message = "Brak takiego Klienta w bazie lub niepoprawny kod aktywacji.";
      }
    }
    else {
      $message = "To konto zostało już aktywowane wcześniej. Możesz się zalogować.";
      $button  = '<a class="btn btn-primary" href="login">Zaloguj się</a>';
    }
	}	else {
		$message = "Brak danych do aktywowania konta.";
    $button  = '<a class="btn btn-primary" href="register">Zarejestruj się</a>';
  }
?>



<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Aktywacja", "activate.php"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<div class="container">
		<h1>Aktywacja nowego Klienta</h1>

    <?php if(isset($message)){ echo $view->alertInfo($message); } ?>
    <?php if(isset($button)){ echo $button; } ?>

	</div>
</body>
</html>
