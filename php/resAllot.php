<?php
    session_start();
    include("../connection/config.php");
    $reqid = $_POST["reqid"];
    $resid = $_POST["resid"];
    $reqQty = $_POST["reqQty"];
    $wid = $_POST["wid"];
    $sql = "select quantity from resource where id = $resid";
    $results = mysqli_query($db, $sql);
    foreach($results as $result)
        {
            $resQty = $result['quantity'];
            if($resQty>$reqQty)
            {
                $uid = $_SESSION['userId'];
                $bal = $resQty - $reqQty;
                $sql1 = "update resource set quantity = $bal where id = $resid";
                $result1 = mysqli_query($db, $sql1);
                $sql2 = "update resourcerq set alot = 1 where ReqId = $reqid";
                $result2 = mysqli_query($db, $sql2);
                $sql3 = "INSERT INTO allocatedresources(`workerID`, `resourceID`, `quantity`, `StaffID`) VALUES ($wid,$resid,$reqQty,$uid)";
                $result2 = mysqli_query($db, $sql3);
                echo "yes";
            }
            else
            echo "no";
        }
?>