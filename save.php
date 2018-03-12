<?php
$vote = $_REQUEST['vote'];
$con = mysql_connect("localhost","root","shubham9768");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
mysql_select_db("polling", $con);

mysql_query("UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");

$value=1;
mysql_query( "UPDATE tbMembers SET is_voted='$value' WHERE member_id = '$_SESSION[member_id]'" )
        or die( mysql_error() );
mysql_close($con);
?> 