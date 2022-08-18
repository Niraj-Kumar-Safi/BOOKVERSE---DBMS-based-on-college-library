<?php
  include("connection.php");
  error_reporting(0);
  if(isset($_POST['submit']))
  {
   
  $name=$_POST['name'];
 $mname=$_POST['mname'];
 $lname=$_POST['lname'];
 $dob=$_POST['B_date'];
 $ph=$_POST['phone'];
  $email=$_POST['email'];
  $sem=$_POST['sem'];
  $branch=$_POST['department'];
  $sid=$_POST['sid'];
  $pas=sha1($_POST['password']);
  $sques=$_POST['sques'];
   $sans=$_POST['sans'];
  $file=$_FILES['photo'];
 

 
//print_r($file);
$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

  if($fileerror == 0 ){
   $destfile = 'upload/'.$filename;
   session_start();
   $_SESSION['pic']=$destfile;
   //echo "$destfile";
   move_uploaded_file($filepath,$destfile);
 
   $sql=mysqli_query($conn,"INSERT INTO students(sid,fname,mname,lname,phone,department,sem,password,email,dob,pic,sques,sans) VALUES('$sid','$name','$mname','$lname','$ph','$branch','$sem','$pas','$email','$dob','$destfile','$sques','$sans')");
   
   if($sql)
   {
      $_SESSION['msg5']="Successfully Registered";
   }
   else
   {
      $_SESSION['msg5']="User Already Exists";
   }
}
}
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charconn=utf-8" />
<title>Student Register</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">

<style>

:root{
    
    --white:#000000;
	--orange:rgb(206, 137, 35);
}

.dark-theme{
   
    --white:#ffffff;
	--orange:rgb(27, 27, 27);
}
   .login-form1 {
      padding-top: 8%;
      padding-left:10%;
     max-width: 2100px;
     width: calc(180% / 2 - 20px);
	  
     border-radius: 5px;
     
}

.form1{
   display:flex;
   flex-wrap: wrap;
	background: var(--orange);
   color:var(--white);
   justify-content: space-between;
   padding: 10px;
  
}
.form1 input{
  
 
	font-family: "Roboto",sans-serif;
	outline: 1;
	background: rgba(255, 255, 0, alpha);
	width: 100%;
	border: 0;
	margin: 0 0 15px;
	padding: 15px;
	border-radius: 0%;
	font-size: 14px;
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
            
<a href="#" class="logo"><font color='black'>book</font><font color='purple'>verse</font></a>
           
<ul>
        <li class="active"><a href="index.php">HOME</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
    </ul>
    <img src="moon.png"   id="icon">

        </header>
        
     <div class="login-form1">
     <div class="form1">
     
     <span class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRATION FORM</span>
     <?php
if(isset($_SESSION['msg5'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['msg5'] ?></strong> 
</div>
<?php
unset($_SESSION['msg5']);
}v
?>

    
     <form class="login" method="post" action="" enctype="multipart/form-data">
      <table border="0" cellpadding="4" cellspacing="4" class="login">
                
                <tr><td colspan="2" align="center" ></td></tr>
               <tr><td >First Name <font color='red'>*</font>: </td><td><input type="text" name="name"  placeholder="Enter First name*" autocomplete="off" required></td>
           <td >Middle Name : </td><td><input type="text" name="mname"  placeholder="Enter Middle  name"></td>
          <td >Last Name <font color='red'>*</font>: </td><td><input type="text" name="lname"  placeholder="Enter Last name*" autocomplete="off" required></td></tr>
                <tr><td >Email ID <font color='red'>*</font>: </td><td><input type="email" name="email" placeholder="Enter Email ID*" autocomplete="off" required></td>
           <td >Date of Birth <font color='red'>*</font>: </td><td><input type="date" name="B_date"  placeholder="Enter Date of Birth*" autocomplete="off" required></td>
             <td >Phone number <font color='red'>*</font>:</td><td><input type="tel" maxlength="10" name="phone" placeholder="Enter Phone No." autocomplete="off" required></td></tr>
                 <tr><td >Semester  <font color='red'>*</font> :
                     <td>
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

                <td >Department<font color='red'>*</font> :</td>
                        <td>
                           <select name="department" required>
                           <option value="" disabled="disabled" selected="selected">- - Select Department - -</option>
                           <option value="Computer Science">Computer Science</option>
                             <option value="Physics">Physics</option>
                             <option value="Chemistry">Chemistry</option>
                            <option value="Maths">Maths</option>
                            <option value="Economics">Economics</option>
                        </select>
                     </td>
                     <td >Student ID  <font color='red'>*</font>:</td><td><input type="text" name="sid" placeholder="Enter Student ID" autocomplete="off" required></td></tr>
                     <tr><td >Password <font color='red'>*</font> :</td><td><input type="password" name="password" placeholder="Enter Password" autocomplete="off" required></td>


                     <td >Confirm Password <font color='red'>*</font> :</td><td><input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off" required></td></tr>
                     <div class="form-group">
                     <td>Security Question <font color='red'>*</font>: </td>
					 <td>
                           <select name="sques" required>
                           <option value="" disabled="disabled" selected="selected">- - Select Security Question - -</option>
                           <option value="Yours 1st school's name">Yours 1st school's name</option>
                             <option value="Your Address">Your Address</option>
                             <option value="Your Hobby">Your Hobby</option>
                            <option value="Dream Career">Dream Career</option>
                            <option value="Your 1st pet name">Your 1st pet name</option>
                        </select>
                     </td>
					 
                     <td>Security Answer <font color='red'>*</font>: </td><td><input type="text" name="sans" placeholder="Security Answer" autocomplete="off" required></td></tr>
				   <tr><td  >Upload <font color='red'>*</font>: </td><td><input type="FILE" align="center" size="50" class="fields" required="required" name="photo" placeholder="Enter Book Name" /></td><td></td><td align="center"><input class=sub type="submit" name="submit" value="REGISTER"></tr>
                   </div>
                     
            
                    
               
                 </form>
             </table>
        
         <p class="message" align="center"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already Registered ? </b><a href="studentsignin.php"><b>Sign IN</b></a></p>
         <p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color='red'>*</font> is mandatary </p>

           </div>
       </div>
       <script>
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

 