<!DOCTYPE html>
<html>
<head>
	<title>Todo App With PHP</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

	<?php
		// Database details for connection
		$dbserver = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "test";
		
		// Connection Logic
		$connection = mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
		if(!$connection){
			echo "<td>Not connected</td>";
		}

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


	<div class="container mt-5">
		<h3 class="center-align blue-text">Todo App with PHP & Vanila Js</h3>
	</div>

	<div class="container mx-5">
		<div class="row">
			<form method="POST" action="http://localhost/code/TODO_Project_PHP/index.php" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<textarea name="textinput" id="textarea" class="materialize-textarea"></textarea>
						<label for="textarea">Todo</label>
						<button name="todoSubmit" class="waves-effect waves-light btn blue lighten-1" type="submit"><i class="material-icons">add</i></button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="container">
		<table id="myTable">
			<thead>
				<tr>
					<th>no.</th>
					<th>Todo</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<!-- PHP Code for fetch data & show into table -->
				<?php 
				$query = "SELECT * FROM `todo`";
				$res = mysqli_query($connection,$query);
				while ($fetch = mysqli_fetch_assoc($res)){
					echo "<tr>";  
					echo "<td>".$fetch['id']."</td>"; 
					echo "<td >".$fetch['todo']."</td>";
					echo "<td>";
					echo "<button data-toggle='modal' data-target='#exampleModalCenter' style='margin:5px;' href='edit/' class='editBtn waves-effect waves-light btn green lighten-1'><i class='material-icons'>edit</i></button>"."<button style='margin:5px;' href='del/' data-toggle='modal' data-target='#deleteModal' class='waves-effect waves-light btn red lighten-1 deleteBtn'><i class='material-icons'>delete</i></button>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

		<!-- Delete Modal BootStrap -->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Delete Todo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h3>Are Your Sure To Delete this ?</h3>
						<p id="p"></p>
						<form action="http://localhost/code/TODO_Project_PHP/index.php" method="POST">
							<input type="hidden" name="deleteId" id="deleteId">
							<input class="btn red lighten-1" name="deleteSubmit" type="submit" value="Delete">
							<button type="button" class="btn blue lighten-1" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Modal BootStrap -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Todo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="http://localhost/code/TODO_Project_PHP/index.php" method="POST">
							<input type="hidden" name="editId" id="editId">
							<label for="textarea">Todo</label>
							<textarea name="editTodo" id="editTodo" class="materialize-textarea"></textarea>
							<input name="editSubmit" type="submit" class="btn green lighten-1" value="Edit">
							<button type="button" class="btn blue lighten-1" data-dismiss="modal">Close</button>
						</form>
					</div>      
				</div>
			</div>
		</div>

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		
		<!-- These are meterialize css CDN -->
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	
		<!-- These are custom Javascript -->
		<script>
			let editBtn = document.getElementsByClassName('editBtn')
			Array.from(editBtn).forEach(element=>{
				element.addEventListener("click",(e)=>{
					let tr = e.target.parentNode.parentNode.parentNode
					let title = tr.getElementsByTagName("td")[1].innerText
					let id = tr.getElementsByTagName("td")[0].innerText
					console.log(title,id)
					let editTodo = document.getElementById('editTodo')
					let editId = document.getElementById('editId')
					editTodo.value = title
					editId.value = id

				})
			})

			let deleteBtn = document.getElementsByClassName('deleteBtn')
			Array.from(deleteBtn).forEach(element=>{
				element.addEventListener("click",(e)=>{
					let tr = e.target.parentNode.parentNode.parentNode
					let title = tr.getElementsByTagName("td")[1].innerText
					let id = tr.getElementsByTagName("td")[0].innerText
					console.log(title,id)

					let deleteId = document.getElementById('deleteId')
					let p = document.getElementById('p')
					p.innerHTML = title
					deleteId.value = id

				})
			})
		</script>


		<!-- All Are BootStrap CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	</body>
	</html>
