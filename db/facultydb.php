<?php
$con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
session_start();


if(isset($_POST['proceed_btn']))
                {
                    $_SESSION['year'] = $_POST['academic_year'];
                    $_SESSION['cls'] = $_REQUEST['class'];
                    $_SESSION['dev'] = $_POST['division'];
                    $_SESSION['costil'] = $_POST['course_title'];
                    $_SESSION['exmtyp'] = $_REQUEST['exam_type'];
                    $_SESSION['subexm'] = $_REQUEST['sub_exams'];

                    header("location:../faculty/excel.php");
                }


                
?>


