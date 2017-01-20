<?php
require_once '../config/db-connect.php';

	$database = new DbManager();
	$conn = $database->Connect();

	$query = "DELETE FROM todo_tasks";
	$clear = $conn->query($query) or die($conn->error.__LINE__);

	$query = "";

	$postdata = file_get_contents("php://input");
    $tasks = json_decode($postdata);

    foreach($tasks as $task):

    	if($task->done):
    		$status = 1;
    	else:
    		$status = 0;
    	endif;

    	$query = "INSERT INTO todo_tasks (title, status) VALUES ('".$task->title."', '".$status."')";
    	$result = $conn->query($query) or die($conn->error.__LINE__);

    	$query = "";

    endforeach;


?>