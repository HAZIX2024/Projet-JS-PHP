<?php

class Matiere {
    public $id;
    public $nom_matiere;
    public $coefficient;

    public function __construct($id, $nom_matiere, $coefficient) {
        $this->id = $id;
        $this->nom_matiere = $nom_matiere;
        $this->coefficient = $coefficient;
    }
}
?>