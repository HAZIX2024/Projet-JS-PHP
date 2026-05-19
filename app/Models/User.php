<?php

class User {
    public $id;
    public $username;
    public $password;
    public $role;

    private $pdo;

    public function __construct($pdo, $id = null, $username = null, $password = null, $role = null) {
        $this->pdo      = $pdo;
        $this->id       = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role     = $role;
    }

    // ──────────────────────────────────────────
    // CREATE
    // ──────────────────────────────────────────
    public function create() {
        $sql  = "INSERT INTO user (username, password, role)
                 VALUES (:username, :password, :role)";
        $stmt = $this->pdo->prepare($sql);

        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role',     $this->role);

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
        $sql  = "SELECT * FROM user WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id       = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->role     = $row['role'];
            return true;
        }
        return false;
    }

    // ──────────────────────────────────────────
    // READ ALL — tous les utilisateurs
    // ──────────────────────────────────────────
    public function readAll() {
        $sql  = "SELECT * FROM user ORDER BY username ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────
    // READ — par username (utile pour le login)
    // ──────────────────────────────────────────
    public function readByUsername($username) {
        $sql  = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id       = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->role     = $row['role'];
            return true;
        }
        return false;
    }

    // ──────────────────────────────────────────
    // UPDATE
    // ──────────────────────────────────────────
    public function update() {
        $sql  = "UPDATE user
                 SET username = :username,
                     password = :password,
                     role     = :role
                 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role',     $this->role);
        $stmt->bindParam(':id',       $this->id);

        return $stmt->execute();
    }

    // ──────────────────────────────────────────
    // DELETE
    // ──────────────────────────────────────────
    public function delete($id) {
        $sql  = "DELETE FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // ──────────────────────────────────────────
    // BONUS — vérifier le mot de passe (login)
    // ──────────────────────────────────────────
    public function verifyPassword($plainPassword) {
        return password_verify($plainPassword, $this->password);
    }
}
?>