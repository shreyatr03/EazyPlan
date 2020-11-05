<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Requests";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"])){ // && ($_SESSION["role"]=='staff')
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Pending Orders</h2><br>
            <div class="row" id="heading">
                <div class="col-md-1" id="val" >OrderID</div>
                <div class="col-md-2" id="val" >Name</div>
                <div class="col-md-2" id="val" >Manufactured</div>
                <div class="col-md-2" id="val" >Required</div>
                <div class="col-md-1" id="val" >Pending</div>
                <div class="col-md-2" id="val" >Last Updated</div>
                <div class="col-md-2" id="val" >Deliver By</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql1 ="select a.orderID, CompletedProdQTY, lastUpdated, o.name as oname, o.quantity as oqty, o.completionDate as odate FROM pendingorder a JOIN allorder o on a.orderID = o.orderID";
                //$sql1 = "SELECT workerID, resourceID, quantity, worker.name as name1, staff.name as name2 FROM allocatedresources a JOIN account worker ON a.workerID = worker.userid JOIN account staff ON a.staffID = staff.userid  WHERE a.staffid = $staffid";
                $requests = mysqli_query($db, $sql1);
                foreach($requests as $request)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-1" id="val" ><?php echo $request['orderID']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['oname']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['CompletedProdQTY']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['oqty']; ?></div>
                <div class="col-md-1" id="val" ><?php echo $request['oqty']-$request['CompletedProdQTY']; ?></div>
                <div class="col-md-2" id="val"><?php echo $request['lastUpdated'] ?></div>
                <div class="col-md-2" id="val"><?php echo $request['odate'] ?></div>
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