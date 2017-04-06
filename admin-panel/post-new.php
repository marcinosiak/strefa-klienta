<?php

	//header('Content-type: text/html; charset=utf-8');

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');
	require_once('../class/class.view.php');

	// Jeśli oba pola sa wypełnione
	if(isset($_POST['submit']))
	{
		if (!empty($_POST['title']))
		{
			$post->setTitle(trim($_POST['title']));
			$post->setContent(trim($_POST['content']));
			$post->setFolder(trim($_POST['folder']));

			$title = $db->escape_value($post->getTitle());
			$content = $db->escape_value($post->getContent());
			$url_text = $adres->get_katalog() . $post->plCharset($post->getTitle());
			$folder = $db->escape_value($post->getFolder());
			$password = $db->escape_value(trim($_POST['pass']));

			//Sprawdzam ostatnie id_strony w bazie
			if ($result = $db->queryDb("SELECT id_strony FROM strony ORDER BY id_strony DESC LIMIT 1"))
			{
				while($row = $result->fetch_object())
				{
					$ostatnieId = $row->id_strony;
				}
			}

			$url = $adres->get_katalog(). "?p=".($ostatnieId + 1);


			if ($result = $db->queryDb("INSERT INTO strony (url, url_text, title, content, folder, pass) VALUES ('{$url}', '{$url_text}', '{$title}', '{$content}', '{$folder}', '{$password}')"))
			{
				//echo "Dodano poprawnie";
				header("Location: index");
			}
		} else {
			$message = "Uzupełnij tytuł posta";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<?php echo $view->showHeader("Nowa strona", null); ?>

<body>
	<div class="container">

		<?php if(isset($message)){ echo $view->alertInfo($message); } ?>

		<h1>Nowa strona</h1>

		<p class="text-danger">Wgraj na serwer przez FTP katalog ze zdjęciami.</p>

		<form action="" method="post">
			<div class="form-group">
				<input class="form-control" type="text" name="title" placeholder="Wprowadź tytuł">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Treść posta"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="pass" placeholder="Hasło do strony">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="folder" placeholder="Nazwa katalogu ze zdjęciami">
			</div>
			<div class="form-group">
				<input class="btn btn-default" type="submit" name="submit" value="Opublikuj">
				<a class="btn btn-default" href="index">Zakończ</a>
			</div>
		</form>
	</div>
</body>
</html>
