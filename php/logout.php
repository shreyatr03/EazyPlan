<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
session_destroy();
?>
<h2 style="color:red;"><i>logged out successfully</i></h2>
<a href="./login.php">Click here to login</a>
</body>
</html>  