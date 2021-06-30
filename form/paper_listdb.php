<?php
    require "../db/condb.php";
    $batch_id = $_POST['batch_id'];
    $question_paper_name = mysqli_real_escape_string($con, $_POST['question_paper_name']);
    $section_unit = mysqli_real_escape_string($con, $_POST['section_unit']);
    $exam_type = mysqli_real_escape_string($con, $_POST['exam_type']);
    $sub_exam = mysqli_real_escape_string($con, $_POST['sub_exam']);
    $exam_date = $_POST['exam_date'];
    $total_marks = $_POST['total_marks'];
    $paper_time = $_POST['paper_time'];
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $user_regisstration_query = "INSERT INTO que_paper_list (`id`, `batch_id`, `question_paper_name`, `section_unit`, `exam_type`, `sub_exam`, `exam_date`, `total_marks`, `paper_time`, `description`) VALUES (NULL, '$batch_id', '$question_paper_name', '$section_unit', '$exam_type', '$sub_exam', '$exam_date', '$total_marks', '$paper_time',  '$description')";
    $user_regisstration_submit = mysqli_query($con, $user_regisstration_query) or die(mysqli_error($con));


    // if(isset($_POST['proceed_btn']))
    // {
    //     header("location:../testlist.php");

    // }

    header("location:../testlist.php");
    
?>