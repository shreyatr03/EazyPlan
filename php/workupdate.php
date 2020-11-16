<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Work Updates";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='admin' || $_SESSION["role"]=='staff')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
            <br><h2>Work Updates</h2><br>
            <div class="row" id="heading">
                <div class="col-md-1" id="val" >Id</div>
                <div class="col-md-3" id="val" >Name</div>
                <div class="col-md-1" id="val" >OrderId</div>
                <div class="col-md-2" id="val" >Order Name</div>
                <div class="col-md-2" id="val" >Quantity</div>
                <div class="col-md-3" id="val" >Last Updated</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql1 ="select workerID, o.orderID, productQTY, updateTime, w.name as wname, o.name as oname FROM workerworkupdate wwu JOIN account w on wwu.workerID = w.userid JOIN allorder o on wwu.orderID = o.orderID";
                $resources = mysqli_query($db, $sql1);
                foreach($resources as $resource)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-1" id="val" ><?php echo $resource['workerID']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $resource['wname']; ?></div>
                <div class="col-md-1" id="val" ><?php echo $resource['orderID']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $resource['oname']; ?></div>
                <div class="col-md-2" id="val"><?php echo $resource['productQTY'] ?></div>
                <div class="col-md-3" id="val"><?php echo $resource['updateTime']; ?></div>
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