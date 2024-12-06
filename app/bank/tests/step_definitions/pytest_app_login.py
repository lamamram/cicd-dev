import pytest  
from pytest_bdd import scenarios, given, when, then, parsers
from selenium import webdriver
from ..pom_pages import *

# cahrgement de la feature
scenarios("../features/app_login.feature")  
    
# selenium Fixture 
@pytest.fixture
# réutilisation de la fixture à travers des steps
def selenium(scope="module"):
    options = webdriver.FirefoxOptions()
    ## pas besoin de GUI !!!
    options.headless=True
    return webdriver.Remote(
        command_executor="http://selenium-server:4444/wd/hub",
        options=options)
  
   
@given(parsers.parse("I log into the home page"),  
    target_fixture="login_page",)  
def get_home_page(selenium):
    selenium.get(LoginPage.HOME_PAGE)
    return LoginPage(selenium)
    
@when(parsers.parse("I submit the form with the credentials {username} and {passwd}"))  
def log(login_page, username, passwd):
    login_page.login(username, passwd)
      
  
@then(parsers.parse("I see the home page title"))
def check(selenium): 
    home_page = HomePage(selenium)
    assert "Simple Bank Interface" == home_page.get_title()