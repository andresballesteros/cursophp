<?php
include_once 'includes/db.php';
class Survey extends DB
{
    private $totalVotes;
    private $optionSelected;

    public function setOptionSelected($option)
    {
        $this->optionSelected = $option;
    }

    public function getOptionSelected()
    {
        return $this->optionSelected;
    }

    public function vote()
    {
        $query = $this->connect()->prepare('UPDATE lenguajes SET votos = votos+1 WHERE opcion = :opcion');
        $query->execute(['opcion' => $this->optionSelected]);
    }

    public function showResult()
    {
        return $this->connect()->query('SELECT * FROM lenguajes');
    }

    public function totalVotes()
    {
        $query = $this->connect()->query('SELECT SUM(votos) AS votos_totales FROM lenguajes');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
        return $this->totalVotes;
    }

    public function getPercentageVote($votes)
    {
        return round(($votes / $this->totalVotes) * 100, 0);
    }
}
