<?php
class typeformation{
    private ?string $domaine= null;
    private ?string $description= null;
    private ?string $id_typeformation= null;
    public function __construct($id_typeformation,$domaine,$description)
    {
        $this->id_typeformation = $id_typeformation;
        $this->domaine = $domaine;
        $this->description = $description;
    }
    public function setid_typeformation($id_typeformation)
    {
        $this->id_typeformation = $id_typeformation;
        return $this;
        
    }
    public function getid_typeformation()
    {
        return $this->id_typeformation;
    }
    public function setdescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
        return $this;
    }
    public function getDomaine()
    {
        return $this->domaine;
    }
}
?>