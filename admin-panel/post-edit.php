<?php

	//header('Content-type: text/html; charset=utf-8');

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');

	$post = new Post();
	$adres = new Adres();

	$db = new DB();

	//wczytywanie posta do edycji
	if (isset($_GET['post']))
	{
		$post_id = $db->escape_value($_GET['post']);

		$result = $db->queryDb("SELECT url_text, title, content, folder FROM strony WHERE id_strony='$post_id'");

		if ($result->num_rows == 1)
		{
			while($row = $result->fetch_object())
			{
				$clearUrl = $post->clearUrl($row->url_text, $adres->getKatalog());
				$post->setUrlText($clearUrl);
				$post->setTitle($row->title);
				$post->setContent($row->content);
				$post->setFolder($row->folder);
			}
		}

		$result->free();
	}

	//aktualizacja posta
	if (!empty($_POST['title']) && !empty($_POST['content']))
	{
		$post->setUrlText($_POST['url']);
		$post->setTitle($_POST['title']);
		$post->setContent($_POST['content']);
		$post->setPostId($_POST['post_id']);
		$post->setFolder($_POST['folder']);

		$post_id = $db->escape_value($post->getPostId());
		$title = $db->escape_value(trim($post->getTitle()));
		$content = $db->escape_value(trim($post->getContent()));
		$url_text = $db->escape_value($adres->getKatalog() . $post->plCharset($post->getUrlText()));
		$folder = $db->escape_value(trim($post->getFolder()));

		if ($db->queryDb("UPDATE strony SET url_text='$url_text', title='$title', content='$content', folder='$folder' WHERE id_strony='$post_id'"))
		{
			echo "Aktualizacja poprawna";
		}
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
		<h1>Edytuj wpis</h1>

		<form action="" method="post">
			<div class="form-group">
				<label for="title">Tytuł wpisu</label>
				<input class="form-control" type="text" name="title" placeholder="Wprowadź tytuł" value="<?php if(!empty($post->getTitle())) {echo $post->getTitle();} ?>">
			</div>
			<div class="form-group">
				<label for="url">Bezopśredni odnośnik</label>
				<input class="form-control" type="text" name="url" value="<?php if(!empty($post->getUrlText())) {echo $post->getUrlText();} ?>">
			</div>
			<div class="form-group">
				<label for="content">Treść wpisu</label>
				<textarea class="form-control" name="content" id="" cols="30" rows="10"><?php if(!empty($post->getContent())) {echo $post->getContent();} ?></textarea>
			</div>
			<div class="form-group">
				<label for="folder">Nazwa katalogu ze zdjęciami</label>
				<input class="form-control" type="text" name="folder" value="<?php if(!empty($post->getFolder())) {echo $post->getFolder();} ?>" placeholder="Nazwa katalogu ze zdjęciami">
			</div>
			<div class="form-group">
				<input class="btn btn-default" type="submit" value="Popraw">
				<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

				<a class="btn btn-default" href="index">Anuluj</a>
			</div>
		</form>
	</div>
</body>
</html>
