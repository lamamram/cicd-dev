import sys
import unittest
from bank.tests import TestClient, TestAccount

def run_tests():
    suite = unittest.TestSuite()
    try:
        suite.addTest(TestClient)
        suite.addTest(TestAccount)
    except ValueError:
        print("unknown test, use: --help")
        sys.exit()

    runner = unittest.TextTestRunner()
    runner.run(suite)