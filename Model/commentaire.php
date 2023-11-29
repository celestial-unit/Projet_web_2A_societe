<?php

class commentaire
{
    private ?int $id = null;
    private ?string $date = null;
    private ?string $contenu = null;
    private ?int $id_forum = null;


    public function __construct($date, $contenu, $id_forum)
    {
        $this->date = $date;
        $this->contenu = $contenu;
        $this->id_forum = $id_forum;
    }

    
    public function getId()
    {
        return $this->id;
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


    public function getContenu()
    {
        return $this->contenu;
    }

    
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }


    public function getIDForum()
    {
        return $this->id_forum;
    }

    
    public function setIDForum($id_forum)
    {
        $this->id_forum = $id_forum;

        return $this;
    }
}
