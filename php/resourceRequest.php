<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Requests";                       // This is the title of a page
        include("../php/headLinks.php");
        if(isset($_SESSION["name"]) && ( $_SESSION["role"]=='staff')){
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>

        <div class="container">
        <br><h2>Resource Requests</h2><br>
            <div class="row" id="heading">
                <div class="col-md-2" id="val" >WorkerID</div>
                <div class="col-md-3" id="val" >Name</div>
                <div class="col-md-2" id="val" >ResourceId</div>
                <div class="col-md-2" id="val" >Resource</div>
                <div class="col-md-2" id="val" >Quantity</div>
                <div class="col-md-1" id="val" >Alloted</div>
            </div>

            <?php
                include("../connection/config.php");
                $sql = "select * from resourcerq";
                $sql1 ="select ReqId, workerID, resourceID, rqQTY, alot, w.name as wname, r.name as rname FROM resourcerq rq JOIN account w on rq.workerID = w.userid JOIN resource r on rq.resourceID = r.id where alot=0";
                //$sql1 = "SELECT workerID, resourceID, quantity, worker.name as name1, staff.name as name2 FROM allocatedresources a JOIN account worker ON a.workerID = worker.userid JOIN account staff ON a.staffID = staff.userid  WHERE a.staffid = $staffid";
                $requests = mysqli_query($db, $sql1);
                if(mysqli_num_rows($requests)==0)
                echo "<h3>No new Requests</h3>";
                else 
                foreach($requests as $request)
                    {
            ?>

            <div class="row" id="item">
                <div class="col-md-2" id="val" ><?php echo $request['workerID']; ?></div>
                <div class="col-md-3" id="val" ><?php echo $request['wname']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['resourceID']; ?></div>
                <div class="col-md-2" id="val" ><?php echo $request['rname']; ?></div>
                <div class="col-md-2" id="val"><?php echo $request['rqQTY'] ?></div>
                <div class="col-md-1" id="val">
                    <?php 
                    if($request['alot']==0) {
                    echo '<span class="fas fa-truck" aria-hidden="true" id = r'.$request["ReqId"].' style="cursor:pointer;" onclick="allot('.$request["ReqId"].','.$request["resourceID"].','.$request['rqQTY'].','.$request['workerID'].');"></span>';
                    }
                    else{
                        echo "Yes";
                    }
                     ?></div>
            </div>

            <?php
                }
            ?>

        </div>

    </body>
    <script>
        function allot(n,m,o,w){
            $.ajax({
                    type: "POST",
                    url: "resAllot.php",
                    dataType: "text",
                    data: {
                    reqid: n,
                    resid: m,
                    reqQty: o,
                    wid: w
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
    </script>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
</html>