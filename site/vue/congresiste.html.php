<table>
	<?php
		echo "<tr>";
			echo "<td class = 'selection'><b>selection</b></td>";
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
		echo "<tr class='pasdemouvement'>";
		?>
			
			<td class = 'selection'><input type='radio' name='choix' value="<?= $ligne->NUM_CONGRESSISTE ?>" 
			onclick='openForm("<?= htmlentities($ligne->NOM_CONGRESSISTE, ENT_QUOTES)?>","<?= htmlentities($ligne->PRENOM_CONGRESSISTE,ENT_QUOTES) ?>","<?= htmlentities($ligne->ADRESSE_CONGRESSISTE,ENT_QUOTES) ?>","<?=$numHotel?>","<?= $numOrganisme ?>","<?= $ligne->TEL_CONGRESSISTE ?>","<?= $ligne->DATE_INSCRIPTION ?>","<?= $ligne->NUM_CONGRESSISTE?>")'>
			</td>
			<?php
			echo "<td>".$ligne->NOM_CONGRESSISTE."</td>";
			echo "<td>".$ligne->PRENOM_CONGRESSISTE."</td>";
			echo "<td>".$ligne->ADRESSE_CONGRESSISTE."</td>";
			echo "<td>".$ligne->NOM_HOTEL."</td>";
			echo "<td>".$ligne->NOM_ORGANISME."</td>";
			echo "<td>".$ligne->TEL_CONGRESSISTE."</td>";
			echo "<td>".$ligne->DATE_INSCRIPTION."</td>";
		echo "</tr>";
	}
		echo "<tr>";
			echo "<td class = 'selection' id='imgAjouter'><img src='./images/plus-circle.svg' onclick='openAddForm()'></td>";
		echo "</tr>";

?>
</table>