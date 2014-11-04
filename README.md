# Search Page. Technical Test

It uses **Google**, **ExaLead**, **Yahoo** and **Bing**. But only Google and Exalead return valid results and Yahoo and Bing
 are used to see what happens when the search engine fails.

I chose to include ExaLead search engine because I experimented some scraping problems with yahoo and bing.
So in order to not blocking my progress and to commit the test in time, I decided to use this search engine.
 
The code uses a Factory Method for the object creation. Every Search Engine type represents a concrete product.
All the search engines classes implements the SearchEngineRepository interface.
It uses Dependency Injection. It isolates the methods and allows unit testing be easier.
 
The tests were ran under Firefox, chrome - Windows xp, Windows and Linux Mint -.
 
* Run composer update.
* In order to run Behat tests, install Selenium server.
* Php version >= 5.4
 
## Specs:
 
* The dropdown will show three options (Yahoo, Bing, Google).
* When we have valid results, the system should display a list of those results, if the query returns no results, 
   then we should show a message saying that no results were found.

### Tasks and guidelines:

* Use as many libraries and frameworks as it makes sense.
* Create testable code applying design patterns.
* Create PHPUnit tests (the aim here is for him to mock the calls to the search engine)
* Create the pertinent Behat tests.