<?php
include("connection.php");

error_reporting(0);
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}

$aid=$_SESSION['user'];
$a=mysqli_query($conn,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['author'];
$de=$_POST['department'];
$sem=$_POST['sem'];
$q=$_POST['quan'];
$file=$_FILES['photo'];

//print_r($file);
$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

 if($fileerror == 0 && $bn!=null){
	 $destfile = 'upload/'.$filename;
	 //echo "$destfile";
	 move_uploaded_file($filepath,$destfile);
	 $sql=mysqli_query($conn,"INSERT INTO books(name,author,department,sem,quantity,image) VALUES('$bn','$au','$de','$sem','$q','$destfile')");
        if($sql ){
			$_SESSION['msg9']="Successfully Added";
		}
		
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Books</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
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
	<div class="banner"><br /><br /><br /><br /><div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead" style="text-decoration:underline;">ADD BOOKS IN LIBRARY</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php
if(isset($_SESSION['msg9'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg9'] ?></strong> 
</div>
<?php
unset($_SESSION['msg9']);
}
?></td></tr> 
<tr><td class="labels" >BOOK NAME : </td></tr><tr><td><input type="text" align="center" size="50" class="fields" required="required" name="name" autocomplete="off" placeholder="Enter Book Name" /></td></tr>
<tr><td class="labels" >AUTHOR NAME : </td></tr><tr><td><input type="text" size="50" class="fields" required="required" name="author" autocomplete="off" placeholder="Enter Author Name" /></td></tr>
<tr> <td class="labels" >DEPARTMENT: 
                        
                           <select name="department" required>
                           <option value="" disabled="disabled" selected="selected">- - Select Department - -</option>
                           <option value="Computer Science">Computer Science</option>
                             <option value="Physics">Physics</option>
                             <option value="Chemistry">Chemistry</option>
                            <option value="Maths">Maths</option>
                            <option value="Economics">Economics</option>
                        </select>
                     </td></tr>
					 <tr><td class="labels">SEMESTER : 
                     
                        <select name="sem" required>
                        <option value="" disabled="disabled" selected="selected">- - Select Sem - -</option>
                        <option value="1">First Sem</option>
                        <option value="2">Second Sem</option>
                        <option value="3">Third Sem</option>
                         <option value="4">Fourth Sem</option>
                         <option value="5">Fifth Sem</option>
                         <option value="6">Sixth Sem</option>
                      </select>
                   </td>
				   <tr><td class="labels" >QUANTITY : </td></tr><tr><td><input type="text" size="50" class="fields" required="required" name="quan" autocomplete="off" placeholder="Enter The Quantity Of Book" /></td></tr>
                   <div class="form-group">
				   <tr><td class="labels" >UPLOAD : </td></tr><tr><td><input type="FILE" align="center" size="50" class="fields" required="required" name="photo" placeholder="Enter Book Name" /></td></tr>
                   </div>
				   <tr><td colspan="2" align="center"><input type="submit" name="submit" value="ADD BOOK" class="fields" /></td></tr>
              </table>
             </form>
                <br />
              <br /></div>
<script>
	   var loader = document.getElementById("preloader");

	   window.addEventListener("load",function(){
       loader.style.display = "none";
	   })
   </script>


</body>
</html>


