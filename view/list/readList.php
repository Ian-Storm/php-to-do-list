<main>
<header>
		<h1><?= $lists	['list_name']; ?></h1>
	</header>
<nav>
		<ul>
			<li><a href="edit.php"><h4>Add a task</h4></a></li>
			<li><a href=" <?= URL ?> list "><h4>Back to lists</h4></a></li>
		</ul>
	</nav>
	<table>
		<tr>
			<th>Task</th>
			<th>Description</th>
			<th>Duration</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
		<?php foreach ($Tasks as $task) { ?>
		<tr>
			<td><?= $task['task_name']; ?></td>
			<td><?= $task['task_description']; ?></td>
			<td><?= $task['task_duration']; ?></td>
			<td><?= $task['task_status']; ?></td>
			<td>Edit</td>
			<td><a href="<?= URL ?> list/deleteTask/ <?= $task['task_id'] ?>">Delete</td>
		</tr>
		<?php } ?>
	</table>
</main>