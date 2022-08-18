<?php
include("connection.php");
error_reporting(0);
session_start();
$aid=$_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Requests</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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


<span class="SubHead">Books Request From Students</span>
<br />
<br />
<?php
if(isset($_SESSION['msg4'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg4'] ?></strong> 
</div>
<?php
unset($_SESSION['msg4']);
}
?>

<table border="0" class="table" cellpadding="10" cellspacing="10">

<tr class="msg" align="center" colspan="2"><?php echo $session['msg'];?></tr> 
<tr class="labels" style="text-decoration:underline;"><th>Book Name</th><th>Author</th><th>Requested by</th><th>(Student ID) </th><th> </th></tr>
<?php
$x=mysqli_query($conn,"SELECT * FROM `request-i`");
while($y=mysqli_fetch_array($x))
{
?>
<tr class="labels"  style="font-size:14px;"><td align="center"><?php echo $y['book name'];?></td><td align="center"><?php echo $y['author'];?></td> 
<td align="center"><?php echo $y['sname'];?></td><td align="center"><?php echo $y['sid'];?></td><td><a href="issue1.php?i=<?php echo $y['id'];?>" class="link">ISSUE</a></td></tr>

<?php
session_start();
$_SESSION['na']=$y['book name'];
$_SESSION['au']=$y['author'];
$_SESSION['sid1']=$y['sid'];
$_SESSION['dep']=$y['dep'];
$_SESSION['sem']=$y['sem'];

}
?>
</table><br />
<br /></div>
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


