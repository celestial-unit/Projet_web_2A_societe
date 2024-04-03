<?php

class reclamation
{
    private ?int $id_r = null;
    private ?string $type = null;
    private ?string $subject = null;
    private ?string $titre = null;
    private ?string $etat = "en cours de traitement";
    private ?string $timestamp_column = null;
    
    public function __construct($id_r, $t, $s, $type,$e,$timestamp_column)
    {
        $this->id_r = $id_r;
        $this->type = $type;
        $this->titre = $t;
        $this->subject = $s;
        $this->etat = $e;
        $this->timestamp_column = $timestamp_column;
       
    }
    public function getTimestampColumn()
    {
        return $this->timestamp_column;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of titre
     */
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of subject
     */
    public function getsubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setsubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function getEtat()
    {
        return $this->etat;

    }

}
