<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Caf&eacute;!</title>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body class="bodyStyle">

	<div id="header" class="mainHeader">
		<hr>
		<div class="center"> Du_Caf&eacute;</div>
	</div>
	<br>
	<hr>
	<div class="topnav">
		<a href="index.html">Home</a>
		<a href="#aboutUs">About Us</a>
		<a href="#contactUs">Contact Us</a>
	</div>
	<hr>
	<div id="mainContent">

		<div id="mainPictures" class="center">
			<table>
				<tr>
					<td><img src="images/Coffee-and-Pastries.jpg" height=auto width="490"></td>
					<td><img src="images/Cake-Vitrine.jpg" height=auto width="450"></td>
				</tr>
			</table>
			<hr>
			<div id="header" class="mainHeader"><p>Du_caf&eacute; Employee List!</p></div>
			<br>

			<?php
			// --- DB Connect ---
			$connection_string = "host=du-lab2db-test-instance-1.c9482eq0gtdg.ca-central-1.rds.amazonaws.com port=5432 dbname=postgres user=dujiale password=Du98644765 sslmode=require";
			$connection = @pg_connect($connection_string);
			if (!$connection) { die("Could not connect to the database."); }

			$sql = "SELECT id, fname, lname, position, created_at FROM employee ORDER BY id ASC";
			$result = @pg_query($connection, $sql);
			if (!$result) { die("Error reading data."); }
			?>

			<!-- Proper table wrapper -->
			<table>
			<thead>
				<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Position</th>
				<th>Created</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($row = pg_fetch_assoc($result)) : ?>
				<tr>
				<td><?=htmlspecialchars($row['id'])?></td>
				<td><?=htmlspecialchars($row['fname'])?></td>
				<td><?=htmlspecialchars($row['lname'])?></td>
				<td><?=htmlspecialchars($row['position'])?></td>
				<td><?=htmlspecialchars($row['created_at'])?></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			</table>

			<?php pg_free_result($result); pg_close($connection); ?>
		</div>
	</div>
</body> 
</html>