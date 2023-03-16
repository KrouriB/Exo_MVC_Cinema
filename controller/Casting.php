<?php

class Casting
{
	private Film $film;
	private Acteur $acteur;
	private Role $role;

	public function __construct(Film $film, Acteur $acteur, Role $role)
	{
		$this->film = $film;
		$this->acteur = $acteur;
		$this->role = $role;
		$film->addCasting($this);
		// TODO $film->addCasting($this) face à $this->film->addCasting($this) a tester après pour voir si ça marche
		// $this->film->addCasting($this);
		$acteur->addCasting($this);
		// $this->acteur->addCasting($this);
		$role->addCasting($this);
		// $this->role->addCasting($this);
	}

	public function set_film(Film $film)
	{
		$this->film = $film;
	}
	public function get_film()
	{
		return $this->film;
	}
	public function set_acteur(Acteur $acteur)
	{
		$this->acteur = $acteur;
	}
	public function get_acteur()
	{
		return $this->acteur;
	}
	public function set_role(Role $role)
	{
		$this->role = $role;
	}
	public function get_role()
	{
		return $this->role;
	}
}
