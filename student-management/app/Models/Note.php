<?php

class Note {
    public $id;
    public $etudiant_id;
    public $matiere_id;
    public $note;

    public function __construct($id, $etudiant_id, $matiere_id, $note) {
        $this->id = $id;
        $this->etudiant_id = $etudiant_id;
        $this->matiere_id = $matiere_id;
        $this->note = $note;
    }
}
?>