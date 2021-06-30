<?php
require "db/indb.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Papers</title>
    <style>
    .coursetable{
    margin: auto;
    min-width: 400px;
    width: 100%;
    background-color: #f4fcff;
    }

    thead{
    background-color: #008CBA;
    color: #ffff;
    }

    tfoot{
    background-color: #bbd8ff;
    color: #ffff;
    }

    tfoot td {
    color: #ffff;
    }

    tbody{
    background-color: aliceblue;
    color: #ffff;
    }

    td{
    color: black;
    text-align: center;
    }

    #title{
    text-align: center;
    color: rgb(159, 0, 233);
    font-weight: bold;
    }

    .coursetable th, 
    .coursetable td {
    padding: 12px 15px;
    }

    .button {
    background-color: #0B89F5;
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
  }

  .button:hover {
    opacity: 0.8;
  }

  #cancle{
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 40px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
  }

  #cancle:hover {
    opacity: 0.8;
  }
    </style>
</head>
<body>
    <table class="coursetable">
        <thead>
            <tr>
                <th rowspan="2">Sr.No</th>
                <th colspan="4">Course details</th>
                <th rowspan="2">Class</th>
                <th rowspan="2">Division</th>
                <th rowspan="2">Batch</th>
                <th rowspan="2">Question Paper</th>
                <tr>
                    <th>Course code</th>
                    <th>Course title</th>
                    <th>Course credit</th>
                    <th>Course type</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <?php

                    $table_new_value = "SELECT add_id FROM `add_db` ORDER BY `id` DESC LIMIT 1";
                    $fetch_new_value = mysqli_query($con, $table_new_value) or die(mysqli_error($con));
                    
                    foreach($fetch_new_value as $lst)
                    {    
                        $add = $_SESSION['addId'];
                    
                        $query = "SELECT * FROM course_details WHERE id='$add'";
                        $run = mysqli_query($con, $query);
                    
                        foreach ($run as $row){
                        
            ?>
            
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="uppercase"><?php echo $_SESSION['course_code'] = $row['course_code']; ?></td>
                <td id="title"><?php echo $_SESSION['course_title'] = $row['course_title']; ?></td>
                <td style="color: red; font-weight: bold;"><?php echo $_SESSION['course_credit'] = $row['course_credit']; ?></td>
                <td class="uppercase"><?php echo $_SESSION['course_type'] = $row['course_type']; ?></td>
                <td><?php echo $_SESSION['class'] = $row['class']; ?> <?php echo $_SESSION['semester'] = $row['semester']; ?></td>
                <td class="uppercase"><?php echo $_SESSION['division'] = $row['division']; ?></td>
                <td class="uppercase"><?php echo $_SESSION['batch'] = $row['batch']; ?></td>
                <td>
                    <form action="form/que_paper_list.php" method="post">
                        <input type="hidden" name="creat_id" value="<?php echo $row['id'];?>">
                        <button type="submit" name="creat_btn" class="button">Creat</button>
                    </form>
                </td>
            </tr>
            
            <?php
                    
                    }
                }

             
            ?>
            
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: center;">----</td>
                <td colspan="5" style="text-align: center;">----</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr>
        </tfoot>    
    </table>
    <button type="button" id="cancle" onclick="location.href='index.php'">Back</button>

<h2 style="text-align: center; color: #485B7B;">Created Question Papers List</h2>
    <table class="coursetable">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Question Paper Name</th>
                <th>View</th>
                <th>Class</th>
                <th>Batch</th>
                <th>Division</th>
                <th>Questions</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                    $id = $row['id'];
                    $query = "SELECT * FROM testques . que_paper_list WHERE batch_id = '$id'";
                    $run = mysqli_query($con, $query);

                    foreach ($run as $rol){
                    
            ?>
            
            <tr>
                <td><?php echo $rol['id']; ?></td>
                <td id="title" name="question_paper_name"><?php echo $rol['question_paper_name']; ?></td>


                <td name="view">
                <form action="questions_paper/que_paper.php" method="post">
                        <input type="hidden" name="creat_id" value="<?php echo $rol['id'];?>">
                        <button type="submit" name="creat_btn">View</button>
                    </form>
                </td>


                <td name="class"><?php echo $row['class']; ?> <?php echo $row['semester']; ?></td>
                <td name="batch"><?php echo $row['batch']; ?></td>
                <td name="division"><?php echo $row['division']; ?></td>
                <td name="creat">
                    <form action="form/add_questions.php" method="post">
                        <input type="hidden" name="pro_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="pro_btn"> Creat </button>
                    </form>
                </td>
                <td name="edit">
                <form action="form/update_paper_list.php" method="post">
                        <input type="hidden" name="creat_id" value="<?php echo $rol['id'];?>">
                        <button type="submit" name="creat_btn">Edit</button>
                    </form>
                    </td>
                <td name="delete">
                    <form action="edit/delete_que_list.php" method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $rol['id'];?>">
                        <button type="submit" name="delete_btn">Delete</button>
                    </form>
                </td>
            </tr>
            
            <?php
                    }
                //form/add_questions.php
            ?>
            
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <h2 style="text-align: center; color: #485B7B;">Created Questions List</h2>
    <table class="coursetable">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Question Type </th>
                <th>Questions</th>
                <th>Options/Answer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

                    $id = $row['id'];
                    $query = "SELECT * FROM testques . questions_set WHERE test_id = '$id'";
                    $run = mysqli_query($con, $query);

                    foreach ($run as $que){
                    
            ?>
            
            <tr>
                <td><?php echo $que['id']; ?></td>
                <td id="title" name="question_type"><?php echo $que['question_type']; ?></td>
                <td name="questions" style="overflow: hidden;"><?php echo $que['questions']; ?></td>
                <td name="answer"><?php echo $que['answer']; ?></td>
                <td name="edit">
                <form action="form/update_questions.php" method="post">
                        <input type="hidden" name="pro_id" value="<?php echo $que['id'];?>">
                        <button type="submit" name="pro_btn">Edit</button>
                    </form>
                    </td>
                    <td name="delete">
                <form action="edit/delete_que.php" method="post">
                        <input type="hidden" name="det_id" value="<?php echo $que['id'];?>">
                        <button type="submit" name="det_btn">Delete</button>
                    </form>
                    </td>
            </tr>
            
            <?php
                    }
                
            ?>
            
        </tbody>
    </table>

</body>
</html>