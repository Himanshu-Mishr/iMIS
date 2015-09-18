<!DOCTYPE html>

<html lang='en'>
<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+sans+light|Open+sans+light'>
    <title>iMIS - Internship Management Information System</title>
    <link href='style_admin.css' rel='stylesheet'>
    <link href='table.css' rel='stylesheet'>
        <script type="text/javascript" language="javascript">
        function z(oTD) {
            var el, i = 0;
            while (el = oTD.childNodes[i++])
                if (el.type == 'radio') el. = true;
        }
</script>
    <style>
body {
            font-family: 'open sans', "Helvetica Neue", Helvetica,, arial, sans-serif;
            background: #EDEFF0;
        }

    </style>
</head>

<body>
    <nav id='nav'>
        <ul>
            <li style='list-style: none; display: inline'>
                <div id='logo' style='font-weight: bold'>
                    iMIS
                </div>
        <li><a href='main.php'>Menu</a></li>
        <li><a href='show_student.php'>Student </a></li>
        <li><a href='show_company.php'>Company</a></li>
        <li><a href='show_faculty.php'>Faculties</a></li>
        <li><a href='#'>Others</a></li>
        <li align='right' ><a href='logout.php' style='color:red;'>logout</a></li>
        </ul>
    </nav>

    <div id='main'>
        <div id='left'>
            <div id='sidebar'>
                        <div class='menu'>
        <a href="main.php">
            <div class='menu menu-item' id='student_tc'>
                Main Menu
            </div>
        </a>
        <a href="show_student.php">
            <div class='menu menu-item' id='student_tc'>
                Show Student Record
            </div>
        </a>
        <a href="show_company.php">
            <div class='menu menu-item' id='company_tc'>
                Show Company Record
            </div>
        </a>
        <a href="show_faculty.php">
            <div class='menu menu-item' id='faculty_tc'>
                Show Faculty Record
            </div>
        </a>
            <div class='menu menu-item'>
                Sidebar Menu Option
            </div>

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
                                <th class='tpl-bar-breadcrumbs' colspan='7'>What is your preferred location of internship?(Check each row once)</th>
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
                            </tr>
<?php
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
?>
                        </tbody>
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
</html>
