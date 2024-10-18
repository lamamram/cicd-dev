import pytest
from bank.account import Account
from bank.client import Client
import warnings
import sys

# markers appliqués à toutes les fonctions de test
# pytestmark = [
#     pytest.mark.something_related_to_balance
# ]


def test_balance(account, balance):
    # warnings.warn("blabla collections !")
    # Arrange (instance, connexion ...)
    # Act (calcul)
    # Assert
    # capture de sys.stdout => option -s
    # print(f"\nbalance: {account.getBalance()}\n")
    assert balance == account.getBalance()

def test_overdraft():
    account = Account(1, Client(1))
    account.withdraw(600)
    assert account.overdraft

# @pytest.mark.parametrize("firstname,lastname", [("michel", "lefebvre")])
# def test_client_name(account_1, firstname, lastname, monkeypatch):
    # class MockClient:
        # def get_full_name(self):
            # return f"{firstname.capitalize()} {lastname.upper()}"
    # monkeypatch.setattr(account_1, "_Account__client", MockClient())
    # assert account_1.get_client_name() == "Michel LEFEBVRE"

def test_deposit():
    # Arrange
    account = Account(1, Client(1))
    init_balance = account.getBalance()
    # Act
    amount = 100.
    account.deposit(amount)
    # Assert
    assert init_balance < account.getBalance()

def test_negative_deposit():
    # Arrange
    account = Account(1, Client(1))
    init_balance = account.getBalance()
    # Act
    amount = -100.
    account.deposit(amount)
    # Assert
    assert init_balance == account.getBalance()

