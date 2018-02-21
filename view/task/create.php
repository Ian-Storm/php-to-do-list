<h1>Add a Task</h1>

<form action="<?= URL ?>task/addSave" method="post">
	<label>Task name</label><input type="text" name="task_name"><br>
	<label>Task descrip.</label><input type="text" name="task_description"><br>
	<label>Task duration</label><input type="text" name="task_duration"><br>
	<label>Task status</label><input type="text" name="task_status"><br>
	<input type="submit" value="Submit">
</form>