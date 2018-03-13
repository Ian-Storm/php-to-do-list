<h1>Add a Task</h1>

<form action="<?= URL ?>task/addSave/<?= $List['list_id'] ?>" method="post">
	<label><h6>Task name</h6></label><input type="text" name="task_name"><br>
	<label><h6>Task description</h6></label><input type="text" name="task_description"><br>
	<label><h6>Task duration</h6></label><input type="text" name="task_duration"><br>
	<label><h6>Task status</h6></label>
	<select name="task_status">
	  <option value="Not Done">Not Done</option>
	  <option value="Done">Done</option>
	</select>
	<input type="submit" value="Submit">
</form>