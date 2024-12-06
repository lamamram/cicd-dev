@BDD
Feature: log into the app 
    Tests related to the banking app  
  
    Scenario Outline: log into to login form from the home with admin credentials 
        Given I log into the home page
        When I submit the form with the credentials $<username> and $<passwd>
        Then I see the home page title   
        Examples:  
            | username | passwd |
            | admin    | admin  |