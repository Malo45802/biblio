<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Livres du propriétaire</title>
</head>

<body>

<?php
include '../conf_server.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$proprio = $conn->real_escape_string($_POST['proprio']);
$sql = "SELECT titre, auteur, genre FROM livres WHERE proprio='$proprio'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Titre : " . $row['titre'] . " - Auteur : " . $row['auteur']
            . " - Genre : " . $row['genre'] . "<br>";
    }
} else {
    echo "Aucun livre trouvé pour ce propriétaire.";
}

$conn->close();
?>

</body>
</html>
