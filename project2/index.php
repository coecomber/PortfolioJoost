<?php
	
	// Connecten aan die o zo mooie database met de IMPROVED mysql
	$con = mysqli_connect('localhost','u516715240_root','varken','u516715240_beer');
	
	include 'achterdeschermen.php';
	
	if(isset($_GET['id'])){
		$verhaaltje = GetVerhaaltje($con, $_GET['id']);
		$inhouderinos = SpalotjeMaken($verhaaltje);
	}
	else{
		$inhouderinos = LekkorSpalen();
	}
	$IsDitDanHetBegin = !isset($verhaaltje);
?>

<!--De HTML pagina tok-->
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Onafgemaakte zinnen </title>



<!--Gratis CSS Niemand weet wat dit is-->
		<link rel="stylesheet" href="http://bootswatch.com/slate/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	
	</head>
<!--Allemaal prachtige grijze blokken-->
	<body>
		<div class="big-spacer"></div>
		<div class="container">
			<div class="panel panel-default">
				
				<div class="panel-body">
					<?php echo $inhouderinos; ?>
				</div>
				<div class="panel-footer">	





<?php
						if (!$IsDitDanHetBegin) {
							foreach ($verhaaltje['options'] as $option) {
								if ($option == null) break;
								echo '<a href="?id=' . $option . '" class="btn btn-default" role="button">' . $option . '</a>';
							}
						}
						else{
							echo '<a href="index.php?id=1" class="btn btn-success" role="button">Speel het spelletje!</a>';
						}
?>		



					</div>	
				</div>		
			</div>
		</div>
	</body>
</html>