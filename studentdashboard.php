<?php
include("connection.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:studentsignin.php");
}

$sid=$_SESSION['sid'];
$a=mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['fname'];
$mname=$b['mname'];
$lname=$b['lname'];
$pic=$b['pic'];
$dob=$b['dob'];
 $ph=$b['phone'];
  $email=$b['email'];
  $sem=$b['sem'];
  $branch=$b['department'];
  $sid=$b['sid'];

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<style>
		#wrapper1
{
	
width:60%;
border-radius:20px;

background-color:rgba(0, 0, 0, 0.7);
}
		.p_pic img{
			float:right;
			padding-right:7%;
			padding-top:7%;
			
		}
		.table{
			border-collapse: collapse;
			box-shadow: 0 12px 10px rgb(183, 218, 218);
		}
		th,td{
	padding:12px 15px;
}
th {
	background :#07084dc4;
	
}

tr:nth-child(odd){
	background-color:rgb(43, 144, 148);
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
	<div class="banner" align="center" >
	<br/><br/><br/><br/>

<div id="wrapper1" >
<div class="p_pic">
<img src="<?php  echo $pic ?>" alt="Logo" class="image" width="200" height="200">
</div>	
<p align="center" class="labels">
<br>
		   <br>
 Name :<?php echo $name; echo " "; echo $lname; ?>
           
		   <br>
		   <br>
				Email ID : <?php echo $email; ?>
				<br>
				<br>
			Date of Birth :<?php echo $dob ?>
			<br>
			<br>
			 Phone number :<?php echo $ph; ?>
			 <br>
			 <br>
				 Semester   :<?php echo $sem; ?>
					  
						
					   <br>
					   <br>
				Department :<?php echo $branch; ?>
						 
							
						 <br>
 <br>
 <table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Book Name</th><th>Author</th>
<th>ISSUE Date</th><th>DUE Date</th></tr>
<?php
$x=mysqli_query($conn,"SELECT * FROM issue where sid='$sid'");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td>
<td><?php echo $y['date'];?></td><td><?php echo $y['due']; ?></td>
 
</tr>

<?php

$_SESSION['na']=$y['name'];
$_SESSION['au']=$y['author'];
$_SESSION['dep']=$y['dep'];
$_SESSION['sem']=$y['sem'];
}
?>
</table>
 <br>
 
</p>

<br />
<br />



<br />
<br />


</div>
</div>

	
</body>
</html>