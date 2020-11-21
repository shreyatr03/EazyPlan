<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Profile";                       // This is the title of a page
        include("../php/headLinks.php");
        include("../connection/config.php");
        if(isset($_SESSION["name"]))
        { 
    ?>

    <body>
        <?php
            include("../php/navbar.php");
            $uid = $_SESSION['userId'];
            if(isset($_POST["name"]) && ( $_POST["name"] != $_SESSION["name"]))
            {
                $name = $_POST["name"];
                if(!ctype_space($name))
                {
                    $sql1 = "update account SET name='$name' where userid = $uid";
                    $res1 = mysqli_query($db, $sql1);
                    if($res1)
                    {
                        echo "Name Updated";
                        $_SESSION["name"] = $name;
                        //header("Refresh:0");
                    }
                }
                else
                    echo "Invalid Name";

            }
            if(isset($_POST["npwd"]) && isset($_POST["cpwd"]) && !ctype_space($_POST["npwd"]) && ($_POST["npwd"]!=""))
            {
                if($_POST["npwd"] == $_POST["cpwd"]) 
                {
                    $pwd = $_POST["npwd"];
                    $sql2 = "update account set password = '$pwd' where userid = $uid";
                    $res2 = mysqli_query($db, $sql2);
                    if($res2)
                    {
                        echo "\nPassword Updated";
                    }
                }
                else
                    echo "Password Doesn't Match";

            }
            $sql = "select * from account where userid = $uid";
            $res = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($res);
        ?>
        <form method="POST">
        <div class="container">
        <br><h2>Your Profile</h2><br>
            
            <label id="val" >Your ID:<b> <?php echo $row['userid']; ?> </b> </label><br><br>
            <label id="val" >Email: <b> <?php echo $row['email']; ?> </b> </label><br><br>
            <label id="val" >Role: <b> <?php echo $row['role']; ?> </b> </label><br><br>
            <label id="val" >Name: </label><br>
            <input id="val" name="name"  style="border-radius:3px;border:1px solid black;" value="<?php echo $row['name']; ?>"><br><br>

            <label id="val" >New Password:</label><br>
            <input id="val" name="npwd" type="password" style="border-radius:3px;border:1px solid black;"><br><br>

            <label id="val" >Confirm Password:</label><br>
            <input id="val" name="cpwd" type="password" style="border-radius:3px;border:1px solid black;"><br><br>

            <button type="submit" class="btn btn-danger" style="margin-top:10px;">Update</button>
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