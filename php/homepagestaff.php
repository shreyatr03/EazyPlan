<!DOCTYPE html>

<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>EazyPlan</title>
        		
		<!-- TO GET GLYPH ICONS-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<!--TILL HERE-->

		<!-- CSS FOR BOOTSTRAP-->
		<link rel="stylesheet" href="../css/homepagestaff.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<!-- My Stylesheet-->
		<link rel="stylesheet" type="text/css" href="#" type="text/css">

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- JAVASCRIPT FOR BOOTSTRAP -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		<script type="text/javascript">
		function loadResource(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("content").innerHTML = xhttp.responseText;
				}
			};
			xhttp.open("GET", "resource.php", true);
			xhttp.send();
		}
		</script>

	
	</head>
<?php 
session_start(); 
if(isset($_SESSION["name"])){
?>
	<body>
        <nav class="navbar navbar-expand-lg navbar-light navcolor" style="z-index: 1;">
            <span class="sideNavButton" onclick="openNav()">&#9776;</span>&nbsp;&nbsp;
			<a class=" brand" href="#">EazyPlan</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- <form class="navbar-form form-inline navbar-nav  " role="search" method="get" action="#">
					<div class="form-group">
						<select id="selectfield" name="field">
							<option value="a">a</option>
							<option value="b" selected>b</option>
						  </select>
						<input type="text" id="mySearchInput" class="form-control" name="q" value="" placeholder="Search" >&nbsp;
					</div>
				</form> -->
			  <ul class="navbar-nav ml-auto">
				<li class="nav-item ">
				  <a class="nav-link" href="./homepagestaff.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="fas fa-user-cog" aria-hidden="true"></span>&nbsp;&nbsp; <?php echo "Welcome".$_SESSION["name"]; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="#">Your Profile</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./logout.php">
						<span class="fas fa-power-off" aria-hidden="true"></span>&nbsp;Logout</a>
				</li>
			  </ul>

			  
			</div>
		</nav>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            <a href="#">All Resources</a>
			<a href="#">Allocated Resources</a>
			<a href="#">Resource Requests</a>
			<a href="#">Work Update</a>
			<a href="#">Pending Orders</a>
		</div>

		<div class="body-content" id="content">
			<div class="card-deck">

				<div class="card" onclick="loadResource()" id="resource">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkLB9PFPhs0X2MxKej62wtmbTSj7x4BS88pRM57WHULnvtUm57G1tJJ2zvLeSpLnZvRHeZtqtqdvdbeo9oZCYzEj2HbIwOzTFWsQ&usqp=CAU&ec=45699845" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">All Resources</h5>
						<p class="card-text">Total Resources available.</p>
					</div>
					<div class="card-footer"><small class="text-muted">Resource updated on 5-09-2020</small></div>
				</div>

				<div class="card">
					<img src="https://www.thesoftwarereport.com/wp-content/uploads/2018/08/supplychain.png" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Allocated Resources</h5>
						<p class="card-text">Resource allocated to individual workers.</p>
					</div>
					<div class="card-footer"><small class="text-muted">Last allocated to Hariharan</small></div>
				</div>

				<div class="card">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTOaCpvIOoF8et2ZoYqp-ifRwpM57oq_O6SQ8E2jZ_BoubKiqsKCVIlAWEV8_hK9-ETTX2LA5LZyv73MQPJ-cjKOaC72BOMLtImTw&usqp=CAU&ec=45699845" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Pending Orders</h5>
					<p class="card-text">View all the pending orders to be completed.</p>
				</div>
				<div class="card-footer"><small class="text-muted">Next order by 24-09-2020</small></div>
				</div>
			</div>
		</div>
        <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "290px";
        }

        function closeSideNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        </script>
	
</body>
<?php 
	}
else{
echo "<h3 style='color:red'>Login to access the page...</h3>";
echo "<a href='./login.php'>Click here to login</a>";
}
?>

</html>