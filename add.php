<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codeMatiere = $_POST['CodeMatiere'];
    $nomMatiere = $_POST['NomMatiere'];
    $coefMatiere = $_POST['CoefMatiere'];
    $departement = $_POST['Departement'];
    $semestre = $_POST['Semestre'];
    $option = $_POST['Option'];
    $nbHeureCI = $_POST['NbHeureCI'];
    $nbHeureTP = $_POST['NbHeureTP'];
    $typeLabo = $_POST['TypeLabo'];
    $bonus = $_POST['Bonus'];
    $categories = $_POST['Categories'];
    $sousCategories = $_POST['SousCategories'];
    $dateDeb = $_POST['DateDeb'];
    $dateFin = $_POST['DateFin'];

    $query = "INSERT INTO Matieres (`Code Matière`, `Nom Matière`, `Coef Matière`, `Département`, `Semestre`, `Option`, `Nb Heure CI`, `Nb Heure TP`, `TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssssss", $codeMatiere, $nomMatiere, $coefMatiere, $departement, $semestre, $option, $nbHeureCI, $nbHeureTP, $typeLabo, $bonus, $categories, $sousCategories, $dateDeb, $dateFin);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Matiere</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container"><br>
        <h1 class="text-center">Add Matiere</h1>
        <form method="POST">
            <div class="form-group">
                <label for="CodeMatiere">Code Matière</label>
                <input type="text" class="form-control" name="CodeMatiere" required>
            </div>

            <div class="form-group">
                <label for="NomMatiere">Nom Matière</label>
                <input type="text" class="form-control" name="NomMatiere" required>
            </div>

            <div class="form-group">
                <label for="CoefMatiere">Coef Matière</label>
                <input type="text" class="form-control" name="CoefMatiere">
            </div>

            <div class="form-group">
                <label for="Departement">Département</label>
                <input type="text" class="form-control" name="Departement">
            </div>

            <div class="form-group">
                <label for="Semestre">Semestre</label>
                <input type="text" class="form-control" name="Semestre">
            </div>

            <div class="form-group">
                <label for="Option">Option</label>
                <input type="text" class="form-control" name="Option">
            </div>

            <div class="form-group">
                <label for="NbHeureCI">Nb Heure CI</label>
                <input type="number" class="form-control" name="NbHeureCI">
            </div>

            <div class="form-group">
                <label for="NbHeureTP">Nb Heure TP</label>
                <input type="number" class="form-control" name="NbHeureTP">
            </div>

            <div class="form-group">
                <label for="TypeLabo">TypeLabo</label>
                <input type="text" class="form-control" name="TypeLabo">
            </div>

            <div class="form-group">
                <label for="Bonus">Bonus</label>
                <input type="text" class="form-control" name="Bonus">
            </div>

            <div class="form-group">
                <label for="Categories">Catègories</label>
                <input type="text" class="form-control" name="Categories">
            </div>

            <div class="form-group">
                <label for="SousCategories">SousCatégories</label>
                <input type="text" class="form-control" name="SousCategories">
            </div>

            <div class="form-group">
                <label for="DateDeb">DateDeb</label>
                <input type="date" class="form-control" name="DateDeb">
            </div>

            <div class="form-group">
                <label for="DateFin">DateFin</label>
                <input type="date" class="form-control" name="DateFin">
            </div>

            <button type="submit" class="btn btn-primary">Add Matiere</button>
        </form><br>
    </div>
</body>

</html>