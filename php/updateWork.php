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

    <form action="" method="POST">
    <label for="allocid">AllocId<span style="color:rgb(255, 118, 113);">*</span></label>
        <input name="allocid" type="email" type="text" placeholder="eg: abc@mail.com" onchange="check()">
        <br>

        <label for="quantity">Password<span style="color:rgb(255, 118, 113);">*</span></label>
        <input name="password" type="password" placeholder="Enter password" value="hellohello123">
        <br><br>

        <button class="btn btn-info" value="Submit" type="submit"> Login </button>

    </form>