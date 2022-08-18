<?php
  include("connection.php");
  error_reporting(0);
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
  if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['password']==NULL || $_POST['sans']==NULL)
  {
     //
  }
  else
  {
     $sql=mysqli_query($conn,"INSERT INTO students(sid,fname,mname,lname,phone,department,sem,password,email,dob,sques,sans) VALUES('$sid','$name','$mname','$lname','$ph','$branch','$sem','$pas','$email','$dob','$sques','$sans')");
     if($sql)
     {
        $msg="Successfully Registered";
     }
     else
     {
        $msg="User Already Exists";
     }
  }
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charconn=utf-8" />
<title>Student Register</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
   .login-form1 {
	width: 1100px;
	padding: 10% 0 0;
	margin: auto;
}

.form1{
	position: relative;
	z-index: 1;
	background: rgba(219, 213, 129, 0.993);
	max-width: 1000px;
	margin: 0 auto 100px;
	padding: 45px;
	text-align: center;
}
.form1 input{
	font-family: "Roboto",sans-serif;
	outline: 1;
	background: rgba(255, 255, 0, alpha);
	width: 100%;
	border: 0;
	margin: 0 0 15px;
	padding: 15px;
	box-sizing: border-box;
	font-size: 14px;
}

</style>


</head>

<body>

<ul>
        <li class="active"><a href="index.php">HOME</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
    </ul>
     <div class="login-form1">
     <div class="form1">
       
   
      <form class="login" method="post" action="">
      <table border="0" cellpadding="4" cellspacing="4" class="login">
                
                <tr><td colspan="2" align="center" ></td></tr>
               <tr><td >First Name : </td><td><input type="text" name="name"  placeholder="Enter First name" required autocomplete="off"></td>
           <td >Middle Name : </td><td><input type="text" name="mname"  placeholder="Enter Middle  name" required autocomplete="off"></td>
          <td >Last Name : </td><td><input type="text" name="lname"  placeholder="Enter Last name" required autocomplete="off"></td></tr>
                <tr><td >Email ID : </td><td><input type="email" name="email" placeholder="Enter Email ID" required> autocomplete="off"</td>
           <td >Date of Birth : </td><td><input type="date" name="B_date"  placeholder="Enter Date of Birth" required autocomplete="off"></td>
             <td >Phone number:</td><td><input type="tel" name="phone" placeholder="Enter Phone No." required autocomplete="off"></td></tr>
                 <tr><td >Semester : 
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

                <td >Department: </td>
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
                     <td >Student ID : </td><td><input type="text" name="sid" placeholder="Enter Student ID" required autocomplete="off"></td></tr>
                     <tr><td >Password : </td><td><input type="password" name="password" placeholder="Enter Password" required autocomplete="off"></td>


                     <td >Confirm Password : </td><td><input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off" required></td></tr>
					 
					 <td>Security Question: </td>
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
					 
                     <td>Security Answer: </td><td><input type="text" name="sans" placeholder="Security Answer" autocomplete="off" required></td></tr>
                     
                    <tr><td></td><td></td><td colspan="2" align="center" value="Register" class="msg"><a href ="studentsignin.php"><input type="submit" value="REGISTER" id="button" name="submit"></a></td></tr>
                    
               <tr><td></td></tr>
                 </form>
             </table>
        
         <p class="message">Already Registered ? <a href="studentsignin.php">Sign IN</a></p>

           </div>
       </div>
    </body>
 </html>

 