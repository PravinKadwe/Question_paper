<?php 
require "../db/edb.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>faculty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
th, td {
    padding: 5px 15px;
}
.button {
    background-color: #008CBA;
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
</style>
</head>
<body style="margin: 2px;">
<br>

<h3 style="text-align: center; background-color: #485B7B; color: #FFFF; padding: 20px;">Exam Scheduliing and Marks Import</h3>
<form action="excel.php" method="POST">
<table class="table-bordered" style="border: 1px solid #DFE3E7; width:100%;">


<tbody>
            <tr id="tr1">
                <td id="tdf" style="text-align: right;">Academic Year</td>
                <td style="text-align: center"> : </td>
                <td id="td1" >
                <select class="form-control" name="academic_year" id="academic_year">
                    <?php 
                        $i = (int) date("Y");?>
                        <?php  $i++; 
                            for(; $i<"2040"; $i++){ $y = $i; $y--;?>
                        <option value="academic_year"><?php echo $y."-".$i; ?> </option>
                            <?php }
                             //&nbsp;  -space   width:100%;
                        ?>

                </select>
                </td>
            </tr>                            
            <tr id="tr1">
                <td id="tdf" style="text-align: right;">Select the Class</td>
                <td style="text-align: center">:</td>
                <td id="td1">
                    <div class="row">
                    <div class="col-8">
                    <select class="form-control" name="class" id="class" >
                    <?php    while ($tel = mysqli_fetch_array($select_query_result)) {   $sem = $tel['semester'];
                         $options = "<option>".$tel['class']."-".$sem."</option>";
                           ?>  
                        <?php echo $options;  ?>
                    <?php    }  ?>
                        <option value="MBA I SEM I">MBA I SEM I</option>
                         <option value="MBA I SEM II">MBA I SEM II</option>
                         <option value="MBA II SEM III">MBA II SEM III</option>
                         <option value="MBA II SEM IV">MBA II SEM IV</option>
                         <option value="B.A SEM I">B.A I SEM I</option>
                         <option value="B.A SEM II">B.A I SEM II</option>
                         <option value="B.A II SEM III">B.A II SEM III</option>
                         <option value="B.A II SEM IV">B.A II SEM IV</option>
                         <option value="B.A III SEM V">B.A III SEM V</option>
                         <option value="B.A III SEM VI">B.A III SEM VI</option>
                         <option value="B.A IV SEM VII">B.A IV SEM VII</option>
                         <option value="B.A IV SEM VIII">B.A IV SEM VIII</option>
                    </select></div>
                <div class="col-4">
                    <select class="form-control" name="division" id="division" >
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select></div>
                    </div>  
                </td>
            </tr>
            <tr id="tr1">
                <td id="tdf" style="text-align: right;">Select Course</td>
                <td style="text-align: center">:</td>
                <td id="td1">
                    <select class="form-control" name="course_title" id="course_title" >
                        
                        <?php
                        while ($rel = mysqli_fetch_array($query_result)) {  ?>
                        <option value="<?php echo $rel['course_title']; ?>-<?php echo $rel['course_type'];?>-<?php echo $rel['course_code'];?>"><?php echo $rel['course_title'];?>-<?php echo $rel['course_type'];?>-<?php echo $rel['course_code'];?></option>";
                            
                         <?php echo $course; ?>    
                       <?php
                             } 
                         ?>
                         
                    </select>
                </td>
            </tr>
            <tr id="tr1">
                <td id="tdf" style="text-align: right;">Select the Exam Type</td>
                <td style="text-align: center">:</td>
                <td id="td1">
                    <select class="form-control" name="exam_type" id="exam_type">
                        <option selected="" disabled="">Select</option>
                        <?php
                        while ($type = mysqli_fetch_array($exam_put)) { 
                               
                            $exam = "<option>".$type['exam_names']."</option>";
                            ?>
                         <?php echo $exam; ?>    
                       <?php
                             } 
                         ?>
                    </select>
                </td>
            </tr>
            <tr id="tr1">
                <td id="tdf" style="text-align: right;">Select the Sub Exam Type</td>
                <td style="text-align: center">:</td>
                <td id="td1">
                <select class="form-control" name="sub_exams" id="sub_exams">
                        <option >Select</option>
                        <?php  
                        $select_exam = "SELECT * FROM exam_type";
                        $exam_put = mysqli_query($con, $select_exam) or die(mysqli_error($con)); 
                        while ($ty = mysqli_fetch_array($exam_put)) { 
                            $subexm = $ty['id'];
                            $sub_exam = "SELECT * FROM `testques`.`sub_exams` WHERE `exam_id` = '$subexm'";
                            $sub_type = mysqli_query($con, $sub_exam) or die(mysqli_error($con));
                            while ($sub = mysqli_fetch_array($sub_type)){
                                   $sub_ts = "<option>".$sub['sub_exam_types']."</option>";
                                   ?>
                                <?php echo $sub_ts; ?>    
                              <?php
                                    } 
                              }
                                ?>
                    </select>
                </td>
            </tr>
        </tbody>
       
        
        <tfoot>
        <form action="../db/facultydb.php" method="post">
            <tr>
            <td colspan="3" style="text-align: center;">
            <button type="submit" class="btn btn-success" name="proceed_btn">Submit</button>&nbsp; &nbsp; 
            <button class="btn btn-danger" value="cancle">Cancle</button>
            
            </td>
            </tr>
            </form>  
        </tfoot>
</table>
</form>

<hr>
<div class="container">
    <table class="table">
    <tr style="background-color: #C3E6CB;" >
        <td><br> <p class="text-center text-success" >Pleade schedule exam for this subject to import marks, click her to schedule
        &nbsp; <button class="btn btn-primary float-center" data-target="#studentform" data-toggle="modal" id="exam_schedule" >Schedule</button>
            </p>
            </td>
        </tr>
    </table>
        <div class="modal" id="studentform">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h3 class="text-primary col-md-11">Exam Schedule</h3>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                        </div>
                          
                    <div class="modal-body">
                        <form action="e_schedul.php">
                            <div class="form-group">
                                <label class="col" for="max marks">Max Marks*</label>
                                <input type="text" class="form-control" id="max marks">
                            </div>
                                <div class="form-group">
                                <label class="col" for="Passing Percentage">Passing Percentage*</label>
                                <input type="text" class="form-control" id="Passing Percentage">
                            </div>
                                <div class="form-group">
                                <label class="col" for="Regular Fee">Regular Fee</label>
                                <input type="text" class="form-control" id="Regular Fee">
                            </div>
                                <div class="form-group">
                                <label class="col" for="question_paper">Question Paper</label>
                                <select name="question_paper" class="form-control" id="question_paper">
                                    <option value="fresh">Fresh</option>
                                    <option value="Backlogs">Backlogs</option>  
                                </select>
                            </div>
                                <div class="checkbox">
                                <label for="maxdates" >Multiple Dates? &nbsp; </label>
                                <input type="checkbox" name="dates" id="maxdates">
                            </div> 
                            <div class="form-group">
                                <label for="date" class="col">Date*</label>
                                <input type="date" class="form-control" name="date" id="date"><br>
                            </div> 
                            <div class="form-group">
                                <label for="start_time" class="col">Start Time*</label>
                                <input type="time" class="form-control" name="start_time" id="start_time"><br>
                            </div> 
                            <div class="form-group">
                                <label for="end_time" class="col">End Time*</label>
                                <input type="time" class="form-control" name="end_time" id="end_time"><br>
                            </div> 
                            <div class="form-group">
                                <label for="faculty" class="col">Faculty incharge</label>
                                <select name="faculty" class="form-control" id="faculty">
                                    <option disabled value="select">Select a teacher</option>
                                    <option value="faculty">Pradip Rathod</option>
                                    <option value="faculty">shrikanth Mohite</option>
                                    <option value="faculty">Krutika Devkhade</option>
                                    <option value="faculty">Divakar Pande</option>
                                    <option value="faculty">Mohini kapse</option>
                                </select><br>
                            </div> 
                                <div>
                                    <button class="btn btn-success">Submit</button>
                                    <button class="btn btn-danger" value="cancle">Cancle</button>&nbsp; &nbsp;
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
<table id="tabelData" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Class</th>
                <th>Semester</th>
                <th>Division</th>
                <th>Course title</th>
                <th>Course type</th>
                <th>Course credit</th>
                <th>Batch</th>
                <th>Examination Details</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $put_query = "SELECT * FROM course_details";
        $result = mysqli_query($con, $put_query) or die(mysqli_error($con));

        while ($sho = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $sho['id']; ?></td>
                <td><?php echo $sho['class']; ?></td>
                <td><?php echo $sho['semester']; ?></td>  
                <td ><?php echo $sho['division']; ?></td>
                <td ><?php echo $sho['course_title']; ?></td>
                <td ><?php echo $sho['course_type']; ?></td>
                <td ><?php echo $sho['course_credit']; ?></td>
                <td ><?php echo $sho['batch']; ?></td>
                <td style="font-weight: bold;">
                    <form action="../db/indb.php" method="post">
                        <input type="hidden" name="proceed_id" value="<?php echo $sho['id']; ?>">
                        <button type="submit" name="proceed_btn" class="button">View</button>
                    </form>
                </td>
            </tr>
            <?php } ?> 
            
        </tbody>
    

</table>
<script>
    $(document).ready(function(){
        $('#tabelData').DataTable();
    });
</script>
</body>

</html>

