<?php
require_once '../config/db-connect.php';

	$database = new DbManager();
	$conn = $database->Connect();

	$query = "SELECT * FROM todo_tasks ORDER BY id ASC";
	$result = $conn->query($query) or die($conn->error.__LINE__);

	$arr = array();

    if($result->num_rows > 0) {
        while($task = $result->fetch_assoc()) {

            if($task['status'] == 0):
                $status = false;
            elseif($task['status'] == 1):
                $status = true;
            endif;

            $arr[] = array(
                        "title" => $task['title'],
                        "done" => $status
                    );  
        }
    }

    echo $json_response = json_encode($arr);

?>