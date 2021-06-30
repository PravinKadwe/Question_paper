<?php 
   $con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
   
       $table_new_value = "SELECT add_id FROM `add_db` ORDER BY `id` DESC LIMIT 1";
       $fetch_new_value = mysqli_query($con, $table_new_value) or die(mysqli_error($con));
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Questions</title>       
    <script src="ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    
<style>
.coursetable{
    margin: auto;
    width: 100%;
    border: 2px solid black;
    background-color: #BBD8FF;
}

thead{
    background-color: #008CBA;
    color: #ffff;
}


tbody{
    background-color: aliceblue;
    color: rgb(28, 28, 28);
}

#checkbox{
   height: 105px;
   width: 70px;
   margin-left: 60px;
   text-align: center;
   border: solid thin blue;
   background-color: #fafafa;
   overflow: scroll;
}


#co{
    position: relative;
    font-weight: bold;
    margin: 10px;
}

#CO{
    padding: 13px 10px;
    margin: 5px 20px 10px 10px;
}

.btn {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 40px;
    text-align: center;
    font-size: 16px;
    margin: 10px 25px;
    float: right;
    cursor: pointer;
  }

  .btn:hover {
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
    position: relative;
    right: -90%; 
  }

  #cancle:hover {
    opacity: 0.8;
  }

    </style>
</head>
         <body>
           
         <h2 style="text-align: center; color: #F0FFFF; background-color: #1D2939;">Created Questions List </h2>
    <table class="coursetable">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Question Type </th>
                <th>Questions</th>
                <th>Max Marks</th>
                <th>Que No</th>
                <th>Difficulty level</th>
                <th>Section</th>
                <th>CO Mapping level</th>
                
                
            </tr>
        </thead>
        <tbody>
           
               <?php
               foreach($fetch_new_value as $lst)
               {    
                  $add = $lst['add_id'];


                  $select_query = "SELECT * FROM testques . questions_set WHERE test_id = '$add'";
                  $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));;

                  while ($que = mysqli_fetch_array($select_query_result)){


               ?>      
           
                  <tr>
                     <td name="id" style="text-align: center;"><?php echo $que['id']; ?></td>
                     <td id="title" name="question_type" style="text-align: center;"><?php echo $que['question_type']; ?></td>
                     <td name="questions" style="overflow: hidden;"><?php echo $que['questions']; ?></td>
                     <td name="max_marks" style="text-align: center;"><?php echo $que['max_marks']; ?></td>
                     <td name="que_no" style="text-align: center;"><?php echo $que['que_no']; ?></td>
                     <td name="difficulty_level" style="text-align: center;"><?php echo $que['difficulty_level']; ?></td>
                     <td name="section" style="text-align: center;"><?php echo $que['section']; ?></td>
                     <td name="co_mapping" style="text-align: center;"><?php echo $que['co_mapping']; ?></td>
            
                  </tr>
                  <?php 
                    }
                  
                  ?>
            </tbody>
         </table>
              
<br>
<button type="button" id="cancle" onclick="location.href='../testlist.php'">Cancle</button> 
<br>
<br>
<form action="add_quedb.php" method="post">
                
                    <h2 style="text-align: center; background-color: #1D2939; color: #F0FFFF;">Creat Questions Details</h2>
                
                <div class="form-group">
                     
                      <label for="question_paper_name"> 
                        <input type="hidden" class="form-control" value="<?php echo $lst['add_id']; ?>" id="test_id" name="test_id"> 
                      </label>  
                        <?php  
                           }
                         
                        ?> 
                    </div>
   <table class="coursetable">
      <thead>
         <tr>
            <th></th>
            <th></th>
            <th>Add Questions and Que. Num </th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td name="question_type">
            <label for="question_type" style="font-weight: bold; margin: 10px;">Question_Type: </label>
                        <select class="form-control" name="question_type" id="question_type">
                           <option value="Descriptive">Descriptive</option>
                           <option value="Optional">Optional</option>
                        </select>
            </td>
            <td name="difficulty_level">
            <label for="difficulty_level" style="font-weight: bold; margin: 10px;">Difficulty level: </label>
                        
                        <select class="form-control" name="difficulty_level" id="difficulty_level">
                           <option value="NULL">       </option>
                           <option value="Apply">Apply</option>
                           <option value="Create">Create</option>
                           <option value="Remember">Remember</option>
                           <option value="Understand">Understand</option>
                        </select>
            </td>
            <td rowspan="3"><textarea name="add_que" class="que" ></textarea>
            <script>
                  CKEDITOR.replace("add_que");
                  </script>
            </td>
         </tr>
         <tr>
            <td name="max_marks">
            <label for="max_marks" style="font-weight: bold; margin: 10px;">Max marks: </label>
                        <input type="number" class="form-control" id="max_marks" name="max_marks">
            </td>
            <td name="que_no">
            <label for="que_no" style="font-weight: bold; margin: 10px;">Question Num: </label>
                        <input type="text" class="form-control" id="que_no" name="que_no">
            </td>
         </tr>
         <tr>
            <td name="section">
            <label for="section" style="font-weight: bold; margin: 10px;">Section: </label>
                        <select class="form-control" name="section" id="section">
                           <option value="NULL"> </option>
                           <option value="A">A</option>
                           <option value="B">B</option>
                           <option value="C">C</option>
                           <option value="D">D</option>
                        </select>
            </td>
            <td name="CO">
            <label for="CO" id="co">CO Mapping Level</label>
                            <select class="form-control" name="co_mapping" id="co_mapping">
                                <option value="NULL"> </option>
                                <option value="CO1">CO1</option>
                                <option value="CO2">CO2</option>
                                <option value="CO3">CO3</option>
                                <option value="CO4">CO4</option>
                                <option value="CO5">CO5</option>
                            </select>
            </td>
         </tr>
      </tbody> 
      <tfoot>
            <tr>  
             <td colspan="3" style="text-align: center;">
             <input type="submit" class="btn" name="savebtn" value="Save"> 
             <input type="submit" class="btn" name="savebtn" value="Next"> 
            </td> 
            </tr>
      </tfoot>
    </table>
            
</form>       
</div> 

</body>
</html>






