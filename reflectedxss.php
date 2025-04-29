<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vulnerable XSS Demo</title>
  <style>
    /* Reset & Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0f7fa, #e1bee7);
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
      animation: fadeIn 1s ease-in;
    }

    h1 {
      font-size: 3em;
      margin-bottom: 25px;
      color: #6a1b9a;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 2.2em;
      margin-top: 30px;
      color: #4527a0;
    }

    form {
      background: #ffffff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    form:hover {
      transform: scale(1.03);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
    }

    input[type="text"] {
      padding: 12px 16px;
      width: 300px;
      border: 2px solid #d1c4e9;
      border-radius: 8px;
      font-size: 1em;
      margin-bottom: 20px;
      transition: border 0.3s;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #7e57c2;
    }

    button {
      background: linear-gradient(to right, #7e57c2, #5e35b1);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    button:hover {
      background: linear-gradient(to right, #5e35b1, #4527a0);
    }

    #greeting {
      font-weight: bold;
      color: #d500f9;
      word-break: break-word;
    }

    .mitigation {
      margin-top: 50px;
      background: #f3e5f5;
      border-left: 6px solid #7b1fa2;
      padding: 25px;
      border-radius: 12px;
      max-width: 800px;
      width: 90%;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: left;
    }

    .mitigation h3 {
      color: #4a148c;
      margin-bottom: 12px;
    }

    .mitigation ul {
      padding-left: 20px;
    }

    .mitigation li {
      margin-bottom: 12px;
    }

    .mitigation a {
      color: #6a1b9a;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .mitigation a:hover {
      color: #4a148c;
      text-decoration: underline;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 2.2em;
      }

      h2 {
        font-size: 1.6em;
      }

      input[type="text"], button {
        width: 90%;
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <h1>Enter your name:</h1>
  <form method="GET">
    <input type="text" name="username" placeholder="Your name here">
    <br>
    <button type="submit">Submit</button>
  </form>

  <h2>Hello,
    <span id="greeting">
      <script>
        // Vulnerable line: directly writing user input without sanitization
        document.write(decodeURIComponent(window.location.search.split('=')[1] || ''));
      </script>
    </span>
  </h2>

  <div class="mitigation">
    <h3>Mitigation Strategies for Reflected XSS:</h3>
    <ul>
      <li><strong>Input Validation:</strong> Always validate and sanitize user inputs. Ensure they only contain expected characters (e.g., alphanumeric).</li>
      <li><strong>Output Encoding:</strong> Encode output to escape potentially harmful characters. Use functions that safely encode user data before displaying it in HTML.</li>
      <li><strong>Content Security Policy (CSP):</strong> Implement a Content Security Policy header to restrict the sources from which content can be loaded.</li>
      <li><strong>HTTP Headers:</strong> Use security headers like X-XSS-Protection, X-Content-Type-Options, and X-Frame-Options to enhance application security.</li>
    </ul>
    <h3>Further Reading:</h3>
    <ul>
      <li><a href="https://owasp.org/www-community/attacks/xss" target="_blank">OWASP XSS (Cross-Site Scripting) Overview</a></li>
      <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy" target="_blank">MDN Web Docs: Content Security Policy</a></li>
      <li><a href="https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html" target="_blank">OWASP Cross-Site Scripting Prevention Cheat Sheet</a></li>
    </ul>
  </div>
</body>
</html>
