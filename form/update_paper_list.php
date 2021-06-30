<?php
    require "../db/condb.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creat Exam Paper</title>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="update_paper_table.css">
    <script src="ckeditor.js"></script>
    <style>
        .btn{
          background-color: #4CAF50;
          color: white;
          padding: 20px 150px;
          border: none;
          cursor: pointer;
          margin-top:10px;
          border-radius: 4px;
          position: relative;
        }

        .btn:hover {
            opacity: 0.8;
          }
        
    </style>
</head>
    <body>
        <div class="cent">
            <form action="update_paper_db.php" method="post">
                <div class="container" style="background-color:#1D2939">
                    <h2 style="text-align: center; color: #F0FFFF;">Update Exam Paper Details</h2>
                </div>
                <div class="container">
                    <div class="form-group">
                     <?php
                              if(isset($_POST['creat_btn']))
                                {
                                    $id = $_POST['creat_id'];
                                    
                                    $select_query = "SELECT * FROM `que_paper_list` WHERE id = '$id' LIMIT 1";
                                    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
                                    foreach ($select_query_result as $row){


                                
                      ?>

                    <label for="id"> 
                        <input type="hidden" class="form-control" value="<?php echo $row['id']; ?>" id="id" name="id"> 
                      </label> 

                      <label for="batch_id"> 
                        <input type="hidden" class="form-control" value="<?php echo $row['batch_id']; ?>" id="batch_id" name="batch_id"> 
                      </label>  
                        
                    </div>
                    <div class="form-group">
                        <label for="question_paper_name">Paper Name:</label>
                        <input type="text" class="form-control" value="<?php echo $row['question_paper_name']; ?>" id="question_paper_name" name="question_paper_name">
                    </div>
                    
                    <div class="form-group">
                        <label for="exam_type">Exam type:</label> 
                        <input type="text" class="form-control" value="<?php echo $row['exam_type']; ?>" id="exam_type" name="exam_type">
                    </div>
                    <div class="form-group">
                        <label for="sub_exam">Exam Unit:</label>
                        <input type="text" class="form-control" value="<?php echo $row['sub_exam']; ?>" id="sub_exam" name="sub_exam">
                    </div>

                    
                    <table>
                          <tbody>
                            <tr>
                            <td class="exam_date">
                            <label for="exam_date">Exam Date:<input type="date" class="form-control" id="exam_date" name="exam_date">&nbsp;</label>
                                
                            </td>
                            <td class="total_marks">
                            <label for="total_marks">Total Marks:<input type="number" class="form-control" id="total_marks" name="total_marks">&nbsp;</label>
                                
                            </td>
                            <td class="paper_time">
                            <label for="paper_time">Paper Time:<input type="time" class="form-control" id="paper_time" name="paper_time">&nbsp;</label>
                                
                            </td>
                            </tr>
                          </tbody>
                          </table>
                          <div class="form-group" style="margin: 4px 0 4px 0;">
                        <label for="section_unit">Section Unit:</label>
                        <input type="number" class="form-control" value="<?php echo $row['section_unit']; ?>" id="section_unit" name="section_unit">
                    </div>
<br>
                    <div class="form-group">
                        <label for="description" style="margin: 4px 0 4px 0;">Description</label>
                        <textarea name="description"><?php echo $row['description']; ?></textarea>
                        <script>
                            CKEDITOR.replace("description");
                        </script>
                    </div>
                    <?php
                              }
                          }
                        ?> 
                        <br>
                        <center>
                        <form action="update_paper_db.php" method="post">
                      <button type="submit" name="proceed_btn" class="btn" > Update Detalis </button>
                        </form>
                        </center>
                </div> 
            </form>       
        </div>
    </body>
</html>