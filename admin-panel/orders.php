<?php
	error_reporting(E_ALL - E_WARNING);

	require_once('../class/class.db.php');
	require_once('../class/class.post.php');
	require_once('../class/class.adres.php');
	require_once('../class/class.session.php');
	require_once('../class/class.view.php');




	if(!$session->is_logged_in_admin())
	//if(!$session->logged_in_admin)
	{
		header("Location: login");
	}

	$result = $db->queryDb("SELECT o.id, u.name, o.total_order, o.date FROM orders o, users u WHERE u.id = o.user_id");

?>

<!DOCTYPE html>
<html lang="pl">

<?php echo $view->showHeader("Admin Panel", null); ?>

<body>

	<div class="container">
		<h1>Zestawienie zamówień</h1>

		<a class="btn btn-default" href="index" role="button">Admin panel</a>
		<a class="fright" href="logout">Wyloguj</a>


		<h2>Lista wszystkich zamówień</h2>

		<table class="table">

			<tr>
				<th>Lp</th> <th>Numer zamówienia</th> <th>Kto zamawia</th> <th>Na kwotę</th> <th>Kiedy</th>
			</tr>

			<?php
				if($result)
				{
					$lp = 1;
					while($row = $result->fetch_object())
					{
						echo "<tr>";
							echo "<td> {$lp} </td>
										<td> {$row->id} </td>
								  	<td> {$row->name} </td>
										<td> {$row->total_order} </td>
										<td> {$row->date} </td>";
						echo "</tr>";
						$lp++;
					}
					$result->free();
				}
			 ?>

		</table>
	</div>
</body>
</html>
