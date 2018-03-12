<!DOCTYPE html>
<html >
<head>
  <link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body background="bg.png">
<center><img src = "the-emblem-of-india.png" height="150" width="150"></a></center><br>     
<center><b><font color = "#330033" size="8">ONLINE VOTING SYSTEM</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
 <h1 style="text-align:center"></h1>
<h1><b><font color = "#	000033" size="5">Invalid Username or Password Provided</b></h1></font>

 <p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
$host="localhost"; // Host name
$username="root"; // Database username
$password="shubham9768"; // Database password
$db_name="polling"; // Database name
$tbl_name="tbAdministrators"; // Table name

// This will connect you to your database
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Defining your login details into variables
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());

// Checking table row
$count=mysql_num_rows($result);
// If username and password is a match, the count will be 1

if($count==1){
// If everything checks out, you will now be forwarded to admin.php
$user = mysql_fetch_assoc($result);
 $_SESSION['admin_id'] = $user['admin_id'];
header("location:admin.php");
}
//If the username or password is wrong, you will receive this message below.
else {
echo "<center>Wrong Username or Password<br><br>Return to <a href=\"login.html\">Login</a>";
}

ob_end_flush();

?> 
</div>
<br><br><br><br><br><br><br>
<div id="footer"> 
  <div class="bottom_addr">&copy; 2016 online Voting System. All Rights Reserved</div>
</div>
</div>
</body>
</html>