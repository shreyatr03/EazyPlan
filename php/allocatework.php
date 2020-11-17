<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Allocate";                       // This is the title of a page
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
                $sql = "select max(AllocID) as aid_max from workallocation";
                $res = mysqli_query($db, $sql);
                $row1 = mysqli_fetch_array($res);
                $id = $row1['aid_max']+1;
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
        ?>
        <form method="POST">
        <div class="container">
        <br><h2>Allocate work</h2><br>
            
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

    </body>

    <?php
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";
    }
    ?>
</html>