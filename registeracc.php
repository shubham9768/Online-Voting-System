<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
			         <style>
 
html{    background:url(light-blue-wallpaper.jpg) no-repeat fixed;
  background-size: cover;
  height:100%;
}
 </style>
<center><img src = "the-emblem-of-india.png" height="150" width="150"></a></center><br>     
<center><b><font color = "blue" size="8">ONLINE VOTING SYSTEM</font></b></center>

<div id="page">
<div id="header">

<h1 style="text-align:center"></h1>

<h1> <font color = "maroon" size="5">Registration </h1></font>
<div class="news"><marquee><font size="3">New polls are up and running. But they will not be up forever! Just Login and then go to Current Polls to vote for your favourate candidates. </marquee></div>
</div>
<div id="container">
<?php

mysql_connect('localhost', 'root', 'shubham9768') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

//Process
if (isset($_POST['submit']))
{
$myVotingId = addslashes( $_POST['votingid'] ); 
$myAdharNo = addslashes( $_POST['adharno'] ); 
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myMobileNo = addslashes( $_POST['mobileno'] );  
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysql_query( "INSERT INTO tbMembers(voting_id, adhar_no, first_name, last_name, mobile_no, email, password) VALUES ('$myVotingId', '$myAdharNo.','$myFirstName','$myLastName','$myMobileNo', '$myEmail', '$newpass')" )
        or die( mysql_error() );

die( "You have registered for an account.<br><br>Go to <a href=\"login.html\">Login</a>" );
}

echo "<center><h3>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center" border="2"><tr><td>';
echo "<tr><td>Voting Id:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='votingid' maxlength='12'  value=''></td></tr>";
echo "<tr><td>Adhar No:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='adharno' maxlength='12' value=''></td></tr>";
echo "<tr><td>First Name:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td>Mobile No:</td><td><input type='text' style='background-color:#9999998; font-weight:bold;' name='mobileno' maxlength='10' value=''></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='background-color:#9999899; font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' style='background-color:#9999998s; font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
 echo "</tr></td></table>";
echo "<tr><td>&nbsp;</td><td><br><center><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p><br>Already have an account? <a href='login.html'><b><font size=3>Login Here</b></a></td></tr>";

echo "</form>";
?>
</div> 
 </div>
 <div id="footer"> 
  <div class="bottom_addr">&copy; 2016 Online voting system.@ All Rights Reserved</div>
</div>
 
</body></html>