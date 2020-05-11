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