<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | HackLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background: #0f0f0f;
            font-family: 'Share Tech Mono', monospace;
            color: #00ffcc;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px #00ffcc;
            text-align: center;
        }
        h2 {
            font-family: 'Orbitron', sans-serif;
        }
        a {
            color: #ff5e5e;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You are now logged in to the vulnerable Pozo dashboard.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
