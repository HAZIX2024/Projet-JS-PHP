<?php

require_once __DIR__ . "/../Models/Matiere.php";


class MatiereController
{
    private $matieres = [];

    // CREATE - add a new matiere
    public function create($id, $nom_matiere, $coefficient)
    {
        $matiere = new Matiere($id, $nom_matiere, $coefficient);
        $this->matieres[$id] = $matiere;

        return "Matière ajoutée avec succès.";
    }

    // READ - get all matieres
    public function index()
    {
        return $this->matieres;
    }

    // READ - get one matiere by id
    public function show($id)
    {
        if (isset($this->matieres[$id])) {
            return $this->matieres[$id];
        }

        return "Matière introuvable.";
    }

    // UPDATE - update matiere
    public function update($id, $nom_matiere, $coefficient)
    {
        if (isset($this->matieres[$id])) {
            $this->matieres[$id]->nom_matiere = $nom_matiere;
            $this->matieres[$id]->coefficient = $coefficient;

            return "Matière mise à jour.";
        }

        return "Matière introuvable.";
    }

    // DELETE - remove matiere
    public function delete($id)
    {
        if (isset($this->matieres[$id])) {
            unset($this->matieres[$id]);
            return "Matière supprimée.";
        }

        return "Matière introuvable.";
    }
}
?>