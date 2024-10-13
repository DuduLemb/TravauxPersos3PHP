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
        $password = "";
        $dbname = "base_formulaire";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Requête SQL pour récupérer les données de la table
        $sql = "SELECT numero,intitule FROM blocnote";
        $result = $conn->query($sql);

        // Afficher les données dans un tableau HTML
        echo "<table class  = 'table table-hover' id='myTable'>";
        echo "<tr><th>numero</th><th>intitule</th><th>Option1</th><th>Option2</th></tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tbody><tr><td>" . $row["numero"]. "</td><td>" . $row["intitule"]. "</td><td><button class='deleteBtn btn btn-secondary'>Supprimer</button></td><td><button class='updateBtn btn btn-secondary'>Modifier</button></td></tr></tbody>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucune donnée disponible</td></tr>";
        }

        echo "</table>";
    

        // Fermer la connexion à la base de données
        $conn->close();
    ?>

    </body>
    </html>
    