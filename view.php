<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $matiereId = $_GET['id'];

    $query = "SELECT * FROM Matieres WHERE `Code Matière` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $matiereId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Matiere not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Matiere Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container"><br>
        <h1 class="text-center">Matiere Details</h1><br>
        <a href="index.php" class="btn btn-primary">Back to Matieres List</a>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Code Matière</td>
                        <td><?php echo $row['Code Matière']; ?></td>
                    </tr>
                    <tr>
                        <td>Nom Matière</td>
                        <td><?php echo $row['Nom Matière']; ?></td>
                    </tr>
                    <tr>
                        <td>Coef Matière</td>
                        <td><?php echo $row['Coef Matière']; ?></td>
                    </tr>
                    <tr>
                        <td>Département</td>
                        <td><?php echo $row['Département']; ?></td>
                    </tr>
                    <tr>
                        <td>Semestre</td>
                        <td><?php echo $row['Semestre']; ?></td>
                    </tr>
                    <tr>
                        <td>Option</td>
                        <td><?php echo $row['Option']; ?></td>
                    </tr>
                    <tr>
                        <td>Nb Heure CI</td>
                        <td><?php echo $row['Nb Heure CI']; ?></td>
                    </tr>
                    <tr>
                        <td>Nb Heure TP</td>
                        <td><?php echo $row['Nb Heure TP']; ?></td>
                    </tr>
                    <tr>
                        <td>TypeLabo</td>
                        <td><?php echo $row['TypeLabo']; ?></td>
                    </tr>
                    <tr>
                        <td>Bonus</td>
                        <td><?php echo $row['Bonus']; ?></td>
                    </tr>
                    <tr>
                        <td>Catégories</td>
                        <td><?php echo $row['Catègories']; ?></td>
                    </tr>
                    <tr>
                        <td>SousCatégories</td>
                        <td><?php echo $row['SousCatégories']; ?></td>
                    </tr>
                    <tr>
                        <td>DateDeb</td>
                        <td><?php echo date('d-m-Y', strtotime($row['DateDeb'])); ?></td>
                    </tr>
                    <tr>
                        <td>DateFin</td>
                        <td><?php echo date('d-m-Y', strtotime($row['DateFin'])); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>