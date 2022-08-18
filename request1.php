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

$fname=$b['fname'];
$a=$_GET['ri'];
$sql = "SELECT * from books  where id='$a'";
	  $result= mysqli_query($conn,$sql);
	  $b=mysqli_fetch_array($result);
	  
	$na=$b['name'];
	$au=$b['author'];
	$dep=$b['department'];
	$sem=$b['sem'];

	$m=mysqli_query($conn,"SELECT * FROM issue where sid='$sid'");
	$total=mysqli_num_rows($m);
$x=mysqli_query($conn,"SELECT * FROM books where name='$na' && author='$au' ");
while($y=mysqli_fetch_array($x)){
$q=$y['quantity'];
if($q>0 && $total<3){
mysqli_query($conn,"INSERT INTO `request-i` ( `book name`, `author`, `sname`, `sid`,`dep`,`sem`) VALUES ( '$na', '$au','$fname','$sid','$dep','$sem') ");
$_SESSION['msg3']="SUCCESFULLY REQUESTED";
}
else{
	$_SESSION['msg4']="sorry! Your request can't be processed";
}
}
header('location: cmsa.php');

echo $sid;
echo $fname;
?>