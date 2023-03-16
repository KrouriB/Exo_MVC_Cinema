<?php

class Film
{
	private string $titre;
	private DateTime $dateSortieFR;
	private int $temps;
	private Realisateur $real;
	private Genre $genre;
	private string $resume;
	private array $castings;

	public function __construct(string $titre, string $laDateFR, int $temps, Realisateur $real, Genre $genre)
	{
		$this->titre = $titre;
		$this->dateSortieFR = new DateTime($laDateFR);
		$this->temps = $temps;
		$this->real = $real;
		$this->real->ajoutFilm($this);
		$this->genre = $genre;
		$this->genre->ajoutFilm($this);
		$this->castings = [];
	}

	public function set_titre(string $titre)
	{
		$this->titre = $titre;
	}
	public function get_titre()
	{
		return $this->titre;
	}
	public function set_dateSortieFR(string $laDateFR)
	{
		$this->dateSortieFR = new DateTime($laDateFR);
	}
	public function get_dateSortieFR()
	{
		return $this->dateSortieFR;
	}
	public function set_temps(int $temps)
	{
		$this->temps = $temps;
	}
	public function get_temps()
	{
		return $this->temps;
	}
	public function set_real(Realisateur $real)
	{
		$this->real = $real;
	}
	public function get_real()
	{
		return $this->real;
	}
	public function set_genre(Genre $genre)
	{
		$this->genre = $genre;
	}
	public function get_genre()
	{
		return $this->genre;
	}
	public function set_resume(string $resume)
	{
		$this->resume = $resume;
	}
	public function get_resume()
	{
		return $this->resume;
	}

	public function addCasting(Casting $casting)
	{
		$this->castings[] = $casting;
	}

	public function afficherCastingParFilm()
	{
		$display = "";
		$display .= "Dans le film ";
		$display .= $this->titre;
		$display .= "<br>";
		foreach ($this->castings as $unCast) {
			$display .= "Le personnage de " . $unCast->get_role() . " joué par " . $unCast->get_acteur() . "<br>";
		}
		$display .= "<br>";
		echo $display;
	}

	public function __toString()
	{
		return $this->titre;
	}
}
