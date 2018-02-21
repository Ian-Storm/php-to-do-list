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


function add()
{
	render("task/create");
}

function addSave()
{
	if (!addTask()) {
		header("location:". URL . "Error/index");
		exit();
	}
	header("location:". URL . "list/readlist");
}