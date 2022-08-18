<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "elibrary";

$conn = mysqli_connect($server,$username,$password,$database);
if ($conn){
 //echo "success";
//else{
    //die("Error".mysqli_connect_error());
}
else{
    echo "connection failed".mysqli_connect_error();
}
?>