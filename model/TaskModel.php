<?php

function getAllTasks() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

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