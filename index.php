<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam: Homepage</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background: white;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }

        h1 {
            color: #333;
            font-size: 26px;
            margin-bottom: 25px;
        }

        nav {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        nav a {
            display: block;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            color: white;
        }

        .add { background-color: #4CAF50; }
        .add:hover { background-color: #45a049; transform: scale(1.03); }

        .view { background-color: #2196F3; }
        .view:hover { background-color: #1976D2; transform: scale(1.03); }

        .update { background-color: #FFB300; }
        .update:hover { background-color: #FFA000; transform: scale(1.03); }

        .delete { background-color: #F44336; }
        .delete:hover { background-color: #D32F2F; transform: scale(1.03); }

        footer {
            margin-top: 25px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Branch Directory System</h1>

    <nav>
        <a href="create.php" class="add">Add Student</a>
        <a href="read.php" class="view">View Students</a>
        <a href="read.php" class="update">Update Student</a>
        <a href="read.php" class="delete">Delete Student</a>
    </nav>

    <footer>Monique Roa Midterm Project</footer>
</div>

</body>
</html>
