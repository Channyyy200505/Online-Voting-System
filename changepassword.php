<?php
include_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_pass = password_hash(trim($_POST['new_password']), PASSWORD_DEFAULT);
    $user_id = $_SESSION["user_id"];

    $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_pass, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Password changed successfully.');</script>";
    } else {
        echo "<p class='error-msg'>Failed to update password. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
            max-width: 600px;
            margin: 40px auto;
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

        .content form {
            margin-top: 30px;
        }

        .content input[type="password"] {
            padding: 12px;
            font-size: 1.1em;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            transition: border-color 0.3s;
        }

        .content input[type="password"]:focus {
            border-color: #4facfe;
        }

        .content button {
            padding: 12px 25px;
            background: #4facfe;
            color: white;
            font-weight: bold;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content button:hover {
            background: #00f2fe;
            transform: translateY(-2px);
        }

        .content .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #f4f7fa;
            color: #4facfe;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .content .back-btn:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
        }

        .error-msg {
            color: red;
            font-size: 1.2em;
            margin-top: 20px;
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
        <h2>Change Password</h2>

        <!-- Password Change Form -->
        <form method="POST">
            <input type="password" name="new_password" placeholder="Enter new password" required><br>
            <button type="submit">Update Password</button>
        </form>

        <!-- Back to Dashboard Link -->
        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

</body>
</html>
