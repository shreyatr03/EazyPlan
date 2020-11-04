<nav class="navbar navbar-expand-lg navbar-light navcolor" style="z-index: 1;">
    <span class="sideNavButton" onclick="openNav()">&#9776;</span>&nbsp;&nbsp;
    <a class=" brand" href="#">EazyPlan</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">

        <li class="nav-item ">
            <a class="nav-link" href="./homepagestaff.php">Home</a>
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

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
    <a href="resource.php">All Resources</a>
    <a href="viewallocatedresource.php">Allocated Resources</a>
    <a href="#">Resource Requests</a>
    <a href="#">Work Update</a>
    <a href="#">Pending Orders</a>
</div>