import pytest
from bank.account import Account
from bank.client import Client
import warnings
import sys


## paramètres du cas test => FIXTURES
def test_balance(account, balance):
    # capture de sys.stdout => option -s
    # print(f"\nbalance: {account.getBalance()}\n")
    assert balance == account.getBalance()


def test_overdraft():
    # Arrange / Given: contexte du test
    account = Account(1, Client(1))
    # Act / When: exécuter la fonctionnalité à test
    account.withdraw(600)
    # Assert / Then: évaluer le delta calculé vs attendu
    assert account.overdraft


# @pytest.mark.parametrize("firstname,lastname", [("michel", "lefebvre")])
# def test_client_name(account_1, firstname, lastname, monkeypatch):
# class MockClient:
# def get_full_name(self):
# return f"{firstname.capitalize()} {lastname.upper()}"
# monkeypatch.setattr(account_1, "_Account__client", MockClient())
# assert account_1.get_client_name() == "Michel LEFEBVRE"


def test_deposit(account_1):
    # Arrange
    account = Account(1, Client(1))
    init_balance = account.getBalance()
    # Act
    amount = 100.0
    account.deposit(amount)
    # Assert
    assert init_balance < account.getBalance()
