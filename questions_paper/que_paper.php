<?php 
$con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions Paper</title>

    <link rel="stylesheet" href="que_paper.css">
</head>
<body style="border: 2px;" class="row ">


<button class="printbtn print-container" onclick="window.print()"><b>Print | View </b></button>

    <?php
          if(isset($_POST['creat_btn']))
            {
                $id = $_POST['creat_id'];
                                    
                $select_query = "SELECT * FROM `que_paper_list` WHERE id = '$id' LIMIT 1";
                $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
                foreach ($select_query_result as $row){

                    $rol = $row['batch_id'];


                    $query = "SELECT * FROM course_details WHERE id='$rol'";
                        $run = mysqli_query($con, $query);
                    
                        foreach ($run as $que){
                                
        ?>

<?php echo '<img src="data:image;base64,'.base64_encode($que['image']).'" alt="Image" style="wedth: 145px; height: 145px;" >'; ?>
<br>
<div class="title">
<h2><?php echo $que['institution_name']; ?></h2>
<h4><?php echo $que['semester']; ?> <?php echo $que['department']; ?></h4>
</div>
<br>
<table class="table1">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Course:</b> <?php echo $que['course_title']; ?></td>
            <td><b>Course Code:</b> <?php echo $que['course_code']; ?></td>
            <td style="text-align: right;"><b>Time:</b> <?php echo $row['paper_time']; ?></td>
        </tr>
        <tr>
            <td><b>Branch:</b> <?php echo $que['class']; ?>&nbsp;<?php echo $que['division']; ?>&nbsp;<?php echo $que['batch']; ?></td>
            <td rowspan="2"><b>Max. Marks:</b> <?php echo $row['total_marks']; ?></td>
        </tr>
        
    </tbody>
    <tfoot>
        <tr>
            <td rowspan="3"><b>Date:</b> <?php echo $row['exam_date']; ?></td>
        </tr>
    </tfoot>
</table>

<hr style="height:2px;border-width:0;color:gray;background-color:gray">

<p> <b>Note:</b> <?php echo $row['description']; ?> </p>
<?php

}
         
?>

<?php
                        $id = $row['id'];
                        $query = "SELECT * FROM `questions_set` WHERE `section` LIKE '%A%' AND `test_id` LIKE '%$id%'";
                        $run = mysqli_query($con, $query);
            
                       
                
                ?>

<table class="coursetable">
<thead >
        <tr>
            <th></th>
            <th style="text-align: center;" id="A">A</th>
            <th style="text-align: center;">Max.<br>Marks</th>
            <th style="text-align: center;">CO<br>Mapping</th>
            <th style="text-align: center;">Difficulty<br>Level</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        
        foreach ($run as $set){
        
        ?>

        <tr>
            <td style="text-align: center;"><?php echo $set['que_no']; ?></td>
            <td id="que"><?php echo $set['questions']; ?></td>
            <td style="text-align: center;">[<?php echo $set['max_marks']; ?>.00]</td>
            <td style="text-align: center;">[<?php echo $set['co_mapping']; ?>]</td>
            <td style="text-align: center;">[<?php echo $set['difficulty_level']; ?>]</td>
        </tr>
        <?php

            }
            ?>

    </tbody>

</table>

<?php

$id = $row['id'];
$query = "SELECT * FROM `questions_set` WHERE `section` LIKE '%B%' AND `test_id` LIKE '%$id%'";
$run = mysqli_query($con, $query);

    
?>


<table class="coursetable">
<thead>
        <tr>
            <th></th>
            <th style="text-align: center;">B</th>
            <th style="text-align: center;">Max.<br>Marks</th>
            <th style="text-align: center;">CO<br>Mapping</th>
            <th style="text-align: center;">Difficulty<br>Level</th>
        </tr>
    </thead>
    <tbody>

            <?php
            while ($clt= mysqli_fetch_array($run)) {
            ?>
        <tr>
            <td style="text-align: center;"><?php echo $clt['que_no']; ?></td>
            <td id="que"><?php echo $clt['questions']; ?></td>
            <td style="text-align: center;">[<?php echo $clt['max_marks']; ?>.00]</td>
            <td style="text-align: center;">[<?php echo $clt['co_mapping']; ?>]</td>
            <td style="text-align: center;">[<?php echo $clt['difficulty_level']; ?>]</td>
        </tr>
        
        <?php } ?>
    </tbody>
</table>
<?php
            
         
        }
    }

?>
</body>
</html>


