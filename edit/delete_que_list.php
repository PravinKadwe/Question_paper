
<?php
    require "../db/condb.php";

    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];
        
        $select_query = "DELETE FROM que_paper_list WHERE id = '$id'";
        $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
        

    }


    if(isset($_POST['delete_btn']))
    {
        header("location:../tablelist.php");

    }
    

    ?>