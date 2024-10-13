<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel = "stylesheet" href="CSS/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Noteform.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc note</title>
    
</head>
<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <!-- Tableau de valeurs -->
            <table id="tableau2" class="table table-hover" border="3">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Intitulé de la note</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <!-- Bouton pour afficher la fenêtre modale -->
            <button id="myBtn" class="btn btn-light">Ajouter une note</button>
        </div>
        <div class="col-md-5"></div>
    </div>
    <!-- Fenêtre modale pour l'ajout de la note -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <h2>Ajouter une note</h2>
            <form id="note-form">
                <label >Intitule :</label>
                <input type="text" id="noteint" name="noteint" class="form-control" required>

                <label>Contenu :</label>
                <textarea id="notecont" name="notecont" class="form-control"></textarea>
                <button type="submit" class="btn btn-secondary" >Enregistrer</button>
            </form>
        </div>
    </div>
    <!-- Fenêtre modale pour la modification de la note -->
    <div id="modalupdate" class="modal">
        <div class="modal-content">
            <h2>Ajouter une note</h2>
            <form id="note-form">
                <label >Intitule :</label>
                <input type="text" id="noteint" name="noteint" class="form-control" value="" required>

                <label>Contenu :</label>
                <textarea id="notecont" name="notecont" class="form-control " value=""></textarea>
                <button type="submit" class="btn btn-secondary" >Enregistrer</button>
            </form>
        </div>
    </div>
    <script src="JS/Noteform.js"></script>
</body>
</html>