<?php
include("connection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['signin']) || $_SESSION['signin']!=true)
{
    header("location: adminsignin.php");
    exit ;
}
$n= $_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$n'");
$b=mysqli_fetch_array($a);
$m=$_SESSION['sid'];
$c=mysqli_query($conn,"SELECT * FROM students WHERE sid='$m'");
$d=mysqli_fetch_array($c);
$name=$b['name'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	

	<style>
		.flip{
			padding-top:15%;
			padding-left:5%;
		}
.flip-card {
	
  background-color: transparent;
  width: 300px;
  height: 250px;

  
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
  
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
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
		<table class="flip">
			<td>
	<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="students.webp" alt="Avatar" style="width:300px; height:250px;">
    </div>
	<?php $sql1= "SELECT * from students";
	  if($result= mysqli_query($conn,$sql1)){
		$rowcount = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from students  where department='Computer Science'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount4 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from students  where department='Physics'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount5 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from students  where department='Chemistry'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount6 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from students  where department='Maths'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount7 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from students  where department='Economics'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount8 = mysqli_num_rows($result);
	  }
	  ?>
    <div class="flip-card-back">
      <h1>Total students : <?php echo $rowcount ?></h1>
	</br>
      <p>Computer Science : <?php echo $rowcount4 ?> </p>
	  <p>Physics : <?php echo $rowcount5 ?> </p>
	  <p>Chemistry : <?php echo $rowcount6 ?> </p>
	  <p>Mathematics : <?php echo $rowcount7 ?> </p>
	  <p>Economics : <?php echo $rowcount8 ?> </p>
	  
      
    </div>
  </div>
</td>
<td>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
  <div class="flip-card">
  <div class="flip-card-inner">
	
    <div class="flip-card-front">
      <img src="books.jpg" alt="Avatar" style="width:300px; height:250px;">
    </div>
	<?php $sql2= "SELECT * from books";
	  if($result= mysqli_query($conn,$sql2)){
		$rowcount = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from books  where department='Computer Science'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount4 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from books where department='Physics'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount5 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from books where department='Chemistry'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount6 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from books where department='Maths'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount7 = mysqli_num_rows($result);
	  }
	  $sql= "SELECT * from books where department='Economics'";
	  if($result= mysqli_query($conn,$sql)){
		$rowcount8 = mysqli_num_rows($result);
	  }
	  ?>
	  
    <div class="flip-card-back">
      <h1>Total available books :<?php  echo $rowcount?></h1>
	</br>
      <p>Computer Science : <?php echo $rowcount4 ?> </p>
	  <p>Physics : <?php echo $rowcount5 ?> </p>
	  <p>Chemistry : <?php echo $rowcount6 ?> </p>
	  <p>Mathematics : <?php echo $rowcount7 ?> </p>
	  <p>Economics : <?php echo $rowcount8 ?> </p>
    </div>
  </div>
</td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
  <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="ret.jpg" alt="Avatar" style="width:300px; height:250px;">
    </div>
	<?php $sql2= "SELECT * from issue ";
	  if($result= mysqli_query($conn,$sql2)){
		$rowcount = mysqli_num_rows($result);
	  }
	  ?>
    <div class="flip-card-back">
      <h1><br><br>Total no. of books not returned: <?php  echo $rowcount?></h1>
	  
	   
    </div>
  </div>
</td>
  </table>
</div> 
	
	<script>
	   var loader = document.getElementById("preloader");

	   window.addEventListener("load",function(){
       loader.style.display = "none";
	   })
   </script>


</body>
</html>