<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Managers";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff' || $_SESSION["role"]=='admin')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Managers</h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >ManagerID</div>
                <div class="col-md-4" id="val" >Name</div>
                <div class="col-md-4" id="val" >Email</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql ="select userid, name, email FROM account where role='manager'";
                $workers = mysqli_query($db, $sql);
                foreach($workers as $worker)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-2" id="val" ><?php echo $worker['userid']; ?></div>
                <div class="col-md-4" id="val" ><?php echo $worker['name']; ?></div>
                <div class="col-md-4" id="val" ><?php echo $worker['email']; ?></div>
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