<?php

require_once __DIR__ . "/../Models/User.php";


class UserController
{
    private $users = [];

    // CREATE - add a new user
    public function create($id, $username, $password, $role)
    {
        $user = new User($id, $username, $password, $role);
        $this->users[$id] = $user;

        return "Utilisateur ajouté avec succès.";
    }

    // READ - get all users
    public function index()
    {
        return $this->users;
    }

    // READ - get one user by id
    public function show($id)
    {
        if (isset($this->users[$id])) {
            return $this->users[$id];
        }

        return "Utilisateur introuvable.";
    }

    // UPDATE - update user
    public function update($id, $username, $password, $role)
    {
        if (isset($this->users[$id])) {
            $this->users[$id]->username = $username;
            $this->users[$id]->password = $password;
            $this->users[$id]->role = $role;

            return "Utilisateur mis à jour.";
        }

        return "Utilisateur introuvable.";
    }

    // DELETE - remove user
    public function delete($id)
    {
        if (isset($this->users[$id])) {
            unset($this->users[$id]);
            return "Utilisateur supprimé.";
        }

        return "Utilisateur introuvable.";
    }

    // BONUS - login simulation
    public function login($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user->username === $username && $user->password === $password) {
                return "Connexion réussie. Rôle: " . $user->role;
            }
        }

        return "Identifiants incorrects.";
    }

    // BONUS - get users by role
    public function getByRole($role)
    {
        $result = [];

        foreach ($this->users as $user) {
            if ($user->role === $role) {
                $result[] = $user;
            }
        }

        return $result;
    }
}
?>