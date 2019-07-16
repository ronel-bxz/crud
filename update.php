
<?php
	require('functions.php');

	$method=new Database();

	if (isset($_POST['update'])) {
		
		$result=$method->update_user($_POST['user_name'],$_POST['age'],$_POST['address'],$_GET['id']);

		if ($result) {
			echo "user data updated";
			// header('location:index.php');
		}
		else{
			echo "user data failed to update";
		}
	}
 ?>
 <?php

 	$data=$method->select_data_byid($_GET['id']); 
 	foreach ($data as $value):
 ?>
 <form method="post" action="">
 	<input type="text" name="user_name" value="<?php echo $value['name']; ?>"> <br><br>
 	<input type="number" name="age" value="<?php echo $value['age']; ?>"><br><br>
 	<input type="text" name="address" value="<?php echo $value['address']; ?>"><br><br>
 	<input type="submit" name="update" value="update">
 </form>
 <a href="index.php">back --></a>
<?php endforeach; ?>