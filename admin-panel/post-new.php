<?php 

	header('Content-type: text/html; charset=utf-8');

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');

	// Jeśli oba pola sa wypełnione
	if (!empty($_POST['title']) && !empty($_POST['content']))
	{
		$post = new Post();
		$post->setTitle(trim($_POST['title']));
		$post->setContent(trim($_POST['content']));
		$post->setFolder(trim($_POST['folder']));

		$db = new Db();
		$db->connectDb();
		$mysqli = $db->getMysqli();

		$adres = new Adres();

		$title = $mysqli->real_escape_string($post->getTitle());
		$content = $mysqli->real_escape_string($post->getContent());
		echo $url_text = $adres->getKatalog() . $post->plCharset($post->getTitle());
		$folder = $mysqli->real_escape_string($post->getFolder());

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
			echo "Dodano poprawnie";
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
<head>
	<meta charset="UTF-8">
	<title>Nowy post</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w==" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</head>
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
			</div>
		</form>
	</div>
</body>
</html>