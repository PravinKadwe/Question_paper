<?php require "../db/facultydb.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImportExcel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <style>
    td {
        padding: 10px 10px;
        background-color: #E1E5F3;
    }


    .xls_td{
        padding: 20px 15px;
        width: 800px;
    }
    </style>
</head>
<body>
    <label style="padding: 40px;">&nbsp;&nbsp;</label>
<h3 style="text-align: center; background-color: #485B7B; color: #FFFF;">Import Excel for Evaluation Marks</h3>
<form action="export.php" method="POST">
<table style="border: 1px solid #DFE3E7; width:100%;">
        <tbody>
            <tr id="tr1">
                <td id="tdf" style="text-align: right; font-weight: bold;">Exam Type</td>
                <td style="text-align: center; font-weight: bold;"> : </td>
                <td id="td1" style="font-weight: bold;">
                 <?php echo $_SESSION['exmtyp'];?>
                </td>
            </tr>   
            <tr id="tr1">
                <td id="tdf" style="text-align: right; font-weight: bold;">Sub. exam type</td>
                <td style="text-align: center; font-weight: bold;">:</td>
                <td id="td1" style="font-weight: bold;">
                <?php echo $_SESSION['subexm'];?>
                </td>
            </tr>                         
            <tr id="tr1">
                <td id="tdf" style="text-align: right; font-weight: bold;">Class Code</td>
                <td style="text-align: center; font-weight: bold;">:</td>
                <td id="td1" style="font-weight: bold;">
                <?php echo $_SESSION['cls'];?>  
                </td>
            </tr>
            <tr id="tr1">
                <td id="tdf" style="text-align: right; font-weight: bold;">Section / Division</td>
                <td style="text-align: center; font-weight: bold;">:</td>
                <td id="td1" style="font-weight: bold;">
                <?php echo $_SESSION['dev'];?>
                </td>
            </tr>
            <tr id="tr1">
                <td id="tdf" style="text-align: right; font-weight: bold;">Name of the Exam</td>
                <td style="text-align: center; font-weight: bold;">:</td>
                <td id="td1" style="font-weight: bold;">
                <?php echo $_SESSION['costil'];?> 
                </td>
            </tr>
        </tbody>
        <tfoot>
        <tr><td colspan="3">
        <form class="form-inline" method="post" action="export.php" enctype="multipart/form-data">
        <button type="submit" class="btn btn-success" name="pro_btn">Submit</button>
        </form>
        </td></tr>
        </tfoot>
</table>
</form>
<br>
<h3 style="text-align: center; background-color: #485B7B; color: #FFFF; ">Upload Excel File</h3>
<span id="message"></span>
<form class="form-inline" method="post" id="impost_excel_form" enctype="multipart/form-data">
<table class="table">
    <tr class="xls_tr">
        <td class="xls_td">
            <label class="col" for="import_excel" style="text-align: right; font-weight: bold;">Excel File: </label>
            </td>
            <td class="xls_td">
            <form class="form-inline" method="post" id="impost_excel_form" enctype="multipart/form-data">
            <input type="file" class="form-control" id="import_excel" name="import_excel"/>
            <input type="submit" name="import" id="import" class="btn btn-primary float-center" value="Import"/>
            </form>
            </td>
        <td class="xls_td">
            &nbsp;
            <button class="btn btn-primary float-center" value="cancle">CANCLE</button>
        </td>
    </tr>
</form>
</table>
</html>
<script>

</script>

