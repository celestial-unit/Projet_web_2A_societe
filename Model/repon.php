<?php

class reponsec
{
    private ?int $id_r = null;
    private ?string $reponse = null;
    public function __construct($id_r, $r)
    {
        $this->id_r = $id_r;
        $this->reponse=$r;
    }

    /**
     * Get the value of idreclamation
     */
    public function getIdreclamationt()
    {
        return $this->id_r;
    }

    /**
     * Get the value of type
     */
    public function getreponse()
    {
        return $this->reponse;
    }

    
    public function setreponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    
}
