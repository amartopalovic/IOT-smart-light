import lgpio

CHIP = 0
PIN = 17

h = lgpio.gpiochip_open(CHIP)
lgpio.gpio_claim_output(h, PIN, 1)
lgpio.gpiochip_close(h)
