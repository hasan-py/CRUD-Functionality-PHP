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
