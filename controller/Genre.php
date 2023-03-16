<?php

class Genre
{
	private string $genre;
	private array $films;

	public function __construct(string $genre)
	{
		$this->genre = $genre;
	}

	public function set_genre(string $genre)
	{
		$this->genre = $genre;
	}
	public function get_genre()
	{
		return $this->genre;
	}

	public function ajoutFilm($leFilm)
	{
		$this->films[] = $leFilm;
	}
}
