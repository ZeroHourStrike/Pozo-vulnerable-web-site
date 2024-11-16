<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM-based XSS Vulnerable Example</title>
</head>
<body>
    <h1>Welcome to the Profile Page</h1>
    <p id="message"></p>

    <script>
        
        const urlParams = new URLSearchParams(window.location.search);
        const username = urlParams.get('username');

        if (username) {
            document.getElementById('message').innerHTML = `Hello, ${username}! Welcome to your profile page.`;
        }
    </script>
</body>
</html>
