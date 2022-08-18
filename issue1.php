<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$aid=$_SESSION['user'];
$sid=$_SESSION['sid1'];
$a=$_GET['i'];
$na=$_SESSION['na'];
$au=$_SESSION['au'];
$date=date("Y-m-d");
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
$duedate=date("Y-m-d",strtotime( "+ 7 days"));
mysqli_query($conn,"INSERT INTO `issue` ( `sid`,`name`, `author`,`date`,`due`,`dep`,`sem`) VALUES ( '$sid','$na', '$au','$date','$duedate','$dep','$sem') ");
$_SESSION['msg4']="SUCCESFULLY ISSUED";
mysqli_query($conn,"DELETE FROM `request-i` WHERE id='$a'");
mysqli_query($conn,"UPDATE `books`  SET `quantity`= `quantity`-'1' WHERE `name`='$na' && `author`='$au'");
header("location:bookrequests1.php");

?>