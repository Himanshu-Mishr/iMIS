<?php
include("err.php");
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header("location:index.php");
}
include("err.php");
ob_start();
session_start();
$table_name=$_GET['table'];
$key=$_GET['key'];
$pkey_name=$_GET['pkey_name'];
$file=$_GET['file'];

require "connection.php";
$str="delete from $table_name where $pkey_name='".$key."'";
mysqli_query($con, $str);
header("location:$file");
?>
