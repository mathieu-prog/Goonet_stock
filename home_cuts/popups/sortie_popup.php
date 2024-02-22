<div class="popup" id="popForm">
<div class="form_container">
	<button id="closeBtn" onclick="closeForm()"><i class="fa-solid fa-close"></i></button>

<form method="POST" id="form" style="gap:10vh">
	<h2 class="text-center" id="title">Enregistrement des sorties</h2>

	
						
						<div style="display:flex; column-gap: 5px;width: 100%;margin-bottom: 3vh;">
						<div style="width: 100%;">
						<label>Article</label>
						<select class="form-select" name="comboArticle" id="comboArticle" onchange="selectAuto();">
							<?php 
						if (sizeof($articleNames)>0) { ?>
							<?php for ($i=0; $i < sizeof($articleNames); $i++) { ?>
								<option value="<?php echo $articlesIds[$i]; ?>"><?php echo $articleNames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
						

					</div>

						<div style="width:100%;">
							<div id="divQteProv">
								<label style="display:flex;align-items:center;height: 100%;margin:0px 0.5vw 0px 0.5vw;">Quantite disponible:</label>
						<select name="comboOldQte" id="comboQteSortie" style="width:auto;font-size: 1vw;" disabled>
							<?php 
						if (sizeof($qteValues)>0) { ?>
							<?php for ($i=0; $i < sizeof($qteValues); $i++) { ?>
								<option value="<?php echo $qteIds[$i]; ?>"><?php echo $qteValues[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
							</div>
						
					</div>

					</div>
					
						<div style="display:flex; column-gap: 5px;width: 100%;margin-bottom: 3vh;">
						<div style="width: 100%;">
						<label>Destination</label>
						<select class="form-select" name="comboDest" id="comboDest" onchange="destEvent()">
							<?php 
						if (sizeof($typenames)>0) { ?>
							<?php for ($i=0; $i < sizeof($typenames); $i++) { ?>
								<option value="<?php echo $namesIds[$i]; ?>"><?php echo $typenames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
						

					</div>

						<div style="width: 60%;display: none;" id="divClientsDest">
						<label>Clients</label>
						<select class="form-select" name="comboClientsDest" id="comboClientsDest">
							<?php 
						if (sizeof($clientsNames)>0) { ?>
							<?php for ($i=0; $i < sizeof($clientsNames); $i++) { ?>
								<option value="<?php echo $clientsIds[$i]; ?>"><?php echo $clientsNames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
					</div>

					<div style="width: 50%;display: none;" id="divFournisseursDest">
						<label>Fournisseurs</label>
						<select class="form-select" name="comboFournisseursDest" id="comboFournisseursDest">
							<?php 
						if (sizeof($frssrNames)>0) { ?>
							<?php for ($i=0; $i < sizeof($frssrNames); $i++) { ?>
								<option value="<?php echo $frssrIds[$i]; ?>"><?php echo $frssrNames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
					</div>
					</div>

					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Quantite</label>
						<input type="text" name="txtQte" id="txtQte" placeholder="Qte" class="form-control" required oninput="verifyQty(this)">
						<span id="lbmsg">La quantite doit etre inferieur ou egale(<=) a la quantite disponible</span>
					</div>
					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Observation</label>
						<textarea name="txtObs" class="form-control" placeholder="ecrire ici..."></textarea>
					</div>
					<div class="mb-2">
						<button name="btAddEntry" id="btAddEntry" disabled onclick="enable()">Ajouter</button>
					</div>
				
				
	</form>
	
	<style type="text/css">
	.form-control:focus,.form-select:focus{
  border: 1px solid #2F005A;
  outline: none;
  box-shadow: none;

}
.form-control,.form-select{
  font-size: 1vw;

}
	</style>
</div>
</div>