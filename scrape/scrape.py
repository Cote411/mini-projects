import requests
from bs4 import BeautifulSoup

# URL of the website you want to scrape
url = "https://submitty.cs.rpi.edu/courses/f23/csci2500/polls/42"

# Send an HTTP GET request to the URL
response = requests.get(url)

# Check if the request was successful
if response.status_code == 200:
    # Parse the HTML content of the page using BeautifulSoup
    soup = BeautifulSoup(response.text, "html.parser")

    # Find the section with class "article__body"
    article_body = soup.find("div", class_="submitty-body")

    if article_body:
        # Find all <div> tags within the article__body section
        div_tags = article_body.find_all("div", class_ = "markdoww")

        # Loop through the div tags and extract the text from paragraph tags
        for div in div_tags:
            paragraph = div.find("p")
            if paragraph:
                # Print or store the text from the paragraph
                print(paragraph.get_text())
    else:
        print("Could not find the article__body section on the page.")
else:
    print("Failed to retrieve the webpage. Status code:", response.status_code)
