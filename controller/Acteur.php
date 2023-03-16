<?php

class Acteur extends Personne
{
	private array $castings;

	public function __construct(string $nom, string $prenom, string $sexe, string $laDateNaissance)
	{
		parent::__construct($nom, $prenom, $sexe, $laDateNaissance);
		$this->castings = [];
	}

	public function addCasting(Casting $casting)
	{
		$this->castings[] = $casting;
	}




	public function afficherParActeur()
	{
		$display = "";
		$display .= "L'acteur ";
		$display .= parent::get_nom_prenom();
		$display .= " à incarner : ";
		foreach ($this->castings as $unRole) {
			$display .= $unRole->get_role() . " dans " . $unRole->get_film() . "<br>";
		}
		$display = "<br>";
	}

	public function __toString()
	{
		return parent::get_nom_prenom();
	}
}
