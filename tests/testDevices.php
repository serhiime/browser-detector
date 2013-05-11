<?php
require_once 'PHPUnit\Framework\TestCase.php';

/**
 * DetectBrowser test case.
 */
class TestDevices extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var DetectBrowser
	 */
	private $DetectBrowser;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$_SERVER['DOCUMENT_ROOT'] = str_replace("tests", "", dirname(__FILE__));
		include_once('/lib/class.detectbrowser.php');
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		parent::tearDown ();
	}
	
	public function testGoogleNexus()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('Google Nexus', $device['name']);
	}
	
	public function testDell()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 1.6; en-gb; Dell Streak Build/Donut AppleWebKit/528.5+ (KHTML, like Gecko) Version/3.1.2 Mobile Safari/ 525.20.1");
		$device = $detector->getDevice();
		$this->assertEquals('Dell', $device['name']);
	}
	
	public function testAsus()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 4.0.3; en-us; ASUS Transformer Pad TF300T Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30");
		$device = $detector->getDevice();
		$this->assertEquals('Asus', $device['name']);
	}
	
	public function testCiscoCius()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.2.2; en-us; CIUS-7-AT Build/FRG83G) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('Cisco Cius', $device['name']);
	}
	
	public function testHTCEvo3d()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.3.3; en-us; Sprint APX515CKT Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('HTC Evo 3D', $device['name']);
		
		$detector = new DetectBrowser("Dalvik/1.4.0 (Linux; U; Android 2.3.7; Evo Build/GRJ90)");
		$device = $detector->getDevice();
		$this->assertEquals('HTC Evo 3D', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.3.4; en-us; PG86100 Build/GRJ22) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1 BingWeb/2.1.635.20111202");
		$device = $detector->getDevice();
		$this->assertEquals('HTC Evo 3D', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; HTC_EVO3D_X515m; en-se) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16");
		$device = $detector->getDevice();
		$this->assertEquals('HTC Evo 3D', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 4.0.3; ko-; Sprint APX515CKT Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30");
		$device = $detector->getDevice();
		$this->assertEquals('HTC Evo 3D', $device['name']);
	}
	
	public function testNokiaLumia900()
	{
		$detector = new DetectBrowser("Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.0; Trident/3.1; IEMobile/7.0; NOKIA; Lumia 900)");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
		
		$detector = new DetectBrowser("Windows Phone Search (Windows Phone OS 7.10;NOKIA;Lumia 900;7.10;8112)");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
		
		$detector = new DetectBrowser("NOKIA-Lumia 900/UCWEB2.8.2.279/47/355");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
		
		$detector = new DetectBrowser("NOKIA-Lumia 900/UCWEB2.4.0.188/47/32079");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; NOKIA; Lumia 900; Vodafone)");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
		
		$detector = new DetectBrowser("NOKIA-Nokia 900");
		$device = $detector->getDevice();
		$this->assertEquals('Nokia Lumia 900', $device['name']);
	}
	
	public function testNookColor()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; NOOK BNRV200 Build/ERD79 1.4.3) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('NOOK Color', $device['name']);
	}
	
	public function testNookTablet()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.3.4; en-us; NOOK BNTV250 Build/GINGERBREAD 1.4.3) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('NOOK Tablet', $device['name']);
	}
	
	public function testNookHD()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; Android 4.0.4; BNTV400 Build/IMM76L) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.58 Safari/537.31");
		$device = $detector->getDevice();
		$this->assertEquals('NOOK HD', $device['name']);
	}
	
	public function testNookHDplus()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; Android 4.0.4; BNTV600 Build/IMM76L) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.58 Safari/537.31");
		$device = $detector->getDevice();
		$this->assertEquals('NOOK HD+', $device['name']);
	}
	
	public function testPandigitalNovaDigitalReader()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U;Android 2.3.4; en-us; pandigitalnova1/sourceidDL00000021) AppleWebKit/533.1(KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('Pandigital Nova Digital Reader', $device['name']);
	}
	
	public function testPandigitalSuperNova8()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 2.3.1; en-us; pandigitalsprnova1/sourceidDL00000025) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
		$device = $detector->getDevice();
		$this->assertEquals('Pandigital SuperNova 8', $device['name']);
	}
	
	public function testSamsungFocusFlash()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; SAMSUNG; SGH-i677)");
		$device = $detector->getDevice();
		$this->assertEquals('Samsung Focus Flash', $device['name']);
	}
	
	public function testToshibaExciteT10()
	{
		$detector = new DetectBrowser("Dalvik/1.6.0 (Linux; U; Android 4.0.3; AT300 Build/IML74K)");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 10 T', $device['name']);
		
		$detector = new DetectBrowser("OneBrowser/3.5/Mozilla/5.0 (Linux; U; Android 4.1.1; en-us; AT300 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 10 T', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; Android 4.0.3; AT300 Build/IML74K) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Safari/535.19");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 10 T', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 4.0.3; en-us ; AT300 Build/IML74K) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1/UCBrowser/8.5.3.246/145/355");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 10 T', $device['name']);	
	}
	
	public function testToshibaExciteT7()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 4.0.3; de-de; AT270 Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 7 T', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 4.0.3; zh-CN; AT270 Build/IML74K) AppleWebKit/534.31 (KHTML, like Gecko) UCBrowser/8.8.3.278 U3/0.8.0 Mobile Safari/534.31");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 7 T', $device['name']);
		
		$detector = new DetectBrowser("Android 4.0.3;AppleWebKit/535.19;Build/IML74K;AT270 Build/IML74K");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Excite 7 T', $device['name']);
	}
	
	public function testToshibaThrive7()
	{
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 3.2.1; en-us; AT1S0 Build/HTK55D) AppleWebKit/525.10+ (KHTML, like Gecko) Version/3.0.4 Mobile Safari/523.12.2");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Thrive 7', $device['name']);
		
		$detector = new DetectBrowser("Dalvik/1.6.0 (Linux; U; Android 4.0.4; AT1S0 Build/IMM76D)");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Thrive 7', $device['name']);
		
		$detector = new DetectBrowser("Mozilla/5.0 (Linux; U; Android 3.2.1; en-us ; AT1S0 Build/HTK55D) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1/UCBrowser/8.4.1.204/145/444");
		$device = $detector->getDevice();
		$this->assertEquals('Toshiba Thrive 7', $device['name']);
	}
	
	public function testMicrosoftSurface()
	{
		$detector = new DetectBrowser("Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.2; ARM; Trident/6.0; Touch; .NET4.0E; .NET4.0C; Tablet PC 2.0)");
		$device = $detector->getDevice();
		$this->assertEquals('Microsoft Surface', $device['name']);
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

}

