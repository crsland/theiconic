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
    public $googleReturnValue;
    public function setUp()
    {
        parent::setUp();
        
        $this->googleReturnValue = [
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

        $this->mockedSE = $this->getMock(
            '\App\Repos\SearchEngine\GoogleSearchEngine',
            ['search'],
            [],
            'GoogleMockSearchEngine'
        );
        // New Search
        $this->search = new Search($this->mockedSE);
    }
    
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

    public function testGetGoogleDataError()
    {    
        $query = '--------------------------------------------------------------'
                . '-------------------------------------------------------------'
                . '-------------------------------------------------------------'
                . '-------------------------------------';
        
        $this->mockedSE->expects(($this->once()))
                 ->method('search')
                 ->with($query)
                 ->will($this->returnValue($this->googleReturnValue));
        // Inject the mocked object
        $this->search->setSe($this->mockedSE);
        // Mocked Search
        $data = $this->search->get($query);
        // Assertion
        $this->assertTrue($data['error']);
    }
    
    public function testGetYahooData()
    {
        
    }
    
    public function testGetBingDataTest()
    {
        
    }
    
    public function tearDown()
    {
        unset($this->search);
    }
    
}