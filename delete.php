<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    die("Error: Student ID not provided.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT fullname FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Error: Student not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        try {
            $deleteStmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
            $deleteStmt->execute([$id]);

            echo "<script>
                alert('Record deleted successfully!');
                window.location.href = 'read.php';
            </script>";
            exit;
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        header('Location: read.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam: Delete</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="warning-box">
    <h2>Confirm Deletion</h2>
    <p class="warning-text">
        Are you sure you want to <span class="student-name">DELETE</span> the record for
        <span class="student-name">"<?= htmlspecialchars($student['fullname']) ?>"</span>?
    </p>
    <p class="warning-text">This action <strong>cannot be undone.</strong></p>

    <form method="post" style="margin-top: 20px;">
        <input type="submit" name="confirm" value="Confirm Delete" class="delete-btn">
        <a href="read.php" class="see-records cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>
