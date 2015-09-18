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
                    </a><a href='company_student_selected.php' >
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
                                    <th class='tpl-bar-breadcrumbs' colspan='3'>Edit Job Details</th>
                                </tr>
                            </thead>";

                            $job_id=$_GET['job_id'];
                            require 'connection.php';
                            $str_p="select * from job_db where job_id='$job_id'";
                            $result_p=mysqli_query($con, $str_p);
                            $row_p=mysqli_fetch_array($result_p);

                            echo "<tbody>
                            <tr class='row'>
                                <td class='item alter'>Job ID</td>

                                <td class='item alter'><input name='job_id' type='text' required value='$row_p[0]'></td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>Company ID</td>

                                <td class='item'><select name='company_id' >";
                                    require "connection.php";
                                    $str1='select * from company_details';
                                    $result1=mysqli_query($con, $str1);
                                    while ($row1=mysqli_fetch_array($result1)) {
                                        if($row_p[1] == $row1[0])
                                            echo "<option value=".$row1[0]." selected >".$row1[0]."</option>";
                                        else
                                            echo "<option value=".$row1[0].">".$row1[0]."</option>";
                                    }
                                    echo "</select></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Position(s)</td>

                                    <td class='item alter'><input name='position' type='text' required value='$row_p[2]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Description</td>

                                    <td class='item'><input name='description' type='text' required value='$row_p[3]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Responsibilties</td>

                                    <td class='item alter'><input name='responsibilities' type='text' required value='$row_p[4]'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Requirements</td>
                                    <td class='item'><input name='requirements' type='text' required value='$row_p[5]'></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div style='padding-left:75%;'>
                    <input type='submit' name='submit' value='Submit' class='edit-button' style='float:left;line-height:40px;width:80px;'>
                </div>
            </form>
        </div></div></body>
        </html>";

        if(isset($_GET['submit'])) {
            require "connection.php";
            $str="update job_db set company_id='".$_GET['company_id']."', position='".$_GET['position']."',  description='".$_GET['description']."', responsibilities='".$_GET['responsibilities']."', requirements='".$_GET['requirements']."' where job_id='".$_GET['job_id']."';";
    // echo $str;
            mysqli_query($con, $str);
            header('location:job_opening_show.php');
        }
        ?>
