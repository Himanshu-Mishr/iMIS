<?php
include("err.php");
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header('location:index.php');
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
<script type='text/javascript' language='javascript'>

    function x(sel) {
        sel.form.submit();
    }
</script>

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
                        <div class='menu menu-item' id='faculty_tc' style='box-shadow: inset 0px 1px 3px rgba(0,0,0,0.2), inset 0 0 3px rgba(0,0,0,0.05);
                        color: #212121;
                        margin-top: -1px;
                        padding-top: 13px;
                        background: rgba(0,0,0,0.06);'>
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
        <form action='' method='get' accept-charset='utf-8'>
            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='2'>SELECT STUDENT</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item'>Student ID</td>
                                <td class='item'><select name='student_id' onchange='x(this)'>
                                    <option value='' > select </option>";
                                    require "connection.php";
                                    $str1='select * from student_details';
                                    $result1=mysqli_query($con, $str1);
                                    while ($row1=mysqli_fetch_array($result1)) {
                                        echo "<option value=".$row1[0].">".$row1[0]."</option>";
                                    }
                                    echo "</select></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </form>";
            if(isset($_GET['student_id'])) {
                require "connection.php";
                $student_id=$_GET['student_id'];
                echo "<div class='table_container'>
                <div class='sub-table-container' >

                    <table class='tc' >
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='7'>Edit Status of Student ID : $student_id
                                </th>
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
                            $str="select job_db.* from job_db,status_db where student_id='$student_id' and status_db.job_id=job_db.job_id;";
                            $result=mysqli_query($con, $str);
                            $x=1;
                            while($row=mysqli_fetch_array($result)) {
                                if($x==1) {
                                    $x=0;
                                    echo "<tr   class='row'>
                                    <td class='item alter'>$row[0]</td>
                                    <td class='item alter'>$row[1]</td>
                                    <td class='item alter'>$row[2]</td>
                                    <td class='item alter'>$row[3]</td>
                                    <td class='item alter'>$row[4]</td>
                                    <td class='item alter'>$row[5]</td>
                                    <td onclick='z(this)' class='item alter'><a href='prospect_manipulate.php?student_id=$student_id&job_id=$row[0]&status=delete'' style='font-size:20px'><b>✓</b></a></td>
                                </tr>";

                            }
                            else {
                                $x=1;
                                echo "<tr   class='row'>
                                <td class='item'>$row[0]</td>
                                <td class='item'>$row[1]</td>
                                <td class='item'>$row[2]</td>
                                <td class='item'>$row[3]</td>
                                <td class='item'>$row[4]</td>
                                <td class='item'>$row[5]</td>
                                <td onclick='z(this)' class='item'><a href='prospect_manipulate.php?student_id=$student_id&job_id=$row[0]&status=delete' style='font-size:20px'><b>✓</b></a></td>
                                ";
                            }

                        }
                        require "connection.php";
                        $str="select job_db.* from job_db where job_id not in ( select job_id from status_db where student_id='$student_id');";
                        $result=mysqli_query($con, $str);

                        while($row=mysqli_fetch_array($result)) {
                            if($x==1) {
                                $x=0;
                                echo "<tr   class='row'>
                                <td class='item alter'>$row[0]</td>
                                <td class='item alter'>$row[1]</td>
                                <td class='item alter'>$row[2]</td>
                                <td class='item alter'>$row[3]</td>
                                <td class='item alter'>$row[4]</td>
                                <td class='item alter'>$row[5]</td>
                                <td onclick='z(this)' class='item alter'><a href='prospect_manipulate.php?student_id=$student_id&job_id=$row[0]&status=add' style='font-size:20px'><b>□</b></td>
                            </tr>";

                        }
                        else {
                            $x=1;
                            echo "<tr   class='row'>
                            <td class='item'>$row[0]</td>
                            <td class='item'>$row[1]</td>
                            <td class='item'>$row[2]</td>
                            <td class='item'>$row[3]</td>
                            <td class='item'>$row[4]</td>
                            <td class='item'>$row[5]</td>
                            <td onclick='z(this)' class='item'><a href='prospect_manipulate.php?student_id=$student_id&job_id=$row[0]&status=add' style='font-size:20px'><b>□</b></td>
                            ";
                        }

                    }

                    echo "
                </tr>
            </tbody>
        </table>
    </div>
</div>";
}
?>
</div>
</div>
</body>
</html>
