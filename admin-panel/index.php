<?php
	error_reporting(E_ALL - E_WARNING);

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');
	require_once('../class/class.session.php');
	require_once('../class/class.view.php');

	if(!$session->is_logged_in())
	{
		header("Location: login");
	}

	$result = $db->queryDb("SELECT id_strony, url_text, title, date FROM strony");
?>

<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Admin Panel"); ?>

<body>
	<!-- Live Reload Script -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<div class="container">
		<h1>Admin panel</h1>

		<a class="btn btn-default" href="post-new" role="button">Nowy post</a>
		<a class="fright" href="logout">Wyloguj</a>


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
