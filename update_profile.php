<?php
include_once("connection.php");
include_once("functions.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $file = $_FILES["profile_picture"];
    $filename = basename($file["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("UPDATE Users SET profile_picture = ? WHERE user_id = ?");
        $stmt->bind_param("si", $filename, $user_id);
        $stmt->execute();
        $success_message = "Profile picture updated successfully!";
    } else {
        $error_message = "Upload failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-container {
            background: white;
            padding: 40px;
            width: 400px;
            border-radius: 16px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #0072ff;
        }

        .upload-container input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        .upload-container input[type="file"]:focus {
            border-color: #00c6ff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #00c6ff;
        }

        .message {
            margin-top: 20px;
            font-size: 1.1em;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        a {
            text-decoration: none;
            color: #0072ff;
            font-weight: 600;
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="upload-container">
        <h2>Upload Your Profile Picture</h2>

        <?php if (isset($error_message)) { ?>
            <p class="message error"><?php echo $error_message; ?></p>
        <?php } ?>

        <?php if (isset($success_message)) { ?>
            <p class="message success"><?php echo $success_message; ?></p>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_picture" required><br>
            <button type="submit">Upload</button>
        </form>

        <br>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>
