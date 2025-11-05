<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    die("Error: Student ID not provided.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Error: Student not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_no = $_POST['student_no'];
    $fullname = $_POST['fullname'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    try {
        $updateStmt = $pdo->prepare("UPDATE students SET student_no = ?, fullname = ?, branch = ?, email = ?, contact = ? WHERE id = ?");
        $updateStmt->execute([$student_no, $fullname, $branch, $email, $contact, $id]);
        echo "<script>
            alert('Record updated successfully!');
            window.location.href = 'read.php';
        </script>";
        exit;
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam: Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form method="post">
    <h2>Update Student Record</h2>

    <label>Student Number:</label>
    <input type="text" name="student_no" value="<?= htmlspecialchars($student['student_no']) ?>" required>

    <label>Full Name:</label>
    <input type="text" name="fullname" value="<?= htmlspecialchars($student['fullname']) ?>" required>

    <label>Branch:</label>
    <select name="branch" required>
        <option value="">---Select Branch---</option>
        <option value="Quezon City" <?= $student['branch'] == 'Quezon City' ? 'selected' : '' ?>>Quezon City</option>
        <option value="Antipolo" <?= $student['branch'] == 'Antipolo' ? 'selected' : '' ?>>Antipolo</option>
        <option value="Marikina" <?= $student['branch'] == 'Marikina' ? 'selected' : '' ?>>Marikina</option>
    </select>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>

    <label>Contact:</label>
    <input type="text" name="contact" value="<?= htmlspecialchars($student['contact']) ?>" required pattern="[0-9]{11}" title="Enter exactly 11 digits">

    <input type="submit" value="Update Student">
    <a href="read.php" class="see-records">Back to Records</a>
</form>

</body>
</html>
