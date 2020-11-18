    <?php
        session_start();
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){
            include("../connection/config.php");
            $allocid = $_POST["allocid"];
            $qty = $_POST["quantity"];
            $workerid = $_SESSION['userId'];
            $sql = "select * from workallocation where AllocId = $allocid";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $sql1 = "select * from workerworkupdate where AllocID = $allocid";
            $result1 = mysqli_query($db, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            if(mysqli_num_rows($result1)==0){ 
                if($row['Quantity']>=$qty) {
                    $ordid = $row['OrderID'];
                    $sql5 = "insert into `workerworkupdate`(`workerID`, `orderID`, `productQTY`, `updateTime`, `AllocID`) VALUES ($workerid, $ordid, $qty, now(), $allocid)";
                    $result5 = mysqli_query($db, $sql5);
                    $sql6 ="update pendingorder set CompletedProdQTY = CompletedProdQTY + $qty, lastUpdated = now() where orderID = $ordid";
                    $result6 = mysqli_query($db, $sql6);
                    echo "Work Updated";
                }
            }
            
            else if($row['Quantity']>=$row1['productQTY'] + $qty) {
                $ordID = $row1['orderID'];
                $sql3 = "select po.orderID, CompletedProdQTY, quantity from pendingorder po join allorder ao on ao.orderId = po.orderID where po.orderID = $ordID";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                if($row3['CompletedProdQTY']+$qty<=$row3['quantity']) {
                    $sql2 ="update workerworkupdate set productQTY = productQTY + $qty, updateTime = now() where AllocID = $allocid";
                    $result2 = mysqli_query($db, $sql2);
                    $sql4 ="update pendingorder set CompletedProdQTY = CompletedProdQTY + $qty, lastUpdated = now() where orderID = $ordID";
                    $result4 = mysqli_query($db, $sql4);
                    echo "Work Updated";
                }
                
            }
            else
            echo "Couldn't Update";
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>
<?php
    // <!-- <form action="" method="POST">
    // <label for="allocid">AllocId<span style="color:rgb(255, 118, 113);">*</span></label>
    //     <input name="allocid" type="email" type="text" placeholder="eg: abc@mail.com" onchange="check()">
    //     <br>

    //     <label for="quantity">Password<span style="color:rgb(255, 118, 113);">*</span></label>
    //     <input name="password" type="password" placeholder="Enter password" value="hellohello123">
    //     <br><br>

    //     <button class="btn btn-info" value="Submit" type="submit"> Login </button>

    // </form> -->
    ?>