<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
    <link rel="stylesheet" href="CSS/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Noteform.css">
</head>
<body>
    <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "base_formulaire";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Récupérer l'ID de la ligne à supprimer
        $row_id = $_POST['row_id'];

        // Préparer la requête SQL
        $sql = "DELETE FROM blocnote WHERE numero = '$row_id'";
        

        // Exécuter la requête
        if ($conn->query($sql) === TRUE) {
            http_response_code(200);
            echo "Ligne supprimée avec succès !";
        } else {
            http_response_code(500);
            echo "Erreur lors de la suppression de la ligne : ". $conn->error ;
        }

        // Fermer la connexion
        $conn->close();


    ?>
    
</body>
</html>