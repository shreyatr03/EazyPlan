<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Work Allocation";                       // This is the title of a page
        include("../php/headLinks.php");
        include("../connection/config.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='manager'))
        { 
    ?>

    <body>
        <?php
            include("../php/navbar.php");
            if(isset($_POST["workerID"]))
            {
                $sql1 = "select sum(Quantity) as t_alloc from workallocation where OrderID=".$_POST['orderID'];
                $res1 = mysqli_query($db, $sql1);
                $row1 = mysqli_fetch_array($res1);
                $sql2 = "select quantity from allorder where orderID=".$_POST['orderID'];
                $res2 = mysqli_query($db, $sql2);
                $row2 = mysqli_fetch_array($res2);
                if($row1['t_alloc']+$_POST['qty']<=$row2['quantity'])
                {
                    $sql = "select max(AllocID) as aid_max from workallocation";
                    $res = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($res);
                    $id = $row['aid_max']+1;
                    $sql = "insert into workallocation(AllocID,WorkerID,OrderID,Quantity,CompleteBy) values(".$id.",".$_POST['workerID'].",".$_POST['orderID'].",".$_POST['qty'].",'".$_POST['dt']."')";   
                    $result = mysqli_query($db, $sql);

                    if (!$result) 
                    {
                        printf("Error: %s\n", mysqli_error($db));
                        exit();
                    }
                    else{
                        echo "Alotted";
                    }
                }
                else {
                    echo "Alloted work exceeds the total order quantity of ".$row2['quantity']." units";
                }
            }
        ?>
        <div class="row" style="width:95%; padding:20px">
            <div class="col-md-4">
                <form method="POST">
                    <div class="container">
                    <br><h2>Allot work</h2><br>
                        
                        <label id="val" >WorkerID:</label><br>
                        <input id="val" name="workerID" style="border-radius:3px;border:1px solid black;" required><br>

                        <label id="val" >OrderID:</label><br>
                        <input id="val" name="orderID"  style="border-radius:3px;border:1px solid black;" required><br>

                        <label id="val" >Quantity:</label><br>
                        <input id="val" name="qty"  style="border-radius:3px;border:1px solid black;" required><br>

                        <label id="val" >Complete By:</label><br>
                        <input id="val" name="dt" type="date" style="border-radius:3px;border:1px solid black;" required><br>

                        <button type="submit" class="btn btn-danger" style="margin-top:10px;">Allot</button>
                    </div>
                <form>
            </div>
            <div class="col-md-8">
                <br><h2>Alloted work</h2><br>
                <div class="row" id="heading">
                    <div class="col-md-2" id="val" >Id</div>
                    <div class="col-md-2" id="val" >Name</div>
                    <div class="col-md-2" id="val" >OrderID</div>
                    <div class="col-md-3" id="val" >Work Alloted</div>
                    <div class="col-md-2" id="val" >CompleteBy</div>
                </div>
                <?php
                    $sql = "select WorkerID, OrderID, Quantity, CompleteBy, name from workallocation w, account a where w.WorkerID = a.userid";
                    $resources = mysqli_query($db, $sql);
                    foreach($resources as $resource)
                        {
                ?>

                <div class="row" id="item">
                    <div class="col-md-2" id="val" ><?php echo $resource['WorkerID']; ?></div>
                    <div class="col-md-2" id="val" ><?php echo $resource['name']; ?></div>
                    <div class="col-md-2" id="val" ><?php echo $resource['OrderID']; ?></div>
                    <div class="col-md-3" id="val" ><?php echo $resource['Quantity']; ?></div>
                    <div class="col-md-2" id="val" ><?php echo $resource['CompleteBy']; ?></div>

                </div>

                <?php
                    }
                ?>
            </div>
        </div>

    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";
    }
    ?>
</html>