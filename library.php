<?php 
include_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            color: #333;
            padding: 20px;
        }

        header {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            padding: 20px 0;
            text-align: center;
            color: #fff;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2em;
        }

        .content {
            max-width: 900px;
            margin: 30px auto;
            padding: 25px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .content h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
        }

        .content a {
            display: inline-block;
            padding: 12px 25px;
            background: #4facfe;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content a:hover {
            background: #00f2fe;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            .content {
                margin: 20px;
                padding: 20px;
            }

            .content h2 {
                font-size: 1.8em;
            }

            .content p {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Online Bookstore Management System</h1>
    </header>

    <div class="content">
        <h2>Library</h2>
        <p>This is a placeholder for your library content. You can fill it with books, articles, or other resources. Explore the exciting world of reading!</p>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>
