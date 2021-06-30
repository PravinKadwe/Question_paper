<?php
require "db/condb.php";
$select_query = "SELECT id, course_code, course_title, course_credit, course_type, class, semester, division, batch FROM course_details";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Question Bank</title>
</head>
<body style="background-color: #E5E5E5;">
<br>
<br>
    <h1 style="text-align: center; color: #485B7B;">Question Bank</h1>
    <table class="coursetable">
        
        <thead>
            <tr>
                <th rowspan="2">Sr.No</th>
                <th colspan="4">Course details</th>
                <th rowspan="2">Class</th>
                <th rowspan="2">Division</th>
                <th rowspan="2">Batch</th>
                <th rowspan="2">Create Questions</th>
                <tr>
                    <th>Course code</th>
                    <th>Course title</th>
                    <th>Course credit</th>
                    <th>Course type</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($select_query_result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="uppercase"><?php echo $row['course_code']; ?></td>
                <td id="title"><?php echo $row['course_title']; ?></td>
                <td style="color: red; font-weight: bold;"><?php echo $row['course_credit']; ?></td>
                <td class="uppercase"><?php echo $row['course_type']; ?></td>
                <td><?php echo $row['class']; ?> <?php echo $row['semester']; ?></td>
                <td class="uppercase"><?php echo $row['division']; ?></td>
                <td class="uppercase"><?php echo $row['batch']; ?></td>
                <td style="font-weight: bold;">
                    <form action="db/indb.php" method="post">
                        <input type="hidden" name="proceed_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="proceed_btn" class="button"> Proceed</button>
                    </form>
                </td>
            </tr>
            <?php } ?>    
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: center;">----</td>
                <td colspan="7" style="text-align: center;">----</td>
                <td style="text-align: center;">----</td>
            </tr>
        </tfoot> 
    </table>
    <button class="btn" onclick="window.location.href='addcourse.html'">Add Course</button>
    <button class="btn" onclick="window.location.href='faculty/e_schedul.php'">Exam Schedul</button>
</body>
</html>
