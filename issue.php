<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['signin']) || $_SESSION['signin']!=true)
{
    header("location: adminsignin.php");
    exit ;
}
$user=$_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$user'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($conn,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Book Already Exists";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issued Books </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<style>
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

.link
{
font-family:"Trebuchet MS";
color:rgb(0, 0, 0);
font-size:14px;

border-radius:5px;
padding:4px 6px;
border:1px solid rgb(51, 255, 255);
background-color:rgb(183, 218, 218);
}

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
  font-size: 22px;
  line-height: 20px;
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


<span class="SubHead">Books Issued to Students</span>
<br />
<br />
<?php
if(isset($_SESSION['msg2'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg2'] ?></strong> 
</div>
<?php
unset($_SESSION['msg2']);
}
?>
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Book Name</th><th>Author</th><th>Issued By<br>Student ID</th>
<th>ISSUE Date</th><th>DUE Date</th><th>Fine</th><th>Return</th></tr>
<?php

$x=mysqli_query($conn,"SELECT * FROM issue");
while($y=mysqli_fetch_array($x))
{
	$due=$y['due'];
	$d=time();

	$date2=strtotime($due);
	$diff=round(($d-$date2)/86400);
	if($diff<7)
	{
		$fine=0;
	}
	else{
		$fine=round(($diff/7)*20);
	}
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td>

<td><?php echo $y['sid'];?></td><td><?php echo $y['date'];?></td><td><?php echo $y['due']; ?></td><td><?php  echo $fine;?></td>
 <td><a href="return.php?r=<?php echo $y['id'];?>" class="link">Return</a></td>
</tr>

<?php
session_start();
$_SESSION['na']=$y['name'];
$_SESSION['au']=$y['author'];
$_SESSION['dep']=$y['dep'];
$_SESSION['sem']=$y['sem'];
}
?>
</table><br />
<br /></div>
</div>
</div>

</body>
</html>