<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY id ASC");
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching records: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam: Read</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<div class="records read">
    <h2>Student Records</h2>
    
    <div class="top-buttons">
        <a href="create.php" class="create-record">Create Record</a>
        <a href="index.php" class="back-home"> Back to Homepage</a>
    </div>

    <?php if (count($records) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Number</th>
                    <th>Full Name</th>
                    <th>Branch</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?= htmlspecialchars($record['id']) ?></td>
                        <td><?= htmlspecialchars($record['student_no']) ?></td>
                        <td><?= htmlspecialchars($record['fullname']) ?></td>
                        <td><?= htmlspecialchars($record['branch']) ?></td>
                        <td><?= htmlspecialchars($record['email']) ?></td>
                        <td><?= htmlspecialchars($record['contact']) ?></td>
                        <td><?= htmlspecialchars($record['date_added']) ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $record['id'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $record['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No student records found.</p>
    <?php endif; ?>
</div>

</body>
</html>
