<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored XSS Demo (Deliberately Vulnerable)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1, h2 {
            color: #4e8cbe;
        }
        form {
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #4e8cbe;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .comments {
            margin-top: 30px;
            padding: 15px;
            background: #fffbe6;
            border-left: 6px solid #ffcc00;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }
        .mitigation, .disclaimer {
            margin-top: 40px;
            background: #e8f4f8;
            padding: 20px;
            border-radius: 8px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }
        .disclaimer {
            background: #ffe6e6;
            border-left: 6px solid #ff4d4d;
        }
    </style>
</head>
<body>

    <h1>Stored XSS Demo</h1>
    <h2>Post a Comment</h2>

    <form method="POST" action="submit_comment.php">
        <input type="text" name="comment" placeholder="Enter your comment" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <div class="comments">
        <h3>Stored Comments:</h3>
        <?php
            if (file_exists('comments.txt')) {
                $comments = file_get_contents('comments.txt');
                echo $comments;
            } else {
                echo "<p>No comments yet.</p>";
            }
        ?>
    </div>

    <div class="mitigation">
        <h3>Mitigation Strategies for Stored XSS:</h3>
        <ul>
            <li><strong>Input Validation:</strong> Validate and sanitize user inputs to ensure they only contain expected characters.</li>
            <li><strong>Output Encoding:</strong> Escape or encode data before displaying it on the page.</li>
            <li><strong>Content Security Policy (CSP):</strong> Restrict where scripts can be loaded from using CSP headers.</li>
            <li><strong>Security Headers:</strong> Use headers like X-Content-Type-Options, X-Frame-Options, etc.</li>
        </ul>
    </div>

    <div class="disclaimer">
        <h3>Disclaimer:</h3>
        <p>
            ⚠️ This page is <strong>intentionally vulnerable</strong> to demonstrate how stored XSS attacks work.
            It is meant for <strong>educational and testing purposes only</strong>. Do not deploy this version in a real production environment.
        </p>
    </div>

</body>
</html>
