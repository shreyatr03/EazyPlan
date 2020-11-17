<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Request";                       // This is the title of a page
        include("../php/headLinks.php");
        include("../connection/config.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='manager'))
        { 
            if(isset($_POST["id"]))
            {
                $sql = "select max(ReqId) as rid_max from resourcerq";
                $res = mysqli_query($db, $sql);
                $row1 = mysqli_fetch_array($res);
                $id = $row1['rid_max']+1;
                $sql = "insert into resourcerq(workerID,resourceID,rqQTY,dateRq,alot,ReqId) values(".$_SESSION['userId'].",".$_POST['id'].",".$_POST['qty'].",'".date("d-m-y")."',0,".$id.")"; 
                $result = mysqli_query($db, $sql);   
                echo $sql;

                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
                else{
                    echo "Requested";
                }
            }
    ?>

    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <form method="POST">
        <div class="container">
        <br><h2>Request Resources</h2><br>
            
            <label id="val" >ResourceID:</label><br>
            <input id="val" name="id" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Quantity:</label><br>
            <input id="val" name="qty"  style="border-radius:3px;border:1px solid black;" required><br>
            
            <button type="submit" class="btn btn-danger" style="margin-top:10px;">Request</button>
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