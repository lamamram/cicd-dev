from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

import pytest

@pytest.mark.e2e
def test_login(selenium):
  ## accéder à la page de login
  selenium.get("http://192.168.44.180:8080")
  ## trouver le username
  username = selenium.find_element(By.ID, "username")
  username.send_keys("admin")
  ## trouver le passwd
  passwd = selenium.find_element(By.ID, "username")
  passwd.send_keys("passwd")
  ## valider l'authentification
  submit = selenium.find_element(By.TAG_NAME, "button")[0]
  submit.click()
  ## test si le login est OK
  h1 = selenium.find_element(By.TAG_NAME, "h1")[0]
  assert "Simple Bank Interface" == h1.text



