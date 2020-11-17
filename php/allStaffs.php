<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Requests";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='manager' || $_SESSION["role"]=='admin')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Staffs</h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >WorkerID</div>
                <div class="col-md-4" id="val" >Name</div>
                <div class="col-md-4" id="val" >Email</div>
                <div class="col-md-2" id="val" >Delete</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql ="select userid, name, email FROM account where role='staff'";
                $workers = mysqli_query($db, $sql);
                foreach($workers as $worker)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-2" id="val" ><?php echo $worker['userid']; ?></div>
                <div class="col-md-4" id="val" ><?php echo $worker['name']; ?></div>
                <div class="col-md-4" id="val" ><?php echo $worker['email']; ?></div>
                <!--div class="col-md-4" id="val" >
                    <?php
                    /*if($_SESSION["role"]=='admin' ){
                    ?>
                        <button class="btn btn-outline-secondary" style="margin:10px;" onclick="del(<?php $worker['userid'] ?>)"><i class="fa fa-minus" aria-hidden="true"></i></a></button>
                    <?php
                        }*/
                    ?>
                </div-->

            </div>

            <?php
                }
            ?>

        </div>
        <!--script>
        function del(sid){
            $.ajax({
                    type: "POST",
                    url: "del.php",
                    dataType: "text",
                    data: {
                    id:sid
                    },
                    success: function(data) {
                        if(data==='yes')
                            window.location.reload();
                        else
                            alert("Couldn't Complete your request "+data);
                    },
                    cache: false,
            });
            }
        </script-->

    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>