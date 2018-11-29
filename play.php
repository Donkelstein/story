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
	<link rel="stylesheet" type="text/css" href="story.css">
</head>
<body style="overflow: hidden;">

<main>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="asset 2.svg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <img src="asset 2.svg" style="width: 12%; height: 12%; margin-left: 5vh">

      <li class="nav-item">
        <a class="nav-link" href="index.php" style="margin-left: 48vh;"><h3>Hem</h3><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="play.php" style="margin-left: 10vh;"><h3>Spela</h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php" style="margin-left: 10vh;"><h3>Redigera</h3></a>
      </li>
    </ul>
  </div>
</nav>




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

		echo " <div class='row justify-content-center' style='margin-top:25vh;'>
    			<div class='col-4'><blockquote class='blockquote text-center style='style='font-size: 2em;'>" . $row['text'] . "
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
			echo "<a class='userAnswer' style='font-size: 2em;'
					href=\"?page="  . $val['target'] . "\">" . $val['text'] ."</a>";
		}
		echo "
		</blockquote>
		</div>
		 </div>";

	} elseif(isset($_SESSION['page'])) {
		// TODO load page from db
		// use for returning player / cookie

	} else {
		echo "<div class='row justify-content-center' style='margin-top: 25vh;'>
    			<div class='col-4'>
				<blockquote class='blockquote text-center'>
    			<a href = '?page=1' style='font-size: 6em; color: rgba(0,0,0,.5);'> Spela </a>
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