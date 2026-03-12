<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "personne");

if (!$conn) {
    die("Erreur de connexion: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Chercher dans patient
    $sql_patient = "SELECT * FROM patient WHERE email='$email'";
    $result_patient = mysqli_query($conn, $sql_patient);
    
    // Chercher dans medecin
    $sql_medecin = "SELECT * FROM medecin WHERE email='$email'";
    $result_medecin = mysqli_query($conn, $sql_medecin);
    
    if (mysqli_num_rows($result_patient) > 0) {
        $user = mysqli_fetch_assoc($result_patient);
        
        if (password_verify($password, $user['pass1'])) {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = 'patient';
            
            header("Location: home.php");
            exit();
        } else {
            echo "Mot de passe incorrect ! <a href='account.html'>Retour</a>";
        }
    } 
    elseif (mysqli_num_rows($result_medecin) > 0) {
        $user = mysqli_fetch_assoc($result_medecin);
        
        if (password_verify($password, $user['pass1'])) {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = 'medecin';
            
            header("Location: home.php");
            exit();
        } else {
            echo "Mot de passe incorrect ! <a href='account.html'>Retour</a>";
        }
    } 
    else {
        echo "Email non trouvé ! <a href='account.html'>Retour</a>";
    }
    
    mysqli_close($conn);
} else {
    header("Location: account.html");
    exit();
}
?>