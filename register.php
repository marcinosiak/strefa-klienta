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
    $name = trim($_POST['fl_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeat_password = trim($_POST['repeat_password']);
    $phone = trim($_POST['phone']);

    $message = User::register($name, $email, $password, $repeat_password, $phone);
    $_POST = array();

  }
  else{
    $username = "";
    $password = "";
  }
?>


<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Rejestracja", "register.php"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<div class="container">
		<h1>Rejestracja nowego Klienta</h1>
    <br>

    <?php if(isset($message)){ echo $view->alertInfo($message); } ?>
<!--
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="email">Adres email</label>
        <input type="email" class="form-control" name="email" placeholder="Wpis swój adres email" value="<?php //echo htmlentities($username); ?>">
      </div>
      <div class="form-group">
        <label for="password">Hasło</label>
        <input type="password" class="form-control" name="password" placeholder="Wprowadź hasło" value="<?php //echo htmlentities($password); ?>">
      </div>
      <button type="submit" name="submit" class="btn btn-default">Zaloguj</button>
    </form>
 -->



    <div class="row" id="pwd-container">
      <div class="col-md-4"></div>

      <div class="col-md-4">
        <section class="login-form">
          <form method="post" action="register" role="login">
            <img src="img/logo.png" class="img-responsive" alt="" />
            <input type="text" name="fl_name" placeholder="Imię i nazwisko" required class="form-control input-lg" value="<?php if(isset($name)) { echo $name; } ?>" />
            <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="<?php if(isset($email)) { echo $email; } ?>" />
            <input type="password" class="form-control input-lg" name="password" placeholder="Hasło" required value="<?php if(isset($password)) { echo $password; } ?>" />
            <input type="password" class="form-control input-lg" name="repeat_password" placeholder="Powtórz hasło" required value="<?php if(isset($repeat_password)) { echo $repeat_password; } ?>" />
            <input type="tel" name="phone" placeholder="Twój telefon" required class="form-control input-lg" value="<?php if(isset($phone)) { echo $phone; } ?>" />

            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Rejestruj</button>
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