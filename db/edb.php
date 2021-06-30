<?php 
$con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
session_start();
          

          $select_query = "SELECT * FROM course_details";
          $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

          $query = "SELECT * FROM course_details";
          $query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

          $select_exam = "SELECT * FROM exam_type";
          $exam_put = mysqli_query($con, $select_exam) or die(mysqli_error($con));

          
          
          
        

?>