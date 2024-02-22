<div class="popup" id="popForm">
<div class="form_container">
	<button id="closeBtn" onclick="closeForm()"><i class="fa-solid fa-close"></i></button>

	<form method="POST" id="articleform">
	<h2 class="text-center" id="title">Nouveau article</h2>

	<div class="mb-2">
						<label  class="form-label mb-0">Nom</label>
						<input type="text" name="txtNom" id="txtNom" class="form-control" placeholder="nom" required>
					</div>
					
					<div class="mb-2">
						<button name="btAdd" id="btAdd">Ajouter</button>
					</div>
				
				
	</form>
	<form method="POST" id="confirmationform">
		
	<p id="titlepara"><i class="fa-regular fa-question"></i>Voulez-vous vraiment supprimer l'article?</p>	
	<div style="display:flex;justify-content: space-around;margin-top: 2vw;">
		<button style="background:red">Non</button>
		<button style="background:green;" name="btDelete" id="btDelete1">Oui</button>
	</div>
	</form>
	<style type="text/css">

.popup #confirmationform p{
			
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 1vw;
			margin:2vw;font-size: 1.3vw;
		}
		.popup #confirmationform p i{
			font-size: 3vw;
			padding: 2vw;
			width: 6vw;
			height: 6vw;
			border-radius: 50%;
			background-color: red;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0px 0px 4px black;
		}
	</style>
</div>
</div>