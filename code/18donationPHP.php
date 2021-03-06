<!DOCTYPE html>
<html lang="en">

<head>
	<title>CISC 332 Final Project | Donation </title>
	<meta charset="utf-8"/>
	<meta name="author" content="Jiani Sun"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="css/style.css"> 	
</head>

<body>
	<div class="content">
	<div class="navbar">
		<div class="container">
			<div class="logo-div">
				<a href="Index.html"><img class="logo" src ="img/logo.png" alt="Animal Sweet Home" /></a>
			</div>
			<div class="navbar-link">
				<ul class="menu">
					<li><a id="index" href="Index.html">Home</a></li>
					<li><a id="donate" href="Donate.html">Donate</a></li>
					<li><a id="SPCA" href="SPCA.php">SPCA</a></li>
					<li><a id="rescue" href="RescueOrganization.php">Rescue Organization</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<main>
		<?php 
		$localName = $_POST["Organization"];
		$year = $_POST["Year"];

		$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");

		$total = $dbh->query("SELECT sum(Amount)
					FROM donation
					where localName='$localName' and year(donateDate)='$year'");
		
		$sum = $dbh->query("SELECT sum(Amount)
					FROM donation
					where localName='$localName' and year(donateDate)='$year'");
		
		$numRow = $total->fetchColumn();

		
		if (is_null($numRow)){
			echo "<h2>$localName did not get any donations in $year.</h2>";
		}
		else{
			foreach($sum as $row) {
					echo "<h2>$localName received $".$row[0]." donation in $year.</h2>";
			}
		}
		$dbh = null;
		?>
	</main>
	</div>
	
	<footer>
		<div class="address">
		218 Barrie St.<br/>
		Kingston, ON<br/>
		K7L 3K3
		</div>
		
		<ul class="ContactInfo">
			<li><a id="email" href="mailto:agriculture@queensu.ca" <i class="icon-envelope" </i>Email Us</a></li>
			<li><a id="phone" href="tel:613-555-5555" <i class="icon-phone-square" </i>613-555-5555</a></li>
		</ul>
	</footer>
	
</body>
</html>