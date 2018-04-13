<?php

function getAllTasks($id, $sort, $filter) 
{
	$db = openDatabaseConnection();
	$filter = "%".$filter."%";
	if ($sort == "task") {
		$sql = "SELECT * FROM tasks WHERE list_id = :list_id AND (task_name LIKE :filter OR task_description  LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_name";
	} elseif ($sort == "description") {
		$sql = "SELECT * FROM tasks WHERE list_id = :list_id AND (task_name LIKE :filter OR task_description  LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_description";
	} elseif ($sort == "duration") {
		$sql = "SELECT * FROM tasks WHERE list_id = :list_id AND (task_name LIKE :filter OR task_description  LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_duration";
	} elseif ($sort == "status") {
		$sql = "SELECT * FROM tasks WHERE list_id = :list_id AND (task_name LIKE :filter OR task_description  LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_status";
	} else {
		$sql = "SELECT * FROM tasks WHERE list_id = :list_id AND (task_name LIKE :filter OR task_description  LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_id";
	}
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_id" => $id,
		":filter" => $filter));

	$db = null;

	return $query->fetchAll();
}

function listTasks($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE list_id = :list_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_id" => $id));

	$db = null;

	return $query->fetchAll();
}

function deleteTasks($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE task_id = :task_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":task_id" => $id));

	$db = null;
	
	return true;
}

function addTask($id)
{
	$task_name = isset($_POST["task_name"]) ? $_POST["task_name"] : NULL;
	$task_description = isset($_POST["task_description"]) ? $_POST["task_description"] : NULL;
	$task_duration = isset($_POST["task_duration"]) ? $_POST["task_duration"] : NULL;
	$task_status = isset($_POST["task_status"]) ? $_POST["task_status"] : NULL;
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks(task_name, task_description, task_duration, task_status, list_id) VALUES (:task_name, :task_description, :task_duration, :task_status, :list_id)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_id" => $id,
		":task_name" => $task_name,
		":task_description" => $task_description,
		":task_duration" => $task_duration,
		":task_status" => $task_status
		));

	$db = null;

	return true;
}

function editTasks($id)
{
	$task_name = isset($_POST["task_name"]) ? $_POST["task_name"] : NULL;
	$task_description = isset($_POST["task_description"]) ? $_POST["task_description"] : NULL;
	$task_duration = isset($_POST["task_duration"]) ? $_POST["task_duration"] : NULL;
	$task_status = isset($_POST["task_status"]) ? $_POST["task_status"] : NULL;
	$db = openDatabaseConnection();

	$sql = " UPDATE tasks SET task_name = :task_name, task_description = :task_description, task_duration = :task_duration, task_status = :task_status WHERE task_id = :task_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":task_name" => $task_name,
		":task_id" => $id,
		":task_description" => $task_description,
		":task_duration" => $task_duration,
		":task_status" => $task_status
		));

	$db = null;

	return true;
}

function getTask($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE task_id = :task_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":task_id" => $id));

	$db = null;

	return $query->fetch();
}