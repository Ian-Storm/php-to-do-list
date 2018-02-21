<?php

require(ROOT . "model/TaskModel.php");
require(ROOT . "model/ListModel.php");

function index($id)
{
	render("task/index", array(
		'Tasks' => getAllTasks($id),
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
	render("task/index", array(
		'Tasks' => getAllTasks($id),
		'List' => getList($id)
	));
}

function deleteTask($id, $list_id)
{
	if (!deleteTasks($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("location:". URL . "task/index/" . $list_id);
}