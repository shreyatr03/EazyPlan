<!DOCTYPE html>
<html lang="en">
	<?php
		session_start();
		$title = "EazyPlan";             // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){
    ?>

		<style>
            body{
                background-color: #EAF4FF;
                font-family: "Lato", sans-serif;
            }
			#mySearchInput {
                background-color: #ADD6FF;
                background-repeat: no-repeat;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ffffffaa;
                border-radius: 0px 4px 4px 0px;
                margin-left: -1px;
                margin-right: 5px;
                color:black;
		    }

			#mySearchInput::placeholder{
				color:black;
			}

			#selectfield{
				background-color: #ADD6FF;
				width: fit-content;
				height: 38px;
				color: black;
				font-size: 16px;
				padding: 0px 5px 0px 5px;
				border: 1px solid #ddd;
				border-radius: 4px 0px 0px 4px;
				margin-left: 20px;
			}
				
			option{
				color: black;
				border-radius: 5px;
			}

			option:hover{
				background-color: yellow;
				color: #ffffffaa;
			}
			.brand{
				color:#243444;
				font-size: x-large;
				text-decoration: none;
			}
			.brand:hover{
				color: #000000;
				text-decoration: none;
			}

			nav{
				color: #000000;
			}
			nav.a{
				color: #000000;
			}
			/* .nav-link{
				color: #ffffff;
			} */
			.navcolor{
				background-color: #84C1FF;
				opacity: 1.0;
			}

            .sidenav {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #ADD6FF;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }
            
            .sidenav a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #1b2733;
              display: block;
              transition: 0.3s;
            }
            
            .sidenav a:hover {
              color: #ffffff;
			  background-color: #ffffff11;
            }
            
            .sidenav .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }
            
            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            .sideNavButton{
                margin-left: -7px;
                font-size:30px;
                cursor:pointer;
                color: #000000;
                background-color: #ffffff55;
                padding: 0px 10px 0px 10px;
                border-radius: 2px;
            }
            .sideNavButton:hover{
                background-color: #ffffff99;
                transition: 0.3s;
            }

			.body-content{
				/* margin: 90px 150px 50px 150px; */
				margin: 5vmax 12vmax 5vmax 12vmax;
			}

		</style>
	</head>
	<body>
		<?php
            include("../php/navbar.php");
        ?>
		

		<div class="body-content">
			<div class="card-deck">
				<div class="card"  style="cursor: pointer;" onclick="window.location='workerResource.php';">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkLB9PFPhs0X2MxKej62wtmbTSj7x4BS88pRM57WHULnvtUm57G1tJJ2zvLeSpLnZvRHeZtqtqdvdbeo9oZCYzEj2HbIwOzTFWsQ&usqp=CAU&ec=45699845" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Available Resources</h5>
					<p class="card-text">Total Resources available with you.</p>
				</div>
				<?php
					include("../connection/config.php");
					$workerid = $_SESSION['userId'];
					$sql = "select max(AllocDate) as date FROM allocatedresources WHERE workerID = $workerid";
					$maxdates = mysqli_query($db, $sql);
					foreach($maxdates as $maxdate)
					{
				?>
				<div class="card-footer"><small class="text-muted">Last Resource Allocation on <?php echo $maxdate['date']; ?></small></div>
				<?php
				}
            	?>
				</div>
				<div class="card">
				<img src="https://cdn.pixabay.com/photo/2012/04/11/15/52/hammer-28636__340.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Alloted Work</h5>
					<p class="card-text">Work to be completed.</p>
				</div>
				<?php
					$sql1 = "select max(updateTime) as date FROM workerworkupdate WHERE workerID = $workerid";
					$updateTime = mysqli_query($db, $sql1);
					foreach($updateTime as $date)
					{
				?>
				<div class="card-footer"><small class="text-muted">Last work updated on <?php echo $date['date']; ?></small></div>
				<?php
				}
            	?>
				</div>
				<div class="card">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTOaCpvIOoF8et2ZoYqp-ifRwpM57oq_O6SQ8E2jZ_BoubKiqsKCVIlAWEV8_hK9-ETTX2LA5LZyv73MQPJ-cjKOaC72BOMLtImTw&usqp=CAU&ec=45699845" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Pending Orders</h5>
					<p class="card-text">View all the pending orders to be completed.</p>
				</div>
				<?php
					$sql2 = "select min(completionDate) as date FROM allorder WHERE status = 'Not Delivered'";
					$nextorder = mysqli_query($db, $sql2);
					foreach($nextorder as $order)
					{
				?>
				<div class="card-footer"><small class="text-muted">Next order by <?php echo $order['date']; ?></small></div>
				<?php
					}
            	?>
				</div>
			</div>
		</div>
</body>
<script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "290px";
            }

            function closeSideNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
<?php 
	}
else{
echo "<h3 style='color:red'>Login to access the page...</h3>";
echo "<a href='./login.php'>Click here to login</a>";}
?>
</html>