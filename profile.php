<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:studentsignin.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);

$name=$b['fname'];
$bn=$_POST['name'];
$ba=$_POST['author'];
if($bn!=NULL && $ba!=NULL)
{
	$sql=mysqli_query($conn,"INSERT INTO request(name,author,sname,sid) VALUES('$bn','$ba','$name','$sid')");
	if($sql)
	{
		$msg="Successfully Requested";
	}
	else
	{
		$msg="Request Already Exists";
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
</head>

<body>
<input type="checkbox" id="check">
	<header>
	<div class="right_area">
		<a href="logout.php" class="logout_btn">Logout</a>
	</div>
		<label for="check">
			<i class="fas fa-bars" id="side-nav_btn"></i>
		</label>
		<div class="left_side">
			<h3><font color='white'>book</font><font color='purple'>verse</font></h3>
		</div>
	</header>
	
	<div class="side-nav">
		<div class="logo1">
			<img src="abc.png" alt="Logo" class="image"><br/><br/><span class="SubHead">Welcome <?php echo strtoupper($name);?></span>
		</div>
		<br/><br/><a href="profile.php" ><i class="fa fa-desktop"><span>My Account</span></i></a>
		<br/><a href="dep.php"><i class="fa fa-book"><span>Request Book</span></i></a>
		<br/><a href="request.php"><i class="fa fa-book"><span>Recommend Book</span></i></a>
		<br/><a href="changePassword.php"><i class="fa fa-key"><span>Change Password</span></i></a>
	
	</div>
	


<div class="banner">
	<br/><br/><br/><br/>
<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">REQUEST FOR UNAVAILABLE BOOKS</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels" >BOOK NAME : </td></tr><tr><td><input type="text" align="center" size="50" class="fields" required="required" autocomplete="off" name="name" placeholder="Enter Book Name" /></td></tr>
<tr><td class="labels" >AUTHOR NAME : </td></tr><tr><td><input type="text" size="50" class="fields" required="required" autocomplete="off" name="author" placeholder="Enter Author Name" /></td></tr>
<tr><td colspan="2" align="center"><br/><input type="submit" class="fields" value="REQUEST" /></td></tr>
</table>
</form>

<br />
<br />


</div>
</div>
</div>

</body>
</html>
