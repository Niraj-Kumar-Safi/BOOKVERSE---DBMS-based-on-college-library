<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$aid=$_SESSION['user'];

$a=$_GET['a'];
$na=$_SESSION['na'];
$au=$_SESSION['au'];


mysqli_query($conn,"DELETE FROM request WHERE id='$a'");
header("location:bookrequests.php");

?>