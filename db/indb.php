<?php 
$con = mysqli_connect("localhost","root","","testques") or die(mysqli_error($con));
session_start();

// $table_new_value = "SELECT `id`, `add_id` FROM `add_db` ORDER BY `id` DESC LIMIT 1";
// $fetch_new_value = mysqli_fetch_array(mysqli_query($con, $table_new_value)) or die(mysqli_error($con));


if(isset($_POST['proceed_btn']))
                {
                    $_SESSION['id'] = $_POST['proceed_id'];

                    $id = $_SESSION['id'];
                  
                    $user_regisstration_query = "INSERT INTO `add_db` (`id`, `add_id`) VALUES (NULL, '$id')";
                    $user_regisstration_submit = mysqli_query($con, $user_regisstration_query) or die(mysqli_error($con));

                    $_SESSION['addId'] = $_SESSION['id'];

                    header("location:../testlist.php");
                }

?>
