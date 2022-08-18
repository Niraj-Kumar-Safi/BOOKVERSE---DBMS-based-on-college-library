<?php
include("connection.php");
error_reporting(0);
session_start();
if(isset($_SESSION['sid']))
{
	header("location:studentdashboard.php");
}
$sid=mysqli_real_escape_string($conn,$_POST['sid']);
$pass=mysqli_real_escape_string($conn,$_POST['password']);

if($sid==NULL || $_POST['password']==NULL)
{
	//
}
else
{
	$p=sha1($pass);
	$sql=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
        
        $dname=mysqli_fetch_array($sql);
		$_SESSION['sid']=$_POST['sid'];
        $_SESSION['sname']=$dname['name'];
		header("location:studentdashboard.php");
	}
	else
	{
		$_SESSION['msg2']="Incorrect Details";
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student SignIN</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
		.alert {
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

<header>
            
<a href="#" class="logo"><font class="logo1" color='black'>book</font><font color='purple'>verse</font></a>
           
            <ul>
			<li class="active"><a href="index.php">HOME</a></li>
			<li><a href="index.php#arrivals">NEW ARRIVAL</a></li>
			<li><a href="index.php#admin">ADMIN</a></li>
			<li><a href="index.php#sec">ABOUT</a></li>
		</ul>
        <img src="moon.png"   id="icon">

        </header>
     <div class="login-form">
     <div class="form">
       
        
     <span class="heading">Student SignIn</span>  
     <br />
     <br />
     <?php
if(isset($_SESSION['msg2'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>&nbsp;<?php echo $_SESSION['msg2'] ?></strong> 
</div>
<?php
unset($_SESSION['msg2']);
}v
?>
     
     
<form class="login" method="POST" action="" >
               
            <input type="text" name="sid" placeholder="Student ID" autocomplete="off">
           
            <input type="password" name="password" placeholder="Password" autocomplete="off">
            <input class=sub type="submit" name="submit" value="Sign IN">
            <br></br>
			<p class="message"> Forgot Password?? <a href="forgotp.php"> Click Here</a></p>
            <p class="message"> Not Registered? <a href="studentregister.php"> Register</a></p>
			
        </form>
     </div>
    </div>
    
    <script >
var icon=  document.getElementById('icon');
icon.onclick =function(){
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")){
        icon.src= "sun.png";
    }
    else{
        icon.src= "moon.png";
    }
}
</script>
    </body>
    </html>