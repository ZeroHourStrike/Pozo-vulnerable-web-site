<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JS Injection Demo - Square Calculator (Vulnerable)</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f0f2f5, #d4e1f5);
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      padding: 40px 20px;
    }

    .container {
      background-color: #fff;
      border-radius: 16px;
      padding: 30px 40px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    h1 {
      font-size: 26px;
      color: #1f2937;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      margin-bottom: 20px;
      transition: border-color 0.2s ease;
    }

    input[type="text"]:focus {
      border-color: #007bff;
      outline: none;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    #result {
      margin-top: 20px;
      font-size: 18px;
      color: #1d3557;
    }

    .mitigation {
      margin-top: 40px;
      background-color: #f9fafe;
      border-left: 6px solid #007bff;
      padding: 20px;
      border-radius: 10px;
      max-width: 700px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .mitigation h3 {
      color: #007bff;
      margin-top: 0;
    }

    .mitigation ul {
      padding-left: 20px;
      text-align: left;
    }

    .mitigation ul li {
      margin-bottom: 10px;
    }

    .mitigation a {
      color: #007bff;
      text-decoration: none;
    }

    .mitigation a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>⚠️ JavaScript Injection Vulnerability</h1>
    <p>Enter a number to calculate its square — or inject JavaScript code.</p>
    <input type="text" id="userInput" placeholder="E.g., 5 or alert('XSS')">
    <button onclick="executeCode()">Execute</button>
    <p id="result"></p>
  </div>

  <script>
    function executeCode() {
      const input = document.getElementById('userInput').value;
      try {
        const result = eval(input); // ⚠️ Vulnerable use of eval
        document.getElementById('result').innerText = "Result: " + result;
      } catch (error) {
        document.getElementById('result').innerText = "Error: " + error.message;
      }
    }
  </script>

  <div class="mitigation">
    <h3>🛡️ Mitigation Strategies for JavaScript Injection:</h3>
    <ul>
      <li><strong>✅ Input Validation:</strong> Sanitize and validate all user inputs.</li>
      <li><strong>🚫 Avoid `eval()`:</strong> Replace with safe alternatives like `parseFloat()` or business logic.</li>
      <li><strong>🔒 Use CSP:</strong> Apply Content Security Policy headers to block inline scripts.</li>
      <li><strong>📦 Output Encoding:</strong> Use `.textContent` instead of `.innerHTML` when updating the DOM.</li>
    </ul>
    <h3>📘 Learn More:</h3>
    <ul>
      <li><a href="https://owasp.org/www-project-top-ten/owasp-top-ten-2021-index" target="_blank">OWASP Top Ten: Injection</a></li>
      <li><a href="https://owasp.org/www-community/OWASP_JavaScript_Injection_Prevention_Cheat_Sheet" target="_blank">OWASP JS Injection Cheat Sheet</a></li>
      <li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_JavaScript_with_HTML" target="_blank">MDN JS & HTML Guide</a></li>
    </ul>
  </div>

</body>
</html>
