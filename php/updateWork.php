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
            if($row['Quantity']>=$row1['productQTY'] + $qty) {
                $sql2 ="update workerworkupdate set productQTY = productQTY + $qty where AllocID = $allocid";
                $result2 = mysqli_query($db, $sql2);
                echo "Work Updated";
            }
            else
            echo "Couldn't Update";
        }
    else{
    echo "<h3 style='color:red'>Login to access the page...</h3>";
    echo "<a href='./login.php'>Click here to login</a>";}
    ?>