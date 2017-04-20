<?php
	//error_reporting(E_ALL - E_WARNING);

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');
	require_once('../class/class.session.php');
	require_once('../class/class.view.php');

	if(!$session->is_logged_in_admin())
	{
		header("Location: login");
	}

	$result = $db->queryDb("SELECT id_strony, url_text, title, date FROM strony");
?>

<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Admin Panel", null); ?>

<body>

	<div class="container">
		<h1>Admin panel</h1>

		<a class="btn btn-default" href="post-new" role="button">Nowa strona</a>
		<a class="btn btn-default" href="orders" role="button">Zamówienia</a>
		<a class="fright" href="logout">Wyloguj</a>


		<h2>Lista wszystkich stron</h2>

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
								  <td> <a href='{$adres->get_host()}{$row->url_text}'><strong>{$row->title}</strong></a>
								  	   <div><a href='{$adres->get_host_katalog()}admin-panel/post-edit?post={$row->id_strony}'>edytuj</a> <span>|</span> <a>usuń</a></div>
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
