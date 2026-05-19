<?php
session_start();

require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../../config/database.php";

class UserController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: /student-management/app/views/dashboard/index.php");
            exit;
        }

        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: /student-management/app/views/dashboard/index.php");
            exit;
        }

        header("Location: /student-management/app/views/auth/login.php?error=1");
        exit;
    }

    public function signup($username, $password, $role)
    {
        $checkSql = "SELECT id FROM users WHERE username = ?";
        $checkStmt = $this->pdo->prepare($checkSql);
        $checkStmt->execute([$username]);

        if ($checkStmt->fetch()) {
            header("Location: /student-management/app/views/auth/signup.php?error=1");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $role]);

        header("Location: /student-management/app/views/auth/login.php?registered=1");
        exit;
    }

    public function create($username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $role]);

        return "Utilisateur ajouté avec succès.";
    }

    public function index()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $role, $id]);

        return "Utilisateur mis à jour.";
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return "Utilisateur supprimé.";
    }

    public function getByRole($role)
    {
        $sql = "SELECT * FROM users WHERE role = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$role]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$controller = new UserController($pdo);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $controller->login($username, $password);
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $controller->signup($username, $password, $role);
}
?>