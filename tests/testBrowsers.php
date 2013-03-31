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
		// Skyfire
		$detector = new DetectBrowser("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_7; en-us) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Safari/530.17 Skyfire/2.0");
		$browser = $detector->get_browser();
		$this->assertEquals('Skyfire', $browser['name']);
	}
	
	/**
	 * Dolphin test
	 */
	public function testDolphin()
	{
		// Skyfire
		$detector = new DetectBrowser("Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-S8500/S8500XXJH3; U; Bada/1.0; en-us) AppleWebKit/533.1 (KHTML, like Gecko) Dolfin/2.0 Mobile WVGA SMM-MMS/1.2.0 OPN-B");
		$browser = $detector->get_browser();
		$this->assertEquals('Dolphin', $browser['name']);
	}
	
	/**
	 * AOL Explorer test
	 */
	public function testAOLExplorer()
	{
		// Skyfire
		$detector = new DetectBrowser("Mozilla/4.0 (compatible; MSIE 8.0; AOL 9.0; Windows NT 5.1; Trident/4.0; GTB6.5; BO1IE8_v1;ENUS)");
		$browser = $detector->get_browser();
		$this->assertEquals('AOL Explorer', $browser['name']);
	}
	
	/**
	 * Konqueror test
	 */
	public function testKonqueror()
	{
		// Skyfire
		$detector = new DetectBrowser("Mozilla/5.0 (compatible; Konqueror/3.1; X11)");
		$browser = $detector->get_browser();
		$this->assertEquals('Konqueror', $browser['name']);
	}
	
	/**
	 * Netscape Navigator test
	 */
	public function testNetscapeNavigator()
	{
		// Skyfire
		$detector = new DetectBrowser("Mozilla/5.0 (Windows; U; Win 9x 4.90; de-DE; rv:0.9.2) Gecko/20010726 Netscape6/6.1");
		$browser = $detector->get_browser();
		$this->assertEquals('Netscape Navigator', $browser['name']);
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

