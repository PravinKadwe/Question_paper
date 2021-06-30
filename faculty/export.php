<?php 
require('PHPExcel/excel.php'); 
$con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
$select = "SELECT * FROM student_data";
$res= mysqli_query($con, $select);
if(mysqli_num_rows($res)>0){
    $k=0;
	while($row=mysqli_fetch_assoc($res)){
		$data[$k]['roll_no']=$row['roll_no'];
		$data[$k]['admission_no']=$row['admission_no'];
        $data[$k]['name']=$row['name'];
		$data[$k]['course_details']=$row['course_details'];
        $data[$k]['exm_name']=$row['exm_name'];
		$data[$k]['sub_exam']=$row['sub_exam'];
		$k++;
	}
}else{
	echo "Data not found";
}

$excel=new excel();
$file_name=date('d-m-Y').'.xlsx';
$excel->userDefinedstream($file_name,$data);


if(isset($_POST['pro_btn']))
{
    header("location:excel.php");

}

?>