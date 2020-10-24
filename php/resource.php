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
<body>

<div class="row">
    <div class="col-md-2" id="val" >Name</div>
    <div class="col-md-4" id="val" >Quantity</div>
    <div class="col-md-3" id="val" >Cost</div>
</div>

        <?php
            include("../connection/config.php");
            $sql = "select * from resource"; 
            $resources = mysqli_query($db, $sql);

            foreach($resources as $resource)
                {
        ?>

        <div class="row">
        <div class="col-md-2" id="val" style="color:lightblue;"><?php echo $resource['name'] ?></div>
        <div class="col-md-4" id="val" style="color:pink;"><?php echo $resource['quantity'] ?></div>
        <div class="col-md-3" id="val" style="color:white;"><?php echo $resource['cost'] ?></div>
        </div>


        <?php
            }
        ?>
</body>
</html>