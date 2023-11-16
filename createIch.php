<?php
require_once "connexion.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libPiece = $_POST["LibPiece"];

    // Vérifier si "LibPiece" existe déjà
    $checkSql = "SELECT LibPiece FROM Piece WHERE LibPiece = '$libPiece'";
    $result = $conn->query($checkSql);

    if ($result->num_rows == 0) {
        // "LibPiece" n'existe pas, nous pouvons l'ajouter
        $sql = "INSERT INTO Piece (LibPiece) VALUES ('$libPiece')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
       
        echo "La pièce avec le libellé '$libPiece' existe déjà.";
       
    }
}

$conn->close();
?>
