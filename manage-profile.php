<?php
// connection details
$link = mysql_connect('localhost', 'root', 'shubham9768') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysql_query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
$row = mysql_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id'];
   $vid = $row['voting_id'];
  $uid = $row['adhar_no'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
  $mobileno = $row['mobile_no'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myVotingId= addslashes( $_POST['votingid'] ); //prevents types of SQL injection
$myAdharNo = addslashes( $_POST['adharno'] ); //prevents types of SQL injection
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myMobileNo = addslashes( $_POST['mobileno'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysql_query( "UPDATE tbMembers SET voting_id='$myVotingId',adhar_no='$myAdharNo',first_name='$myFirstName', last_name='$myLastName',mobile_no='$myMobileNo', email='$myEmail', password='$newpass' WHERE member_id = '$myId'" )
        or die( mysql_error() );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>
<!DOCTYPE html >
<html >
<head>
 <title>Profile Management</title>
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

  <h1><font color = "maroon" size="5">MANAGE MY PROFILE</h1></font>
 <center> <a href="student.php"><font size=3>Home</a> | <a href="vote.php"><font size=3>Current Polls</a> | <a href="manage-profile.php"><font size=3>Manage My Profile</a> | <a href="logout.php"><font size=3>Logout</a>
</div>
<div id="container">
<table>
<tr>
<td>
<table width="380"   align="center">
<CAPTION><h3>MY PROFILE</h3></CAPTION>
<tr>
    <td>Member Id:</td>
    <td><?php echo $stdId; ?></td>
</tr>
<tr>
    <td>Voting Id:</td>
    <td><?php echo $vid; ?></td>
</tr>
<tr>
    <td>Adhar No:</td>
    <td><?php echo $uid; ?></td>
</tr>
<tr>
    <td>First Name:</td>
    <td><?php echo $firstName; ?></td>
</tr>
<tr>
    <td>Last Name:</td>
    <td><?php echo $lastName; ?></td>
</tr>
<tr>
    <td>Mobile No:</td>
    <td><?php echo $mobileno; ?></td>
</tr>
<tr>
    <td>Email:</td>
    <td><?php echo $email; ?></td>
</tr>
<tr>
    <td>Password:</td>
    <td>Encrypted</td>
</tr>
</table>
</td>
<td>
<table   width="620" height="1" align="center">
<CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>Voting ID:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="votingid" maxlength="12" value=""></td></tr>
<tr><td>Adhar No:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="adharno" maxlength="12" value=""></td></tr>
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Mobile No:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="mobileno" maxlength="10" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>
</table>
</form>
</td>
</tr>
</table>
<hr>
</div>
 </div>
 <div id="footer"> 
  <div class="bottom_addr">&copy; 2016 Online voting system.@ All Rights Reserved</div>
</div>
</div>
</body></html>