<h1>Edit a List</h1>

<form action="<?= URL ?>list/editSave/<?= $list['list_id'] ?> " method="post">
	<label>List name</label><input type="text" value="<?= $list['list_name'] ?>" name="list_name">
	<input type="submit" value="Submit">
</form>