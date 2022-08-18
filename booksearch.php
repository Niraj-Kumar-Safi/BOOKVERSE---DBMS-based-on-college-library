<?php
include("connection.php");
error_reporting(0);
session_start();
$aid=$_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];

$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];

$bn=mysqli_real_escape_string($conn,$_POST['b']);
$an=mysqli_real_escape_string($conn,$_POST['a']);
$bname=$_SESSION['bn'];
$aname=$_SESSION['an'];

if($bn!=NULL || $an!=NULL)
{
	header('location: booksearch.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Search</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>

#wrapper1
{
	
width:80%;
border-radius:20px;

background-color:rgba(0, 0, 0, 0.7);
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

.link
{
font-family:"Trebuchet MS";
color:rgb(0, 0, 0);
font-size:14px;

border-radius:5px;
padding:4px 6px;
border:2px solid rgb(0, 0, 0);
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
<div id="wrapper1">
<br />
<br />


<span class="SubHead"><?php echo $dep; ?></span>
<br />
<br />
<?php
if(isset($_SESSION['msg3'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg3'] ?></strong> 
</div>
<?php
unset($_SESSION['msg2']);
}
?>
<p class="msg" align="center" colspan="2"><?php session_start(); echo $_SESSION['msg'];?></p> 
<p>&nbsp;</p>
 
<form class="login" method="POST" action="" >

<input type="text" name="b" placeholder="BOOK NAME" autocomplete="off">

<input type="text" name="a" placeholder="AUTHOR NAME">
<input class=sub type="submit" name="submit" value="SEARCH" autocomplete="off">
<br></br>

</form>


<table border="0" class="table" cellpadding="10" cellspacing="10">

<tr class="msg" align="center" colspan="2"><?php echo $session['msg'];?></tr> 
<tr class="labels" style="text-decoration:underline;"><th>IMAGE</th><th>Book Name</th><th>Author</th><th>QUANTITY</th><th>ISSUED</th><th></th></tr>
<?php
$x=mysqli_query($conn,"SELECT * FROM books where name like '%$bname%' && author like '%$aname%' && department='$dep' && sem='$sem'");
while($y=mysqli_fetch_array($x))
{
	$book=$y['name'];
	$author=$y['author'];
	
	  $query1="SELECT * FROM `issue` WHERE name='$book' && author='$author'";
      $data1 = mysqli_query($conn,$query1);

      $total1=mysqli_num_rows($data1);
?>
<tr class="labels"  style="font-size:14px;"><td ><img src="<?php echo $y['image']?> " width="100" height="100" > </td><td align="center"><?php echo $y['name'];?></td><td align="center"><?php echo $y['author'];?></td> 
<td align="center"><?php echo $y['quantity'];?></td><td align="center"><?php echo $total1;?></td><td><a href="bookupdate.php?ri=<?php echo $y['id'];?>" class="link">UPDATE</a></td></tr>

<?php
session_start();
$_SESSION['na']=$y['name'];
$_SESSION['au']=$y['author'];
$_SESSION['dep']=$y['department'];
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