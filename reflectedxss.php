<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable XSS Demo</title>
</head>
<body>
    <h1>Enter your name:</h1>
    <form method="GET">
        <input type="text" name="username" placeholder="Your name here">
        <button type="submit">Submit</button>
    </form>

    <h2>Hello, 
        <span id="greeting">
            <script>document.write(decodeURIComponent(window.location.search.split('=')[1] || ''));</script>
        </span> 
    </h2>
</body>
</html>
