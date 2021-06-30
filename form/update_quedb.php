<?php

    $con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
    $id = $_POST['id'];
    $test_id = $_POST['test_id'];
    $question_type = $_POST['question_type'];
    $questions = strip_tags($_POST['questions']);
    $max_marks = $_POST['max_marks'];
    $que_no = $_POST['que_no'];
    $difficulty_level = $_POST['difficulty_level'];
    $section = $_POST['section'];
    $co_mapping = $_POST['co_mapping'];
    $user_regisstration_query = "DELETE FROM questions_set WHERE id = '$id'";
    $user_regisstration_submit = mysqli_query($con, $user_regisstration_query) or die(mysqli_error($con));
    $select_insert_query = "INSERT INTO `questions_set` (`id`, `test_id`, `question_type`, `questions`, `answer`, `max_marks`, `que_no`, `difficulty_level`, `section`, `co_mapping`) VALUES ('$id', '$test_id', '$question_type', '$questions', NULL, '$max_marks', '$que_no', '$difficulty_level', '$section', '$co_mapping')";
    $select_outcome_result = mysqli_query($con, $select_insert_query);


    if(isset($_POST['updbtn']))
    {
        header("location:../testlist.php");

    }
    
   
?>






