<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$user=$_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$user'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$msg="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$msg="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($conn,"UPDATE admin SET password='$p2' WHERE aid='$user'");
		$msg="Successfully Changed your Password";
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Admin Password</title>
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
			<img src="bookverse.jpg" alt="Logo" class="image"><br/><br/><span class="SubHead">Welcome <?php echo strtoupper($name);?></span>
		</div>
		<br/><br/><a href="admindashboard.php" ><i class="fa fa-dashboard"><span>Dashboard</span></i></a>
		<br/><a href="addbooks.php"><i class="fa fa-book"><span>Add Books</span></i></a>
		<br/><a href="books.php"><i class="fa fa-book"><span>Books</span></i></a>
	
		<br/><a href="bookrequests1.php"><i class="fa fa-book"><span>Books Requests</span></i></a>
        <br/><a href="issue.php"><i class="fa fa-book"><span>Book Issue</span></i></a>
		<br/><a href="bookrequests.php"><i class="fa fa-book"><span>Recommendation</span></i></a>
		<br/><a href="changePasswordAdmin.php"><i class="fa fa-key"><span>Change Password</span></i></a>
	</div>
	<div class="banner">

    <br /><br /><br /><br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Change Password</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="table" align="center">
<tr><td colspan="2" class="msg" align="center"><?php echo $msg;?></td></tr>
<tr><td class="labels">Old Password :</td></tr><tr><td><input type="password" name="old" size="50" class="fields" placeholder="Enter Old Password" autocomplete="off" required="required" /></td></tr>
<tr><td class="labels">New Password :</td></tr><tr><td><input type="password" name="p1" size="50" class="fields" placeholder="Enter New Password" autocomplete="off" required="required"  /></td></tr>
<tr><td class="labels">Re-Type Password :</td></tr><tr><td><input type="password" name="p2" size="50"  class="fields" placeholder="Re-Type New Password" autocomplete="off" required="required" /></td></tr>
<tr><td colspan="2" align="center"><br/><input type="submit" value="Change Password" class="fields" /></td></tr>
</table>
</form>
<br />
<br />

<br />
<br />

</div>
</div>
</div>

<script>
	   var loader = document.getElementById("preloader");

	   window.addEventListener("load",function(){
       loader.style.display = "none";
	   })
   </script>


</body>
</html>