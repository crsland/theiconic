<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @When /^I search for "([^"]*)"$/
     */
    public function iSearchFor($query)
    {
        $this->fillField('query', $query);
    }
 
    /**
     * @When /^I press "Go" button$/
     */
    public function iPressButton()
    {
        $this->pressButton('Go');
        $this->getSession()->wait('5000','(0 === jQuery.active)');
    }

    /**
     * @When /^I click on "Go" button$/
     */
    public function iClickOnButton()
    {
        $this->pressButton('Go');
        //$this->getSession()->wait('5000','(0 === jQuery.active)');
    }    
    
    /**
     * @When /^I select "([^"]*)"$/
     */
    public function iSelect($query)
    {
        $this->fillField('searchEngine', $query);
        $this->pressButton('Go');
    }  
}
