<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
	require('functions.php');
	$database = new Database();

	if (isset($_POST['insert'])) {

		$return=$database->insert_data($_POST['age'],$_POST['username'],$_POST['address']);
		if ($return) {
			echo "data inserted";
		}
		else{
			echo "data failed to insert";
		}
	}
	else{
		echo "form not set please fill up form";
	}
 ?>
<h1>INSERT</h1>
<form method="post" action="">
	<input type="number" name="age"> <br><br>
	<input type="text" name="username"><br><br>
	<input type="text" name="address"><br><br>
	<input type="submit" name="insert" >
</form>

<h1>SELECT</h1>
<?php 
	$data=$database->select_data();
?>

<table>
	<tr>
		<th>name</th>
		<th>age</th>
		<th>address</th>
		<th>action</th>
	</tr>
<?php foreach ($data as $value): ?>
	<tr>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['age']; ?></td>
		<td><?php echo $value['address']; ?></td>
		<td>
			<button class="delete" id="<?php echo $value['id']; ?>">DELETE</button>
			<button><a href="update.php?id=<?php echo $value['id']; ?>">UPDATE</a></button>
			
			<!-- <form action="" method="post">
				<input type="hidden" name="" value="<?php echo $value['id']; ?>">
				<input type="submit" name="" value="delete2">
			</form> -->
			
		</td>
	</tr>
<?php endforeach; ?>
</table>

<script>
	$(document).ready(function(){
		$('.delete').click(function(){
			var id=$(this).attr('id');
			$.ajax({
				method:"POST",
				url:"ajax.php",
				data:{action:"delete_data",id:id},
				success:function($return){
					alert($return);
					location.reload();
				}				
			});
		})
	});
</script>
