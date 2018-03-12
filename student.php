<?php
mysql_connect('mysql1.000webhost.com', 'a9498314_root', 'shubham9768') or die(mysql_error());
mysql_select_db('a9498314_polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
         <style>
 
html{    background:url(light-blue-wallpaper.jpg) no-repeat fixed;
  background-size: cover;
  height:100%;
}
 </style>

<center><img src = "the-emblem-of-india.png" height="150" width="150"></a></center><br>     
<center><b><font color = "blue" size="8">ONLINE VOTING SYSTEM</font></b></center><br><br>

<div id="page">
<div id="header">
<h1 style="text-align:center"></h1>

<h1> <font color = "maroon" size="5">HOME </h1></font>
<center><a href="student.php"><font size=3>Home</font></a> | <a href="vote.php"><font size=3>Current Polls</a> | <a href="manage-profile.php"><font size=3>Manage My Profile</a> | <a href="logout.php"><font size=3>Logout</a>
</div>
<div id="container">
<p><font size=5> Click a link above to do some stuff.</p>
</div><br><br><br><br>
 </div>
 <div id="footer"> 
  <div class="bottom_addr">&copy; 2016 Online voting system.@ All Rights Reserved</div>
</div>
</div>
</body></html>