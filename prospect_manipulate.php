<?php
$student_id=$_GET['student_id'];
$job_id=$_GET['job_id'];
$status=$_GET['status'];

require "connection.php";
if($status=='delete') {
    $str="delete from status_db where student_id='".$student_id."' and job_id='".$job_id."'";
    mysqli_query($con, $str);
}
if($status=='add') {
    $status='Prospect';
    $c=uniqid();
    $code=substr($c, -5);
    $str="insert into status_db values('$code', '".$_GET['student_id']."', '".$_GET['job_id']."', '".$status."');";
    mysqli_query($con, $str);
}
require "connection.php";
$str="select count(*) from status_db where student_id='$student_id';";
mysqli_query($con, $str);
$result=mysqli_query($con, $str);
$row=mysqli_fetch_array($result);
if ($row[0] > 0) {
    require "connection.php";
    $str="update student_details set status='Prospect' where student_id='".$student_id."';";
    mysqli_query($con, $str);
}
else {
    require "connection.php";
    $str="update student_details set status='Undecided' where student_id='".$student_id."';";
    mysqli_query($con, $str);
}
header("location:prospect_status_edit.php?student_id=".$student_id."");
?>
