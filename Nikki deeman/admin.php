<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}
?>
<?php
include 'config.php';

// Sélection des données de la table suggestions
$sql = "SELECT id, nom, prenom, email, suggestions, created_at FROM suggestions";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration des Suggestions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Administration des Suggestions</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Suggestions</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nom"]. "</td><td>" . $row["prenom"]. "</td><td>" . $row["email"]. "</td><td>" . $row["suggestions"]. "</td><td>" . $row["created_at"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 résultats";
    }
    // Fermeture de la connexion
    $conn->close();
    ?>
</body>
</html>
