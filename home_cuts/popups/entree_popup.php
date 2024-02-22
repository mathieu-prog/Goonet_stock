<div class="popup" id="popForm">
<div class="form_container">
	<button id="closeBtn" onclick="closeForm()"><i class="fa-solid fa-close"></i></button>

	<?php 
require"home_cuts/popups/cuts/entree_popup_cut.php";
	 ?>
	 	<form method="POST" id="reaproForm">
	<h2 class="text-center" id="title2">Reapprovisionnement</h2>
	<div class="headDesc" style="display:flex;justify-content: center;">
	<p id="txtNom" class="text-center"></p>
	<label id="lbQte">Qte actuelle: 0</label>	
	</div>
	<div class="mb-2">
						<label  class="form-label mb-0">Quantité:</label>
						<input type="number" name="txtNewQte" id="txtNewQte" class="form-control" required>
					</div>
					<div class="mb-2">
						<label  class="form-label mb-0">PA:</label>
						<input type="number" name="txtNewPA" id="txtNewPA" class="form-control" required>
					</div>
					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Observation</label>
						<textarea name="txtNewObs" id="txtNewObs" class="form-control" placeholder="ecrire ici..."></textarea>
					</div>
					<div class="mb-2">
						<button name="btReapro" id="btReapro">Réapprovisionner</button>
					</div>
				
				
	</form>
	<form method="POST" id="confirmationform">
		
	<p id="titlepara"><i id="paraicon" class="fa-regular fa-question"></i>Voulez-vous vraiment supprimer le client?</p>	
	<div style="display:flex;justify-content: space-around;margin-top: 2vw;">
		<button style="background:red" id="btNon" name="btNon">Non</button>
		<button style="background:green;" name="btModify" id="btDelete1">Oui</button>
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
		.popup #reaproForm{
			display: none;
		}

		.popup #reaproForm .headDesc{
			display: flex;
			width: 100%;
		}
	.form-control:focus,.form-select:focus{
  border: 1px solid #2F005A;
  outline: none;
  box-shadow: none;

}
.form-control,select{
  outline: none;
  font-size: 1vw;

}
	</style>
</div>
</div>