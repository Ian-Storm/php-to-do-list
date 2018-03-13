<?php

function getAllLists() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getList($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE list_id = :list_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_id" => $id));

	$db = null;

	return $query->fetch();
}

function addList()
{
	$list_name = isset($_POST["list_name"]) ? $_POST["list_name"] : NULL;
	$db = openDatabaseConnection();

	$sql = "INSERT INTO lists(list_name) VALUES (:list_name)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_name" => $list_name
		));

	$db = null;

	return true;
}

function deleteLists($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM lists WHERE list_id = :list_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_id" => $id
		));

	$db = null;
	
	return true;
}

function editLists($id)
{
	$list_name = isset($_POST["list_name"]) ? $_POST["list_name"] : NULL;
	$db = openDatabaseConnection();

	$sql = " UPDATE lists SET list_name = :list_name WHERE list_id = :list_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_name" => $list_name,
		":list_id" => $id
		));

	$db = null;

	return true;
}