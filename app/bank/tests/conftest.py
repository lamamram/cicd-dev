"""
module chargé avant tout module de test
adjancent ou enfant
"""
import pytest
from bank.account import Account
from bank.client import Client

from selenium import webdriver

## jeu de données parametrisé !!!
account_set = [
    (Account(k, Client(k)), b) for k,b in {1: 500.00, 2: 300.00}.items()
]


# @pytest.fixture(scope="module", params=[1, 2])
@pytest.fixture
def client(request):
    # c = Client(request.param)
    c = Client(1)
    yield c
    # Cleanup: libère la mémoire
    print("\nfree memory !\n")
    del c

# fixture dans une fixture
@pytest.fixture
def account_1(client):
    return Account(1, client)

@pytest.fixture
def show_mesgs():
    print("\nbefore")
    yield
    print("\nafter")


@pytest.fixture
def selenium():
    options = webdriver.FirefoxOptions()
    ## pas besoin de GUI !!!
    options.headless=True
    return webdriver.Remote(
        command_executor="http://selenium-server:4444/wd/hub",
        options=options)

# paramétrisation de tous les tests depuis conftest
def pytest_generate_tests(metafunc):
    # recherche dans les signatures de fct de tests
    if "balance" in metafunc.fixturenames:
        metafunc.parametrize("account,balance", account_set)

# actions custom sur la collecte des tests
# def pytest_collection_modifyitems(config, items):
#     for item in items:
#         item.add_marker("something_related_to_balance")