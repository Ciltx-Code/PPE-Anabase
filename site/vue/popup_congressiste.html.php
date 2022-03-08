<div class="popup" id="popup">
	<div class="overlay" id=slideSource>

		<form action="" class="form-container" method="post">
			<img src="./images/croix.png" class="croix" onclick="closeForm()">
			<h1>Congressiste</h1>
			<input type="hidden"  id="idCongressiste" name="idCongressiste" value="">
			<label for="nc">
				<strong>Nom :</strong>
			</label>
			<input type="text" id="nomcongressiste" value="" placeholder="Nom de congressiste" name="nomcongressiste" required><br/>
			<label for="pnc">
				<strong>Prénom :</strong>
			</label>
			<input type="text" id="prenomcongressiste" value="" placeholder="Prénom de congressiste" name="prenomcongressiste" required><br/>
			<label for="ac">
				<strong>Adresse :</strong>
			</label>
			<input type="text" id="adrcongressiste" value="" placeholder="Adresse du congressiste" name="adrcongressiste" required><br/>
			<label for="pnc">
				<strong>Numéro de telephone :</strong>
			</label>
			<input type="tel" pattern="[0-9]{10}" id="telcongressiste" value="" placeholder="Numéro de telephone" name="telcongressiste" required><br/>
			<label for="dateInscription">
				<strong>Date d'inscription :</strong>
			</label>
			<input type="date" id="date" value="" placeholder="dateInscription" name="date" required><br/>
			<label for="Hotel :">
				<strong>Hotel :</strong>
			</label>
			<select name="hotel"id="hotel">
                <option disabled selected="selected">Choisissez un hôtel</option>
                <?php
                $hotels = $c->hotel["liste"];
                foreach ($hotels as $ligne) {
                    echo "<option value='".$ligne->NUM_HOTEL."'>".$ligne->NOM_HOTEL."</option>";
                }
                ?>
            </select><br/>
			<label for="Organismes">
				<strong>Organismes :</strong>
			</label>
			<select name="organisme" id="organisme">
                <option disabled selected="selected">Choisissez un organisme</option>
                <?php
                $organismes = $c->organisme["liste"];
                foreach ($organismes as $ligne) {
                    echo "<option name='organismeAjout' value='".$ligne->NUM_ORGANISME."'>".$ligne->NOM_ORGANISME."</option>";
                }
                ?>
            </select><br/>

			<input type="submit" name="todo" class="btn" value="Enregistrer">
			<input type="submit" name="todo" class="btn" value="Supprimer">

		</form>

	</div>
</div>