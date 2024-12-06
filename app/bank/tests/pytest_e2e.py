from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

import pytest
from .pom_pages import *

# @pytest.mark.e2e
# def test_login(selenium):
#   ## accéder à la page de login
#   selenium.get("http://172.17.0.1:8081")
#   ## trouver le username
#   username = selenium.find_element(By.ID, "username")
#   username.send_keys("admin")
#   ## trouver le passwd
#   passwd = selenium.find_element(By.ID, "passwd")
#   passwd.send_keys("admin")
#   ## valider l'authentification
#   submit = selenium.find_elements(By.TAG_NAME, "button")[0]
#   submit.click()
#   ## test si le login est OK
#   h1 = selenium.find_elements(By.TAG_NAME, "h1")[0]
#   assert "Simple Bank Interface" == h1.text

@pytest.mark.e2e
def test_login(selenium, account_1):
    # ARRANGE
    selenium.get(LoginPage.HOME_PAGE)
    login_page = LoginPage(selenium)
    # ACT
    login_page.login("admin", "admin")
    # Assert
    home_page = HomePage(selenium)
    assert "Simple Bank Interface" == home_page.get_title()
  



