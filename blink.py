#!/usr/bin/env python3
import os, signal, sys, time

LED_PIN = 17
PID_FILE = "/tmp/blink.pid"

def pid_is_running(pid: int) -> bool:
    try:
        os.kill(pid, 0)
        return True
    except OSError:
        return False

# If blinking is already running -> stop it FIRST (before touching GPIO)
if os.path.exists(PID_FILE):
    try:
        pid = int(open(PID_FILE).read().strip())
        if pid_is_running(pid):
            os.kill(pid, signal.SIGTERM)
            time.sleep(0.2)
        os.remove(PID_FILE)
    except Exception:
        try:
            os.remove(PID_FILE)
        except:
            pass
    print("Blinking stopped")
    sys.exit(0)

# Start blinking
with open(PID_FILE, "w") as f:
    f.write(str(os.getpid()))

from gpiozero import LED
led = LED(LED_PIN)

def cleanup(*_):
    led.off()
    try:
        os.remove(PID_FILE)
    except:
        pass
    sys.exit(0)

signal.signal(signal.SIGTERM, cleanup)

print("Blinking started")

while os.path.exists(PID_FILE):
    led.on()
    time.sleep(0.5)
    led.off()
    time.sleep(0.5)

cleanup()
