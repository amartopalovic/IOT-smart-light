<!DOCTYPE html>
<html>
<head>
    <title>Smart Light Control</title>
</head>
<body>
    <h1>Control the LED</h1>
    <form method="post">
        <button name="action" value="on">TURN ON</button>
        <button name="action" value="off">TURN OFF</button>
        <button name="action" value="blink">BLINK</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];

            if ($action == 'on') {
                exec("python3 /home/pi/led-control/turnon.py");
            } elseif ($action == 'off') {
                exec("python3 /home/pi/led-control/turnoff.py");
            } elseif ($action == 'blink') {
                exec("python3 /home/pi/led-control/blink.py > /dev/null 2>&1 &");
            }
        }
    ?>
</body>
</html>
