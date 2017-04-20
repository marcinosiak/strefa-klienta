<?php

  error_reporting(E_ALL - E_WARNING);

  require_once('../class/class.db.php');
  require_once('../class/class.user.php');
  require_once('../class/class.view.php');
  require_once('../class/class.session.php');

  //jeśli admin jest zalogowany, przejdż do panelu
  if($session->is_logged_in_admin())
  {
    header("Location: index");
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
        if ($found_user->user_status == "admin")
        {
          $session->login_admin($found_user);

          if($session->is_logged_in_admin())
        	{
        		header("Location: index");
        	}

        }
        else {
          $message = "Tylko dla administratora. Nie masz wystarczających uprawnień";
        }
      }
      else {
        $message = "Użytkownik jest jeszcze nieaktywny";
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

<?php echo $view->showHeader("Logowanie", ""); ?>

<body>

	<div class="container">
		<h1>Logowanie</h1>
    <br>

    <?php if(isset($message)){ echo $view->alertInfo($message); } ?>

    <form action="login.php" method="post">
      <div class="form-group">
        <label for="email">Adres email</label>
        <input type="email" class="form-control" name="email" placeholder="Wpis swój adres email" value="<?php echo htmlentities($username); ?>">
      </div>
      <div class="form-group">
        <label for="password">Hasło</label>
        <input type="password" class="form-control" name="password" placeholder="Wprowadź hasło" value="<?php echo htmlentities($password); ?>">
      </div>
      <button type="submit" name="submit" class="btn btn-default">Zaloguj</button>
    </form>

	</div>
</body>
</html>
