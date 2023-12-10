<?php
class type
{
    private ?int $id_types = null;
    private ?string $nom_types = null;

    public function __construct(?int $id_types, string $nom_types)
    {
        $this->id_types = $id_types;
        $this->nom_types = $nom_types;
    }

    public function getIdtypestage()
    {
        return $this->id_types;
    }

    public function getNomtype() {
        return $this->nom_types;
    }
    public function setDescription($nom_types)
    {
        $this->nom_types = $nom_types;
        return $this;
    }
}
?>