
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
			<?php include "controllerFunction/showTable.php" ?>
		</tbody>
	</table>
</div>