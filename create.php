<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam: Create</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    
</head>
<body>

    <form method="post">
        <h2 style="text-align:center; color:#333;">Add New Student</h2>

        <label>Student Number:</label>
        <input type="text" name="student_no" required>

        <label>Full Name:</label>
        <input type="text" name="fullname" required>

        <label>Branch:</label>
        <select name="branch" required>
            <option value="">---Select Branch---</option>
            <option value="Quezon City">Quezon City</option>
            <option value="Antipolo">Antipolo</option>
            <option value="Marikina">Marikina</option>
        </select>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Contact:</label>
        <input type="text" name="contact" required pattern="[0-9]{11}" title="Enter exactly 11 digits">

        <input type="submit" value="Add Student">

        <a href="read.php" class="see-records">See Records</a>
    </form>

<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_no = $_POST['student_no'];
    $fullname = $_POST['fullname'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    try {
        $stmt = $pdo->prepare("INSERT INTO students (student_no, fullname, branch, email, contact) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$student_no, $fullname, $branch, $email, $contact]);

        echo "<script>
                alert('Record created successfully!');
                window.location.href = 'read.php';
              </script>";
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . addslashes($e->getMessage()) . '");</script>';
    }
}
?>
</body>
</html>
