<h1>Edit a Task</h1>

<form action="<?= URL ?>task/editSave/<?= $task['task_id'] ?>/<?= $List['list_id'] ?> " method="post">
	<label><h6>Task name</h6></label><input type="text" value="<?= $task['task_name'] ?>" name="task_name"><br>
	<label><h6>Task description</h6></label><input type="text" value="<?= $task['task_description'] ?>" name="task_description"><br>
	<label><h6>Task duration</h6></label><input type="text" value="<?= $task['task_duration'] ?>" name="task_duration"><br>
	<label><h6>Task status</h6></label>
	<select name="task_status">
	  <option <?php if ($task['task_status'] == 'Not Done') { echo 'selected'; } ?> value="Not Done">Not Done</option>
	  <option <?php if ($task['task_status'] == 'Done') { echo 'selected'; } ?> value="Done">Done</option>
	</select>
	<input type="submit" value="Submit">
</form>