<?php 

	foreach ($request as $result) {
		if (empty($result["Travel"]["start"])) {
			echo "Pas de résultat";
		}
		echo "<p>".$result["Travel"]["start"]."</p>";
		echo "<p>".$result["Travel"]["name"]."</p>";
		echo"<p>".$result["Travel"]["content"]."</p>";
		echo $this->html->link("Voir la fiche du voyage",array("controller"=>"travels","action"=>"view",$result['Travel']['id']));
	}


 ?>