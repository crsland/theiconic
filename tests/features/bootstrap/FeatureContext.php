<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
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
    * @Given /^I am on the home page$/
    */
   public function iAmOnTheHomePage2()
   {
       throw new PendingException();
   }

   /**
    * @When /^I fill in "([^"]*)" with "([^"]*)"$/
    */
   public function iFillInWith($arg1, $arg2)
   {
       throw new PendingException();
   }

   /**
    * @Given /^I press the "([^"]*)" button$/
    */
   public function iPressTheButton($arg1)
   {
       throw new PendingException();
   }

   /**
    * @Then /^I should see "([^"]*)"$/
    */
   public function iShouldSee($arg1)
   {
       throw new PendingException();
   }

   /**
    * @Given /^I am on the homepage$/
    */
   public function iAmOnTheHomepage()
   {
       throw new PendingException();
   }

   /**
    * @Given /^I select "([^"]*)"$/
    */
   public function iSelect($arg1)
   {
       throw new PendingException();
   }

   /**
    * @Given /^I press "([^"]*)"$/
    */
   public function iPress($arg1)
   {
       throw new PendingException();
   }

}
