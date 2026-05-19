<?php

require_once __DIR__ . "/../Models/Note.php";

class NoteController
{
    private $notes = [];

    // CREATE - add a new note
    public function create($id, $etudiant_id, $matiere_id, $note)
    {
        $newNote = new Note($id, $etudiant_id, $matiere_id, $note);
        $this->notes[$id] = $newNote;

        return "Note ajoutée avec succès.";
    }

    // READ - get all notes
    public function index()
    {
        return $this->notes;
    }

    // READ - get one note by id
    public function show($id)
    {
        if (isset($this->notes[$id])) {
            return $this->notes[$id];
        }

        return "Note introuvable.";
    }

    // UPDATE - update note
    public function update($id, $etudiant_id, $matiere_id, $note)
    {
        if (isset($this->notes[$id])) {
            $this->notes[$id]->etudiant_id = $etudiant_id;
            $this->notes[$id]->matiere_id = $matiere_id;
            $this->notes[$id]->note = $note;

            return "Note mise à jour.";
        }

        return "Note introuvable.";
    }

    // DELETE - remove note
    public function delete($id)
    {
        if (isset($this->notes[$id])) {
            unset($this->notes[$id]);
            return "Note supprimée.";
        }

        return "Note introuvable.";
    }

    // BONUS - get notes by student
    public function getByEtudiant($etudiant_id)
    {
        $result = [];

        foreach ($this->notes as $note) {
            if ($note->etudiant_id == $etudiant_id) {
                $result[] = $note;
            }
        }

        return $result;
    }

    // BONUS - get notes by matiere
    public function getByMatiere($matiere_id)
    {
        $result = [];

        foreach ($this->notes as $note) {
            if ($note->matiere_id == $matiere_id) {
                $result[] = $note;
            }
        }

        return $result;
    }
}
?>