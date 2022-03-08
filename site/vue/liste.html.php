<table>
	<?php
		echo "<tr>";
			echo "<td><b>Nom</b></td>";
			echo "<td><b>Prénom</b></td>";
			echo "<td><b>Adresse</b></td>";
			echo "<td><b>Hotel</b></td>";
			echo "<td><b>Organisme</b></td>";
			echo "<td><b>Téléphone</b></td>";
			echo "<td><b>Inscription</b></td>";

		echo "</tr>";
	foreach ($c->data["liste"] as $ligne) {
		$numHotel = $c->modele->getHotelIdByName($ligne->NOM_HOTEL)['NUM_HOTEL'];
		$numOrganisme = $c->modele->getOrganismeIdByName($ligne->NOM_ORGANISME)['NUM_ORGANISME'];
		echo "<tr>";
			echo "<td>".$ligne->NOM_CONGRESSISTE."</td>";
			echo "<td>".$ligne->PRENOM_CONGRESSISTE."</td>";
			echo "<td>".$ligne->ADRESSE_CONGRESSISTE."</td>";
			echo "<td>".$ligne->NOM_HOTEL."</td>";
			echo "<td>".$ligne->NOM_ORGANISME."</td>";
			echo "<td>".$ligne->TEL_CONGRESSISTE."</td>";
			echo "<td>".$ligne->DATE_INSCRIPTION."</td>";
		echo "</tr>";
	}

?>
</table>