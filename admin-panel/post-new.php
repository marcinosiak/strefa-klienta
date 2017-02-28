<?php

	header('Content-type: text/html; charset=utf-8');

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');
	require_once('../class/class.view.php');

	// Jeśli oba pola sa wypełnione
	if (!empty($_POST['title']) && !empty($_POST['content']))
	{
		$post->setTitle(trim($_POST['title']));
		$post->setContent(trim($_POST['content']));
		$post->setFolder(trim($_POST['folder']));

		$title = $db->escape_value($post->getTitle());
		$content = $db->escape_value($post->getContent());
		echo $url_text = $adres->getKatalog() . $post->plCharset($post->getTitle());
		$folder = $db->escape_value($post->getFolder());

		//Sprawdzam ostatnie id_strony w bazie
		if ($result = $db->queryDb("SELECT id_strony FROM strony ORDER BY id_strony DESC LIMIT 1"))
		{
			while($row = $result->fetch_object())
			{
				echo $ostatnieId = $row->id_strony;
			}
		}

		$url = $adres->getKatalog(). "?p=".($ostatnieId + 1);


		if ($result = $db->queryDb("INSERT INTO strony (url, url_text, title, content, folder) VALUES ('{$url}', '{$url_text}', '{$title}', '{$content}', '{$folder}')"))
		{
			//echo "Dodano poprawnie";
			header("Location: index");
		}
	}
	// Jeśli tylko jedno pola jest wypełnione
	else if (!empty($_POST['title']) || !empty($_POST['content']))
	{
		echo "Uzupełnij wszystkie pola";
	}


?>

<!DOCTYPE html>
<html lang="en">

<?php echo $view->showHeader("Nowy post"); ?>

<body>
	<div class="container">
		<h1>Nowy post</h1>

		<form action="" method="post">
			<div class="form-group">
				<input class="form-control" type="text" name="title" placeholder="Wprowadź tytuł">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Treść posta"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="folder" placeholder="Nazwa katalogu ze zdjęciami">
			</div>
			<div class="form-group">
				<input class="btn btn-default" type="submit" value="Opublikuj">
				<a class="btn btn-default" href="index">Zakończ</a>
			</div>
		</form>
	</div>
</body>
</html>
