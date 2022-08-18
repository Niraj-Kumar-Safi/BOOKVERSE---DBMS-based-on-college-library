<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['fname'];
$pic=$b['pic'];
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
	$_SESSION['msg6']="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$_SESSION['msg6']="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($conn,"UPDATE students SET password='$p2' WHERE sid='$sid'");
		$_SESSION['msg7']="Successfully Changed your Password";
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHANGE PASSWORD</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<style>
		.alert {
  padding: 10px;
  
  background-color: #04AA6D;;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert1 {
  padding: 10px;
  
  background-color: #aa0404;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 17px;
  line-height: 15px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
	
</style>
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
		<img src="<?php  echo $pic ?>" alt="Logo" class="image" width="5px"><br/><br/><span class="SubHead">Welcome <br><?php echo strtoupper($name);?></span>
		</div>
		<br/><br/><a href="studentdashboard.php" ><i class="fa fa-desktop"><span>My Profile</span></i></a>
		<br/><a href="dep.php"><i class="fa fa-book"><span>Request Book</span></i></a>
		<br/><a href="request.php"><i class="fa fa-book"><span>Recommend Book</span></i></a>
		<br/><a href="changePassword.php"><i class="fa fa-key"><span>Change Password</span></i></a>
	</div>
	


<div class="banner">
<br /><br /><br /><br />
<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">CHANGE PASSWORD</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="table" align="center">
<tr><td colspan="2" class="msg" align="center"><?php
if($old!=$pass || $p1!=$p2)
{
if(isset($_SESSION['msg6'])){?>

<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>&nbsp;<?php echo $_SESSION['msg6'] ?> </strong> 
</div>
<?php
unset($_SESSION['msg6']);
}
}
if($old==$pass && $p1==$p2)
{
	if(isset($_SESSION['msg7'])){?>

		<div class="alert">
		  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
		  <strong>&nbsp;<?php echo $_SESSION['msg7'] ?> </strong> 
		</div>
		<?php
		unset($_SESSION['msg7']);
		}
}
?></td></tr>
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


<script>
	   var loader = document.getElementById("preloader");

	   window.addEventListener("load",function(){
       loader.style.display = "none";
	   })
   </script>


</body>


</html>