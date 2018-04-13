<?php

require(ROOT . "model/TaskModel.php");
require(ROOT . "model/ListModel.php");

function index($id)
{
	$filter = isset($_GET["filter"]) ? $_GET["filter"] : null;
	$sort = isset($_GET["sort"]) ? $_GET["sort"] : 'task_id';
	render("task/index", array(
		'Tasks' => getAllTasks($id, $sort, $filter),
		'List' => getList($id)
	));
}


function add($id)
{
	render("task/create", array(
		'List' => getList($id)
	));
}

function addSave($id)
{
	if (!addTask($id)) {
		header("location:". URL . "Error/index");
		exit();
	}
	header("location:". URL . "task/index/" . $id);
}

function deleteTask($id, $list_id)
{
	if (!deleteTasks($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("location:". URL . "task/index/" . $list_id);
}

function editTask($id, $list_id)
{
	render("task/edit", array(
		'task' => getTask($id),
		'List' => getList($list_id)
		));

}

function editSave($id, $list_id)
{
	if (!editTasks($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "task/index/" . $list_id);
}