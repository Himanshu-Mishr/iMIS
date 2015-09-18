<?php
include("err.php");
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header("location:index.php");
}
echo "
<html lang='en'>
<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+sans+light|Open+sans+light'>
    <title>iMIS - Internship Management Information System</title>
    <link href='style_admin.css' rel='stylesheet'>
    <link href='table.css' rel='stylesheet'>
    <script type='text/javascript' language='javascript'>
        function z(oTD) {
            var el, i = 0;
            while (el = oTD.childNodes[i++])
                if (el.type == 'radio') el. = true;
        }
    </script>
    <style>
        body {
            font-family: 'open sans';
            background: #EDEFF0;
        }

    </style>
</head>

<body>
    <nav id='nav'>
        <ul style='list-style: none; display: inline'>
            <div id='logo' style='font-weight: bold'>
                iMIS
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
                            Finalize Status
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
            <form action='' method='GET' accept-charset='utf-8'>

                <div class='table_container'>
                    <div class='sub-table-container'>
                        <table class='tc'>
                            <thead>
                                <tr>
                                    <th class='tpl-bar-breadcrumbs' colspan='3'>PERSONAL INFORMATION</th>
                                </tr>
                            </thead>";

                            $student_id=$_GET['student_id'];
                            require 'connection.php';
                            $str="select * from student_details where student_id='$student_id'";
                            $result=mysqli_query($con, $str);
                            $row=mysqli_fetch_array($result);

                            echo "
                            <tbody>
                                <tr class='row'>
                                    <td class='item'>Semester Reg(FALL/WINTER)</td>

                                    <td class='item'><input name='sem_reg' placeholder='' type='text' value='$row[7]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Student ID</td>

                                    <td class='item alter'><input name='student_id' placeholder='$row[0]' type='text' value='$row[0]' readonly></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>First Name</td>

                                    <td class='item'><input name='first_name' placeholder='' type='text' value='$row[1]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Middle Name</td>

                                    <td class='item alter'><input name='middle_name' placeholder='' type='text' value='$row[2]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Last Name</td>

                                    <td class='item'><input name='last_name' placeholder='' type='text' value='$row[3]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Email</td>

                                    <td class='item alter'><input name='email' placeholder='' type='text' value='$row[4]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Telephone</td>

                                    <td class='item'><input name='telephone' placeholder='' type='text' value='$row[5]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Status</td>
                                    <td class='item alter'>
                                        <select name='status' disabled>
                                            <option value='$row[6]' selected readonly>$row[6]</option>
                                        </select>
                                        <div style='color:grey'>*info:Status automatically changes when allottment is made.</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>";

                echo "            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='3'>EDUCATION AND TRAINING</th>
                            </tr>
                        </thead>";

                        $student_id=$_GET['student_id'];
                        require 'connection.php';
                        $str="select * from edu_training where student_id='$student_id'";
                        $result=mysqli_query($con, $str);
                        $row=mysqli_fetch_array($result);

                        echo "
                        <tbody>
                            <tr class='row'>
                                <td class='item alter'>Degree</td>

                                <td class='item alter'><input name='degree' placeholder='' type='text' value='$row[2]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>Major</td>

                                <td class='item'><input name='major' placeholder='' type='text' value='$row[3]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>GPA</td>

                                <td class='item alter'><input name='gpa' placeholder='' type='text' value='$row[4]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>University/Org</td>

                                <td class='item'><input name='university' placeholder='' type='text' value='$row[5]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Country</td>

                                <td class='item alter'><input name='country' placeholder='' type='text' value='$row[6]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>MM/YY</td>

                                <td class='item'><input name='duration' placeholder='' type='text' value='$row[7]'></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>";

            echo "            <div class='table_container'>
            <div class='sub-table-container'>
                <table class='tc'>
                    <thead>
                        <tr>
                            <th class='tpl-bar-breadcrumbs' colspan='3'>WORK EXPERIENCE</th>
                        </tr>
                    </thead>";

                    $student_id=$_GET['student_id'];
                    require 'connection.php';
                    $str="select * from work_experience where student_id='$student_id'";
                    $result=mysqli_query($con, $str);
                    $row=mysqli_fetch_array($result);

                    echo "
                    <tbody>
                        <tr class='row'>
                            <td class='item alter'>Company</td>

                            <td class='item alter'><input name='company_name' placeholder='' type='text' value='$row[2]'></td>
                        </tr>

                        <tr class='row'>
                            <td class='item'>Start Date</td>

                            <td class='item'><input name='start_date' placeholder='' type='text' value='$row[3]'></td>
                        </tr>

                        <tr class='row'>
                            <td class='item alter'>End Date</td>

                            <td class='item alter'><input name='end_date' placeholder='' type='text' value='$row[4]'></td>
                        </tr>

                        <tr class='row'>
                            <td class='item'>Title</td>

                            <td class='item'><input name='title' placeholder='' type='text' value='$row[5]'></td>
                        </tr>

                        <tr class='row'>
                            <td class='item alter'>Duties</td>

                            <td class='item alter'><input name='duties' placeholder='' type='text' value='$row[6]'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>";

        echo "            <div class='table_container'>
        <div class='sub-table-container'>
            <table class='tc'>
                <thead>
                    <tr>
                        <th class='tpl-bar-breadcrumbs' colspan='6'>KNOWLEDGE AND SKILLS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='row'>
                        <td class='item'>Language</td>

                        <td class='item'>Not at all Competent</td>

                        <td class='item'>A little Competent</td>

                        <td class='item'>Moderately Competent</td>

                        <td class='item'>Very Competent</td>

                        <td class='item'>Extermely Competent</td>
                    </tr>";

                    $student_id=$_GET['student_id'];
                    require 'connection.php';
                    $str="select * from knowledge_skill where student_id='$student_id'";
                    $result=mysqli_query($con, $str);
                    $row=mysqli_fetch_array($result);
                    $x=$row[3];

                    echo "<tr class='row'>
                    <td class='item alter'>ASP.NET</td>";
                    if($x[0]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='0'></td>";
                    if($x[0]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='1'></td>";
                    if($x[0]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='2'></td>";
                    if($x[0]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='3'></td>";
                    if($x[0]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='aspnet' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>C</td>";
                    if($x[1]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='0'></td>";
                    if($x[1]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='1'></td>";
                    if($x[1]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='2'></td>";
                    if($x[1]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='3'></td>";
                    if($x[1]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='c' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>C++</td>";
                    if($x[2]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='0'></td>";
                    if($x[2]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='1'></td>";
                    if($x[2]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='2'></td>";
                    if($x[2]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='3'></td>";
                    if($x[2]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='cpp' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>c #</td>";
                    if($x[3]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='0'></td>";
                    if($x[3]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='1'></td>";
                    if($x[3]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='2'></td>";
                    if($x[3]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='3'></td>";
                    if($x[3]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='csharp' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>Cold Fusion</td>";
                    if($x[4]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='0'></td>";
                    if($x[4]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='1'></td>";
                    if($x[4]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='2'></td>";
                    if($x[4]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='3'></td>";
                    if($x[4]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='coldfusion' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Flex</td>";
                    if($x[5]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='0'></td>";
                    if($x[5]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='1'></td>";
                    if($x[5]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='2'></td>";
                    if($x[5]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='3'></td>";
                    if($x[5]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='flex' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>Java</td>";
                    if($x[6]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='0'></td>";
                    if($x[6]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='1'></td>";
                    if($x[6]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='2'></td>";
                    if($x[6]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='3'></td>";
                    if($x[6]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='java' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>JavaScript</td>";
                    if($x[7]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='0'></td>";
                    if($x[7]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='1'></td>";
                    if($x[7]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='2'></td>";
                    if($x[7]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='3'></td>";
                    if($x[7]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='javascript' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>Lisp</td>";
                    if($x[8]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='0'></td>";
                    if($x[8]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='1'></td>";
                    if($x[8]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='2'></td>";
                    if($x[8]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='3'></td>";
                    if($x[8]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='lisp' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Matlab</td>";
                    if($x[9]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='0'></td>";
                    if($x[9]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='1'></td>";
                    if($x[9]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='2'></td>";
                    if($x[9]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='3'></td>";
                    if($x[9]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='matlab' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>MySQL</td>";
                    if($x[10]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='0'></td>";
                    if($x[10]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='1'></td>";
                    if($x[10]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='2'></td>";
                    if($x[10]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='3'></td>";
                    if($x[10]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='mysql' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Pascal</td>";
                    if($x[11]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='0'></td>";
                    if($x[11]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='1'></td>";
                    if($x[11]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='2'></td>";
                    if($x[11]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='3'></td>";
                    if($x[11]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='pascal' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>Perl</td>";
                    if($x[12]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='0'></td>";
                    if($x[12]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='1'></td>";
                    if($x[12]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='2'></td>";
                    if($x[12]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='3'></td>";
                    if($x[12]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='perl' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Php</td>";
                    if($x[13]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='0'></td>";
                    if($x[13]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='1'></td>";
                    if($x[13]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='2'></td>";
                    if($x[13]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='3'></td>";
                    if($x[13]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='php' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>Prolog</td>";
                    if($x[14]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='0'></td>";
                    if($x[14]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='1'></td>";
                    if($x[14]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='2'></td>";
                    if($x[14]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='3'></td>";
                    if($x[14]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='prolog' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Python</td>";
                    if($x[15]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='0'></td>";
                    if($x[15]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='1'></td>";
                    if($x[15]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='2'></td>";
                    if($x[15]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='3'></td>";
                    if($x[15]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='python' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>R</td>";
                    if($x[16]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='0'></td>";
                    if($x[16]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='1'></td>";
                    if($x[16]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='2'></td>";
                    if($x[16]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='3'></td>";
                    if($x[16]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='r' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Ruby</td>";
                    if($x[17]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='0'></td>";
                    if($x[17]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='1'></td>";
                    if($x[17]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='2'></td>";
                    if($x[17]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='3'></td>";
                    if($x[17]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='ruby' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>SQL-Oracle</td>";
                    if($x[18]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='0'></td>";
                    if($x[18]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='1'></td>";
                    if($x[18]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='2'></td>";
                    if($x[18]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='3'></td>";
                    if($x[18]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='sqloracle' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>Tcl</td>";
                    if($x[19]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='0'></td>";
                    if($x[19]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='1'></td>";
                    if($x[19]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='2'></td>";
                    if($x[19]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='3'></td>";
                    if($x[19]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='tcl' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item alter'>T-SQL</td>";
                    if($x[20]==='0')
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='0'></td>";
                    if($x[20]==='1')
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='1'></td>";
                    if($x[20]==='2')
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='2'></td>";
                    if($x[20]==='3')
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='3'></td>";
                    if($x[20]==='4')
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item alter'><input name='tsql' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "<tr class='row'>
                    <td class='item'>VB.Net</td>";
                    if($x[21]==='0')
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='0' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='0'></td>";
                    if($x[21]==='1')
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='1' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='1'></td>";
                    if($x[21]==='2')
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='2' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='2'></td>";
                    if($x[21]==='3')
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='3' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='3'></td>";
                    if($x[21]==='4')
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='4' checked></td>";
                    else
                        echo "<td onclick='z(this)' class='item'><input name='vbnet' type='radio' value='4'></td>";
                    echo "</tr>";

                    echo "                        </tbody>
                </table>
            </div>
        </div>

        <div class='table_container'>
            <div class='sub-table-container'>
                <table class='tc'>
                    <thead>
                        <tr>
                            <th class='tpl-bar-breadcrumbs' colspan='6'>KNOWLEDGE AND SKILLS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class='row'>
                            <td class='item'>Content Management System</td>

                            <td class='item'>Not at all Competent</td>

                            <td class='item'>A little Competent</td>

                            <td class='item'>Moderately Competent</td>

                            <td class='item'>Very Competent</td>

                            <td class='item'>Extermely Competent</td>
                        </tr>";

                        $student_id=$_GET['student_id'];
                        require 'connection.php';
                        $str="select * from cms_area where student_id='$student_id'";
                        $result=mysqli_query($con, $str);
                        $row=mysqli_fetch_array($result);
                        $x=$row[3];

                        echo "<tr class='row'>
                        <td class='item alter'>Concrete5</td>";
                        if($x[0]==='0')
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='0'  type='radio'></td>";
                        if($x[0]==='1')
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='1' type='radio'></td>";
                        if($x[0]==='2')
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='2' type='radio'></td>";
                        if($x[0]==='3')
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='3' type='radio'></td>";
                        if($x[0]==='4')
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Concrete5' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "<tr class='row'>
                        <td class='item'>DotNetNuke</td>";
                        if($x[1]==='0')
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='0'  type='radio'></td>";
                        if($x[1]==='1')
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='1' type='radio'></td>";
                        if($x[1]==='2')
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='2' type='radio'></td>";
                        if($x[1]==='3')
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='3' type='radio'></td>";
                        if($x[1]==='4')
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='DotNetNuke' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "<tr class='row'>
                        <td class='item alter'>Drupal</td>";
                        if($x[2]==='0')
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='0'  type='radio'></td>";
                        if($x[2]==='1')
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='1' type='radio'></td>";
                        if($x[2]==='2')
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='2' type='radio'></td>";
                        if($x[2]==='3')
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='3' type='radio'></td>";
                        if($x[2]==='4')
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Drupal' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "<tr class='row'>
                        <td class='item'>Joomla</td>";
                        if($x[3]==='0')
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='0'  type='radio'></td>";
                        if($x[3]==='1')
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='1' type='radio'></td>";
                        if($x[3]==='2')
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='2' type='radio'></td>";
                        if($x[3]==='3')
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='3' type='radio'></td>";
                        if($x[3]==='4')
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Joomla' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "<tr class='row'>
                        <td class='item alter'>Wordpress</td>";
                        if($x[4]==='0')
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='0'  type='radio'></td>";
                        if($x[4]==='1')
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='1' type='radio'></td>";
                        if($x[4]==='2')
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='2' type='radio'></td>";
                        if($x[4]==='3')
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='3' type='radio'></td>";
                        if($x[4]==='4')
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item alter'><input name='Wordpress' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "<tr class='row'>
                        <td class='item'>Others</td>";
                        if($x[5]==='0')
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='0'  type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='0'  type='radio'></td>";
                        if($x[5]==='1')
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='1' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='1' type='radio'></td>";
                        if($x[5]==='2')
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='2' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='2' type='radio'></td>";
                        if($x[5]==='3')
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='3' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='3' type='radio'></td>";
                        if($x[5]==='4')
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='4' type='radio' checked></td>";
                        else
                            echo "<td onclick='z(this)' class='item'><input name='Others' value='4' type='radio'></td>";
                        echo "</tr>";

                        echo "                        </tbody>
                    </table>
                </div>
            </div>

            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='6'>Competent With Operating Systems</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item'>Operating System</td>

                                <td class='item'>Not at all Competent</td>

                                <td class='item'>A little Competent</td>

                                <td class='item'>Moderately Competent</td>

                                <td class='item'>Very Competent</td>

                                <td class='item'>Extermely Competent</td>
                            </tr>";

                            $student_id=$_GET['student_id'];
                            require 'connection.php';
                            $str="select * from os where student_id='$student_id'";
                            $result=mysqli_query($con, $str);
                            $row=mysqli_fetch_array($result);
                            $x=$row[3];
                            echo "<tr class='row'>
                            <td class='item alter'>Andriod</td>";
                            if($x[0]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='0'  type='radio'></td>";
                            if($x[0]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='1' type='radio'></td>";
                            if($x[0]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='2' type='radio'></td>";
                            if($x[0]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='3' type='radio'></td>";
                            if($x[0]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Andriod' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Chromium OS</td>";
                            if($x[1]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='0'  type='radio'></td>";
                            if($x[1]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='1' type='radio'></td>";
                            if($x[1]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='2' type='radio'></td>";
                            if($x[1]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='3' type='radio'></td>";
                            if($x[1]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='ChromiumOS' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Google Chrome OS</td>";
                            if($x[2]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='0'  type='radio'></td>";
                            if($x[2]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='1' type='radio'></td>";
                            if($x[2]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='2' type='radio'></td>";
                            if($x[2]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='3' type='radio'></td>";
                            if($x[2]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='GoogleChromeOS' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>iOS</td>";
                            if($x[3]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='0'  type='radio'></td>";
                            if($x[3]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='1' type='radio'></td>";
                            if($x[3]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='2' type='radio'></td>";
                            if($x[3]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='3' type='radio'></td>";
                            if($x[3]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iOS' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Linux</td>";
                            if($x[4]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='0'  type='radio'></td>";
                            if($x[4]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='1' type='radio'></td>";
                            if($x[4]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='2' type='radio'></td>";
                            if($x[4]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='3' type='radio'></td>";
                            if($x[4]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Linux' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>MAC OS</td>";
                            if($x[5]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='0'  type='radio'></td>";
                            if($x[5]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='1' type='radio'></td>";
                            if($x[5]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='2' type='radio'></td>";
                            if($x[5]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='3' type='radio'></td>";
                            if($x[5]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='MACOS' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>UNIX</td>";
                            if($x[6]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='0'  type='radio'></td>";
                            if($x[6]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='1' type='radio'></td>";
                            if($x[6]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='2' type='radio'></td>";
                            if($x[6]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='3' type='radio'></td>";
                            if($x[6]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='UNIX' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Windows7</td>";
                            if($x[7]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='0'  type='radio'></td>";
                            if($x[7]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='1' type='radio'></td>";
                            if($x[7]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='2' type='radio'></td>";
                            if($x[7]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='3' type='radio'></td>";
                            if($x[7]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='Windows7' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Windows8</td>";
                            if($x[8]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='0'  type='radio'></td>";
                            if($x[8]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='1' type='radio'></td>";
                            if($x[8]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='2' type='radio'></td>";
                            if($x[8]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='3' type='radio'></td>";
                            if($x[8]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='Windows8' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Windows Azure</td>";
                            if($x[9]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='0'  type='radio'></td>";
                            if($x[9]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='1' type='radio'></td>";
                            if($x[9]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='2' type='radio'></td>";
                            if($x[9]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='3' type='radio'></td>";
                            if($x[9]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='WindowsAzure' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Windows Phone8</td>";
                            if($x[10]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='0'  type='radio'></td>";
                            if($x[10]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='1' type='radio'></td>";
                            if($x[10]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='2' type='radio'></td>";
                            if($x[10]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='3' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='3' type='radio'></td>";
                            if($x[10]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='WindowsPhone8' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "                        </tbody>
                        </table>
                    </div>
                </div>

                <div class='table_container'>
                    <div class='sub-table-container'>
                        <table class='tc'>
                            <thead>
                                <tr>
                                    <th class='tpl-bar-breadcrumbs' colspan='6'>How confident do you feel in the following fields?</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class='row'>
                                    <td class='item'></td>

                                    <td class='item'>Not at all Confident</td>

                                    <td class='item'>A little Confident</td>

                                    <td class='item'>Moderately Confident</td>

                                    <td class='item'>Very Confident</td>

                                    <td class='item'>Extermely Confident</td>
                                </tr>";

                                $student_id=$_GET['student_id'];
                                require 'connection.php';
                                $str="select * from special_area where student_id='$student_id'";
                                $result=mysqli_query($con, $str);
                                $row=mysqli_fetch_array($result);
                                $x=$row[1];


                                echo "<tr class='row'>
                                <td class='item alter'>Systems Programming</td>";
                                if ($x[0]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='0'  type='radio'></td>";
                                if($x[0]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='1' type='radio'></td>";
                                if($x[0]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='2' type='radio'></td>";
                                if($x[0]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='3' type='radio'></td>";
                                if($x[0]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsProgramming' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Applications Programming</td>";
                                if ($x[1]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='0'  type='radio'></td>";
                                if($x[1]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='1' type='radio'></td>";
                                if($x[1]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='2' type='radio'></td>";
                                if($x[1]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='3' type='radio'></td>";
                                if($x[1]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='ApplicationsProgramming' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item alter'>Web Development</td>";
                                if ($x[2]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='0'  type='radio'></td>";
                                if($x[2]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='1' type='radio'></td>";
                                if($x[2]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='2' type='radio'></td>";
                                if($x[2]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='3' type='radio'></td>";
                                if($x[2]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='WebDevelopment' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Mobile Development</td>";
                                if ($x[3]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='0'  type='radio'></td>";
                                if($x[3]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='1' type='radio'></td>";
                                if($x[3]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='2' type='radio'></td>";
                                if($x[3]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='3' type='radio'></td>";
                                if($x[3]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='MobileDevelopment' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item alter'>Games Development</td>";
                                if ($x[4]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='0'  type='radio'></td>";
                                if($x[4]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='1' type='radio'></td>";
                                if($x[4]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='2' type='radio'></td>";
                                if($x[4]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='3' type='radio'></td>";
                                if($x[4]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='GamesDevelopment' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Software Testing</td>";
                                if ($x[5]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='0'  type='radio'></td>";
                                if($x[5]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='1' type='radio'></td>";
                                if($x[5]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='2' type='radio'></td>";
                                if($x[5]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='3' type='radio'></td>";
                                if($x[5]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='SoftwareTesting' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item alter'>Systems Analysis</td>";
                                if ($x[6]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='0'  type='radio'></td>";
                                if($x[6]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='1' type='radio'></td>";
                                if($x[6]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='2' type='radio'></td>";
                                if($x[6]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='3' type='radio'></td>";
                                if($x[6]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemsAnalysis' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Databases</td>";
                                if ($x[7]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='0'  type='radio'></td>";
                                if($x[7]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='1' type='radio'></td>";
                                if($x[7]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='2' type='radio'></td>";
                                if($x[7]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='3' type='radio'></td>";
                                if($x[7]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Databases' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item alter'>System Administration</td>";
                                if ($x[8]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='0'  type='radio'></td>";
                                if($x[8]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='1' type='radio'></td>";
                                if($x[8]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='2' type='radio'></td>";
                                if($x[8]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='3' type='radio'></td>";
                                if($x[8]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='SystemAdministration' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Networking</td>";
                                if ($x[9]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='0'  type='radio'></td>";
                                if($x[9]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='1' type='radio'></td>";
                                if($x[9]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='2' type='radio'></td>";
                                if($x[9]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='3' type='radio'></td>";
                                if($x[9]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Networking' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item alter'>Project Management</td>";
                                if ($x[10]==='0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='0'  type='radio'></td>";
                                if($x[10]==='1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='1' type='radio'></td>";
                                if($x[10]==='2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='2' type='radio'></td>";
                                if($x[10]==='3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='3' type='radio'></td>";
                                if($x[10]==='4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='ProjectManagement' value='4' type='radio'></td>";
                                echo "</tr>";

                                echo "<tr class='row'>
                                <td class='item'>Data Analysis / Big Data</td>";
                                if ($x[11]==='0')
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='0'  type='radio'></td>";
                                if($x[11]==='1')
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='1' type='radio'></td>";
                                if($x[11]==='2')
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='2' type='radio'></td>";
                                if($x[11]==='3')
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='3' type='radio'checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='3' type='radio'></td>";
                                if($x[11]==='4')
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='4' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Data' value='4' type='radio'></td>";
                                echo "</tr>


                            </tbody>
                        </table>
                    </div>
                </div>";

                echo "            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='6'>What is your level of interest for internship in the following fields? Check each row once</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item'></td>

                                <td class='item'>Not at all Interest</td>

                                <td class='item'>A little Interest</td>

                                <td class='item'>Moderately Interest</td>

                                <td class='item'>Very Interest</td>

                                <td class='item'>Extermely Interest</td>
                            </tr>";

                            $student_id=$_GET['student_id'];
                            require 'connection.php';
                            $str="select * from special_area where student_id='$student_id'";
                            $result=mysqli_query($con, $str);
                            $row=mysqli_fetch_array($result);
                            $x=$row[2];


                            echo "<tr class='row'>
                            <td class='item alter'>Systems Programming</td>";
                            if ($x[0]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='0'  type='radio'></td>";
                            if($x[0]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='1' type='radio'></td>";
                            if($x[0]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='2' type='radio'></td>";
                            if($x[0]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='3' type='radio'></td>";
                            if($x[0]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsProgramming' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Applications Programming</td>";
                            if ($x[1]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='0'  type='radio'></td>";
                            if($x[1]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='1' type='radio'></td>";
                            if($x[1]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='2' type='radio'></td>";
                            if($x[1]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='3' type='radio'></td>";
                            if($x[1]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iApplicationsProgramming' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Web Development</td>";
                            if ($x[2]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='0'  type='radio'></td>";
                            if($x[2]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='1' type='radio'></td>";
                            if($x[2]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='2' type='radio'></td>";
                            if($x[2]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='3' type='radio'></td>";
                            if($x[2]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iWebDevelopment' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Mobile Development</td>";
                            if ($x[3]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='0'  type='radio'></td>";
                            if($x[3]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='1' type='radio'></td>";
                            if($x[3]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='2' type='radio'></td>";
                            if($x[3]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='3' type='radio'></td>";
                            if($x[3]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iMobileDevelopment' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Games Development</td>";
                            if ($x[4]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='0'  type='radio'></td>";
                            if($x[4]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='1' type='radio'></td>";
                            if($x[4]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='2' type='radio'></td>";
                            if($x[4]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='3' type='radio'></td>";
                            if($x[4]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iGamesDevelopment' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Software Testing</td>";
                            if ($x[5]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='0'  type='radio'></td>";
                            if($x[5]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='1' type='radio'></td>";
                            if($x[5]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='2' type='radio'></td>";
                            if($x[5]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='3' type='radio'></td>";
                            if($x[5]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iSoftwareTesting' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Systems Analysis</td>";
                            if ($x[6]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='0'  type='radio'></td>";
                            if($x[6]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='1' type='radio'></td>";
                            if($x[6]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='2' type='radio'></td>";
                            if($x[6]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='3' type='radio'></td>";
                            if($x[6]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemsAnalysis' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Databases</td>";
                            if ($x[7]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='0'  type='radio'></td>";
                            if($x[7]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='1' type='radio'></td>";
                            if($x[7]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='2' type='radio'></td>";
                            if($x[7]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='3' type='radio'></td>";
                            if($x[7]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iDatabases' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>System Administration</td>";
                            if ($x[8]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='0'  type='radio'></td>";
                            if($x[8]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='1' type='radio'></td>";
                            if($x[8]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='2' type='radio'></td>";
                            if($x[8]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='3' type='radio'></td>";
                            if($x[8]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iSystemAdministration' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Networking</td>";
                            if ($x[9]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='0'  type='radio'></td>";
                            if($x[9]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='1' type='radio'></td>";
                            if($x[9]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='2' type='radio'></td>";
                            if($x[9]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='3' type='radio'></td>";
                            if($x[9]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iNetworking' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item alter'>Project Management</td>";
                            if ($x[10]==='0')
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='0'  type='radio'></td>";
                            if($x[10]==='1')
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='1' type='radio'></td>";
                            if($x[10]==='2')
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='2' type='radio'></td>";
                            if($x[10]==='3')
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='3' type='radio'></td>";
                            if($x[10]==='4')
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='iProjectManagement' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "<tr class='row'>
                            <td class='item'>Data Analysis / Big Data</td>";
                            if ($x[11]==='0')
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='0'  type='radio'></td>";
                            if($x[11]==='1')
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='1' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='1' type='radio'></td>";
                            if($x[11]==='2')
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='2' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='2' type='radio'></td>";
                            if($x[11]==='3')
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='3' type='radio'checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='3' type='radio'></td>";
                            if($x[11]==='4')
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='4' type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='iData' value='4' type='radio'></td>";
                            echo "</tr>";

                            echo "
                        </tbody>
                    </table>
                </div>
            </div>

            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='7'>What is your knowledge level of these languages?Check each row once</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='row'>
                                <td class='item'></td>

                                <td class='item'></td>

                                <td class='item'>None</td>

                                <td class='item'>Basic</td>

                                <td class='item'>Good</td>

                                <td class='item'>Fluent</td>

                                <td class='item'>Native</td>
                            </tr>";

                            $student_id=$_GET['student_id'];
                            require 'connection.php';
                            $str="select * from lang_english where student_id='$student_id'";
                            $result=mysqli_query($con, $str);
                            $row=mysqli_fetch_array($result);

                            echo "<tr class='row'>
                            <td class='item alter' rowspan='3'>English</td>
                            <td class='item alter'>Read</td>";
                            if ($row[1] === '0')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='0'  type='radio'></td>";

                            if ($row[1] === '1')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='1'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='1'  type='radio'></td>";

                            if ($row[1] === '2')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='2'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='2'  type='radio'></td>";

                            if ($row[1] === '3')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='3'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='3'  type='radio'></td>";

                            if ($row[1] === '4')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='4'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishRead' value='4'  type='radio'></td>";

                            echo "
                        </tr>

                        <tr class='row'>
                            <td class='item alter'>Write</td>";
                            if ($row[2] === '0')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='0'  type='radio'></td>";

                            if ($row[2] === '1')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='1'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='1'  type='radio'></td>";

                            if ($row[2] === '2')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='2'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='2'  type='radio'></td>";

                            if ($row[2] === '3')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='3'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='3'  type='radio'></td>";

                            if ($row[2] === '4')
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='4'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item alter'><input name='EnglishWrite' value='4'  type='radio'></td>";

                            echo "</tr>

                            <tr class='row'>
                                <td class='item alter'>Speak</td>";
                                if ($row[3] === '0')
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='0'  type='radio'></td>";

                                if ($row[3] === '1')
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='1'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='1'  type='radio'></td>";

                                if ($row[3] === '2')
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='2'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='2'  type='radio'></td>";

                                if ($row[3] === '3')
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='3'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='3'  type='radio'></td>";

                                if ($row[3] === '4')
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='4'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='EnglishSpeak' value='4'  type='radio'></td>";
                                echo "
                            </tr>";

                            $student_id=$_GET['student_id'];
                            require 'connection.php';
                            $str="select * from lang_french where student_id='$student_id'";
                            $result=mysqli_query($con, $str);
                            $row=mysqli_fetch_array($result);

                            echo "<tr class='row'>
                            <td class='item' rowspan='3'>French</td>
                            <td class='item'>Read</td>";
                            if ($row[1] === '0')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='0'  type='radio'></td>";

                            if ($row[1] === '1')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='1'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='1'  type='radio'></td>";

                            if ($row[1] === '2')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='2'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='2'  type='radio'></td>";

                            if ($row[1] === '3')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='3'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='3'  type='radio'></td>";

                            if ($row[1] === '4')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='4'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchRead' value='4'  type='radio'></td>";

                            echo "
                        </tr>

                        <tr class='row'>
                            <td class='item'>Write</td>";
                            if ($row[2] === '0')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='0'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='0'  type='radio'></td>";

                            if ($row[2] === '1')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='1'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='1'  type='radio'></td>";

                            if ($row[2] === '2')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='2'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='2'  type='radio'></td>";

                            if ($row[2] === '3')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='3'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='3'  type='radio'></td>";

                            if ($row[2] === '4')
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='4'  type='radio' checked></td>";
                            else
                                echo "<td onclick='z(this)' class='item'><input name='FrenchWrite' value='4'  type='radio'></td>";

                            echo "</tr>

                            <tr class='row'>
                                <td class='item'>Speak</td>";
                                if ($row[3] === '0')
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='0'  type='radio'></td>";

                                if ($row[3] === '1')
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='1'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='1'  type='radio'></td>";

                                if ($row[3] === '2')
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='2'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='2'  type='radio'></td>";

                                if ($row[3] === '3')
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='3'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='3'  type='radio'></td>";

                                if ($row[3] === '4')
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='4'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='FrenchSpeak' value='4'  type='radio'></td>";
                                echo "
                            </tr>";
                            echo "
                            <tr class='row'>
                                <td class='item alter' rowspan='3'>Other-Specify</td>
                                <td class='item alter'>Read</td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyRead' value='0'  type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyRead' value='1' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyRead' value='2' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyRead' value='3' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyRead' value='4' type='radio'></td>

                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Write</td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyWrite' value='0'  type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyWrite' value='1' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyWrite' value='2' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyWrite' value='3' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifyWrite' value='4' type='radio'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Speak</td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifySpeak' value='0'  type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifySpeak' value='1' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifySpeak' value='2' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifySpeak' value='3' type='radio'></td>
                                <td onclick='z(this)' class='item alter'><input name='SpecifySpeak' value='4' type='radio'></td>
                            </tr>
                        </tbody>";
                        ?>

                    </table>
                </div>
            </div>

            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='4'>What is your preferred location of internship?(Check each row once)</th>
                            </tr>
                        </thead>
                        <?php
                        $student_id=$_GET['student_id'];
                        require 'connection.php';
                        $str="select * from internship_loc where student_id='$student_id'";
                        $result=mysqli_query($con, $str);
                        $row=mysqli_fetch_array($result);
                        $x=$row[3];
                        echo "
                        <tbody>
                            <tr class='row'>
                                <td class='item'></td>

                                <td class='item'>Not at all Preferred</td>

                                <td class='item'>A little Preferred</td>

                                <td class='item'>Extermely Preferred</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Essex/Windsor</td>
                                ";
                                if ($x[0] ==="0")
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='0'  type='radio'></td>";
                                if ($x[0] ==="1")
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='1' type='radio'></td>";
                                if ($x[0] ==="2")
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item alter'><input name='Essex/Windsor' value='2' type='radio'></td>";

                                echo "
                            </tr>

                            <tr class='row'>
                                <td class='item'>Toronto</td>";
                                if ($x[1] ==="0")
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='0'  type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='0'  type='radio'></td>";
                                if ($x[1] ==="1")
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='1' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='1' type='radio'></td>";
                                if ($x[1] ==="2")
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='2' type='radio' checked></td>";
                                else
                                    echo "<td onclick='z(this)' class='item'><input name='Toronto' value='2' type='radio'></td>";


                                echo "</tr>

                                <tr class='row'>
                                    <td class='item alter'>GTA</td>";
                                    if ($x[2] ==="0")
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='0'  type='radio' checked></td>";
                                    else
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='0'  type='radio'></td>";
                                    if ($x[2] ==="1")
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='1' type='radio' checked></td>";
                                    else
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='1' type='radio'></td>";
                                    if ($x[2] ==="2")
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='2' type='radio' checked></td>";
                                    else
                                        echo "<td onclick='z(this)' class='item alter'><input name='GTA' value='2' type='radio'></td>";

                                    echo "</tr>

                                    <tr class='row'>
                                        <td class='item'>Hamilton</td>";
                                        if ($x[3] ==="0")
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='0'  type='radio' checked></td>";
                                        else
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='0'  type='radio'></td>";
                                        if ($x[3] ==="1")
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='1' type='radio' checked></td>";
                                        else
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='1' type='radio'></td>";
                                        if ($x[3] ==="2")
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='2' type='radio' checked></td>";
                                        else
                                            echo "<td onclick='z(this)' class='item'><input name='Hamilton' value='2' type='radio'></td>";


                                        echo "</tr>

                                        <tr class='row'>
                                            <td class='item alter'>London</td>";
                                            if ($x[4] ==="0")
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='0'  type='radio' checked></td>";
                                            else
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='0'  type='radio'></td>";
                                            if ($x[4] ==="1")
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='1' type='radio' checked></td>";
                                            else
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='1' type='radio'></td>";
                                            if ($x[4] ==="2")
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='2' type='radio' checked></td>";
                                            else
                                                echo "<td onclick='z(this)' class='item alter'><input name='London' value='2' type='radio'></td>";

                                            echo "</tr>

                                            <tr class='row'>
                                                <td class='item'>Ottawa</td>";
                                                if ($x[5] ==="0")
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='0'  type='radio' checked></td>";
                                                else
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='0'  type='radio'></td>";
                                                if ($x[5] ==="1")
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='1' type='radio' checked></td>";
                                                else
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='1' type='radio'></td>";
                                                if ($x[5] ==="2")
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='2' type='radio' checked></td>";
                                                else
                                                    echo "<td onclick='z(this)' class='item'><input name='Ottawa' value='2' type='radio'></td>";
                                                echo "</tr>

                                                <tr class='row'>
                                                    <td class='item alter'>Waterloo/Kitchener</td>";

                                                    if ($x[6] ==="0")
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='0'  type='radio' checked></td>";
                                                    else
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='0'  type='radio'></td>";
                                                    if ($x[6] ==="1")
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='1' type='radio' checked></td>";
                                                    else
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='1' type='radio'></td>";
                                                    if ($x[6] ==="2")
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='2' type='radio' checked></td>";
                                                    else
                                                        echo "<td onclick='z(this)' class='item alter'><input name='Waterloo/Kitchener' value='2' type='radio'></td>";
                                                    echo "</tr>

                                                    <tr class='row'>
                                                        <td class='item'>Anywhere in Ontario</td>";
                                                        if ($x[7] ==="0")
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='0'  type='radio' checked></td>";
                                                        else
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='0'  type='radio'></td>";
                                                        if ($x[7] ==="1")
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='1' type='radio' checked></td>";
                                                        else
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='1' type='radio'></td>";
                                                        if ($x[7] ==="2")
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='2' type='radio' checked></td>";
                                                        else
                                                            echo "<td onclick='z(this)' class='item'><input name='Ontario' value='2' type='radio'></td>";
                                                        echo "</tr>

                                                        <tr class='row'>
                                                            <td class='item alter'>Anywhere in Canada</td>";
                                                            if ($x[8] ==="0")
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='0'  type='radio' checked></td>";
                                                            else
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='0'  type='radio'></td>";
                                                            if ($x[8] ==="1")
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='1' type='radio' checked></td>";
                                                            else
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='1' type='radio'></td>";
                                                            if ($x[8] ==="2")
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='2' type='radio' checked></td>";
                                                            else
                                                                echo "<td onclick='z(this)' class='item alter'><input name='Canada' value='2' type='radio'></td>";
                                                            echo "
                                                        </tr>
                                                    </tbody>
                                                    ";
                                                    echo "
                                                </table>
                                            </div>
                                        </div>
                                        <div style='padding-left:75%;'>
                                            <input type='submit' name='submit' value='Submit' class='edit-button' style='float:left;line-height:40px;width:80px;'>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </body>
                        </html>";

                        if(isset($_GET['submit'])) {
                            require "connection.php";

                            /* inserting into student_details */
                            $str_student_details="update student_details set first_name='".$_GET['first_name']."', middle_name='".$_GET['middle_name']."', last_name='".$_GET['last_name']."', email='".$_GET['email']."', telephone='".$_GET['telephone']."', status='".$_GET['status']."', sem_reg='".$_GET['sem_reg']."' where student_id='".$_GET['student_id']."'";
    // echo "<p style='background:yellow;'>STUDENT DETAILS</p>";
    // echo $str_student_details;
                            mysqli_query($con, $str_student_details);

                            /* inserting into edu_training */
                            $str_edu_training="update edu_training set  degree='".$_GET['degree']."', major='".$_GET['major']."', gpa='".$_GET['gpa']."', university='".$_GET['university']."', country='".$_GET['country']."', duration='".$_GET['duration']."' where student_id='".$_GET['student_id']."' ";
    // echo "<p style='background:yellow;'>EDUCATION TRAINING</p>";
    // echo $str_edu_training;
                            mysqli_query($con, $str_edu_training);

                            /* inserting into work_experience */
                            $str_work_experience="update work_experience set  company_name='".$_GET['company_name']."', start_date='".$_GET['start_date']."', end_date='".$_GET['end_date']."', title='".$_GET['title']."', duties='".$_GET['duties']."' where student_id='".$_GET['student_id']."'";
    // echo "<p style='background:yellow;'>WORK EXPERIENCE</p>";
    // echo $str_work_experience;
                            mysqli_query($con, $str_work_experience);

                            /* inserting into knowledge_skill */
                            $lang='default';
                            $opt_code=$_GET['aspnet'].$_GET['c'].$_GET['cpp'].$_GET['csharp'].$_GET['coldfusion'].$_GET['flex'].$_GET['java'].$_GET['javascript'].$_GET['lisp'].$_GET['matlab'].$_GET['mysql'].$_GET['pascal'].$_GET['perl'].$_GET['php'].$_GET['prolog'].$_GET['python'].$_GET['r'].$_GET['ruby'].$_GET['sqloracle'].$_GET['tcl'].$_GET['tsql'].$_GET['vbnet'];
                            $str_knowledge_skill="update knowledge_skill set  lang='".$_GET['lang']."', opt_code='".$opt_code."' where student_id='".$_GET['student_id']."'";
    // echo "<p style='background:yellow;'>KNOWLEDGE AND SKILLS</p>";
    // echo $opt_code;
    // echo $str_knowledge_skill;
                            mysqli_query($con, $str_knowledge_skill);

                            /* inserting into cms_area */
                            $cms_name='default';
                            $cms_code=$_GET['Concrete5'].''.$_GET['DotNetNuke'].''.$_GET['Drupal'].''.$_GET['Joomla'].''.$_GET['Wordpress'].''.$_GET['Others'];
    // echo $cms_code;
                            $str_cms_area="update cms_area set cms_name='".$cms_name."', cms_code='".$cms_code."' where student_id='".$_GET['student_id']."'";
    // echo $str_cms_area;
                            mysqli_query($con, $str_cms_area);

                            /* inserting into os */
                            $os_name='default';
                            $os_code=$_GET['Andriod'].''.$_GET['ChromiumOS'].''.$_GET['GoogleChromeOS'].''.$_GET['iOS'].''.$_GET['Linux'].''.$_GET['MACOS'].''.$_GET['UNIX'].''.$_GET['Windows7'].''.$_GET['Windows8'].''.$_GET['WindowsAzure'].''.$_GET['WindowsPhone8'];

                            $str_os="update os set os_name='".$os_name."', os_code='".$os_code."' where student_id='".$_GET['student_id']."'";
    // echo $str_os;
                            mysqli_query($con, $str_os);

                            /* inserting into special_area */
                            $special_code=$_GET['SystemsProgramming'].''.$_GET['ApplicationsProgramming'].''.$_GET['WebDevelopment'].''.$_GET['MobileDevelopment'].''.$_GET['GamesDevelopment'].''.$_GET['SoftwareTesting'].''.$_GET['SystemsAnalysis'].''.$_GET['Databases'].''.$_GET['SystemAdministration'].''.$_GET['Networking'].''.$_GET['ProjectManagement'].''.$_GET['Data'];
                            $interest_code=$_GET['iSystemsProgramming'].''.$_GET['iApplicationsProgramming'].''.$_GET['iWebDevelopment'].''.$_GET['iMobileDevelopment'].''.$_GET['iGamesDevelopment'].''.$_GET['iSoftwareTesting'].''.$_GET['iSystemsAnalysis'].''.$_GET['iDatabases'].''.$_GET['iSystemAdministration'].''.$_GET['iNetworking'].''.$_GET['iProjectManagement'].''.$_GET['iData'];
    // echo $special_code;
                            $str_special_area="update special_area set special_code='".$special_code."', interest_code='".$interest_code."' where student_id='".$_GET['student_id']."'";
    // echo $str_special_area;
                            mysqli_query($con, $str_special_area);

                            /* inserting into lang_english */
                            $str_lang_english="update lang_english set read_code='".$_GET[EnglishRead]."', write_code='".$_GET[EnglishWrite]."', speak_code='".$_GET[EnglishSpeak]."' where student_id='".$_GET['student_id']."'";
    // echo $str_lang_english;
                            mysqli_query($con, $str_lang_english);

                            /* inserting into lang_french */
                            $str_lang_french="update lang_french set  read_code='".$_GET[FrenchRead]."', write_code='".$_GET[FrenchWrite]."', speak_code='".$_GET[FrenchSpeak]."' where student_id='".$_GET['student_id']."'";
    // echo $str_lang_french;
                            mysqli_query($con, $str_lang_french);

                            /* inserting into internship_loc */
                            $loc_name='default';
                            $loc_code=$_GET['EssexWindsor'].''.$_GET['Toronto'].''.$_GET['GTA'].''.$_GET['Hamilton'].''.$_GET['London'].''.$_GET['Ottawa'].''.$_GET['WaterlooKitchener'].''.$_GET['Ontario'].''.$_GET['Canada'];
    // echo $loc_code;
                            $str_internship_loc="update internship_loc set loc_name='".$loc_name."', loc_code'".$loc_code."' where student_id='".$_GET['student_id']."'";
    // echo $str_internship_loc;
                            mysqli_query($con, $str_internship_loc);

                            header('location:show_student.php');
                        }
                        ?>
