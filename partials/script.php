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