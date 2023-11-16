<?php
require_once "connexion.php";
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Typepiece, LibPiece FROM Piece";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["Typepiece"]. "</td><td>" . $row["LibPiece"]. "</td><td><a href='edit.php?id=".$row["Typepiece"]."'>Modifier</a> | <a href='delete.php?id=".$row["Typepiece"]."'>Supprimer</a></td></tr>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>
