from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import pytesseract
import pyautogui
import time

# Set the path to the tesseract executable
# This step is not necessary if Tesseract is on your PATH
pytesseract.pytesseract.tesseract_cmd = '/usr/local/opt/tesseract'
# Create a new instance of the Chrome driver
driver = webdriver.Chrome()

# Go to the website
driver.get('https://monkeytype.com/')

# Wait for the page to load
time.sleep(5)

# # Find the button by its id (replace 'buttonId' with the actual id of the button)
# button = driver.find_element_by_css_selector(".cookie-popup-wrapper #cookiePopup .main .buttons .rejectAll")

# # Click the button
# button.click()

# # Wait for the page to update after clicking the button
# time.sleep(2)

# Define the coordinates of the area you want to capture
left = 25
top = 450
width = 1175
height = 100

# Capture the screen area
img = pyautogui.screenshot(region=(left, top, width, height))

# Use pytesseract to perform OCR on the image
text = pytesseract.image_to_string(img)

# Find the input field
# Replace 'inputField' with the actual id or name of the input field
element = driver.find_element_by_id('inputField')

# Type in the text
element.send_keys(text)

# Close the browser
# driver.quit()
