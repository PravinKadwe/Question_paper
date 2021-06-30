<?php
        
        if(isset($_POST['sid'])) {
            $db = new pdodb;
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT * FROM sub_exams WHERE exam_id = ".$_POST['sid']);
            $stmt->execute();
            $subexam = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($subexam);
        }

        

?>