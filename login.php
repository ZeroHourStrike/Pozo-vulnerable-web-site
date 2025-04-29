<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "vulnerable_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 🚨 Vulnerable SQL (for educational purpose ONLY)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Pozo</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, #1a237e, #00bcd4);
            font-family: 'Share Tech Mono', monospace;
            color: #00ffcc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            animation: fadeIn 1s ease-in;
        }

        h1 {
            font-size: 3.5em;
            color: #00ffcc;
            font-family: 'Orbitron', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        }

        .login-container {
            background: #121212;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.3);
            width: 350px;
            text-align: center;
            margin-bottom: 30px;
            border: 2px solid #00ffcc;
        }

        h2 {
            font-family: 'Orbitron', sans-serif;
            color: #00ffcc;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            background: #0d0d0d;
            border: 2px solid #00ffcc;
            border-radius: 8px;
            color: #00ffcc;
            font-size: 1.2em;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #ff4081;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #00ffcc, #00bcd4);
            border: none;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            font-size: 1.2em;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #00bcd4, #ff4081);
        }

        .error {
            color: #f44336;
            font-size: 1.1em;
            margin-top: 10px;
        }

        .resources {
            max-width: 700px;
            font-size: 1em;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            color: #ccc;
            margin-top: 40px;
            box-shadow: 0 8px 24px rgba(0, 255, 204, 0.2);
            border: 2px solid #00ffcc;
        }

        .resources h3, .resources h4 {
            color: #00ffcc;
            margin-bottom: 10px;
        }

        .resources ul {
            line-height: 1.8;
            padding-left: 20px;
        }

        .resources a {
            color: #00ffcc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .resources a:hover {
            color: #ff4081;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2.5em;
            }

            .login-container {
                width: 90%;
                padding: 30px;
            }

            input[type="text"], input[type="password"], input[type="submit"] {
                font-size: 1em;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <h1>Welcome to Pozo</h1>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>

    <div class="resources">
        <h3>📘 Learn About SQL Injection</h3>
        <p>These links will help you understand how SQL injection works and how to prevent it:</p>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/SQL_Injection" target="_blank">OWASP: SQL Injection Overview</a></li>
            <li><a href="https://portswigger.net/web-security/sql-injection" target="_blank">PortSwigger Web Security Academy</a></li>
            <li><a href="https://www.w3schools.com/sql/sql_injection.asp" target="_blank">W3Schools: SQL Injection Tutorial</a></li>
            <li><a href="https://tryhackme.com/room/sqlinjection" target="_blank">TryHackMe: SQL Injection Lab</a></li>
            <li><a href="https://www.udemy.com/course/sql-injection/" target="_blank">Udemy Course: SQL Injection Complete Guide</a></li>
        </ul>

        <h4>🛡️ How to Prevent SQL Injection</h4>
        <ul>
            <li>Use <strong>prepared statements</strong> with parameterized queries (e.g., <code>mysqli_prepare()</code> or PDO).</li>
            <li>Validate and sanitize all user inputs before using them in SQL queries.</li>
            <li>Use ORM frameworks to avoid manual SQL writing.</li>
            <li>Limit database privileges for the web user account.</li>
        </ul>
    </div>
</body>
</html>
