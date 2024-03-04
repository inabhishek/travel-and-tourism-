<?php
session_start();
if (isset($_SESSION['chkvalid'])==true)  {
	if($_SESSION['chkvalid']==0 || $_SESSION['username']!="Admin")
		die("Invalid User!");
}
else
	die("Invalid User!");

include("data.php");
$cdate=date("d-m-Y");

if(isset($_POST['set']))
{
$uname=$_POST['uname'];
$upass=$_POST['upass'];
mysql_query("insert into user set username='$uname',password='$upass';");
}
?>
<html>
<table>
<tr>
<td>userid</td>
<td>user name</td>
</tr>
<?php
$result=mysql_query("select * from user;");
if ($result) {
	
	$rows=mysql_num_rows($result);
	$i=0;
	for($i=0;$i<$rows;$i++)
	{
		$uname=mysql_result($result,$i,"UserName");
		$uid=mysql_result($result,$i,"Userid");
		echo"<tr><td>$uid</td><td>$uname</td></tr>";
	}
}
?>
</table>

<form method="post" name="forms">
User Name<input type="text" id="uname" name="uname">
New Password<input type="password" id="upass" name="upass">
<input type="submit" value="set" name="set" id="set">
</form>
<script type="text/javascript">
document.getElementById("cdate").valueAsDate=new Date();

</script>
</html>
