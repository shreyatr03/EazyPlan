<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "orders";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff' || $_SESSION["role"]=='admin' || $_SESSION["role"]=='manager')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
            <br><h2>All orders
            <?php
            if($_SESSION["role"]=='manager' ){
            ?>
                    <button class="btn btn-outline-secondary" style="margin:10px;"><a href="createorder.php"><i class="fa fa-plus" aria-hidden="true"></i></a></button>
            <?php
                }
            ?></h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >ID</div>
                <div class="col-md-2" id="val" >Name</div>
                <div class="col-md-2" id="val" >Description</div>
                <div class="col-md-2" id="val" >Quantity</div>
                <div class="col-md-2" id="val" >Status</div>
                <div class="col-md-2" id="val" >orderDate</div>
            </div>

            <?php
                include("../connection/config.php");

                $sql = "select * from allorder";
                $orders = mysqli_query($db, $sql);

                foreach($orders as $order)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-2" id="val" ><?php echo $order['orderID']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $order['name']; ?></div>
                <div class="col-md-2" id="val"><?php echo $order['description'] ?></div>
                <div class="col-md-2" id="val"><?php echo $order['quantity']; ?></div>
                <div class="col-md-2" id="val"><?php echo $order['status']; ?></div>
                <div class="col-md-2" id="val"><?php echo $order['orderDate']; ?></div>
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