<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codeMatiere = $_POST['CodeMatiere'];
    $newNomMatiere = $_POST['NomMatiere'];
    $newCoefMatiere = $_POST['CoefMatiere'];
    $newDepartement = $_POST['Departement'];
    $newSemestre = $_POST['Semestre'];
    $newOption = $_POST['Option'];
    $newNbHeureCI = $_POST['NbHeureCI'];
    $newNbHeureTP = $_POST['NbHeureTP'];
    $newTypeLabo = $_POST['TypeLabo'];
    $newBonus = $_POST['Bonus'];
    $newCategories = $_POST['Categories'];
    $newSousCategories = $_POST['SousCategories'];
    $newDateDeb = $_POST['DateDeb'];
    $newDateFin = $_POST['DateFin'];

    $query = "UPDATE Matieres SET `Nom Matière` = ?, `Coef Matière` = ?, `Département` = ?, `Semestre` = ?, `Option` = ?, `Nb Heure CI` = ?, `Nb Heure TP` = ?, `TypeLabo` = ?, `Bonus` = ?, `Catègories` = ?, `SousCatégories` = ?, `DateDeb` = ?, `DateFin` = ? WHERE `Code Matière` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssssss", $newNomMatiere, $newCoefMatiere, $newDepartement, $newSemestre, $newOption, $newNbHeureCI, $newNbHeureTP, $newTypeLabo, $newBonus, $newCategories, $newSousCategories, $newDateDeb, $newDateFin, $codeMatiere);
    $stmt->execute();
    header("Location: index.php");
}

$codeMatiere = $_GET['id'];
$query = "SELECT * FROM Matieres WHERE `Code Matière` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $codeMatiere);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Matiere</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container"><br>
        <h1 class="text-center">Edit Matiere</h1>
        <form method="POST">
            <div class="form-group">
                <label for="CodeMatiere">Code Matière</label>
                <input type="text" class="form-control" name="CodeMatiere" value="<?php echo $row['Code Matière']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="NomMatiere">Nom Matière</label>
                <input type="text" class="form-control" name="NomMatiere" value="<?php echo $row['Nom Matière']; ?>" required>
            </div>

            <div class="form-group">
                <label for="CoefMatiere">Coef Matière</label>
                <input type="text" class="form-control" name="CoefMatiere" value="<?php echo $row['Coef Matière']; ?>">
            </div>

            <div class="form-group">
                <label for="Departement">Département</label>
                <input type="text" class="form-control" name="Departement" value="<?php echo $row['Département']; ?>">
            </div>

            <div class="form-group">
                <label for="Semestre">Semestre</label>
                <input type="text" class="form-control" name="Semestre" value="<?php echo $row['Semestre']; ?>">
            </div>

            <div class="form-group">
                <label for="Option">Option</label>
                <input type="text" class="form-control" name="Option" value="<?php echo $row['Option']; ?>">
            </div>

            <div class="form-group">
                <label for="NbHeureCI">Nb Heure CI</label>
                <input type="number" class="form-control" name="NbHeureCI" value="<?php echo $row['Nb Heure CI']; ?>">
            </div>

            <div class="form-group">
                <label for="NbHeureTP">Nb Heure TP</label>
                <input type="number" class="form-control" name="NbHeureTP" value="<?php echo $row['Nb Heure TP']; ?>">
            </div>

            <div class="form-group">
                <label for="TypeLabo">TypeLabo</label>
                <input type="text" class="form-control" name="TypeLabo" value="<?php echo $row['TypeLabo']; ?>">
            </div>

            <div class="form-group">
                <label for="Bonus">Bonus</label>
                <input type="text" class="form-control" name="Bonus" value="<?php echo $row['Bonus']; ?>">
            </div>

            <div class="form-group">
                <label for="Categories">Catègories</label>
                <input type="text" class="form-control" name="Categories" value="<?php echo $row['Catègories']; ?>">
            </div>

            <div class="form-group">
                <label for="SousCategories">SousCatégories</label>
                <input type="text" class="form-control" name="SousCategories" value="<?php echo $row['SousCatégories']; ?>">
            </div>

            <div class="form-group">
                <label for="DateDeb">DateDeb</label>
                <input type="date" class="form-control" name="DateDeb" value="<?php echo date('Y-m-d', strtotime($row['DateDeb'])); ?>">
            </div>

            <div class="form-group">
                <label for="DateFin">DateFin</label>
                <input type="date" class="form-control" name="DateFin" value="<?php echo date('Y-m-d', strtotime($row['DateFin'])); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Matiere</button>
        </form><br>
    </div>
</body>

</html>