<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Resources";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
            <br><h2>All Resources</h2><br>
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
    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>