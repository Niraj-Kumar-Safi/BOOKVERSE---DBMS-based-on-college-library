<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['sid1']))
{
	header("location:studentsignin.php");
}
$sid=$_SESSION['sid1'];
	$sql=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid' ");
	
        
        $dname=mysqli_fetch_array($sql);
		$sques=$dname['sques'];
	

    $ans=mysqli_real_escape_string($conn,$_POST['ans']);
    $ans1=$dname['sans'];
    if($ans==$ans1)
    {
        header("location:schangepassword.php");
    }
?>



<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Security Question</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
       
        
     
     
<form class="login" method="POST" action="" >
    <table>
    <span class="heading"><b>Security Question</b></span>
<tr><td > <b><?php echo strtoupper($sques); echo "?";?></b></td> </tr>
<tr></tr><tr></tr>
<tr><td > <b>ANSWER<font color='red'>&nbsp;*</font>: </b> </td> </tr>
<tr><td > <input type="text" name="ans" autocomplete="off" size= 60 placeholder="<?php echo strtoupper($sques); echo "?";?>">  </td> </tr>
           
           
            <br></br>
</table>
<input class=sub type="submit" name="submit" value="Submit">
			<p class="message">Already Registered ? <a href="studentsignin.php">Sign IN</a></P>
        </form>
     </div>
    </div>
  
    </body>
    </html>