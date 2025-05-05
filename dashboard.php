<?php
include_once("connection.php");
include_once("functions.php");

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT name, profile_picture FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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

        .dashboard {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 20px 0;
            border: 4px solid #4facfe;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        h2 {
            margin: 10px 0 20px;
            font-size: 1.8em;
        }

        nav {
            margin: 20px 0;
        }

        nav a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #4facfe;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        nav a:hover {
            background: #00f2fe;
            transform: translateY(-2px);
        }

        .admin-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 25px;
            background: #ff6b6b;
            color:h3 {
            malor: #444;
        }

        .info-rgin-bottom: 10px;
            cocard p {
            font-size: 1em;
            color: #666;
        }

        @media (max-width: 600px) {
            nav a {
                display: block;
                margin: 10px auto;
                width: 80%;
            }

            .dashboard {
                margin: 20px;
                padding: 15px; white;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .admin-btn:hover {
            background: #ff4d4d;
            transform: translateY(-2px);
        }

        .info-card {
            background: #f4f7fa;
            margin-top: 30px;
            padding: 25px;
            border-radius: 12px;
            text-align: left;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .info-card 
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Online Bookstore Management System</h1>
    </header>

    <div class="dashboard">
        <?php if (!empty($user['profile_picture'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="profile-img">
        <?php endif; ?>

        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>

        <nav>
            <a href="library.php">📚 Library</a>
            <a href="changepassword.php">🔑 Change Password</a>
            <a href="update__profile.php">✏️ Update Profile</a>
            <a href="logout.php">🚪 Logout</a>
        </nav>

        <?php if (isAdmin()): ?>
            <a href="manage_users.php" class="admin-btn">👑 Manage Users</a>
        <?php endif; ?>

        <div class="info-card">
            <h3>Welcome Panel</h3>
            <p>This dashboard allows you to manage your profile, explore the library, and access secure account features. If you're an admin, you can also manage users.</p>
        </div>
