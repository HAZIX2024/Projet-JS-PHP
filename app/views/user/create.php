<?php include "../layout/header.php"; ?>

<h3>Ajouter utilisateur</h3>

<form method="POST" action="?controller=user&action=store">

    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    Role:
    <select name="role">
        <option value="admin">Admin</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include "../layout/footer.php"; ?>