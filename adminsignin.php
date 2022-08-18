<?php 
include("connection.php");

    if(isset($_POST['submit']))
    {
      $user=$_POST['user'];
      $password=$_POST['password'];

      $query="SELECT * FROM ADMIN WHERE aid = '$user' && password ='$password' ";
      $data= mysqli_query($conn,$query);

      $total=mysqli_num_rows($data);

      //echo $total;

      if($total == 1)
      {
        session_start();
        $_SESSION['signin'] = true ;
        $_SESSION['user']=$user;
        //echo "Login Ok";
        header('location: admindashboard.php');
      }
      else
      {
        $_SESSION['msg12']="Incorrect Details";
      }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin SignIN</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<style>
		.alert {
  padding: 10px;
  
  background-color: #aa0404;
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
<a href="#" class="logo"><font class="logo1" color='white'>book</font><font color='purple'>verse</font></a>
    <ul>
        <li class="active"><a href="index.php">HOME</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
    </ul>
    <img src="moon.png"   id="icon">
  </header>
     <div class="login-form">
     <div class="form">

     <span class="heading">Admin SignIn</span>
     <br />
     <br />
     <?php
if(isset($_SESSION['msg12'])){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>&nbsp;<?php echo $_SESSION['msg12'] ?></strong> 
</div>
<?php
unset($_SESSION['msg12']);
}
?>
        <form class="login" method="POST" action="">
            
       <input  type="text" name="user" placeholder=" Admin ID" autocomplete="off">
            
            <input type="password" name="password" placeholder="Password" autocomplete="off">
            
            <input class=sub type="submit" name="submit" value="Sign IN">
        </form>
     </div>
    </div>
    <script >

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
    