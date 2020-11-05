<!DOCTYPE html>

<html lang="en">
	<?php
		session_start();
		$title = "EazyPlan";             // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

		<div class="body-content" id="content">
			<div class="card-deck">

				<div class="card" onclick="loadResource()" style="cursor: pointer;" onclick="window.location='resource.php';" >
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
	
</body>
<?php 
	}
else{
echo "<h3 style='color:red'>Login to access the page...</h3>";
echo "<a href='./login.php'>Click here to login</a>";}
?>

</html>