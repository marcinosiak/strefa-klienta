<?php

  error_reporting(E_ALL - E_WARNING);

  require_once('class/class.db.php');
  require_once('class/class.user.php');
  require_once('class/class.view.php');
  require_once('class/class.session.php');

  //jeśli admin jest zalogowany, przejdż do panelu
  if($session->is_logged_in())
  {
    header("Location: order");
  }

  if(isset($_POST['submit']))
  {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    $found_user = User::authenticate($username, $password);

    if($found_user)
    {
      if ($found_user->activate == "1")
      {
        $session->login($found_user);
        header("Location: order");
      }
      else {
        $message = "Użytkownik jest jeszcze nieaktywny. Sprawdź swoją pocztę i kliknij w link aktywacyjny.";
      }
    }
    else{
      $message = "Niepoprawny użytkownik lub hasło";
    }
  }
  else{
    $username = "";
    $password = "";
  }
?>


<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Logowanie", "login.php"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<div class="container">
		<h1>Logowanie</h1>
    <br>

    <?php if(isset($message)){ echo $view->alertInfo($message); } ?>

    <div class="row" id="pwd-container">
      <div class="col-md-4"></div>

      <div class="col-md-4">
        <section class="login-form">
          <form method="post" action="login.php" role="login">
            <img src="img/logo.png" class="img-responsive" alt="" />
            <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="" />

            <input type="password" class="form-control input-lg" name="password" placeholder="Hasło" required="" />


            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Zaloguj</button>
            <div>
              <a href="register">Załóż konto</a> lub <a href="#">Nie pamiętasz hasła?</a>
            </div>

          </form>

          <div class="form-links">
            <a href="http://annaosiak.pl">www.annaosiak.pl</a>
          </div>
        </section>
        </div>

        <div class="col-md-4"></div>
    </div>




	</div>
</body>
</html>
