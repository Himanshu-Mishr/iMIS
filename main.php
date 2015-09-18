<?php
include("err.php");
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header("location:index.php");
}
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <title>iMIS - Internship Management Information System</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+sans+light|Open+sans+light'>
    <link rel='stylesheet' href='style_admin.css'>
    <link rel='stylesheet' href='table.css'>
    <style>
        body {
            font-family: 'open sans', 'Helvetica Neue', Helvetica, arial, sans-serif;
            background: #EDEFF0;
        }
        .table_container table {
            width: 100%;
        }
        td a {
            display:block;
            text-decoration:none;
        }
.tg  {
            box-shadow: 1px 1px 1px 1px #888888;
            border-radius: 14px;
            font-family: 'open sans', 'Helvetica Neue', Helvetica, arial, sans-serif;
            border-collapse:collapse;
            border-width: 2px;
            background-color: #E0E4CC;
        }
        .tg td + th,
        .tg th + td { border-left: 1px solid #1FDA9A; }
        .tg tr + tr { border-top: 1px solid #1FDA9A; }

        .tg td{
            font-size:14px;
            padding:10px 5px;
            padding-left: 10px;
            overflow:hidden;
            word-break:normal;
        }
        .tg th{

            font-size:14px;
            font-weight:normal;
            padding:10px 5px;


            overflow:hidden;
            word-break:normal;
        }

        .num {
            font-family: 'Open Sans Light',Arial, sans-serif;
            font-size: 60px;

            color: #83BF17;
        }
        .stats_head {
            font-size:20px;
        }
        .stats_sub {

        }
        .num_sub {
            float:right;
            padding-left: 10px;
            padding-right: 16px;
            color: #5A6A62;
            font-family: 'Open Sans Bold',Arial, sans-serif;
            font-size: 20px;

        }

        #head_msg {

        text-align: center;
        font-size:20px;
        font-family:'open sans light', 'Helvetica Neue', Helvetica, arial, sans-serif;
    }
    </style>
</head>
<body>
  <nav id='nav'>
    <ul>
        <div id='logo'>
            <b>iMIS</b>
        </div>
        <li><a href='main.php'>Menu</a></li>
        <li><a href='show_student.php'>Student </a></li>
        <li><a href='show_company.php'>Company</a></li>
        <li><a href='show_faculty.php'>Faculties</a></li>
        <li><a href='job_opening_show.php'>Job Openings</a></li>
        <li><a href='project_show.php'>Projects</a></li>
        <li align='right' ><a href='logout.php' style='color:red;'>logout</a></li>
    </ul>
</nav>
<div id='main'>
    <div id='left'>
        <div id='sidebar'>
            <div class='menu'>
                <a href='main.php'>
                    <div class='menu menu-item' id='student_tc' style='box-shadow: inset 0px 1px 3px rgba(0,0,0,0.2), inset 0 0 3px rgba(0,0,0,0.05);
                    color: #212121;
                    margin-top: -1px;
                    padding-top: 13px;
                    background: rgba(0,0,0,0.06);'>
                    Main Menu
                </div>
            </a>
            <a href='show_student.php'>
                <div class='menu menu-item' id='student_tc'>
                    Show Student Record
                </div>
            </a>
            <a href='show_company.php'>
                <div class='menu menu-item' id='company_tc'>
                    Show Company Record
                </div>
            </a>
            <a href='show_faculty.php'>
                <div class='menu menu-item' id='faculty_tc'>
                    Show Faculty Record
                </div>
            </a>
            <a href='job_opening_show.php'>
                <div class='menu menu-item' id='company_tc'>
                    Show Job Openings
                </div>
            </a>
            <a href='project_show.php'>
                <div class='menu menu-item' id='faculty_tc'>
                    Show Project Record
                </div>
            </a>
            <a href='prospect_status_edit.php'>
                <div class='menu menu-item' id='faculty_tc'>
                    Allot Eligible Student to Job
                </div>
            </a>
            <a href='company_response_status.php' >
                <div class='menu menu-item' id='faculty_tc'>
                    Finalize Job Status
                </div>
            </a>
            <a href='company_student_selected.php' >
                        <div class='menu menu-item' id='faculty_tc'>
                             View Students According to Company
                        </div>
                </a>
                <a href='project_allot.php'>
                    <div class='menu menu-item' id='faculty_tc'>
                    Assign a Project to Student
                </div>
            </a>
        </div>
    </div>

</div>

<div id='right'>
<div class='table_container'>
        <div class='sub-table-container' >
        <div id=head_msg>Overall Stats of iMIS</div><br>
            <table class='tg' class='tc' style='undefined;table-layout: fixed; width: 100%; height:500px'>
                <colgroup>
                <col style='width: 25%'>
                <col style='width: 25%'>
                <col style='width: 25%'>
                <col style='width: 25%'>
            </colgroup>
            <tr>";
                // no of students
                require "connection.php";
                $str="select count(*) from student_details;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='5'><div class='num'>$row[0]</div><br><div class='stats_head'>Students</div></th>";

                // no of undecided student
                require "connection.php";
                $str="select count(*) from student_details where status='Undecided';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Undecided:<div class='num_sub'>$row[0]</div></div></td>";

                // no of faculty
                require "connection.php";
                $str="select count(*) from faculty_detail;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='5'><div class='num'>$row[0]</div><br><div class='stats_head'>Faculties</div></th>";

                // no of faculty who are advisor to Project
                require "connection.php";
                $str="select count(distinct advisor) from project_db;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e' rowspan='2'><div class='stats_sub'>Faculty as advisor to Project:<div class='num_sub'>$row[0]</div></div></td>
            </tr>
            <tr>";
                // no of students with Prospect Status
                require "connection.php";
                $str="select count(*) from student_details where status='Prospect';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Prospect:<div class='num_sub'>$row[0]</div></div></td>";

                echo "
            </tr>
            <tr>";
                // no of students with Hired Status
                require "connection.php";
                $str="select count(*) from student_details where status='Hired';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Hired:<div class='num_sub'>$row[0]</div></div></td>";

                // # faculties who have contacts with Companies
                require "connection.php";
                $str="select count(distinct faculty_id) from company_details;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Faculty have contact with Company:<div class='num_sub'>$row[0]</div></div></td>
            </tr>
            <tr>";
                // no of student who have been rejected
                require "connection.php";
                $str="select count(*) from student_details where status='Rejected';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Rejected:<div class='num_sub'>$row[0]</div></div></td>";

                // no of faculty with work no in Internship programme
                // select count(*)  from faculty_detail where faculty_id not in ()
                echo "<td class='tg-031e' rowspan='2'></td>
            </tr>
            <tr>";
                // No of student who have been allotted project
                require "connection.php";
                $str="select count(*) from student_details where status='Project Allotted';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                $noOfStudentWithProject=$row[0];
                echo "<td class='tg-031e'><div class='stats_sub'>Project Allotted:<div class='num_sub'>$row[0]</div></div></td>";

                echo "
            </tr>

            <tr>";
            // --------------------------------------------------------- 2nd ROW
                // no of companies
                require "connection.php";
                $str="select count(distinct faculty_id) from company_details;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='2'><div class='num'>$row[0]</div><br><div class='stats_head'>Companies</div></th>";

                // # of companies that have job openings
                require "connection.php";
                $str="select count(distinct company_id) from job_db;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Companies with Job Openings:<div class='num_sub'>$row[0]</div></div></td>";


                // no of job openings
                require "connection.php";
                $str="select count(distinct company_id) from job_db;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='2'><div class='num'>$row[0]</div><br><div class='stats_head'>Job Openings</div></th>";

                // Total no of positions collectively in all job opennings
                require "connection.php";
                $str="select * from job_db;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $sum=0;
                while ($row=mysqli_fetch_array($result)) {
                    $int = (int)$row[2];
                    $sum=$sum+$int;
                }
                echo "<td class='tg-031e'><div class='stats_sub'>Total No of Jobs:<div class='num_sub'>$sum</div></div></td>
            </tr>
            <tr>";
                // company which does not have job opening
                require "connection.php";
                $str="select count(*) from company_details where id not in ( select distinct company_id from job_db );";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Companies with no Job Openings:<div class='num_sub'>$row[0]</div></div></td>";

                // no of Vacancy
                $str="select count(*) from student_details where status='Hired';";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                $vacancy=$sum-$row[0];
                echo "<td class='tg-031e'><div class='stats_sub'>No Of Vacancies:<div class='num_sub'>$vacancy</div></div></td>
            </tr>

            <tr>";
                // no of projects
                require "connection.php";
                $str="select count(*) from project_db;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='2'><div class='num'>$row[0]</div><br><div class='stats_head'>Projects</div></th>";

                // Average no of student per project
                $noOfProjects=$row[0];
                $avg=(int)($noOfStudentWithProject/(float)$noOfProjects);
                echo "<td class='tg-031e'><div class='stats_sub'>Average # Student Per Project:<div class='num_sub'>$avg</div></div></td>";

                // no of admin account
                $str="select count(*) from admin_detail;";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<th class='tg-031e' rowspan='2'><div class='num'>$row[0]</div><br><div class='stats_head'>Administrator</div></th>";

                // USELESS
                echo "<td class='tg-031e' rowspan='2'></td>
            </tr>
            <tr>";
                // no of project without student

                require "connection.php";
                $str="select count(*) from project_db where project_id not in (select project_id from project_allot);";
                mysqli_query($con, $str);
                $result=mysqli_query($con, $str);
                $row=mysqli_fetch_array($result);
                echo "<td class='tg-031e'><div class='stats_sub'>Project without Students:<div class='num_sub'>$row[0]</div></div></td>";

                echo "
            </tr>
        </table>

    </div>
</div>


    <div class='table_container'>
        <div class='sub-table-container' >


            <table class='tc' >
                <thead>
                    <tr>
                        <th class='tpl-bar-breadcrumbs' colspan='9'>Student Record

                            <a href='student_add.php' title='Add a Student to record'><button class='edit-button' style='visibility:visible;width: 43px;height: 32px;line-height: 32px;margin: 5px;'>Add</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='row'>
                            <td class='item'>Student ID</td>
                            <td class='item'>First Name</td>
                            <td class='item'>Middle Name</td>
                            <td class='item'>Last Name</td>
                            <td class='item'>Email</td>
                            <td class='item'>Telephone</td>
                            <td class='item'>Status</td>
                            <td class='item'>Semester Registered</td>
                            <td class='item'>Delete</td>
                        </tr>";

                        require "connection.php";
                        $str="select * from student_details;";
                        $result=mysqli_query($con, $str);
                        $x=1;
                        while($row=mysqli_fetch_array($result)) {
                            if($x==1) {
                                $x=0;
                                echo "<tr   class='row'>
                                <td class='item alter'>$row[0]</td>
                                <td class='item alter'>$row[1]<a href='student_edit.php?student_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                                <td class='item alter'>$row[2]</td>
                                <td class='item alter'>$row[3]</td>
                                <td class='item alter'>$row[4]</td>
                                <td class='item alter'>$row[5]</td>
                                <td class='item alter'>$row[6]</td>
                                <td class='item alter'>$row[7]</td>
                                <td class='item alter'><a href='delete_record.php?file=show_student.php&table=student_details&pkey_name=student_id&key=$row[0]' title='Delete this student from record'>✖</a></td>
                            </tr>";

                        }
                        else {
                            $x=1;
                            echo "<tr   class='row'>
                            <td class='item'>$row[0]</td>
                            <td class='item'>$row[1]<a href='student_edit.php?student_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                            <td class='item'>$row[2]</td>
                            <td class='item'>$row[3]</td>
                            <td class='item'>$row[4]</td>
                            <td class='item'>$row[5]</td>
                            <td class='item'>$row[6]</td>
                            <td class='item'>$row[7]</td>
                            <td class='item'><a href='delete_record.php?file=show_student.php&table=student_details&pkey_name=student_id&key=$row[0]' title='Delete this student from record'>✖</a></td>
                        </tr>";
                    }

                }
                echo "
            </tbody>
        </table>

    </div>
</div>";
echo "
<div class='table_container'>
    <div class='sub-table-container' >

        <table class='tc' >
            <thead>
                <tr>
                    <th class='tpl-bar-breadcrumbs' colspan='10'>Faculty Record

                        <a href='faculty_add.php' title='Add a Faculty to record'><button class='edit-button' style='visibility:visible;width: 43px;height: 32px;line-height: 32px;margin: 5px;'>Add</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='row'>
                        <td class='item'>Faculty ID</td>
                        <td class='item'>First Name</td>
                        <td class='item'>Last Name</td>
                        <td class='item'>Position</td>
                        <td class='item'>School</td>
                        <td class='item'>Telephone</td>
                        <td class='item'>Extension</td>
                        <td class='item'>Mobile</td>
                        <td class='item'>Email</td>
                        <td class='item'>Delete</td>
                    </tr>";

                    require "connection.php";
                    $str="select * from faculty_detail;";
                    $result=mysqli_query($con, $str);
                    $x=1;
                    while($row=mysqli_fetch_array($result)) {
                        if($x==1) {
                            $x=0;
                            echo "<tr   class='row'>
                            <td class='item alter'>$row[0]</td>
                            <td class='item alter'>$row[1]<a href='faculty_edit.php?faculty_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                            <td class='item alter'>$row[2]</td>
                            <td class='item alter'>$row[3]</td>
                            <td class='item alter'>$row[4]</td>
                            <td class='item alter'>$row[5]</td>
                            <td class='item alter'>$row[6]</td>
                            <td class='item alter'>$row[7]</td>
                            <td class='item alter'>$row[8]</td>
                            <td class='item alter'><a href='delete_record.php?file=show_faculty.php&table=faculty_detail&pkey_name=faculty_id&key=$row[0]' title='Delete this faculty from record'>✖</a></td>
                        </tr>";

                    }
                    else {
                        $x=1;
                        echo "<tr   class='row'>
                        <td class='item'>$row[0]</td>
                        <td class='item'>$row[1]<a href='faculty_edit.php?faculty_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                        <td class='item'>$row[2]</td>
                        <td class='item'>$row[3]</td>
                        <td class='item'>$row[4]</td>
                        <td class='item'>$row[5]</td>
                        <td class='item'>$row[6]</td>
                        <td class='item'>$row[7]</td>
                        <td class='item'>$row[8]</td>
                        <td class='item'><a href='delete_record.php?file=show_faculty.php&table=faculty_detail&pkey_name=faculty_id&key=$row[0]' title='Delete this faculty from record'>✖</a></td>
                    </tr>";
                }

            }

            echo "                    </tbody>
        </table>
    </div>
</div>

<div class='table_container'>
    <div class='sub-table-container' >

        <table class='tc' >
            <thead>
                <tr>
                    <th class='tpl-bar-breadcrumbs' colspan='7'>Company Record

                        <a href='company_add.php' title='Add a Company to record'><button class='edit-button' style='visibility:visible;width: 43px;height: 32px;line-height: 32px;margin: 5px;'>Add</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='row'>
                        <td class='item'>ID</td>
                        <td class='item'>Company Name</td>
                        <td class='item'>Address</td>
                        <td class='item'>City</td>
                        <td class='item'>Postal Code</td>
                        <td class='item'>Country</td>
                        <td class='item'>Delete</td>
                    </tr>";

                    require 'connection.php';
                    $str="select * from company_details;";
                    $result=mysqli_query($con, $str);
                    $x=1;
                    while($row=mysqli_fetch_array($result)) {
                        if($x==1) {
                            $x=0;
                            echo "<tr   class='row'>
                            <td class='item alter'>$row[0]</td>
                            <td class='item alter'>$row[1]<a href='company_view_details.php?id=$row[0]'><button class='edit-button' >View</button></a><a href='company_edit.php?id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                            <td class='item alter'>$row[2]</td>
                            <td class='item alter'>$row[3]</td>
                            <td class='item alter'>$row[4]</td>
                            <td class='item alter'>$row[5]</td>
                            <td class='item alter'><a href='delete_record.php?file=show_company.php&table=company_details&pkey_name=id&key=$row[0]' title='Delete this Company from record'>✖</a></td>
                        </tr>";

                    }
                    else {
                        $x=1;
                        echo "<tr   class='row'>
                        <td class='item'>$row[0]</td>
                        <td class='item'>$row[1]<a href='company_view_details.php?id=$row[0]'><button class='edit-button' >View</button></a><a href='company_edit.php?id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                        <td class='item'>$row[2]</td>
                        <td class='item'>$row[3]</td>
                        <td class='item'>$row[4]</td>
                        <td class='item'>$row[5]</td>
                        <td class='item'><a href='delete_record.php?file=show_company.php&table=company_details&pkey_name=id&key=$row[0]' title='Delete this Company from record'>✖</a></td>
                    </tr>";
                }

            }
            echo "                    </tbody>
        </table>
    </div>
</div>

<div class='table_container'>
    <div class='sub-table-container' >

        <table class='tc' >
            <thead>
                <tr>
                    <th class='tpl-bar-breadcrumbs' colspan='7'>Job Openings

                        <a href='job_opening_add.php' title='Add a Job Opening to record'><button class='edit-button' style='visibility:visible;width: 43px;height: 32px;line-height: 32px;margin: 5px;'>Add</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='row'>
                        <td class='item'>Job ID</td>
                        <td class='item'>Company ID</td>
                        <td class='item'>Position(s)</td>
                        <td class='item'>Description</td>
                        <td class='item'>Responsibilties</td>
                        <td class='item'>Requirements</td>
                        <td class='item'>Delete</td>
                    </tr>";

                    require "connection.php";
                    $str="select * from job_db;";
                    $result=mysqli_query($con, $str);
                    $x=1;
                    while($row=mysqli_fetch_array($result)) {
                        if($x==1) {
                            $x=0;
                            echo "<tr   class='row'>
                            <td class='item alter'>$row[0]</td>
                            <td class='item alter'>$row[1]<a href='job_opening_edit.php?job_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                            <td class='item alter'>$row[2]</td>
                            <td class='item alter'>$row[3]</td>
                            <td class='item alter'>$row[4]</td>
                            <td class='item alter'>$row[5]</td>
                            <td class='item alter'><a href='delete_record.php?file=job_opening_show.php&table=job_db&pkey_name=job_id&key=$row[0]' title='Delete this Job Opening from record'>✖</a></td>
                        </tr>";

                    }
                    else {
                        $x=1;
                        echo "<tr   class='row'>
                        <td class='item'>$row[0]</td>
                        <td class='item'>$row[1]<a href='job_opening_edit.php?job_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                        <td class='item'>$row[2]</td>
                        <td class='item'>$row[3]</td>
                        <td class='item'>$row[4]</td>
                        <td class='item'>$row[5]</td>
                        <td class='item'><a href='delete_record.php?file=job_opening_show.php&table=job_db&pkey_name=job_id&key=$row[0]' title='Delete this Job Opening from record'>✖</a></td>
                    </tr>";
                }

            }
            echo "

        </tbody>
    </table>
</div>
</div>

    <div class='table_container'>
        <div class='sub-table-container' >

            <table class='tc' >
                <thead>
                    <tr>
                        <th class='tpl-bar-breadcrumbs' colspan='5'>Project Record

                            <a href='Project_add.php' title='Add a Project to record'><button class='edit-button' style='visibility:visible;width: 43px;height: 32px;line-height: 32px;margin: 5px;'>Add</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='row'>
                            <td class='item'>Project ID</td>
                            <td class='item'>Title</td>
                            <td class='item'>Description</td>
                            <td class='item'>Advisor</td>
                            <td class='item'>Delete</td>
                        </tr>";

                        require "connection.php";
                        $str="select * from project_db;";
                        $result=mysqli_query($con, $str);
                        $x=1;
                        while($row=mysqli_fetch_array($result)) {
                            if($x==1) {
                                $x=0;
                                echo "<tr   class='row'>
                                <td class='item alter'>$row[0]</td>
                                <td class='item alter'>$row[1]<a href='project_edit.php?project_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                                <td class='item alter'>$row[2]</td>
                                <td class='item alter'>$row[3]</td>
                                <td class='item alter'><a href='delete_record.php?file=project_show.php&table=project_db&pkey_name=project_id&key=$row[0]' title='Delete this project from record'>✖</a></td>
                            </tr>";

                        }
                        else {
                            $x=1;
                            echo "<tr   class='row'>
                            <td class='item'>$row[0]</td>
                            <td class='item'>$row[1]<a href='project_edit.php?project_id=$row[0]'><button class='edit-button' >Edit</button></a></td>
                            <td class='item'>$row[2]</td>
                            <td class='item'>$row[3]</td>
                            <td class='item'><a href='delete_record.php?file=project_show.php&table=project_db&pkey_name=project_id&key=$row[0]' title='Delete this project from record'>✖</a></td>
                        </tr>";
                    }
                }
                echo "         </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</body>
</html>
";
?>
