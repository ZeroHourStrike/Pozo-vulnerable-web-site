<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DOM-Based XSS Demo</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #fff8f0;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      height: 100vh;
    }

    h1 {
      font-size: 2.5em;
      color: #e07a5f;
      margin-bottom: 20px;
    }

    form {
      background: #ffffff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
      margin-bottom: 30px;
      transition: transform 0.3s;
    }

    form:hover {
      transform: scale(1.03);
    }

    input[type="text"] {
      padding: 10px;
      width: 280px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1em;
      margin-bottom: 15px;
    }

    button {
      background-color: #e07a5f;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 1em;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #c9634a;
    }

    .output {
      font-size: 1.8em;
      color: #3d405b;
      margin-top: 20px;
    }

    .mitigation {
      margin-top: 40px;
      padding: 20px;
      background: #f7ebe8;
      border-radius: 10px;
      text-align: left;
      width: 80%;
      max-width: 650px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .mitigation h3 {
      color: #9a031e;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 2em;
      }
      input[type="text"] {
        width: 90%;
      }
      button {
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <h1>DOM-Based XSS Demo</h1>
  <form method="GET">
    <input type="text" name="username" placeholder="Enter your name" />
    <br />
    <button type="submit">Submit</button>
  </form>

  <div class="output" id="welcomeMessage">
    <!-- DOM-based XSS vulnerability lives here -->
  </div>

  <script>
    const params = new URLSearchParams(window.location.search);
    const username = params.get('username');

    if (username) {
      // ❗ Deliberately vulnerable to DOM-based XSS
      document.getElementById('welcomeMessage').innerHTML =
        `👋 Hello, <strong>${username}</strong>! Welcome to the vulnerable site.`;
    }
  </script>

  <div class="mitigation">
    <h3>Mitigation Strategies for DOM-Based XSS:</h3>
    <ul>
      <li><strong>Never use <code>innerHTML</code></strong> with unsanitized input. Prefer <code>textContent</code> or libraries like DOMPurify.</li>
      <li><strong>Sanitize URL parameters</strong> before inserting them into the DOM.</li>
      <li><strong>Implement a strong Content Security Policy (CSP)</strong> to restrict inline scripts.</li>
      <li><strong>Input Validation:</strong> Accept only expected characters like letters or numbers.</li>
    </ul>

    <h3>Try a Payload:</h3>
    <p>Example: <code>?username=&lt;img src=x onerror=alert('XSS')&gt;</code></p>

    <h3>Resources:</h3>
    <ul>
      <li><a href="https://owasp.org/www-community/attacks/xss/#dom-based-xss" target="_blank">OWASP DOM-Based XSS</a></li>
      <li><a href="https://github.com/cure53/DOMPurify" target="_blank">DOMPurify GitHub</a></li>
      <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Element/innerHTML" target="_blank">MDN: innerHTML</a></li>
    </ul>
  </div>
</body>
</html>
