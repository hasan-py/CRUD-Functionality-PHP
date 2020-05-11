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