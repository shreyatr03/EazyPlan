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
		<link rel="stylesheet" href="../css/resource.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<!-- My Stylesheet-->
		<link rel="stylesheet" type="text/css" href="./homepagestaff.css" type="text/css">

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- JAVASCRIPT FOR BOOTSTRAP -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </head>

    <?php 
    session_start(); 
	if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
    ?>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light navcolor" style="z-index: 1;">
            <span class="sideNavButton" onclick="openNav()">&#9776;</span>&nbsp;&nbsp;
            <a class=" brand" href="#">EazyPlan</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

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
                        <span class="fas fa-power-off" aria-hidden="true"></span>&nbsp;Logout
                    </a>
                </li>

                </ul>
            </div>
        </nav>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            <a href="resource.php">All Resources</a>
            <a href="#">Allocated Resources</a>
            <a href="#">Resource Requests</a>
            <a href="#">Work Update</a>
            <a href="#">Pending Orders</a>
        </div>
                
        <div class="container">

            <div class="row" id="heading">
                <div class="col-md-3" id="val" >ID</div>
                <div class="col-md-3" id="val" >Name</div>
                <div class="col-md-3" id="val" >Quantity</div>
                <div class="col-md-3" id="val" >Cost(Rs)</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql = "select * from resource"; 
                $resources = mysqli_query($db, $sql);
                foreach($resources as $resource)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-3" id="val" ><?php echo $resource['id']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['name']; ?></div>
                <div class="col-md-3" id="val"><?php echo $resource['quantity']." ".$resource['unit']; ?></div>
                <div class="col-md-3" id="val"><?php echo $resource['cost']; ?></div>
            </div>

            <?php
                }
            ?>

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
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>