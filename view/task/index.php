<main>
<header>
		<h1><?= $List	['list_name']; ?></h1>
	</header>
<nav>
		<ul>
			<li><a href=" <?= URL ?>task/add/<?= $List['list_id']?>"><h4>Add a task</h4></a></li>
			<li><a href=" <?= URL ?>list "><h4>Back to lists</h4></a></li>
		</ul>
	</nav>
	<table>
		<tr>
			<th><a href="<?= URL ?>task/index/<?= $List['list_id']?>?sort=task">Task</a></th>
			<th><a href="<?= URL ?>task/index/<?= $List['list_id']?>?sort=description">Description</a></th>
			<th><a href="<?= URL ?>task/index/<?= $List['list_id']?>?sort=duration">Duration</a></th>
			<th><a href="<?= URL ?>task/index/<?= $List['list_id']?>?sort=status">Status</a></th>
			<th colspan="2"><a href="<?= URL ?>task/index/<?= $List['list_id']?>?sort=id">Action</a></th>
		</tr>
		<?php foreach ($Tasks as $task) { ?>
		<tr>
			<td><?= $task['task_name']; ?></td>
			<td><?= $task['task_description']; ?></td>
			<td><?= $task['task_duration']; ?></td>
			<td><?= $task['task_status']; ?></td>
			<td><a href="<?= URL ?>task/editTask/<?=$task['task_id']?>/<?=$List['list_id']?>">Edit</a></td>
			<td><a href="<?= URL ?>task/deleteTask/<?=$task['task_id']?>/<?=$List['list_id']?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<br><input type="text" id="inputFilter" value="<?php if(isset($_GET["filter"])) {echo $_GET["filter"];} ?>"><button id="searchButton">Search</button>
</main>