<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Request";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){ // && ($_SESSION["role"]=='staff')
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Request Resource //Shreya pls complete this</h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >ResourceID</div>
                <input class="col-md-2" id="val" >
            </div>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >Quantity</div>
                <input class="col-md-2" id="val" >
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