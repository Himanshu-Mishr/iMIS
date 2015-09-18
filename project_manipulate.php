<?php
include("err.php");
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header("location:index.php");
}
$student_id=$_GET['student_id'];
$project_id=$_GET['project_id'];
$status=$_GET['status'];

// require "connection.php";
// $str="update student_details set status='".$status."' where student_id='".$student_id."' and job_id='".$job_id."';";
// mysqli_query($con, $str);

/*  Check if student was already allot a project  */
require "connection.php";
$str="select count(*) from project_allot where student_id='$student_id';";
mysqli_query($con, $str);
$result=mysqli_query($con, $str);
$row=mysqli_fetch_array($result);

if ($row[0] > 0) {    // Yes already allotted  So remove it.
    require "connection.php";
    $str="delete from project_allot where student_id='$student_id'";
    mysqli_query($con, $str);

    // Now insert the new one, if 'add'
    if ($status=='add') {
        require "connection.php";
        $str="insert into project_allot values('$student_id','$project_id');";
        mysqli_query($con, $str);

        // Undecided ----> Project Allotted
        require "connection.php";
        $str="update student_details set status='Project Allotted' where student_id='$student_id';";
        mysqli_query($con, $str);
    }
    if ($status=='delete') {  // as all is  removed, no project allotted to student , so change his status.
        // Project Allotted ----> Undecided
        require "connection.php";
        $str="update student_details set status='Undecided' where student_id='$student_id';";
        mysqli_query($con, $str);
    }
}
else {                // No then insert into it.
    // Now insert the new one.
    require "connection.php";
    $str="insert into project_allot values('$student_id','$project_id');";
    mysqli_query($con, $str);

    // Undecided ----> Project Allotted
    require "connection.php";
    $str="update student_details set status='Project Allotted' where student_id='$student_id';";
    mysqli_query($con, $str);
}

header("location:project_allot.php?student_id=".$student_id."");
?>
