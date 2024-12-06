from selenium.webdriver.common.by import By
from dotenv import load_dotenv
import os


load_dotenv()
HOST = os.environ["APP_HOST"]
PORT = os.environ["APP_PORT"]

class Page:
    HOME_PAGE = f"http://{HOST}:{PORT}"
    def __init__(self, driver) -> None:
        self.driver = driver

class LoginPage(Page):
    def __init__(self, driver):
        super().__init__(driver=driver)
        self.input_username = self.driver.find_element(By.ID, "username")
        self.input_passwd = self.driver.find_element(By.ID, "passwd")
        self.btn_submit = self.driver.find_elements(By.TAG_NAME, "button")[0]
 
    def login(self, username, passwd):
        # éditer les champs "username/passwd"
        self.input_username.send_keys("admin")
        self.input_passwd.send_keys("admin")
        ## valider l'authentification
        self.btn_submit.click()

class HomePage(Page):
    def __init__(self, driver):
        super().__init__(driver=driver)
        self.text_title = self.driver.find_elements(By.TAG_NAME, "h1")[0]

    def get_title(self):
        return self.text_title.text