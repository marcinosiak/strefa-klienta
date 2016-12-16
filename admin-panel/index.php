<?php

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');

	$adres = new Adres();

	$db = new Db();
	$db->connectDb();

	$result = $db->queryDb("SELECT id_strony, url_text, title, date FROM strony");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w==" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<h1>Admin panel</h1>
		
		<a class="btn btn-default" href="post-new" role="button">Nowy post</a>
		
		<h2>Lista wszystkich postów</h2>

		<table class="table">
			
			<tr>
				<th>ID strony</th> <th>Tytuł strony</th> <th>Data publikacji</th>
			</tr>

			<?php 
				if($result)
				{
					while($row = $result->fetch_object())
					{
						echo "<tr>";
							echo "<td> {$row->id_strony} </td>
								  <td> <a href='{$adres->getHost()}{$row->url_text}'><strong>{$row->title}</strong></a>
								  	   <div><a href='{$adres->getHostKatalog()}admin-panel/post-edit?post={$row->id_strony}'>edytuj</a> <span>|</span> <a>usuń</a></div>
								  </td>
								  <td> {$row->date} </td>";
						echo "</tr>";
					}

					$result->free();
				}
			 ?>

		</table>
	</div>
</body>
</html>	