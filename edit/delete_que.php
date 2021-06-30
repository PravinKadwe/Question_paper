<?php
    require "../db/condb.php";

    if(isset($_POST['det_btn']))
    {
        $id = $_POST['det_id'];
        
        $select_query = "DELETE FROM questions_set WHERE id = '$id'";
        $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
        

    }


    if(isset($_POST['det_btn']))
    {
        header("location:../tablelist.php");

    }
    

    ?>