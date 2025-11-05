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
    <label>Student Number: </label>
    <input type="text" name="student_no" required><br/><br/>

    <label>Full Name: </label>
    <input type="text" name="fullname" required><br/><br/>

    <label>Branch:</label>
    <select name="branch" required>
        <option value="">---Select Branch---</option>
        <option value="Create">Create</option>
        <option value="Read">Read</option>
        <option value="Update">Update</option>
        <option value="Delete">Delete</option>
    </select><br/><br/>

    <label>Email:</label>
    <input type="email" name="email" required><br/><br/>

    <label>Contact:</label>
    <input type="text" name="contact" required pattern="[0-9]{11}" title="Enter exactly 11 digits"><br/><br/>

    <input type="submit" value="Add Student">
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
        echo "<p style='color: green;'>Record created successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
