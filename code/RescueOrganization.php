<!DOCTYPE html>
<html lang="en">
<head>
	<title>CISC 332 Final Project | RescueOrganization </title>
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
		<table>
			<caption>All Rescue Organization Information</caption>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Postal Code</th>
				<th>Phone Number</th>
			</tr>

			<?php
				$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");
				
				$rows = $dbh->query("SELECT locationName,street,city,postalCode,phone 
						from location_3 JOIN locationphone on localName=locationName
						join rescueorganization on locationName=rescueorganization.localName");
						
				foreach($rows as $row) {
						echo "<tr>
								<td>".$row[0]."</td>
								<td>".$row[1]."</td>
								<td>".$row[2]."</td>
								<td>".$row[3]."</td>
								<td>".$row[4]."</td>
							</tr>";
					}
				$dbh = null;
			?>
		</table>
		
		<form action="driverPHP.php" method="post">
		<h2>Search all drivers information in a Rescue Organization</h2></br>
		<p>Please enter the rescue organization's name:</p>
		<input type="text" name="rescueOrganization">
		<input type="submit">
		</form>
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