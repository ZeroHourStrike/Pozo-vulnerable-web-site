<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Account Page</title>  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">  
    <style>  
        * {  
            box-sizing: border-box;  
        }  
        body {  
            font-family: 'Poppins', sans-serif;  
            background: linear-gradient(to right, #e3f2fd, #fce4ec);  
            color: #333;  
            margin: 0;  
            padding: 0;  
            display: flex;  
            flex-direction: column;  
            align-items: center;  
            justify-content: center;  
            min-height: 100vh;  
            text-align: center;  
        }  
        h1 {  
            font-size: 3em;  
            margin-bottom: 30px;  
            color: #3949ab;  
            text-shadow: 1px 1px #ddd;  
        }  
        #account-info {  
            background: #ffffffcc;  
            padding: 30px;  
            border-radius: 15px;  
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);  
            width: 350px;  
            margin: 0 auto;  
            font-size: 1.2em;  
            transition: all 0.3s ease;  
        }  
        #account-info:hover {  
            transform: scale(1.02);  
        }  
        a {  
            display: inline-block;  
            text-decoration: none;  
            padding: 12px 24px;  
            margin-top: 25px;  
            background: linear-gradient(to right, #42a5f5, #ab47bc);  
            color: white;  
            border-radius: 25px;  
            font-weight: bold;  
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);  
            transition: all 0.3s ease;  
        }  
        a:hover {  
            background: linear-gradient(to right, #1976d2, #8e24aa);  
            transform: scale(1.05);  
        }  
        .mitigation {  
            margin-top: 50px;  
            padding: 30px;  
            background: #f1f8e9;  
            border-radius: 15px;  
            width: 90%;  
            max-width: 700px;  
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);  
            text-align: left;  
        }  
        .mitigation h3 {  
            color: #2e7d32;  
            font-size: 1.5em;  
        }  
        .mitigation ul {  
            padding-left: 20px;  
        }  
        .mitigation li {  
            margin-bottom: 10px;  
        }  
        .mitigation a {  
            color: #1e88e5;  
            font-weight: bold;  
            text-decoration: underline;  
        }  
    </style>  
</head>  
<body>  
    <h1>Your Account Details</h1>  
    <p id="account-info"></p>  
    <a href="user_list.html">🔙 Back to User List</a>  

    <script>  
        const urlParams = new URLSearchParams(window.location.search);  
        const userId = urlParams.get('user');  

        const users = {  
            "1001": "👤 <strong>John Doe</strong><br>Email: john@example.com",  
            "1002": "👤 <strong>Jane Smith</strong><br>Email: jane@example.com",  
            "1003": "👤 <strong>Yoseph Getachew</strong><br>Email: joseph@example.com",  
            "1004": "👤 <strong>Pozo Pozo</strong><br>Email: pozo@example.com"  
        };  

        document.getElementById("account-info").innerHTML = users[userId] || "❌ User not found.";  
    </script>  

    <div class="mitigation">  
        <h3>🔐 Mitigation Strategies for IDOR:</h3>  
        <ul>  
            <li><strong>✅ Access Controls:</strong> Ensure users can only access their own data.</li>  
            <li><strong>🔁 Indirect References:</strong> Replace user IDs with session tokens or hashed identifiers.</li>  
            <li><strong>🔍 Input Validation:</strong> Validate user input on both client and server side.</li>  
            <li><strong>📈 Logging & Monitoring:</strong> Detect and respond to unusual activity patterns.</li>  
        </ul>  

        <h3>📚 Learn More:</h3>  
        <ul>  
            <li><a href="https://owasp.org/www-community/attacks/IDOR" target="_blank">OWASP - Insecure Direct Object Reference (IDOR)</a></li>  
            <li><a href="https://owasp.org/Top10/A01_2021-Broken_Access_Control/" target="_blank">OWASP Top 10 - Broken Access Control</a></li>  
            <li><a href="https://portswigger.net/web-security/access-control/idor" target="_blank">PortSwigger - IDOR Tutorial</a></li>  
        </ul>  
    </div>  
</body>  
</html>
