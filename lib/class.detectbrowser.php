<?php
/**
 * @version 1.1.6
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com>
 * @copyright Copyright (c) Sergey Nehaenko 2012-2013
 * @package ru.endorphinua.lib
 * @license: GPL
 */
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
class DetectBrowser
{
	/**
	 * @var array contains information about the user's operating system
	 */
	private $os = Array('name'=>'none','family'=>'none');
	/**
	 * @var array contains information about the device on which the site is viewed
	 */
	private $device = Array('name'=>'none','type'=>'none'); 
	/**
	 * @var array containing information about the user's browser
	 */
	private $browser = Array('name'=>'none','version'=>'none','type'=>'none');
	/**
	 * @var string User Agent string
	 */
	private $ua; // user agent
	/**
	 * @var array contains the path to the xml files
	 */
	private $xml_path = Array('os'=> '/data/os.xml','browser'=> '/data/browsers.xml','device'=>'/data/device.xml');
	/**
	 * @var array contains information from xml files
	 */
	private $xml;
	
	private $debug = false;
	
	/*
	 * Оbject initialization
	 * @param string $ua User Agent string
	 */
	public function __construct($ua = 'none',$debug=false)
	{
		if($ua == 'none')
		{
			$this->ua = $_SERVER['HTTP_USER_AGENT'];
		}
		else
		{
			$this->ua = $ua;
		}
		$this->debug = $debug;
		$this->loadXml();
		$this->detectBroswer();
		$this->detectDevice();
		$this->detectOs();
		$this->fix();
		if($this->debug)
		{
			$this->printAll();
		}
	}
	
	/**
	 * Load the contents of xml files into an array
	 */
	private function loadXml()
	{
		$os = simplexml_load_file(ROOT.$this->xml_path['os']);
		$browser = simplexml_load_file(ROOT.$this->xml_path['browser']);
		$device = simplexml_load_file(ROOT.$this->xml_path['device']);
		$this->xml = Array();
		foreach($os->children() as $element)
		{
			$id = $element->attributes()->id;
			foreach($element->children() as $property_key => $property_value)
			{
				$property = (string) $property_key;
				$id = (string) $id;
				$this->xml['os'][$property][$id] = (string)$property_value;
			}
		}
		foreach($browser->children() as $element)
		{
			$id = $element->attributes()->id;
			foreach($element->children() as $property_key => $property_value)
			{
				$property = (string) $property_key;
				$id = (string) $id;
				$this->xml['browser'][$property][$id] = (string)$property_value;
			}
		}
		foreach($device->children() as $element)
		{
			$id = $element->attributes()->id;
			foreach($element->children() as $property_key => $property_value)
			{
				$property = (string) $property_key;
				$id = (string) $id;
				$this->xml['device'][$property][$id] = (string)$property_value;
			}
		}
	}
	
	/**
	 * Getter for BROWSER property
	*/
	
	public function getBrowser()
	{
		return $this->browser;
	}
	
	/**
	 * Getter for OS property
	*/ 

	public function getOs()
	{
		return $this->os;
	}

	/**
	 * Getter for DEVICE property
	*/ 

	public function getDevice()
	{
		return $this->device;
	}
	
	/**
	 * Getter for USER AGENT property
	 */ 
	
	public function getUa()
	{
		return $this->ua;
	}
	
	/**
	 * Detect information about BROWSER
	*/ 
	
