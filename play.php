<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Spela</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather%7cMerriweather+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('Asset 2.svg'); background-repeat: no-repeat;  background-size: 30%;">

<main>
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






<?php
	include_once 'include/dbinfo.php';

	// PDO
	$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);


	if (isset($_GET['page'])) {
		// TODO load requested page from DB using GET
		$filteredPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
		//prepares the question
		$stmt = $dbh->prepare("SELECT * FROM story WHERE id = :id");
		//puts in filterdpage into id.
		$stmt->bindParam(':id', $filteredPage);
		//executes.
		$stmt->execute();
		//gets data from the database.
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//prints out row, row being what you have written in the database at the given id number.
		//echo "<pre>" . print_r($row,1) . "</pre>";

		echo " <div class='row justify-content-center' style='margin-top:10vh;'>
    			<div class='col-4'><blockquote class='blockquote text-center'>" . $row['text'] . "
    			</blockquote>
    			</div> 
    			</div>";

		// prepares the question.
		$stmt = $dbh->prepare("SELECT * FROM storylinks WHERE storyid = :id");
		//puts in filterdpage into id.
		$stmt->bindParam(':id', $filteredPage);
			//executes.
		$stmt->execute();
		//gets data from the database.
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		echo "<div class='row justify-content-center'>
    			<div class='col-4'> <blockquote class='blockquote text-center'> ";
		foreach ($row as $val) {
			echo "<a class='userAnswer' style='margin-left: 10px; margin-right: 10px;' href=\"?page="  . $val['target'] . "\">" . $val['text'] ."</a>";
		}
		echo "
		</blockquote>
		</div>
		 </div>";

	} elseif(isset($_SESSION['page'])) {
		// TODO load page from db
		// use for returning player / cookie

	} else {
		echo "<div class='row justify-content-center' style='margin-top: 10vh;'>
    			<div class='col-4'>
				<blockquote class='blockquote text-center'>
    			<a href = '?page=1'> Spela </a>
    			</blockquote>
    			</div>
    			</div>";
		// TODO load start of story from DB
	}

?>
</main>
<script src="js/navbar.js"></script>
</body>
</html>