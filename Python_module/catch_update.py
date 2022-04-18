#! python3
import bs4, requests, smtplib

# ------------------- E-mail list ------------------------
toAddress = ['example1@email.com','example2@email.com']
# --------------------------------------------------------

#Download page
getPage = requests.get('https://www.india.gov.in/my-government/schemes')
getPage.raise_for_status() #if error it will stop the program

#Parse text for foods
page = bs4.BeautifulSoup(getPage.text, 'html.parser')
whats_new = page.select('.whats-new')

print( whats_new )

