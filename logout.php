<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Online Bookstore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ffb3b3, #ff66b2);
            color: #333;
            text-align: center;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .logout-container {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }

        .logout-container h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        .logout-container p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #666;
        }

        .logout-container a {
            padding: 12px 30px;
            background: #4facfe;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .logout-container a:hover {
            background: #00f2fe;
            transform: translateY(-2px);
        }

        .logout-container .message {
            margin-top: 20px;
            font-size: 1.1em;
            color: #ff6b6b;
        }

        @media (max-width: 600px) {
            .logout-container {
                padding: 25px;
            }

            .logout-container h2 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>

    <div class="logout-container">
        <h2>You have successfully logged out!</h2>
        <p>We're sorry to see you go, but don't worry, you can always come back!</p>
        <a href="login.php">Go to Login Page</a>
        <p class="message">You will be redirected shortly...</p>
    </div>

</body>
</html>
