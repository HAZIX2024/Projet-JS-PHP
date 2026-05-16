<?php

class User {
    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
}
?>