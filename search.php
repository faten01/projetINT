<!DOCTYPE html>
<html>
<head>
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Résultats de la recherche</h2>

        <?php
        // Check if the search form is submitted
        require_once "connexion.php";
        if (isset($_POST['search'])) {
            $search = $_POST['search'];

            

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Perform a SQL query to search for matching records
            $query = "SELECT * FROM Piece WHERE LibPiece LIKE '%$search%'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                    <th>Typepiece</th>
                    <th>LibPiece</th>
                    <th>Action</th>
                </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['Typepiece'] . "</td>
                        <td>" . $row['LibPiece'] . "</td>
                        <td><a href='edit.php?id=".$row["Typepiece"]."'>Modifier</a> | <a href='delete.php?id=".$row["Typepiece"]."'>Supprimer</a></td>
                    </tr>";
                }

                echo "</table>";
            } else {
                echo "Aucun résultat trouvé.";
            }

            // Close the database connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
