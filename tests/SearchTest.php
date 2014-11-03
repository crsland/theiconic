<?php
require '../app/Search.php';
//use Search;
/**
 * @backupGlobals disabled
 */
class SearchTest extends PHPUnit_Framework_TestCase
{
    public $search;
    public $mockedSE;
    public $googleReturnValue = [
        ["title"=>"Darryl Cote","link"=>"Nisl Quisque Corp.","description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing"],
        ["title"=>"Wylie Barber","link"=>"Sed Pede Consulting","description"=>"Lorem ipsum"],
        ["title"=>"Asher Donovan","link"=>"Neque Pellentesque PC","description"=>"Lorem ipsum dolor sit amet, consectetuer"],
        ["title"=>"Athena Ratliff","link"=>"Cursus Luctus Ltd","description"=>"Lorem ipsum"],
        ["title"=>"Barbara Pollard","link"=>"Pellentesque Ultricies Associates","description"=>"Lorem"],
        ["title"=>"Darryl Cote","link"=>"Nisl Quisque Corp.","description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing"],
        ["title"=>"Wylie Barber","link"=>"Sed Pede Consulting","description"=>"Lorem ipsum"],
        ["title"=>"Asher Donovan","link"=>"Neque Pellentesque PC","description"=>"Lorem ipsum dolor sit amet, consectetuer"],
        ["title"=>"Athena Ratliff","link"=>"Cursus Luctus Ltd","description"=>"Lorem ipsum"],
        ["title"=>"Barbara Pollard","link"=>"Pellentesque Ultricies Associates","description"=>"Lorem"]
    ];
    
    public function setUp()
    {
        parent::setUp();

        $this->mockedSE = $this->getMock(
            '\App\Repos\SearchEngine\GoogleSearchEngine',
            ['search'],
            [],
            'GoogleMockSearchEngine'
        );
        // New Search
        $this->search = new Search($this->mockedSE);
    }
    
    /**
     * Test assert results quantity from Google
     */
    public function testGetGoogleData()
    {
        $query = 'php';   
        $this->mockedSE->expects(($this->once()))
                 ->method('search')
                 ->with($query)
                 ->will($this->returnValue($this->googleReturnValue));
        // Inject the mocked object
        $this->search->setSe($this->mockedSE);
        // Mocked Search
        $data = $this->search->get($query);
        // Assertion
        $this->assertEquals(10, count($data['items']));
    }

    /**
     * Test assert no results from Google
     */
    public function testGetGoogleDataError()
     {    
         $query = '--------------------------------------------------------------'
                 . '-------------------------------------------------------------'
                 . '-------------------------------------------------------------'
                 . '-------------------------------------';
         // Mocked Search
         $data = $this->search->get($query);
         // Assertion
         $this->assertTrue($data['error']);
     }
     
    /**
     * Test assert Yahoo class is not working
     */    
    public function testGetYahooData()
    {
         $query = 'php';
         // Mocked Search
         $data = $this->search->get($query);
         // Assertion
         $this->assertTrue($data['error']);
    }
    
    public function testExaLeadDataTest()
    {
        $exaLeadMock = $this->getMock(
            '\App\Repos\SearchEngine\ExaLeadSearchEngine',
            ['search'],
            [],
            'ExaLeadMockSearchEngine'
        );
        // New Search
        $this->search = new Search($exaLeadMock);
        $query = 'php';
        $exaLeadMock->expects(($this->once()))
                 ->method('search')
                 ->with($query)
                 ->will($this->returnValue($this->googleReturnValue));
        // Inject the mocked object
        $this->search->setSe($exaLeadMock);
        // Mocked Search
        $data = $this->search->get($query);
        
        $this->assertArrayHasKey('items', $data, 'Array has key \'items\' ');
        $this->assertCount(10, $data['items'], 'Has Exactly 10 items');
    }
    
    public function tearDown()
    {
        unset($this->search);
    }
}