<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="account.css">
</head>
<body>
    <div class="container login active" id="loginContainer">
        <span>Login</span>
        <!-- IMPORTANT: action="login.php" -->
        <form method="post" action="login.php">
            <label>Email :</label>
            <input type="email" name="email" placeholder="Exemple@gmail.com" required>
            <label>Mot de Passe :</label>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Login</button>
            <p>Vous n'avez pas de compte ? <span id="crr-login" class="log" onclick="showForm('registerContainer')">Register</span></p>
        </form>
    </div>
    
    <div class="container register" id="registerContainer">
        <span>Register</span>
        <!-- IMPORTANT: action="register.php" -->
        <form method="post" action="register.php">
            <label>Nom :</label>
            <input type="text" placeholder="Donner votre nom" name="nom" required>
            <label>Prénom :</label>
            <input type="text" placeholder="Donner votre prénom" name="prénom" required>
            <label>Email :</label>
            <input type="email" placeholder="Exemple@gmail.com" name="email" required>
            <label>Mot de Passe :</label>
            <input type="password" placeholder="MDP" name="pass1" required>
            <label>Confirmez mot de passe :</label>
            <input type="password" placeholder="Confirmez MDP" name="pass2" required>
            <label>Vous êtes :</label>
            <select name="role" required>
                <option value="">-- Choisir --</option>
                <option value="patient">Patient</option>
                <option value="medecin">Médecin</option>
            </select>
            <button type="submit">S'inscrire</button>
            <p>Vous avez déjà un compte ? <span id="crr-register" class="reg" onclick="showForm('loginContainer')">Login</span></p>
        </form>
    </div>
    
    <script src="account.js"></script>
</body>
</html>