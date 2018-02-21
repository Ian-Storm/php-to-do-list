<?php

require(ROOT . "model/TaskModel.php");

function index()
{
	render("task/index", array(
		'Tasks' => getAllTasks()
	));
}