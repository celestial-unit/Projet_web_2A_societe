<?php 
    class formation{
        private ?int $id_formation= null;
        private ?string $Nom =null;
        private ?string $paiement= null;
        private ?string $Domaine= null;
        private ?string $niveau= null;
        private ?string $image_url= null;
        private ?string $description= null;
        public function __construct($id_formation, $Nom,$paiement,$Domaine,$niveau,$image_url,$description)
        {
            $this->id_formation = $id_formation;
            $this->Nom = $Nom;
            $this->paiement = $paiement;
            $this->Domaine = $Domaine;
            $this->niveau = $niveau;
            $this->image_url = $image_url;
            $this->description = $description;

        }
        public function getid_formation()
    {
        return $this->id_formation;
    }
    public function setid_formation($id_formation)
    {
        $this->id_formation = $id_formation;
        return $this;
    }
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
        return $this;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function setpaiement($paiement)
    {
        $this->paiement = $paiement;
        return $this;
    }
    public function getpaiement()
    {
        return $this->paiement;
    }
    public function setDomaine($Domaine)
    {
        $this->Domaine = $Domaine;
        return $this;
    }
    public function getDomaine()
    {
        return $this->Domaine;
    }
    public function setniveau($niveau)
    {
        $this->niveau = $niveau;
        return $this;
    }
    public function getniveau()
    {
        return $this->niveau;
    }
    public function setimage_url($image_url)
    {
        $this->image_url = $image_url;
        return $this;
    }
    public function getimage_url()
    {
        return $this->image_url;
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
    }





?>