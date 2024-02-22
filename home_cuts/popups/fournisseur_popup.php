<div class="popup" id="popForm">
<div class="form_container">
	<button id="closeBtn" onclick="closeForm()"><i class="fa-solid fa-close"></i></button>

	<form method="POST" id="form">
	<h2 class="text-center" id="title">Nouveau fournisseur</h2>

	<div class="mb-2">
						<label  class="form-label mb-0">Nom</label>
						<div style="display:flex; column-gap: 5px;">
						<input type="text" name="txtNom" id="txtNom" class="form-control" placeholder="nom" required>
						<input type="text" name="txtPrenom" id="txtPrenom" class="form-control" placeholder="prenom" required>
						</div>
					</div>
					
					<div class="mb-2">
						<label  class="form-label mb-0">Societe</label>
						<input type="text" name="txtSociete" id="txtSociete" placeholder="ex: Goonet burundi" class="form-control">
					</div>
					<div class="mb-2">
						<label  class="form-label mb-0">Telephone</label>
						<input type="Telephone" name="txtTel" id="txtTel" placeholder="ex: 61000000" class="form-control" required>
					</div>
					<div class="mb-2">
						<label  class="form-label mb-0">Adresse</label>
						<input type="text" name="txtAdresse" id="txtAdresse" placeholder="ex: Kabondo av1,n54" class="form-control" required>
					</div>
					<div class="mb-2">
						<button name="btAdd" id="btAdd">Ajouter</button>
					</div>
				
				
	</form>
	<form method="POST" id="confirmationform">
		
	<p><i class="fa-regular fa-question"></i>Voulez-vous vraiment supprimer le fournisseur?</p>	
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