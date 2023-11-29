<?php

class forum
{
    private ?int $id = null;
    private ?string $titre = null;
    private ?string $date = null;
    private ?string $description = null;


    public function __construct($titre, $date, $description)
    {
        $this->titre = $titre;
        $this->date = $date;
        $this->description = $description;
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function getTitre()
    {
        return $this->titre;
    }

    
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    
    public function getDate()
    {
        return $this->date;
    }

    
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
