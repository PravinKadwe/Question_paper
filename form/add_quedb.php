<?php

    $con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
    $test_id = $_POST['test_id'];
    $question_type = $_POST['question_type'];
    $add_que = strip_tags($_POST['add_que']);
    $max_marks = $_POST['max_marks'];
    $que_no = $_POST['que_no'];
    $difficulty_level = $_POST['difficulty_level'];
    $section = $_POST['section'];
    $co_mapping = $_POST['co_mapping'];
   
    $select_insert_query = "INSERT INTO `questions_set` (`id`, `test_id`, `question_type`, `questions`, `answer`, `max_marks`, `que_no`, `difficulty_level`, `section`, `co_mapping`) VALUES (NULL, '$test_id', '$question_type', '$add_que', NULL, '$max_marks', '$que_no', '$difficulty_level', '$section', '$co_mapping')";
    $select_outcome_result = mysqli_query($con, $select_insert_query);


    if(isset($select_outcome_result))
    {
        if(isset($_POST['nextbtn']))
        {
        header("location:../testlist.php");
     }else{
        header("location:reload_que.php");
        }
    }
    
    

?>






