
<!DOCTYPE html>
<html>
<head>
<title> Page de gestion de pièces</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>

<body>
   
                <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="Rechercher..." required>
                    <button type="submit">Rechercher</button>
                </form>
        

    <div class="container">
        

        <h2>Ajouter une pièce</h2>

        <form action="create.php" method="post">
            <input type="text" name="LibPiece" placeholder="Entrer LibPiece" required>
            <button type="submit">Ajouter Pièce</button>
        </form>

        <h3>Liste des pièces</h3>
        <table>
            <tr>
                <th>Type de pièce</th>
                <th>Libellé de la pièce</th>
                <th>Action</th>
            </tr>
            <?php include 'read.php'; ?>
        </table>
    </div>
</body>
</html>
