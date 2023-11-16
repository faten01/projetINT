<?php
include 'connexion.php';

$codeMatiere = $_GET['id']; 
$query = "DELETE FROM Matieres WHERE `Code Matière` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $codeMatiere);
$stmt->execute();
header("Location: index.php");
?>
