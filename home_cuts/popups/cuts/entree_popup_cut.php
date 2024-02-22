<form method="POST" id="form" style="gap:10vh">
	<h2 class="text-center" id="title">Enregistrement des entrees</h2>

	
						
						<div style="display:flex; column-gap: 5px;width: 100%;margin-bottom: 3vh;">
						<div style="width: 100%;">
						<label>Provenance</label>
						<select class="form-select" name="comboProv" id="comboProv" onchange ="importValues()">
							<?php 
						if (sizeof($typenames)>0) { ?>
							<?php for ($i=0; $i < sizeof($typenames); $i++) { ?>
								<option value="<?php echo $namesIds[$i]; ?>"><?php echo $typenames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
						

					</div>

						<div style="width: 50%;display: none;" id="divClientsProv">
						<label>Clients</label>
						<select class="form-select" name="comboClientsProv" id="comboClientsProv">
							<?php 
						if (sizeof($clientsNames)>0) { ?>
							<?php for ($i=0; $i < sizeof($clientsNames); $i++) { ?>
								<option value="<?php echo $clientsIds[$i]; ?>"><?php echo $clientsNames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
					</div>

					<div style="width: 50%;display: none;" id="divFournisseursProv">
						<label>Fournisseurs</label>
						<select class="form-select" name="comboFournisseursProv" id="comboFournisseursProv">
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
					
						<div style="display:flex; column-gap: 5px;width: 100%;margin-bottom: 3vh;">
						<div style="width: 100%;">
						<label>Destination</label>
						<select class="form-select" name="comboDest" id="comboDest" onchange="destEvent()">
						
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
						<label>Article</label>
						<select class="form-select" name="comboArticle">
							<?php 
						if (sizeof($articleNames)>0) { ?>
							<?php for ($i=0; $i < sizeof($articleNames); $i++) { ?>
								<option value="<?php echo $articlesIds[$i]; ?>"><?php echo $articleNames[$i];?></option>
							<?php } ?>
						<?php }
						 ?>
						</select>
					</div>
					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Prix d'achat</label>
						<input type="number" name="txtPA" id="txtPA" placeholder="PA" class="form-control" required>
					</div>
					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Quantite</label>
						<input type="text" name="txtQte" id="txtQte" placeholder="Qte" class="form-control" required>
					</div>
					<div style="margin-bottom: 3vh;display: flex;gap: 0.5vw;">
						<input type="checkbox" name="checkPyt" class="form-check" checked>
						<label>Payé</label>
					</div>
					<div style="margin-bottom: 3vh;">
						<label  class="form-label mb-0">Observation</label>
						<textarea name="txtObs" class="form-control" placeholder="ecrire ici..."></textarea>
					</div>
					<div class="mb-2">
						<button name="btAddEntry" id="btAddEntry">Ajouter</button>
					</div>
				
				
	</form>