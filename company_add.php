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
                                    <th class='tpl-bar-breadcrumbs' colspan='3'>COMPANY INFORMATION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class='row'>
                                    <td class='item alter'>ID</td>

                                    <td class='item alter'><input name='id' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Company Name</td>

                                    <td class='item'><input name='co_name' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Adress Line 1</td>

                                    <td class='item alter'><input name='address_line1' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Address Line 2</td>

                                    <td class='item'><input name='address_line2' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>City</td>

                                    <td class='item alter'><input name='city' type='text' required value='Windsor'></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Postal Code</td>

                                    <td class='item'><input name='postal_code' placeholder='' type='text' required value=''></td>
                                </tr>
                                <tr class='row'>
                                    <td class='item alter'>Country</td>

                                    <td class='item alter'><input name='country' type='text' required value='Canada'></td>
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

                                    <td class='item'><input name='c_first_name' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Last Name</td>

                                    <td class='item alter'><input name='c_last_name' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Position</td>

                                    <td class='item'><input name='c_position' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Telephone</td>

                                    <td class='item alter'><input name='telephone' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item'>Email</td>

                                    <td class='item'><input name='email' placeholder='' type='text' required value=''></td>
                                </tr>

                                <tr class='row'>
                                    <td class='item alter'>Fax</td>

                                    <td class='item alter'><input name='fax' placeholder='' type='text' required value=''></td>
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
                                    <td class='item alter'>Select Staff ID</td>

                                    <td class='item alter'><input type='text' required name='faculty_id' value='' placeholder=''>
                                    </td>
                                </tr>
                                <tr class='row'>
                                    <td class='item alter'>Notes</td>
                                    <td class='item alter'><input type='text' required name='notes' value='' placeholder=''>
                                    </td>
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
            $address = $_GET['address_line1'].", ".$_GET['address_line2'];
            $str="insert into company_details values('".$_GET['id']."', '".$_GET['co_name']."', '".$address."', '".$_GET['city']."',  '".$_GET['postal_code']."', '".$_GET['country']."', '".$_GET['c_first_name']."', '".$_GET['c_last_name']."', '".$_GET['c_position']."', '".$_GET['telephone']."', '".$_GET['email']."', '".$_GET['fax']."', '".$_GET['faculty_id']."', '".$_GET['notes']."');";
    // echo $str;
            mysqli_query($con, $str);
            header('location:show_company.php');
        }
        ?>
