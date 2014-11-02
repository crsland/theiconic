Feature: Search
    In order to see the results
    As a visitor
    I need to be able to search by text

@javascript
Scenario: Get search results from Google
    Given I am on "http://localhost/theiconic"
    When I search for "Behat"
    And I press "Go" button
    Then I should see "Search results"

@javascript
Scenario: Searching using a search engine that is not working
    Given I am on "http://localhost/theiconic"
    When I search for "php"
    And I select "yahoo"
    And I press "Go" button
    Then I should see "Service error, please try again"

@javascript
Scenario: Searching with no params
    Given I am on "http://localhost/theiconic"
    When I search for ""
    And I click on "Go" button
    Then I should see "You are looking for nothing!"