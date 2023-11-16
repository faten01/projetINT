<?php
include 'connexion.php';

$query = "SELECT * FROM Matieres";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Matieres List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div style="padding: 20px;">
        <h1 class="text-center">Matieres List</h1>
        <a class="btn btn-primary" href="add.php">Add Matiere</a>
        <div class="form-group mt-3">
            <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered mx-auto">
                <thead>
                    <tr>
                        <th>Code Matière</th>
                        <th>Nom Matière</th>
                        <th>Coef Matière</th>
                        <th>Département</th>
                        <th>Semestre</th>
                        <th>Catégories</th>
                        <th>SousCatégories</th>
                        <th>DateDeb</th>
                        <th>DateFin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['Code Matière']; ?></td>
                            <td><?php echo $row['Nom Matière']; ?></td>
                            <td><?php echo $row['Coef Matière']; ?></td>
                            <td><?php echo $row['Département']; ?></td>
                            <td><?php echo $row['Semestre']; ?></td>
                            <td><?php echo $row['Catègories']; ?></td>
                            <td><?php echo $row['SousCatégories']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['DateDeb'])); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['DateFin'])); ?></td>
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['Code Matière']; ?>">Edit</a>
                                <a class="btn btn-success" href="view.php?id=<?php echo $row['Code Matière']; ?>">View</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['Code Matière']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>
<script>
    const searchInput = document.getElementById('search');
    const table = document.querySelector('.table');

    searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>