<?php
require_once("head.php");
require_once("database-connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $result = $databaseConnection->query("SELECT * FROM user WHERE login = '$login'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Démarrer la session et stocker les informations de l'utilisateur
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];
            $_SESSION['user_firstname'] = $user['prenom'];
            
            header("Location: index.php");
            session_start();
            exit;
        } else {
            echo "Identifiants incorrects.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>

<form method="POST">
    Login: <input type="text" name="login" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php
require_once("footer.php");
?>