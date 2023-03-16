<?php

class Role
{
	private string $role;
	private array $castings;

	public function __construct(string $role)
	{
		$this->role = $role;
		$this->castings = [];
	}

	public function set_role(string $role)
	{
		$this->role = $role;
	}
	public function get_role()
	{
		return $this->role;
	}

	public function addCasting(Casting $casting)
	{
		$this->castings[] = $casting;
	}


	public function afficherCastingParRole()
	{
		$display = "";
		$display .= "Les acteur ayant jouer ";
		$display .= $this;
		$display = " sont : <br>";
		foreach ($this->castings as $unActeur) {
			$unActeur->get_acteur() . " dans " . $unActeur->get_film();
		}
		$display .= "<br>";
		echo $display;
	}

	public function __toString()
	{
		return $this->role;
	}
}
