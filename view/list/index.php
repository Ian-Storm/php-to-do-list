<main>
	
	<header>
		<h1>To-Do-Lists</h1>
	</header>
				<li><a href="edit.php"><h4>Add a list</h4></a></li>
	<table>
		<tr>
			<th>List Name</th>
			<th colspan="3">Action</th>
		</tr>
		<?php foreach ($Lists as $list) { ?>
		<tr>
			<td><?= $list['list_name']; ?></td>
			<td><a href="<?= URL ?> list/readlist/ <?= $list['list_id'] ?> ">Show</a></td>
			<td><a href="<?= URL ?> list/readlist/ <?= $list['list_id'] ?> ">Edit</a></td>
			<td><a href="<?= URL ?> list/readlist/ <?= $list['list_id'] ?> ">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</main>