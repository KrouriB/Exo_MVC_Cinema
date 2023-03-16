<?php

class Personne
{
	private string $nom;
	private string $prenom;
	private string $sexe;
	private DateTime $dateDeNaissance;
	private array $films;

	public function __construct(string $nom, string $prenom, string $sexe, string $laDateNaissance)
	{
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->sexe = $sexe;
		$this->dateDeNaissance = new DateTime($laDateNaissance);
		$this->films = [];
	}



	public function set_nom(string $nom)
	{
		$this->nom = $nom;
	}
	public function get_nom()
	{
		return $this->nom;
	}
	public function set_prenom(string $prenom)
	{
		$this->prenom = $prenom;
	}
	public function get_prenom()
	{
		return $this->prenom;
	}
	public function set_sexe(string $sexe)
	{
		$this->sexe = $sexe;
	}
	public function get_sexe()
	{
		return $this->sexe;
	}
	public function set_dateDeNaissance(string $laDateNaissance)
	{
		$this->dateDeNaissance = new DateTime($laDateNaissance);
	}
	public function get_dateDeNaissance()
	{
		return $this->dateDeNaissance;
	}



	public function get_nom_prenom()
	{
		return  $this->nom . " " . $this->prenom;
	}

	public function ajoutFilm(Film $leFilm)
	{
		$this->films[] = $leFilm;
	}
}
