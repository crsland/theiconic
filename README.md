# Search Page. Technical Test

It uses **Google**, **ExaLead**, **Yahoo** and **Bing**. But only Google and Exalead return valid results and Yahoo and Bing
 are used to see what happens when the search engine fails.
 
The tests were ran under Firefox, chrome - Windows xp, Windows and Linux Mint -.
 
 * Run composer update.
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