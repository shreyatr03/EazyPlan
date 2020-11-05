<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Your Resources";// This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <div class="container">
        <br><h2>Allocated Resources</h2><br>
            <div class="row" id="heading">
                <div class="col-md-3" id="val" >ResourceID</div>
                <div class="col-md-3" id="val" >Resource</div>
                <div class="col-md-3" id="val" >Quantity</div>
                <div class="col-md-3" id="val" >Allocated By</div>
            </div>

            <?php
                include("../connection/config.php");
                $workerid = $_SESSION['userId'];
                $sql1 = "select a.resourceID, a.quantity, staff.name as name2, r.name as rname FROM allocatedresources a JOIN resource r ON r.id = a.resourceID JOIN account staff ON a.StaffID = staff.userid  WHERE a.workerID = $workerid";  // Select particular worker
                $resources = mysqli_query($db, $sql1);
                foreach($resources as $resource)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-3" id="val" ><?php echo $resource['resourceID']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['rname']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['quantity']; ?></div>
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