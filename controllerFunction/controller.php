
<?php
		// Todo submit Logic
		if(isset($_POST["todoSubmit"])){
			$textinput = $_POST["textinput"];

			$insert = "INSERT INTO todo(`todo`) VALUES ('$textinput')";
			$res = mysqli_query($connection,$insert);
			print_r($res);
			header("Location:http://localhost/code/TODO_Project_PHP/index.php");
		}
		
		// Todo Edit Logic
		if(isset($_POST["editSubmit"])){
			$textinput = $_POST["editTodo"];
			$id = $_POST["editId"];

			$edit = "UPDATE `todo` SET `todo`='$textinput' WHERE id=$id";
			$res = mysqli_query($connection,$edit);
			print_r($res);
			header("Location:http://localhost/code/TODO_Project_PHP/index.php");
		}
		
		// Todo Delete Logic
		if(isset($_POST["deleteSubmit"])){
			$id = $_POST["deleteId"];

			$delete = "DELETE FROM `todo` WHERE id=$id";
			$res = mysqli_query($connection,$delete);
			print_r($res);
			header("Location:http://localhost/code/TODO_Project_PHP/index.php");
		}
?>