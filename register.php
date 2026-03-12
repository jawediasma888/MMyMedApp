<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "personne");

if (!$conn) {
    die("Erreur de connexion: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prénom'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $role = $_POST['role'];
    
    // Vérifier que les mots de passe correspondent
    if ($pass1 != $pass2) {
        die("Les mots de passe ne correspondent pas ! <a href='account.html'>Retour</a>");
    }
    
    // Hasher le mot de passe
    $pass1_hash = password_hash($pass1, PASSWORD_DEFAULT);
    
    // Vérifier si l'email existe déjà
    if ($role == "patient") {
        $check = "SELECT * FROM patient WHERE email='$email'";
    } else {
        $check = "SELECT * FROM medecin WHERE email='$email'";
    }
    
    $result = mysqli_query($conn, $check);
    
    if (mysqli_num_rows($result) > 0) {
        die("Cet email est déjà utilisé ! <a href='account.html'>Retour</a>");
    }
    
    // Insertion
    if ($role == "patient") {
        $sql = "INSERT INTO patient (nom, prenom, email, pass1, patient) 
                VALUES ('$nom', '$prenom', '$email', '$pass1_hash', 'patient')";
    } else {
        $sql = "INSERT INTO medecin (nom, prenom, email, pass1, medecin) 
                VALUES ('$nom', '$prenom', '$email', '$pass1_hash', 'medecin')";
    }
    
    if (mysqli_query($conn, $sql)) {
        echo "Inscription réussie ! <a href='account.html'>Connectez-vous</a>";
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    header("Location: account.html");
    exit();
}
?>