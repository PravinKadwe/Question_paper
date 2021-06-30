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
    <link rel="stylesheet" href="que_paper_table.css">
    <script src="ckeditor.js"></script>
    <style>
        .btn{
          background-color: #4CAF50;
          color: white;
          padding: 20px 150px;
          border: none;
          cursor: pointer;
          border-radius: 4px;
          position: relative;
          font-size: 16px;
        }

        .btn:hover {
            opacity: 0.8;
          }
        
    </style>
</head>
    <body>
        <div class="cent">
            <form action="paper_listdb.php" method="post">
                <div class="container" style="background-color:#1D2939">
                    <h2 style="text-align: center; color: #F0FFFF;">Creat Exam Paper Details</h2>
                </div>
                <div class="container">
                    <div class="form-group">
                     <?php
                              if(isset($_POST['creat_btn']))
                                {
                                    $id = $_POST['creat_id'];
                                    
                                    $select_query = "SELECT * FROM course_details WHERE id='$id'";
                                    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
                                    foreach ($select_query_result as $row){
                                
                      ?>
                      <label for="question_paper_name"> 
                        <input type="hidden" class="form-control" value="<?php echo $row['id']; ?>" id="batch_id" name="batch_id"> 
                      </label>  
                        <?php
                              }
                          }
                        ?> 
                    </div>
                    <div class="form-group">
                        <label for="question_paper_name">Paper Name:</label>
                        <input type="text" class="form-control" id="question_paper_name" name="question_paper_name">
                    </div>
            
                    <div class="form-group">
                        <label for="exam_type">Exam type:</label> 
                        <input type="text" class="form-control" id="exam_type" name="exam_type">
                    </div>
                 
                    <div class="form-group">
                        <label for="sub_exam">Exam Unit:</label>
                        <input type="text" class="form-control" id="sub_exam" name="sub_exam">
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
                        <input type="number" class="form-control" id="section_unit" name="section_unit">
                    </div>
<br>

                    <div class="form-group">
                        <label for="description" style="margin: 4px 0 4px 0;">Description</label>
                        <textarea name="description" ></textarea>
                        <script>
                            CKEDITOR.replace("description");
                        </script>
                    </div>
                    <br>
                    <center>
                    <form action="paper_listdb.php" method="post">
                      <input type="hidden" name="proceed_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="proceed_btn" class="btn" > Submit </button>
                      </form>
                      </center>
                </div> 
            </form>       
        </div>
    </body>
</html>