<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EazyPlan</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!---below links for table-->
<!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
html{height:100%;}
body{ background-image: url("assets/images/bg.png");background-position: center;background-repeat: no-repeat;background-size: cover;}
.main{ width: 300px;height: 210px;position:relative;top:150px;left:200px;text-align: center;font-family: Quicksand,sans-serif;
box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);font-size: 19px;  }
.sidenav {
  height: 100%;width: 0;position: fixed;z-index: 1;top: 0;left: 0;background-color: #111;overflow-x: hidden;
  transition: 0.5s;padding-top: 60px;}
.sidenav a {
  padding: 8px 8px 8px 32px;text-decoration: none;font-size: 20px;color: #818181;display: block;transition: 0.3s;
  font-family: 'Quicksand', sans-serif;
}
.sidenav a:hover {  color: #f1f1f1; }
.sidenav .closebtn { position: absolute;top: 0;right: 25px;font-size: 36px;margin-left: 50px; }
@media screen and (max-height: 450px) { .sidenav {padding-top: 15px;}.sidenav a {font-size: 18px;} }
.new{ width:300px;height:300px;position:relative;top:-125px;left:780px;border:none;}
</style>
</head>
<body>
<!--this is the start of side nav bar-->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="">Home</a>
  <a href="">My Profile</a>
  <a href="">Statistics</a>
  <a href="">Leaderboard</a>
  <a href=""><i class="fa fa-power-off fa-fw"></i>Logout</a>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<!--this is the end of side nav bar-->
<!--this is the start of top nav bar-->
<nav class="navbar navbar-expand-sm bg-light navbar-light" style="font-family: 'Quicksand', sans-serif;">
<span style="font-size:22px;cursor:pointer" onclick="openNav()">&#9776;</span>
<a class="navbar-brand" href="#" style="font-size: 24px;color:#e67e22">&nbsp;EazyPlan</a>
<ul class="navbar-nav mr-auto"></ul>
<span style="font-size:20px;">Welcome <b>User</b>!</span>
</nav>
<!--this is the end of top nav bar-->
<!---Put main page content here--->
<div class="container">
<table id="myTable" class="table table-hover table-striped" >  
        <thead>  
          <tr>  
            <th>ENO</th>  
            <th>EMPName</th>  
            <th>Country</th>  
            <th>Salary</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>001</td>  
            <td>Anusha</td>  
            <td>India</td>  
            <td>10000</td>  
          </tr>  
          <tr>  
            <td>002</td>  
            <td>Charles</td>  
            <td>United Kingdom</td>  
            <td>28000</td>  
          </tr>  
          <tr>  
            <td>003</td>  
            <td>Sravani</td>  
            <td>Australia</td>  
            <td>7000</td>  
          </tr>  
		   <tr>  
            <td>004</td>  
            <td>Amar</td>  
            <td>India</td>  
            <td>18000</td>  
          </tr>  
          <tr>  
            <td>005</td>  
            <td>Lakshmi</td>  
            <td>India</td>  
            <td>12000</td>  
          </tr>  
          <tr>  
            <td>006</td>  
            <td>James</td>  
            <td>Canada</td>  
            <td>50000</td>  
          </tr>  
		  
		   <tr>  
            <td>007</td>  
            <td>Ronald</td>  
            <td>US</td>  
            <td>75000</td>  
          </tr>  
          <tr>  
            <td>008</td>  
            <td>Mike</td>  
            <td>Belgium</td>  
            <td>100000</td>  
          </tr>  
          <tr>  
            <td>009</td>  
            <td>Andrew</td>  
            <td>Argentina</td>  
            <td>45000</td>  
          </tr>  
		  
		    <tr>  
            <td>010</td>  
            <td>Stephen</td>  
            <td>Austria</td>  
            <td>30000</td>  
          </tr>  
          <tr>  
            <td>011</td>  
            <td>Sara</td>  
            <td>China</td>  
            <td>750000</td>  
          </tr>  
          <tr>  
            <td>012</td>  
            <td>JonRoot</td>  
            <td>Argentina</td>  
            <td>65000</td>  
          </tr>  
        </tbody>  
      </table>  
	  </div>
</body>
<script>
$(document).ready(function(){
    $('#myTable').dataTable({
        pageLength : 5,
        lengthMenu: [[5,6,7],[5,6,7]]
    });
});
</script>
</html>