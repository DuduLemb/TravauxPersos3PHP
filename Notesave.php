<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbname = "base_formulaire";

    $conn = new mysqli($servername, $username, "", $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        http_response_code(500);
        echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        exit;
    }

    // Vérifier si les données sont envoyées en POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données envoyées depuis le client
        $data = json_decode(file_get_contents('php://input'), true);
        $noteint = $conn->real_escape_string($data['noteint']);
        $notecont = $conn->real_escape_string($data['notecont']);

        // Requête d'insertion dans la table "note"
        $sql = "INSERT INTO blocnote (intitule, contenu) VALUES ('$noteint', '$notecont')";


        if ($conn->query($sql) === TRUE) {
            http_response_code(200);
            echo "Produit enregistré avec succès !";    

        } else {
            http_response_code(500);
            echo "Erreur lors de l'enregistrement du produit : " . $conn->error;
        }
    } else {
        http_response_code(400);
        echo "Requête invalide.";
    }
    $conn->close();
?>
</body>
</html>