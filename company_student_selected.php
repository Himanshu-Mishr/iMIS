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
                        <div class='menu menu-item' id='faculty_tc' style='box-shadow: inset 0px 1px 3px rgba(0,0,0,0.2), inset 0 0 3px rgba(0,0,0,0.05);
                    color: #212121;
                    margin-top: -1px;
                    padding-top: 13px;
                    background: rgba(0,0,0,0.06);'>
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
                                    <th class='tpl-bar-breadcrumbs' colspan='2'>SELECT COMPANY</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class='row'>
                                    <td class='item'>Company Name</td>
                                    <td class='item'><select name='company_id' onchange='x(this)'>
                                        <option value='' > select </option>";
                                        require "connection.php";
                                        $str1='select * from company_details';
                                        $result1=mysqli_query($con, $str1);
                                        while ($row1=mysqli_fetch_array($result1)) {
                                            echo "<option value=".$row1[0].">".$row1[1]."</option>";
                                        }
                                        echo "</select></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>";
                if(isset($_GET['company_id'])) {
                    require "connection.php";
                    $company_id=$_GET['company_id'];
                    echo "<div class='table_container'>
                    <div class='sub-table-container' >

                        <table class='tc' >
                            <thead>
                                <tr>
                                    <th class='tpl-bar-breadcrumbs' colspan='7'>List of student selected for : $company_id
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='row'>
                                    <td class='item'>Student ID</td>
                                    <td class='item'>First Name</td>
                                    <td class='item'>Middle Name</td>
                                    <td class='item'>Last Name</td>
                                    <td class='item'>Email</td>
                                    <td class='item'>Job Position</td>
                                    <td class='item'>Status</td>
                                </tr>";

                                require "connection.php";

                                // $str="select student_details.* from student_details where student_id in ( select status_db.student_id from status_db where job_id in (select job_id from job_db where company_id='$company_id') and (status='Hired' or status='Rejected'));";
                                $str = "Select a.student_id, a.first_name, a.middle_name, a.last_name, a.email, (select description from job_db where job_id=b.job_id) as description, b.status from student_details a, status_db b where a.student_id=b.student_id and b.job_id in (SELECT job_id FROM `job_db` WHERE company_id='$company_id');";
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
                                        <td class='item alter'>$row[6]</td>
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
                                    <td class='item'>$row[6]</td>
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
