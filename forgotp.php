<?php
include("connection.php");
error_reporting(0);
session_start();

$sid=mysqli_real_escape_string($conn,$_POST['sid']);
$_SESSION['sid1']=$sid;
if($sid==NULL)
{
	//
}
else
{
	$sql=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
	if(mysqli_num_rows($sql)==1)
	{
        
        $dname=mysqli_fetch_array($sql);
		
		header("location:securityquestion.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}
?>


<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Forgot Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<header>
            
            <a href="#" class="logo"><font color='white'>book</font><font color='purple'>verse</font></a>
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
       
        
     <span class="heading">Forgot Password</span>  
     <br />
     <br />
<form class="login" method="POST" action="" >

            <input type="text" name="sid" placeholder="Student ID" autocomplete="off">
           
            <input class=sub type="submit" name="submit" value="Submit">
            <br></br>
			<p class="message">Already Registered ? <a href="studentsignin.php">Sign IN</a></P>
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