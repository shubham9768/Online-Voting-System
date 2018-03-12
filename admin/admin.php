<?php
mysql_connect('localhost', 'root', 'shubham9768') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head><body background="bg.png">
<center><img src = "the-emblem-of-india.png" height="150" width="150"></a></center><br>     
<center><b><font color = "#330033" size="8">ONLINE VOTING SYSTEM</font></b></center><br><br>

<div id="page">
<div id="header">

<h1 style="text-align:center"></h1>
<h1> <font color = "#000033" size="5">ADMINISTRATION CONTROL PANEL </h1></font>

<center><b><a href="admin.php"><font size=4>Home</a> | <a href="manage-admins.php"><font size=4>Manage Administrators</a> | <a href="positions.php"><font size=4>Manage Positions</a> | <a href="candidates.php"><font size=4>Manage Candidates</a> |<a href="refresh.php"><font size=4>Poll Results</a> | <a href="logout.php"><font size=4>Logout</a></div><b>
<p align="center">&nbsp;</p>
<div id="container">

<p><font size=5>Click a link above to perform an administrative operation.</p>


</div>
<br><br><br>
<div id="footer">
<div class="bottom_addr">&copy; 2016 Online voting system.@ All Rights Reserved</div>
</div>
</div>
</body></html>