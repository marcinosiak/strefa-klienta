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
    $kid = trim($_POST['kid']);
    $institution = trim($_POST['institution']);
    $group = trim($_POST['group']);

    if(isset($_POST['agree_www']))
    {
      if($_POST['agree_www'] == "on")
      {
        $agree_www = 1;
      } else {
        $agree_www = 0;
      }
    } else {
      $agree_www = 0;
    }

    if(isset($_POST['agree_ad']))
    {
      if($_POST['agree_ad'] == "on")
      {
        $agree_ad = 1;
      } else {
        $agree_ad = 0;
      }
    } else {
      $agree_ad = 0;
    }

    if(isset($_POST['agree_email']))
    {
      if($_POST['agree_email'] == "on")
      {
        $agree_email = 1;
      } else {
        $agree_email = 0;
      }
    } else {
      $agree_email = 0;
    }

    $message = User::register($name, $email, $password, $repeat_password, $phone, $kid, $institution, $group, $agree_www, $agree_ad, $agree_email);
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

	<div class="container">
		<h1>Rejestracja nowego Klienta</h1>

    <?php if(isset($message)){ echo $view->alertInfo($message); } ?>

    <div class="row" id="pwd-container">
      <div class="col-md-3"></div>

      <div class="col-md-7">
        <section class="login-form">
          <form method="post" action="register" role="login">
            <img src="img/logo.png" class="img-responsive" alt="" />
            <label for="fl_name">Imie i nazwisko</label>
            <input type="text" name="fl_name" placeholder="Imię i nazwisko" required class="form-control input-lg" value="<?php if(isset($name)) { echo $name; } ?>" />

            <label for="email">Adres email</label>
            <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="<?php if(isset($email)) { echo $email; } ?>" />

            <label for="password">Hasło</label>
            <input type="password" class="form-control input-lg" name="password" placeholder="Hasło" required value="<?php if(isset($password)) { echo $password; } ?>" />

            <label for="email">Powtórz hasło</label>
            <input type="password" class="form-control input-lg" name="repeat_password" placeholder="Powtórz hasło" required value="<?php if(isset($repeat_password)) { echo $repeat_password; } ?>" />

            <label for="phone">Telefon kontaktowy rodzica</label>
            <input type="tel" name="phone" placeholder="Twój telefon" required class="form-control input-lg" value="<?php if(isset($phone)) { echo $phone; } ?>" />

            <label for="kid">Imię i nazwisko dziecka</label>
            <input type="text" name="kid" placeholder="Imię i nazwisko dziecka" required class="form-control input-lg" value="<?php if(isset($kid)) { echo $kid; } ?>" />

            <label for="institution">Nazwa przedszkola lub szkoły</label>
            <input type="text" name="institution" placeholder="Nazwa przedszkola lub szkoły" required class="form-control input-lg" value="<?php if(isset($institution)) { echo $institution; } ?>" />

            <label for="group">Grupa lub klasa</label>
            <input type="text" name="group" placeholder="Grupa lub klasa" required class="form-control input-lg" value="<?php if(isset($group)) { echo $group; } ?>" />

            <p>Proszę o zaznaczenie:</p>
            <input type="checkbox" name="agree_www">
            <div>Wyrażam zgodę na publikację zdjęć mojego dziecka na stronie www i facebooku fotografów: Anna Osiak i Michał Chojnowski.</div>

            <input type="checkbox" name="agree_ad">
            <div>Wyrażam zgodę na wykorzystanie zdjęć mojego dziecka w materiałach reklamujących działalność autora (np. ulotki).</div>

            <input type="checkbox" name="agree_email">
            <div>Wyrażam zgodę na przesłanie emailem, maksymalnie kilka razy w roku oferty fotograficznej.</div>

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
