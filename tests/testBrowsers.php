<?php
/**
 *  test case.
 */
class testBrowsers extends PHPUnit_Framework_TestCase {
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$_SERVER['DOCUMENT_ROOT'] = str_replace("tests", "", dirname(__FILE__));
		include_once('/lib/class.detectbrowser.php');
	}
	
	/**
	 * Skyfire test
	 */
	public function testSkyfire()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_7; en-us) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Safari/530.17 Skyfire/2.0");
		$browser = $detector->get_browser();
		$this->assertEquals('Skyfire', $browser['name']);
	}
	
	/**
	 * Dolphin test
	 */
	public function testDolphin()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-S8500/S8500XXJH3; U; Bada/1.0; en-us) AppleWebKit/533.1 (KHTML, like Gecko) Dolfin/2.0 Mobile WVGA SMM-MMS/1.2.0 OPN-B");
		$browser = $detector->get_browser();
		$this->assertEquals('Dolphin', $browser['name']);
	}
	
	/**
	 * AOL Explorer test
	 */
	public function testAOLExplorer()
	{
		$detector = new DetectBrowser("Mozilla/4.0 (compatible; MSIE 8.0; AOL 9.0; Windows NT 5.1; Trident/4.0; GTB6.5; BO1IE8_v1;ENUS)");
		$browser = $detector->get_browser();
		$this->assertEquals('AOL Explorer', $browser['name']);
	}
	
	/**
	 * Konqueror test
	 */
	public function testKonqueror()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (compatible; Konqueror/3.1; X11)");
		$browser = $detector->get_browser();
		$this->assertEquals('Konqueror', $browser['name']);
	}
	
	/**
	 * Netscape Navigator test
	 */
	public function testNetscapeNavigator()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Win 9x 4.90; de-DE; rv:0.9.2) Gecko/20010726 Netscape6/6.1");
		$browser = $detector->get_browser();
		$this->assertEquals('Netscape Navigator', $browser['name']);
	}
	
	/**
	 * Netscape Navigator test
	 */
	public function testIceWeasel()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.9.0.19) Gecko/2010091807 Iceweasel/3.0.6 (Debian-3.0.6-3)");
		$browser = $detector->get_browser();
		$this->assertEquals('IceWeasel', $browser['name']);
	}
	
	/**
	 * Beamrise test
	 */
	public function testBeamrise()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.98 Beamrise/4.20.13.22 Safari/534.13");
		$browser = $detector->get_browser();
		$this->assertEquals('Beamrise', $browser['name']);
	}
	
	/**
	 * Camino test
	 */
	public function  testCamino()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en; rv:1.8.1.4pre) Gecko/20070511 Camino/1.6pre");
		$browser = $detector->get_browser();
		$this->assertEquals('Camino', $browser['name']);
	}
	
	/**
	 * Columbus test
	 */
	public function testColumbus()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Windows NT 6.1; cs-CZ) AppleWebKit/533.3 (KHTML, like Gecko) Columbus/1.2.1.0 Safari/533.3");
		$browser = $detector->get_browser();
		$this->assertEquals('Columbus', $browser['name']);
	}
	
	/**
	 * Deepnet Exporer test
	 */
	public function testDeepnetExplorer()
	{
		$detector = new DetectBrowser("Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Deepnet Explorer 1.5.0; .NET CLR 1.0.3705)");
		$browser = $detector->get_browser();
		$this->assertEquals('Deepnet Explorer', $browser['name']);
	}
	
	/**
	 * CometBird test
	 */
	public function testCometBird()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.5) Gecko/2009011615 Firefox/3.0.5 CometBird/3.0.5");
		$browser = $detector->get_browser();
		$this->assertEquals('CometBird', $browser['name']);
	}
	
	/**
	 * Kylo test
	 */
	
	public function testKylo()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100222 Firefox/3.6 Kylo/0.8.4.74873");
		$browser = $detector->get_browser();
		$this->assertEquals('Kylo', $browser['name']);
	}
	
	/**
	 * iCab test
	 */
	
	public function testICab()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_8) AppleWebKit/537.3+ (KHTML, like Gecko) iCab/5.0 Safari/533.16");
		$browser = $detector->get_browser();
		$this->assertEquals('iCab', $browser['name']);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		parent::tearDown ();
		unset($_SERVER['DOCUMENT_ROOT']);
	}
		
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}

}

