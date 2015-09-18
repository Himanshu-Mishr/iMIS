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
                    <div class='menu menu-item' id='student_tc'>
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
                    <div class='menu menu-item' id='faculty_tc' style='box-shadow: inset 0px 1px 3px rgba(0,0,0,0.2), inset 0 0 3px rgba(0,0,0,0.05);
                    color: #212121;
                    margin-top: -1px;
                    padding-top: 13px;
                    background: rgba(0,0,0,0.06);'>
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
                                <td class='item alter'><a href='mailto:$row[8]'>$row[8]</a></td>
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
                            <td class='item'><a href='mailto:$row[8]'>$row[8]</a></td>
                            <td class='item'><a href='delete_record.php?file=show_faculty.php&table=faculty_detail&pkey_name=faculty_id&key=$row[0]' title='Delete this faculty from record'>✖</a></td>
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
</html>";
?>
