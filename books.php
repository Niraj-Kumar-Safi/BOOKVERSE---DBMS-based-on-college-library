<?php
include("connection.php");
error_reporting(0);
$branch=$_POST['department'];
  $sem=$_POST['sem'];
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

if($branch!=null && $sem!=null){
    $_SESSION['dep'] = $branch ;
    $_SESSION['sem']=$sem;
    header('location: booklist.php');
   }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dep & Sem</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
    <style>

		th,td{
			
	padding:12px 15px;
}
th {
	background :#07084dc4;
	
}

.sub1{
	font-family:"Trebuchet MS";
	background: #6e1d6e;
	color: #FFFFFF;
	font-size: 20px;
}

.link
{
font-family:"Trebuchet MS";
color:rgb(0, 0, 0);
font-size:20px;

border-radius:5px;
padding:6px 10px;
border:1px solid rgb(51, 255, 255);
background-color:rgb(183, 218, 218);
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
        <br/><br/><br/><br/><br/><div align="center">
        <div id="wrapper">
</br>		 <form  method="post" action="">
            <table border="0" class="table" cellpadding="10" cellspacing="10">
                <br/>
             
            
                <tr><td class="labels">SELECT DEPARTMENT: 
                       
                           <select name="department" required>
                           <option value="" disabled="disabled" selected="selected">- - Select Department - -</option>
                           <option value="Computer Science">Computer Science</option>
                             <option value="Physics">Physics</option>
                             <option value="Chemistry">Chemistry</option>
                            <option value="Maths">Maths</option>
                            <option value="Economics">Economics</option>
                        </select>
                     </td></tr>
					 <tr> <td class="labels" >SEMESTER :  
                     
					 <select name="sem" required>
					 <option value="" disabled="disabled" selected="selected">- - Select Sem - -</option>
					 <option value="1">First Sem</option>
					 <option value="2">Second Sem</option>
					 <option value="3">Third Sem</option>
					  <option value="4">Fourth Sem</option>
					  <option value="5">Fifth Sem</option>
					  <option value="6">Sixth Sem</option>
				   </select>
				   </td></tr>
				   <tr><td colspan="2" align="center"><input type="submit" value="SUBMIT" class="fields" /></td></tr>
				   </form>
                 </table>
				
				

    </div>
    </div>
</div>
    </body>
</html>