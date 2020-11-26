<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Order";                       // This is the title of a page
        include("../php/headLinks.php");
        include("../connection/config.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='manager'))
        { 
            
    ?>

    <body>
        <?php
            include("../php/navbar.php");
            if(isset($_POST["name"]))
            {
                $sql = "select max(orderID) as oid_max from allorder";
                $res = mysqli_query($db, $sql);
                $row1 = mysqli_fetch_array($res);
                $id = $row1['oid_max']+1;
                $sql = "insert into allorder(orderID,name,Description,quantity,orderDate,completionDate,status,totalEstimatedAmt,advanceAmt,amtLeft) values(".$id.",'".$_POST['name']."','".$_POST['desc']."',".$_POST['qty'].",'".$_POST['odt']."','".$_POST['cdt']."','".$_POST['status']."',".$_POST['tamt'].",".$_POST['aamt'].",".$_POST['lamt'].")";   
                $result = mysqli_query($db, $sql);

                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
                else{
                    echo "New Contract Initiated";
                }

                $sql = "insert into pendingorder(orderID,CompletedProdQty,LastUpdated) values(".$id.",0,'".$_POST['odt']."')";
                $result = mysqli_query($db, $sql);   

                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
            }
        ?>
        <form method="POST">
        <div class="container">
        <br><h2>Create Contract Details</h2><br>
            
            <label id="val" >Name:</label><br>
            <input id="val" name="name" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Description:</label><br>
            <input id="val" name="desc"  style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Quantity:</label><br>
            <input id="val" name="qty"  style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Order Date:</label><br>
            <input id="val" name="odt" type="date" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Delivery Date:</label><br>
            <input id="val" name="cdt" type="date" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Status:</label><br>
            <input id="val" name="status" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Total Estimated Amount:</label><br>
            <input id="val" name="tamt" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Advance Amount:</label><br>
            <input id="val" name="aamt" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Amount left to be paid:</label><br>
            <input id="val" name="lamt" style="border-radius:3px;border:1px solid black;" required><br>

            <button type="submit" class="btn btn-danger" style="margin-top:10px;">Create</button>
        </div>
        <form>

    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";
    }
    ?>
</html>