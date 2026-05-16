<?php

class Matiere {
    public $id;
    public $nom_matiere;
    public $coefficient;

    private $pdo;

    public function __construct($pdo, $id = null, $nom_matiere = null, $coefficient = null) {
        $this->pdo        = $pdo;
        $this->id         = $id;
        $this->nom_matiere = $nom_matiere;
        $this->coefficient = $coefficient;
    }

    // ──────────────────────────────────────────
    // CREATE
    // ──────────────────────────────────────────
    public function create() {
        $sql  = "INSERT INTO matiere (nom_matiere, coefficient) VALUES (:nom_matiere, :coefficient)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom_matiere',  $this->nom_matiere);
        $stmt->bindParam(':coefficient',  $this->coefficient);

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
        $sql  = "SELECT * FROM matiere WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id          = $row['id'];
            $this->nom_matiere = $row['nom_matiere'];
            $this->coefficient = $row['coefficient'];
            return true;
        }
        return false;
    }

    // ──────────────────────────────────────────
    // READ ALL — tous les enregistrements
    // ──────────────────────────────────────────
    public function readAll() {
        $sql  = "SELECT * FROM matiere ORDER BY nom_matiere ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────
    // UPDATE
    // ──────────────────────────────────────────
    public function update() {
        $sql  = "UPDATE matiere SET nom_matiere = :nom_matiere, coefficient = :coefficient WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom_matiere',  $this->nom_matiere);
        $stmt->bindParam(':coefficient',  $this->coefficient);
        $stmt->bindParam(':id',           $this->id);

        return $stmt->execute();
    }

    // ──────────────────────────────────────────
    // DELETE
    // ──────────────────────────────────────────
    public function delete($id) {
        $sql  = "DELETE FROM matiere WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>