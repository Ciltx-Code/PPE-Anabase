<div class="popup" id="popupAjout">
	<div class="overlay">
		<form action="" class="form-container" method="post">
			<img src="./images/croix.png" class="croix" onclick="closeAddForm()">
			<h1>Congressiste</h1>
			<input type="hidden" name="action" value="categorie">
			<label for="nc">
				<strong>Nom :</strong>
			</label>
			<input type="text" id="nomCongressisteAjout" value="" placeholder="Nom de congressiste" name="nomCongressisteAjout" required><br/>
			<label for="pnc">
				<strong>Prénom :</strong>
			</label>
			<input type="text" id="prenomCongressisteAjout" value="" placeholder="Prénom de congressiste" name="prenomCongressisteAjout" required><br/>
			<label for="ac">
				<strong>Adresse :</strong>
			</label>
			<input type="text" id="adrcongressisteAjout" value="" placeholder="Adresse du congressiste" name="adrcongressisteAjout" required><br/>
			<label for="pnc">
				<strong>Numéro de telephone :</strong>
			</label>
			<input type="tel" pattern="[0-9]{10}" id="telcongressisteAjout" value="" placeholder="Numéro de telephone" name="telcongressisteAjout" required><br/>
			<label for="emailCongressiste">
				<strong>Email :</strong>
			</label>
			<input type="email" id="emailCongressiste" value="" placeholder="Email" name="emailCongressiste" required><br/>
			<label for="dateInscription">
				<strong>Date d'inscription :</strong>
			</label>
			<input type="date" id="dateAjout" value="" placeholder="dateInscription" name="dateAjout" required><br/>
			<label for="Hotel">
				<strong>Hotel :</strong>
			</label>
            <select required name="hotelAjout">
                <option value="" disabled selected="selected">Choisissez un hôtel</option>
                <?php
                $hotels = $c->hotel["liste"];
                foreach ($hotels as $ligne) {
                    echo "<option value='".$ligne->NUM_HOTEL."'>".$ligne->NOM_HOTEL."</option>";
                }
                ?>
            </select>
            <br>
			<label for="Organismes">
				<strong>Organismes :</strong>
			</label>

            <select required name="organismeAjout">
                <option value="" disabled selected="selected">Choisissez un organisme</option>
                <?php
                $organismes = $c->organisme["liste"];
                foreach ($organismes as $ligne) {
                    echo "<option name='organismeAjout' value='".$ligne->NUM_ORGANISME."'>".$ligne->NOM_ORGANISME."</option>";
                }
                ?>
            </select>

			<input type="submit" name="todo" class="btn" value="Ajouter">
			

		</form>
	</div>
</div>