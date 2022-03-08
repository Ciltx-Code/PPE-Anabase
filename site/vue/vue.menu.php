<div class="menu">
	<?php 
		if (isset($_GET["controleur"]) && ($_GET["controleur"] == "congressiste")) {
			?>
			<ul>
				<li><a href="./">Accueil</a></li>
				<li><a href="?controleur=listecongressiste">Liste des congréssistes</a></li>
			</ul>
			<?php
		}else if(isset($_GET["controleur"]) && $_GET["controleur"] == "listecongressiste"){
			?>
			<ul>
				<li><a href="./">Accueil</a></li>
				<li><a href="?controleur=congressiste">Gérer les congréssistes</a></li>
			</ul>
			<?php
		}else{
			?>
			<ul>
				<li><a href="?controleur=congressiste">Gérer les congréssistes</a></li>
				<li><a href="?controleur=listecongressiste">Liste des congréssistes</a></li>
			</ul>
			<?php
		}
	?>
	
</div>
