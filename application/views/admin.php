<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	Add Group:
	<form action='add_group' method='post'>
		<input type='text' name="name"> Stack Name<br>
		<input type='text' name="month"> Month Start Date<br>
		<button type='submit'>Add Group</button>
	</form>
	<?php foreach($active_groups as $group) { ?>
		<?= $group['stack']; ?><br><?= $group['start_date']; ?><br><a href="inactivate_group/<?= $group['id']; ?>"><button>Inactivate</button></a><br><br>
	<?php } ?>
</body>
</html>