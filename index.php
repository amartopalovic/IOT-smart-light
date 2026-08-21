<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["turnon"])) {
        shell_exec("sudo /usr/bin/python3 /var/www/html/turnon.py");
    } elseif (isset($_POST["turnoff"])) {
        shell_exec("sudo /usr/bin/python3 /var/www/html/turnoff.py");
    } elseif (isset($_POST["blink"])) {
        shell_exec("sudo /usr/bin/python3 /var/www/html/blink.py");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Smart Light Control</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #b3e0ff, #0066cc);
      font-family: Arial, sans-serif;
      backdrop-filter: blur(5px);
    }
    .container {
      text-align: center;
      background: rgba(255, 255, 255, 0.2);
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
    }
    h2 {
      color: white;
      margin-bottom: 1.5rem;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }
    .btn-group {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      justify-content: center;
    }
    button {
      padding: 12px 24px;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      background: rgba(255, 255, 255, 0.9);
      color: #0066cc;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      background: white;
    }
    button:active {
      transform: translateY(0);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Smart Light Control</h2>
    <form method="post">
      <div class="btn-group">
        <button type="submit" name="turnon">TURN ON</button>
        <button type="submit" name="turnoff">TURN OFF</button>
        <button type="submit" name="blink">BLINK</button>
      </div>
    </form>
  </div>
</body>
</html>