	private function detectBroswer()
	{	
		$pattern = $this->xml['browser']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				if(isset($this->xml['browser']['version_pattern'][$key]))
				{
					$this->setBrowser($key,$this->xml['browser']['type'][$key],$this->xml['browser']['version_pattern'][$key]);
				}
				else
				{
					$this->setBrowser($key,$this->xml['browser']['type'][$key]);
				}
				break;
			}
		}
	}
	
	/**
	 * Setter for BROWSER property
	*/ 
	
	private function setBrowser($name,$type,$phrase='same')
	{
		$this->browser['type'] = $type;
		$this->browser['name'] = $name;
		if($phrase == 'same')
		{
			$this->detectBrowserVersion($name);
		}
		else
		{
			$this->detectBrowserVersion($phrase);
		}
		if($name == 'Opera Mini')
		{
			$this->ua = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
		}
	}
	
	/**
	 * Detect BROWSER version
	*/ 
	 
	private function detectBrowserVersion($phrase)
	{
		$version = "/".$phrase."(\/| )[\w-._]{1,15}/";
		if(preg_match($version,$this->ua))
		{
			preg_match($version,$this->ua,$v);
			@$version = $v[0];
			$version = preg_replace('/'.$phrase.'/','',$version);
			$version = str_replace(';','',$version);
			$version = str_replace(' ','',$version);
			$version = str_replace('/','',$version);
			$version = str_replace('_','.',$version);
			$this->browser['version'] = $version;
		}
	}
	
	/**
	 * Detect information about DEVICE
	*/ 
	
	private function detectDevice()
	{
		$pattern = $this->xml['device']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				$this->setDevice($key,$this->xml['device']['type'][$key]);
				break;
			}
		}
	}
	
	/**
	 * Setter of DEVICE property
	*/ 
	
	private function setDevice($name,$type)
	{
		$this->device['name'] = $name;
		$this->device['type'] = $type;
	}
	
	/*
	 * Detect information about OS
	*/ 
	private function detectOs()
	{		
		$pattern = $this->xml['os']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				if(isset($this->xml['os']['version_pattern'][$key]))
				{
					$this->setOs($key,$this->xml['os']['family'][$key],$this->xml['os']['version_pattern'][$key]);
				}
				else
				{
					$this->setOs($key,$this->xml['os']['family'][$key]);
				}
				break;
			}
		}
	}
	
	/*
	 * Setter for OS property
	*/ 
	
	private function setOs($name,$family,$phrase='same')
	{
		$this->os['name'] = $name;
		$this->os['family'] = $family;
		$this->os['type'] = $this->xml['os']['type'][$name];
		if($phrase != 'same')
		{
			$this->detectOsVersion($phrase);
		}
	}
	
	/**
	 * Detect OS version
	*/ 
	
	private function detectOsVersion($phrase)
	{
		if($this->os['family']!='win')
		{
			$version = "/".$phrase."(\/| )?[\w-._]{1,15}/";
			$reverse = "/[\w-._]{1,15}(\/| )?".$phrase."/";
			if(preg_match($version,$this->ua))
			{
				preg_match($version,$this->ua,$v);
				@$version = $v[0];
				$phrase = '/'.$phrase.'/';
				$version = preg_replace($phrase,'',$version);
				$version = str_replace(';','',$version);
				$version = str_replace(' ','',$version);
				$version = str_replace('/','',$version);
				$version = str_replace('_','.',$version);
				$this->os['version'] = $version;
			}
			else
			if(preg_match($reverse,$this->ua))
			{
				preg_match($reverse,$this->ua,$v);
				@$version = $v[0];
				$phrase = '/'.$phrase.'/';
				$version = preg_replace($phrase,'',$version);
				$version = str_replace(';','',$version);
				$version = str_replace(' ','',$version);
				$version = str_replace('/','',$version);
				$version = str_replace('_','.',$version);
				$this->os['version'] = $version;
			}
		}
		else
		{
			$pattern['95'] = '/(Win95)/';
			$pattern['98'] = '/(Win98)/';
			$pattern['ME'] = '/(Win 9[0-9]{1} 4.90|WinNT|Windows ME)/';
			$pattern['2000'] = '/(Windows NT 5.0|Windows 2000|Windows NT 5.01)/';
			$pattern['XP'] = '/Windows NT 5.1/';
			$pattern['Server 2003'] = '/Windows NT 5.2/';
			$pattern['Vista'] = '/Windows NT 6.0/';
			$pattern['7'] = '/Windows NT 6.1/';
			$pattern['8'] = '/Windows NT 6.2/';
			$pattern['CE'] = '/Windows CE/';
			$pattern['Phone'] = '/(Windows Phone OS|WP|Windows Phone|Windows\+Phone|Windows\+Phone\+OS)/';
			$pattern['Mobile'] = '/Windows Mobile/';
			
			foreach($pattern as $key=>$value)
			{
				if(preg_match($value,$this->ua))
				{
					$this->os['version'] = $key;
					break;
				}
			}
			if($this->os['version'] == 'Phone')
			{
				$this->detectWindowsPhoneVersion();
			}
		}
		$this->fixOsVersion();
	}
	
	/**
	 * Detection of Windows Phone Version;
	 */
	private function detectWindowsPhoneVersion()
	{
		$pattern = '/(Windows Phone OS|Windows Phone|Windows\+Phone|Windows\+Phone\+OS) [\w-._\+]{1,15}/';
		if(preg_match($pattern, $this->ua))
		{
			preg_match($pattern, $this->ua,$v);
			$v = $v[0];
			$v = str_replace('+', ' ', $v);
			$v = str_replace('Windows Phone OS', '', $v);
			$v = str_replace('Windows Phone', '', $v);
			$v = str_replace('Windows Phone', '', $v);
			$v = str_replace(' ', '', $v);
			$v = str_replace('\\', '', $v);
			$v = str_replace('|', '', $v);
			$this->os['name'] .= ' '.$this->os['version'];
			$this->os['version'] = ' '.$v;
		}
		$this->os['type'] == 'mobile';
	}
	
	/**
	 * Fix problems with detection of OS version
	 */
	private function fixOsVersion()
	{
		if(isset($this->os['version']))
		{
			$replace = array('based.','Fir','fc','update');
			foreach($replace as $key)
			{
				$this->os['version'] = str_replace($key,'',$this->os['version']);
			}
		}
	}
	
	/**
	 * Fix some problems
	*/
	private function fix()
	{
		/* Fix Chrome Mobile Detection */
		if($this->browser['name'] == 'Google Chrome' && $this->os['name'] == 'Android' || $this->browser['name'] == 'Google Chrome' && $this->os['name'] == 'iOS' || $this->browser['name'] == 'Google Chrome' && $this->device['type'] == 'mobile' || $this->browser['name'] == 'Google Chrome' && $this->device['type'] == 'tablet')
		{
			$this->browser['name'] = 'Chrome Mobile';
			$this->browser['type'] = 'mobile';
		}
		
		/* Fix Mobile Safari detection */
		if($this->device['type'] == 'mobile' && $this->browser['name'] == 'Safari' || $this->device['type'] == 'tablet' && $this->browser['name'] == 'Safari')
		{
			$this->browser['type'] = 'mobile';
		} 
		
		/* Fix Mobile Firefox detection */
		if($this->browser['name'] == 'Firefox' && $this->device['type'] == 'mobile' || $this->browser['name'] == 'Firefox' && $this->os['name'] == 'Android')
		{
			$this->browser['type'] = 'mobile';
		}
		
		/* Fix Chrome mobile detection */
		if($this->browser['name'] == 'Google Chrome' && $this->os['name'] == 'Android' || $this->browser['name'] == 'Google Chrome' && $this->os['name'] == 'iOS')
		{
			$this->browser['type'] = 'mobile';
		}
		
		/* Fix Android browser detection */
		if($this->os['name'] == 'Android' && $this->browser['name'] == 'Safari')
		{
			$this->browser['name'] = 'Android Browser';
		}
		
		/* Fix PC detection */
		if($this->os['family'] == 'win' || $this->os['name'] == 'Mac OS X' || $this->browser['type'] == 'desktop')
		{
			if($this->device['type'] == 'none')
			{
				$this->setDevice('PC','pc');
			}
		}
		
		/* Fix Windows Phone os['type'] bug */
		if($this->os['family'] == 'win' && $this->device['type'] == 'mobile')
		{
			$this->os['type'] = 'mobile';
		}
		
		/* Fix Google phone detection */
		if($this->device['name'] == 'Google' && $this->os['name'] == 'Android')
		{
			$this->device['name'] = 'Android';
		}
		
		/* Fix Android mobile phones detection */
		if($this->os['name'] == 'Android' && preg_match('/Mobile/',$this->ua))
		{
			if($this->device['name'] == 'none')
			{
				$this->device['name'] = 'Android';
			}
			$this->device['type'] = 'mobile';
		}
		/* Fix Android tablets detection */
		if($this->os['name'] == 'Android' && !preg_match('/Mobile/',$this->ua))
		{
			if($this->device['name'] == 'none')
			{
				$this->device['name'] = 'Android';
			}
			$this->device['type'] = 'tablet';
		}
		
		/* Fix Mobile phones detection */
		
		if($this->browser['name'] == 'Opera Mini' || $this->browser['name'] == 'Opera Mobile')
		{
			if($this->device['type'] == 'none')
			{
				$this->setDevice('Mobile phone','mobile');
			}
		}
	}
	
	public function printAll()
	{
		echo $this->getUa()."\n";
		foreach ($this->getAll() as $key=>$value)
		{
			echo $key."\n";
			foreach ($value as $key2=>$val)
			{
				echo "\t".$key2.': '.$val."\n";
			}
		}
		echo "\n";
	}
	
	public function getAll()
	{
		return Array('browser'=>$this->browser,'os'=>$this->os,'device'=>$this->device);
	}
}
?>
