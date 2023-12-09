<?php 
    class formation{
        private ?string $Nom =null;
        private ?int $ispaid= null;
        private ?string $niveau= null;
        private ?DateTime $datedebut = null;
        private ?string $image_url= null;
        private ?int  $nbheures= null;
        private ?string $type_cours= null;
        private ?string $nature_cours= null;
        private ?string $id_typeformation= null;
        private ?string $domaine = null;
        private ?string $location = null;
       private ?string $id_formation= null;
       private ?string $tel= null;
       private ?string $email= null;


        public function __construct($id_typeformation, $Nom,$ispaid,$niveau,$image_url,$nbheures,$type_cours,$nature_cours,$datedebut,$domaine,$id_formation,$location,$tel,$email)
        {
          
            $this->id_typeformation = $id_typeformation;
            $this->Nom = $Nom;
            $this->ispaid = $ispaid;
            $this->niveau = $niveau;
            $this->image_url = $image_url;
            $this->nbheures = $nbheures;
            $this->type_cours = $type_cours;
            $this->nature_cours = $nature_cours;
            $this->datedebut = $datedebut;
            $this->domaine = $domaine;
            $this->id_formation = $id_formation;
            $this->location = $location;
            $this->tel = $tel;
            $this->email = $email;

           // $this->description = $description;
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
    public function setlocation($location)
    {
        $this->location = $location;
        return $this;
      
    }
    public function getlocation()
    {
        return $this->location;
    }
    public function settel($tel)
    {
        $this->location = $tel;
        return $this;
      
    }
    public function gettel()
    {
        return $this->tel;
    }
    public function setemail($email)
    {
        $this->email = $email;
        return $this;
      
    }
    public function getemail()
    {
        return $this->email;
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
    public function setispaid($ispaid)
    {
        $this->ispaid = $ispaid;
        return $this;
    }
    public function getispaid()
    {
        return $this->ispaid;
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
    public function getdatedebut(): ?DateTime {
        return $this->datedebut;
    }

    public function setdatedebut(?DateTime $datedebut): void {
        $this->datedebut = $datedebut;
    }
    /*public function setdatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
        return $this;
    }
    public function getdatedebut()
    {
        return $this->datedebut;
    }*/
    public function setnbheures($nbheures)
    {
        $this->nbheures = $nbheures;
        return $this;
    }
    public function getnbheures()
    {
        return $this->nbheures;
    }
    public function settype_cours($type_cours)
    {
        $this->type_cours = $type_cours;
        return $this;
    }
    public function gettype_cours()
    {
        return $this->type_cours;
    } 
    public function setnature_cours($nature_cours)
    {
        $this->nature_cours = $nature_cours;
        return $this;
    }
    public function getnature_cours()
    {
        return $this->nature_cours;
    }
   /* public function setdescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function getdescription()
    {
        return $this->description;
    }*/
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
        return $this;
    }
    public function getDomaine()
    {
        return $this->domaine;
    } 
    public function setidformation($id_formation)
    {
        $this->id_formation = $id_formation;
        return $this;
    }
    public function getidformation()
    {
        return $this->id_formation;
    } 
    }
?>