<?php

require(ROOT . "model/ListModel.php");
require(ROOT . "model/TaskModel.php");

function index()
{
	render("list/index", array(
		'Lists' => getAllLists()
	));
}

function readList($id)
{
	render("list/readList", array(
		'Tasks' => listTasks($id),
		'lists' => getList($id)
		));
}

function deleteTask($id)
{
	if (!deleteTasks($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "list/index");
}

function add()
{
	render("list/create");
}

function addSave()
{
	if (!addList()) {
		header("location:". URL . "Error/index");
		exit();
	}
	header("location:". URL . "list/index");
}

function deleteList($id)
{
	if (!deleteLists($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "list/index");
}