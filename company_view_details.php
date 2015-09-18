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
        /*        input {
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

        <div id='right'>";

            $id=$_GET['id'];
            require 'connection.php';
            $str="select * from company_details where id='$id'";
            $result=mysqli_query($con, $str);
            $row=mysqli_fetch_array($result);
            echo "
            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='3'>COMPANY INFORMATION</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item alter'>ID</td>

                                <td class='item alter'>$row[0]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>Company Name</td>

                                <td class='item'>$row[1]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Adress</td>

                                <td class='item alter'>$row[2]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>City</td>

                                <td class='item'>$row[3]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Postal Code</td>

                                <td class='item alter'>$row[4]</td>
                            </tr>
                            <tr class='row'>
                                <td class='item'>Country</td>

                                <td class='item'>$row[5]</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='3'>PERSON TO CONTACT INFORMATION</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item'>First Name</td>

                                <td class='item'>$row[6]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Last Name</td>

                                <td class='item alter'>$row[7]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>Position</td>

                                <td class='item'>$row[8]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Telephone</td>

                                <td class='item alter'>$row[9]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item'>Email</td>

                                <td class='item'>$row[10]</td>
                            </tr>

                            <tr class='row'>
                                <td class='item alter'>Fax</td>

                                <td class='item alter'>$row[11]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class='table_container'>
                <div class='sub-table-container'>
                    <table class='tc'>
                        <thead>
                            <tr>
                                <th class='tpl-bar-breadcrumbs' colspan='3'>STAFF TO CONTACT</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='row'>
                                <td class='item alter'>Staff/Faculty ID</td>

                                <td class='item alter'>$row[12]
                                </td>
                            </tr>
                            <tr class='row'>
                                <td class='item alter'>Notes</td>

                                <td class='item alter'>$row[13]
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            ";

            echo "<div style='padding-left:75%;'>
            <a href='show_company.php'><button class='edit-button' style='float:left;line-height:40px;width:80px;visibility:visible;'>Back</button></a>
        </div>

    </div>
</div>
</body>
</html>";
?>
