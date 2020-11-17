<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $title = "Add Resource";                       // This is the title of a page
        include("../php/headLinks.php");
        include("../connection/config.php");
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='manager'))
        { 
            if(isset($_POST["name"]))
            {
                $sql = "select max(id) as rid_max from resource";
                $res = mysqli_query($db, $sql);
                $row1 = mysqli_fetch_array($res);
                $id = $row1['rid_max']+1;
                $sql = "insert into resource(id,name,quantity,unit,cost) values(".$id.",'".$_POST['name']."',".$_POST['quantity'].",'".$_POST['unit']."',".$_POST['cost'].")"; 
                echo $sql;
                $result = mysqli_query($db, $sql);   
                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
                else{
                    echo "Resource Added";
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
            
            <label id="val" >Name</label><br>
            <input id="val" name="name" style="border-radius:3px;border:1px solid black;" required><br>
     
            <label id="val" >Quantity</label><br>
            <input id="val" name="quantity" style="border-radius:3px;border:1px solid black;" required><br>
     
            <label id="val" >Unit</label><br>
            <input id="val" name="unit" style="border-radius:3px;border:1px solid black;" required><br>

            <label id="val" >Cost</label><br>
            <input id="val" name="cost" type="number"  style="border-radius:3px;border:1px solid black;" required><br>
            
            <button type="submit" class="btn btn-danger" style="margin-top:10px;">Add Resource</button>
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