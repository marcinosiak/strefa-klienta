<?php

  error_reporting(E_ALL - E_WARNING);

  require_once('../class/class.db.php');
  require_once('../class/class.user.php');
  require_once('../class/class.view.php');
  require_once('../class/class.session.php');

  if($session->is_logged_in())
  {
    header("Location: index");
  }

  if(isset($_POST['submit']))
  {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    $found_user = User::authenticate($username, $password);

    if($found_user){
      $session->login($found_user);
      header("Location: index");
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

<?php echo $view->showHeader("Logowanie"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

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
