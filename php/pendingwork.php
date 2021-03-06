<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Pending Work";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker') ){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Pending Work</h2><br>
            <div class="row" id="heading">
                <!-- <div class="col-md-1" id="val" >OrderID</div> -->
                <div class="col-md-3" id="val" >Id : Order Name</div>
                <div class="col-md-2" id="val" >Alloted</div>
                <div class="col-md-2" id="val" >Finished</div>
                <div class="col-md-2" id="val" >Pending</div>
                <div class="col-md-2" id="val" >Complete By</div>
                <div class="col-md-1" id="val" >Update</div>
            </div>

            <?php
                include("../connection/config.php");
                $workerid = $_SESSION['userId'];
                $sql1 ="select w.AllocID, w.orderID, o.name as oname, w.Quantity, CompleteBy FROM workallocation w JOIN allorder o on w.orderID = o.orderID where WorkerID = $workerid";
                $requests = mysqli_query($db, $sql1);
                if (!$requests) 
                {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
                else{
                foreach($requests as $request)
                    {
                        $allocid = $request['AllocID'];
                        $sql2 ="select productQTY FROM workerworkupdate where WorkerID = $workerid and AllocID = $allocid";
                        $updates = mysqli_query($db, $sql2);
                        $completed = 0;
                        foreach($updates as $update)
                            $completed = $update['productQTY'];
            ?>

            <div class="row" id="item">
                <div class="col-md-3" id="val" ><?php echo $request['orderID']." : ".$request['oname']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['Quantity']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $completed; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['Quantity'] - $completed; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['CompleteBy']; ?></div>
                <div class="col-md-1" id="val" ><span class="fas fa-edit" aria-hidden="true" style="cursor:pointer;" onclick="updateWork(<?php echo $allocid; ?>);"></span></div>
            </div>

            <?php
                }
            }
            ?>

        </div>

    </body>
    <script>
        function updateWork(n){
            var qty = prompt("Enter quantity");
            if(qty>0)
            $.ajax({
                    type: "POST",
                    url: "updateWork.php",
                    dataType: "text",
                    data: {
                    allocid: n,
                    quantity: qty
                    },
                    success: function(data) {
                        alert(data);
                        window.location.reload();
                    },
                    cache: false,
            });
            }
    </script>
    </script>
    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>