<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$aid=$_SESSION['user'];

$r=$_GET['r'];


$na=$_SESSION['na'];
$au=$_SESSION['au'];
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
$q=$_SESSION['q'];
$q1=$q+1;



mysqli_query($conn,"DELETE FROM issue WHERE id='$r'");

$_SESSION['msg2']="SUCCESFULLY RETURNED";


mysqli_query($conn,"UPDATE `books` SET `quantity` = '$q1' WHERE department='$dep' && sem='$sem' ");
header("location:issue.php");
?>