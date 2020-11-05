<nav class="navbar navbar-expand-lg navbar-light navcolor" style="z-index: 1;">
    <span class="sideNavButton" onclick="openNav()">&#9776;</span>&nbsp;&nbsp;
    <?php
        if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
    ?>
    <a class=" brand" href="./homepagestaff.php">EazyPlan</a>
    <?php
        }
        else if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){
    ?>
    <a class=" brand" href="./homepageworker.php">EazyPlan</a>
    <?php
        }
    ?>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">

        <li class="nav-item ">
            <?php
                if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')){
            ?>
            <a class="nav-link" href="./homepagestaff.php">Home</a>
            <?php
                }
                else if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')){
            ?>
            <a class="nav-link" href="./homepageworker.php">Home</a>
            <?php
                }
            ?>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-user-cog" aria-hidden="true"></span>&nbsp;&nbsp; <?php echo "Welcome ".$_SESSION["name"]; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Your Profile</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./logout.php">
                <span class="fas fa-power-off" aria-hidden="true"></span>&nbsp;Logout
            </a>
        </li>

        </ul>
    </div>
</nav>
<?php
 if(isset($_SESSION["name"]) && ($_SESSION["role"]=='staff')) {
    ?>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
    <a href="resource.php">All Resources</a>
    <a href="viewallocatedresource.php">Allocated Resources</a>
    <a href="resourceRequest.php">Resource Requests</a>
    <a href="workupdate.php">Work Update</a>
    <a href="pendingorder.php">Pending Orders</a>
</div>
<?php
 }
 else if(isset($_SESSION["name"]) && ($_SESSION["role"]=='worker')) {
?>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
    <a href="#">Your Resources</a>
    <a href="#">Request Resource</a>
    <a href="#">All Requests</a>
    <a href="#">Update Work Progress</a>
    <a href="#">Pending Work</a>
</div>

<?php
 }
?>