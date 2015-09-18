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
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+sans+light|Open+sans+light'>
    <title>iMIS - Internship Management Information System</title>
    <link href='style_admin.css' rel='stylesheet'>
    <link href='table.css' rel='stylesheet'>
    <script type='text/javascript' language='javascript'>
        function z(oTD) {
            var el, i = 0;
            while (el = oTD.childNodes[i++])
                if (el.type == 'radio') el.checked = true;
        }
    </script>
    <style>
        body {
            font-family: 'open sans', 'Helvetica Neue', Helvetica, arial, sans-serif;
            background: #EDEFF0;
        }
        /* Move nav bar to top of page */
        /*#nav {

           position: absolute;
           top: 0;
       }
*/
       /* Move banner down below top nav bar */
       /*#main {
           position: relative;
           top: 30px;
       }
*/        /*input {
       width: 100%;
       height: 100%;
       border-collapse: collapse;
   }*/
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
            <form action='' method='GET' accept-charset='utf-8'>

                <div class='table_container'>
                    <div class='sub-table-container'>
                        <table class='tc'>
                            <thead>
                                <tr>
                                    <th class='tpl-bar-breadcrumbs' colspan='3'>Edit Student Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class='row'>
                                    <td class='item alter'>Prospect ID</td>";
                                    $c=uniqid();
                                    $code=substr($c, -5);

                                    echo "<td class='item alter'><input name='prospect_id' placeholder='$code' type='text' value='$code' readonly></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Student ID</td>
                                    <td class='item'><select name='student_id' >";
                                        require "connection.php";
                                        $str1='select * from student_details';
                                        $result1=mysqli_query($con, $str1);
                                        while ($row1=mysqli_fetch_array($result1)) {
                                            echo "<option value=".$row1[0].">".$row1[0]."</option>";
                                        }
                                        echo "</select></td>
                                    </tr>
                                    <tr class='row'>
                                        <td class='item alter'>Status</td>";
                                        echo "<td class='item alter'>
                                        <select name='status'>
                                            <option value='prospect' selected >Prospect</option>
                                            <option value='allotted' >Allotted</option>
                                        </select></td>
                                    </tr>


                                </tbody>
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
                                            <td class='item'>Select Job</td>
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
                                                <td onclick='z(this)' class='item alter'><input name='job_id' value='$row[0]' type='radio'></td>
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
                                            <td onclick='z(this)' class='item'><input name='job_id' value='$row[0]' type='radio'></td>
                                        </tr>";
                                    }

                                }
                                echo "

                            </tbody>
                        </table>
                    </div>
                </div>
                <div style='padding-left:75%;'>
                    <input type='submit' name='submit' value='Submit' class='edit-button' style='float:left;line-height:40px;width:80px;'>
                </div>


            </form>
        </div>
    </div></body>
    </html>";

    if(isset($_GET['submit'])) {
        require "connection.php";
        $str="insert into status_db values('".$_GET['prospect_id']."', '".$_GET['student_id']."', '".$_GET['job_id']."', '".$_GET['status']."');";
    // echo $str;
        mysqli_query($con, $str);
        header('location:job_opening_show.php');
    }
    ?>
