<?php
    $con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
    $course_code = $_POST['course_code'];
    $course_title = mysqli_real_escape_string($con, $_POST['course_title']);
    $course_credit = $_POST['course_credit'];
    $course_type = $_POST['course_type'];
    $class = $_POST['class'];
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $institution_name = mysqli_real_escape_string($con, $_POST['institution_name']);
    $semester = $_POST['semester'];
    $division = $_POST['division'];
    $batch = $_POST['batch'];
    $academic_year = $_POST['academic_year'];
    $image = $_POST['image'];
    
    $user_regisstration_query = "INSERT INTO `course_details` (`id`, `course_code`, `course_title`, `course_credit`, `course_type`, `department`, `institution_name`, `class`, `semester`, `division`, `batch`, `academic_year`, `image`) VALUES (NULL,'$course_code', '$course_title', '$course_credit', '$course_type', '$department', '$institution_name', '$class', '$semester', '$division', '$batch', '$academic_year', '$image')";
    $user_regisstration_submit = mysqli_query($con, $user_regisstration_query);
    
    if($user_regisstration_submit)
    {
        
        header("location:index.php");
    }
    else{
        die(mysqli_error($con));
    }
?>