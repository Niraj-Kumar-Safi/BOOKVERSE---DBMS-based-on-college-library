<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['sid1']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid1'];
$a=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{

if($p1!=$p2)
	{
		$_SESSION['msg1']="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($conn,"UPDATE students SET password='$p2' WHERE sid='$sid'");
		$_SESSION['msg1']="Successfully Changed your Password";
	}

}

?>

<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
		.alert {
  padding: 10px;
  
  background-color: #04AA6D;;
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

<header>
            
            <a href="#" class="logo"><font class="logo1" color='black'>book</font><font color='purple'>verse</font>
            </a>
             
            <ul class="header1">
			<li class="active"><a href="index.php">HOME</a></li>
			<li><a href="index.php#arrivals">NEW ARRIVAL</a></li>
			<li><a href="index.php#admin">ADMIN</a></li>
			<li><a href="index.php#sec">ABOUT</a></li>
		</ul>
        <img src="moon.png"   id="icon">
        
        </header>
     <div class="login-form">
     <div class="form">
	 <span class="heading">Change Password</span>
<br />
<br />
<form method="post" action="">
<table>
<tr><td colspan="2" class="msg" align="center"><?php
if(isset($_SESSION['msg1'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg1'] ?></strong> 
</div>
<?php
unset($_SESSION['msg1']);
}v
?></td></tr>
<tr><td ></td></tr><tr><td><input type="password" name="p1" size="50"  placeholder="Enter New Password" autocomplete="off" required="required"  /></td></tr>
<tr><td class="login"></td></tr><tr><td><input type="password" name="p2" size="50"   placeholder="Re-Type New Password" autocomplete="off" required="required" /></td></tr>
<tr><td colspan="2" align="center"><br/><input type="submit" value="Change Password" class="sub" ></td></tr>

</table>
<p class="message">Already Registered ? <a href="studentsignin.php">Sign IN</a></P>
</form>

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