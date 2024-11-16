<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JavaScript Injection Vulnerability Example</title>
</head>
<body>
  <h1>JavaScript Injection Vulnerability</h1>
  <p>Enter a number to calculate its square:</p>
  <input type="text" id="userInput" placeholder="Enter a number">
  <button onclick="calculateSquare()">Calculate</button>
  
  <p id="result"></p>
  
  <script>
    function calculateSquare() {
      const input = document.getElementById('userInput').value;
      try {
        const result = eval(input + " * " + input);
        document.getElementById('result').innerText = "Result: " + result;
      } catch (error) {
        document.getElementById('result').innerText = "Error: Invalid input!";
      }
    }
    
  </script>
  <style>
    
  </style>
</body>
</html>
