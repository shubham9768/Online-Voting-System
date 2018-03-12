<?php
$con = mysql_connect("localhost","root","shubham9768");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("polling", $con);
?>
<?php
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   
/*
$resulta = mysql_query("SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysql_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
  $position = addslashes( $_POST['position'] );
  
    $results = mysql_query("SELECT * FROM tbCandidates where candidate_position='$position'");

    $row1 = mysql_fetch_array($results); // for the first candidate
    $row2 = mysql_fetch_array($results); // for the second candidate
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // first candidate name
      $candidate_1=$row1['candidate_cvotes']; // first candidate votes
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // second candidate name
      $candidate_2=$row2['candidate_cvotes']; // second candidate votes
      }
}
    else
        // do nothing
?> 
<?php
// retrieving positions sql query
$positions=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body background="bg.png">
<center> <img src = "the-emblem-of-india.png" height="150" width="150"></a></center><br>     
<center><b><font color = "#330033" size="8">ONLINE VOTING SYSTEM</font></b></center><br><br>


 <h1 style="text-align:center"></h1>
  <center><h1> <font color = "#000033" size="5">POLL RESULTS </h1></font>
<a href="admin.php"><font size=4>Home</a> | <a href="manage-admins.php"><font size=4>Manage Administrators</a> | <a href="positions.php"><font size=4>Manage Positions</a> | <a href="candidates.php"><font size=4>Manage Candidates</a> | <a href="refresh.php"><font size=4>Poll Results</a> | <a href="logout.php"><font size=4>Logout</a>
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onsubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysql_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
</div><br><br><br>
<div id="footer">
<div class="bottom_addr">&copy; 2016 Online voting system.@ All Rights Reserved</div>
</div>
</div>
</body></html>