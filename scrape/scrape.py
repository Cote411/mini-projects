import requests
from bs4 import BeautifulSoup

# URL of the website you want to scrape
url = "https://www.statnews.com/2023/08/09/happi-sabeti-sentinel-geneticists-global-pandemic-africa/"  # Replace with the actual URL


try:
    # Send an HTTP GET request to the URL
    response = requests.get(url)

    # Check if the request was successful (status code 200)
    if response.status_code == 200:
        # Parse the HTML content of the page using BeautifulSoup
        soup = BeautifulSoup(response.text, 'html.parser')

        # Find the <section> element with the class "the-content"
        section_element = soup.find('section', class_='the-content')

        if section_element:
            # Find all <p> elements within the <section> element
            p_elements = section_element.find_all('p')

            # Extract and print the text content of each <p> element
            for p in p_elements:
                print(p.get_text())
        else:
            print("No <section> element with the class 'the-content' found on the page.")

    else:
        print(f"Failed to retrieve the web page. Status code: {response.status_code}")

except requests.exceptions.RequestException as e:
    print(f"An error occurred: {e}")
except Exception as e:
    print(f"An unexpected error occurred: {e}")
