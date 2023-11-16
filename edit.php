<?php
require_once "connexion.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$libPiece = $typepiece = ""; // Initialize variables to avoid undefined variable warnings

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $typepiece = $_GET['id'];

    $sql = "SELECT * FROM Piece WHERE Typepiece='$typepiece'"; // Add single quotes around $typepiece
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $libPiece = $row["LibPiece"];
    } else {
        echo "Piece n'existe pas.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libPiece = $_POST["LibPiece"];
    $typepiece = $_POST["Typepiece"];

    $checkSql = "SELECT * FROM Piece WHERE Typepiece='$typepiece'"; // Check if the piece with the given type exists

    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows == 0) { // If the piece does not exist, update it
        $sql = "UPDATE Piece SET LibPiece='$libPiece' WHERE Typepiece='$typepiece'";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur " . $conn->error;
        }
    } else {
        echo "La pièce avec le type '$libPiece' existe déjà.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Piece</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Modifier Piece</h2>

        <form action="edit.php" method="post">
            <input type="hidden" name="Typepiece" value="<?php echo $typepiece; ?>">
            <input type="text" name="LibPiece" value="<?php echo $libPiece; ?>" required>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
