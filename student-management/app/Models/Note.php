<?php

class Note {
    public $id;
    public $etudiant_id;
    public $matiere_id;
    public $note;

    private $pdo;

    public function __construct($pdo, $id = null, $etudiant_id = null, $matiere_id = null, $note = null) {
        $this->pdo         = $pdo;
        $this->id          = $id;
        $this->etudiant_id = $etudiant_id;
        $this->matiere_id  = $matiere_id;
        $this->note        = $note;
    }

    // ──────────────────────────────────────────
    // CREATE
    // ──────────────────────────────────────────
    public function create() {
        $sql  = "INSERT INTO note (etudiant_id, matiere_id, note)
                 VALUES (:etudiant_id, :matiere_id, :note)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':etudiant_id', $this->etudiant_id);
        $stmt->bindParam(':matiere_id',  $this->matiere_id);
        $stmt->bindParam(':note',        $this->note);

        if ($stmt->execute()) {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // ──────────────────────────────────────────
    // READ — un seul enregistrement par ID
    // ──────────────────────────────────────────
    public function read($id) {
        $sql  = "SELECT * FROM note WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id          = $row['id'];
            $this->etudiant_id = $row['etudiant_id'];
            $this->matiere_id  = $row['matiere_id'];
            $this->note        = $row['note'];
            return true;
        }
        return false;
    }

    // ──────────────────────────────────────────
    // READ ALL — toutes les notes
    // ──────────────────────────────────────────
    public function readAll() {
        $sql  = "SELECT * FROM note ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────
    // READ — notes par étudiant
    // ──────────────────────────────────────────
    public function readByEtudiant($etudiant_id) {
        $sql  = "SELECT * FROM note WHERE etudiant_id = :etudiant_id ORDER BY matiere_id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':etudiant_id', $etudiant_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────
    // READ — notes par matière
    // ──────────────────────────────────────────
    public function readByMatiere($matiere_id) {
        $sql  = "SELECT * FROM note WHERE matiere_id = :matiere_id ORDER BY etudiant_id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':matiere_id', $matiere_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────
    // UPDATE
    // ──────────────────────────────────────────
    public function update() {
        $sql  = "UPDATE note
                 SET etudiant_id = :etudiant_id,
                     matiere_id  = :matiere_id,
                     note        = :note
                 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':etudiant_id', $this->etudiant_id);
        $stmt->bindParam(':matiere_id',  $this->matiere_id);
        $stmt->bindParam(':note',        $this->note);
        $stmt->bindParam(':id',          $this->id);

        return $stmt->execute();
    }

    // ──────────────────────────────────────────
    // DELETE
    // ──────────────────────────────────────────
    public function delete($id) {
        $sql  = "DELETE FROM note WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>