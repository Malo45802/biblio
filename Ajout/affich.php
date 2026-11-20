<?php
include '../conf_server.php'; 

$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$genre = $_POST['genre'];
$proprio = $_POST['proprio'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("La connexion a échouée : " . $conn->connect_error);
}

$sql = "INSERT INTO livres (titre, auteur, genre, proprio) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $titre, $auteur, $genre, $proprio);

if ($stmt->execute()) {
    echo "enregistrement reussi!!!!!!!!!";
} else {
    echo "Erreur: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>