<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Page</title>
</head>
<body>
    <h1>Your Account Details</h1>
    <p id="account-info">
    "1006": "User 1006's Account Details: poozoo pooozozo, pozo@example.com",
    </p>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('user');

        const users = {
            "1001": "User 1001's Account Details: John Doe, john@example.com",
            "1002": "User 1002's Account Details: Jane Smith, jane@example.com",
            "1003": "User 1003's Account Details: Yoseph Getachew, joseph@example.com",
            "1003": "User 1003's Account Details: pozo pozo, pozo@example.com"
        };

        document.getElementById("account-info").textContent = users[userId] || "User not found.";
    </script>
</body>
</html>
