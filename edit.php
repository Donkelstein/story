<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Redigera</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather%7cMerriweather+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<ul class="nav justify-content-center" style="margin-top: 5vh;">
  <li class="nav-item">
    <a class="nav-link active h4" style="color: #3366FF" href="index.php">Hem</a>
  </li>
  <li class="nav-item">
    <a class="nav-link h4" style="color: #3366FF" href="play.php">Spela</a>
  </li>
  <li class="nav-item">
    <a class="nav-link h4" style="color: #3366FF" href="edit.php">Redigera</a>
  </li>
</ul>
<main class="content">
	<section>
		<h1>Redigera</h1>

			<form method="POST">
				<p>
			
				<input name="text" value="">

				</p>

			</form>




<?php
// TODO protect with your login
// add, edit, delete pages & events
// skriv ut en lista över sidor
include_once 'include/dbinfo.php';

	// PDO
	$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);


	$stmt = $dbh->prepare("SELECT * FROM story");
	$stmt->execute();

	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($row as $val) {
			echo "<pre>" . print_r($val,1) . "</pre>";
	}

?>
</section>
</main>
<script src="js/navbar.js"></script>
</body>
</html>