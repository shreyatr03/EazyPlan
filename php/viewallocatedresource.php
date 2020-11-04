<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <div class="container">
        <br><h2>Allocated Resources</h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >WorkerID</div>
                <div class="col-md-3" id="val" >Name</div>
                <div class="col-md-2" id="val" >ResourceID</div>
                <div class="col-md-2" id="val" >Quantity</div>
                <div class="col-md-3" id="val" >Allocated By</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql = "select * from allocatedresources";
                $staffid = $_SESSION['userId'];
                //$sql1 = "SELECT workerID, resourceID, quantity, acc.name FROM allocatedresources a JOIN account acc ON workerID = acc.userid";
                $sql1 = "SELECT workerID, resourceID, quantity, worker.name as name1, staff.name as name2 FROM allocatedresources a JOIN account worker ON a.workerID = worker.userid JOIN account staff ON a.staffID = staff.userid  WHERE a.staffid = $staffid";  // Select particular worker
                // "SELECT time, location, user1.first_name, user1.last_name, user2.first_name, user2.last_name FROM allocatedresources a JOIN account worker ON a.workerID = worker.userid JOIN account staff ON a.staffID = staff.userid"; // Select all
                // $sql1 = "SELECT workerID, resourceID, quantity, worker.name FROM allocatedresources m JOIN account worker ON m.user1_id = user1.id JOIN users user2 ON m.user2_id = user2.id WHERE meeting_id = " . $mid;
                $resources = mysqli_query($db, $sql1);
                foreach($resources as $resource)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-2" id="val" ><?php echo $resource['workerID']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['name1']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $resource['resourceID']; ?></div>
                <div class="col-md-2" id="val"><?php echo $resource['quantity']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['name2']; ?></div>
            </div>

            <?php
                }
            ?>

        </div>
    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>