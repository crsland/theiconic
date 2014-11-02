Feature: Search
    In order to see the results
    As a visitor
    I need to be able search for a text

Scenario: Get search results from Google
    Given I am on the home page
    When I fill in "Search" with "Behat"
    And I press the "send" button
    Then I should see "Search results"

Scenario: Searching using a search engine that is not working
    Given I am on the homepage
    When I fill in "search" with "Behat"
    And I select "Yahoo"
    And I press "Send"
    Then I should see "Service error, please try again"