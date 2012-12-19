<?php
/**
 * @version 1.1
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com>
 * @copyright Copyright (c) Sergey Nehaenko 2012
 * @package ru.endorphinua.lib
 * @license: GPL
 */
define("ROOT",$_SERVER['DOCUMENT_ROOT']); // ROOT directory

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
	
	/*
	 * Оbject initialization
	 * @param string $ua User Agent string
	 */
	public function __construct($ua = 'none')
	{
		if($ua == 'none')
		{
			$this->ua = $_SERVER['HTTP_USER_AGENT'];
		}
		else
		{
			$this->ua = $ua;
		}
		$this->load_xml();
		$this->detect_broswer();
		$this->detect_device();
		$this->detect_os();
		$this->fix();
	}
	
	/**
	 * Load the contents of xml files into an array
	 */
	private function load_xml()
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
	
	public function get_browser()
	{
		return $this->browser;
	}
	
	/**
	 * Getter for OS property
	*/ 

	public function get_os()
	{
		return $this->os;
	}

	/**
	 * Getter for DEVICE property
	*/ 

	public function get_device()
	{
		return $this->device;
	}
	
	/**
	 * Getter for USER AGENT property
	 */ 
	
	public function get_ua()
	{
		return $this->ua;
	}
	
	/**
	 * Detect information about BROWSER
	*/ 
	
	private function detect_broswer()
	{	
		$pattern = $this->xml['browser']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				if(isset($this->xml['browser']['version_pattern'][$key]))
				{
					$this->set_browser($key,$this->xml['browser']['type'][$key],$this->xml['browser']['version_pattern'][$key]);
				}
				else
				{
					$this->set_browser($key,$this->xml['browser']['type'][$key]);
				}
				break;
			}
		}
	}
	
	/**
	 * Setter for BROWSER property
	*/ 
	
	private function set_browser($name,$type,$phrase='same')
	{
		$this->browser['type'] = $type;
		$this->browser['name'] = $name;
		if($phrase == 'same')
		{
			$this->detect_browser_version($name);
		}
		else
		{
			$this->detect_browser_version($phrase);
		}
		if($name == 'Opera Mini')
		{
			$this->ua = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
		}
	}
	
	/**
	 * Detect BROWSER version
	*/ 
	 
	private function detect_browser_version($phrase)
	{
		$version = "/".$phrase."(\/| )[\w-._]{1,15}/";
		if(preg_match($version,$this->ua))
		{
			preg_match($version,$this->ua,$v);
			@$version = $v[0];
			$version = str_replace($phrase,'',$version);
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
	
	private function detect_device()
	{
		$pattern = $this->xml['device']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				$this->set_device($key,$this->xml['device']['type'][$key]);
				break;
			}
		}
	}
	
	/**
	 * Setter of DEVICE property
	*/ 
	
	private function set_device($name,$type)
	{
		$this->device['name'] = $name;
		$this->device['type'] = $type;
	}
	
	/*
	 * Detect information about OS
	*/ 
	private function detect_os()
	{		
		$pattern = $this->xml['os']['pattern'];
		
		foreach($pattern as $key=>$value)
		{
			$value = '/'.$value.'/';
			if(preg_match($value,$this->ua))
			{
				if(isset($this->xml['os']['version_pattern'][$key]))
				{
					$this->set_os($key,$this->xml['os']['family'][$key],$this->xml['os']['version_pattern'][$key]);
				}
				else
				{
					$this->set_os($key,$this->xml['os']['family'][$key]);
				}
				break;
			}
		}
	}
	
	/*
	 * Setter for OS property
	*/ 
	
	private function set_os($name,$family,$phrase='same')
	{
		$this->os['name'] = $name;
		$this->os['family'] = $family;
		if($phrase == 'same')
		{
			$this->detect_os_version($name);
		}
		else
		{
			$this->detect_os_version($phrase);
		}
	}
	
	/**
	 * Detect OS version
	*/ 
	
	private function detect_os_version($phrase)
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
			$pattern['Phone'] = '/(Windows Phone OS|WP)/';
			$pattern['Mobile'] = '/Windows Mobile/';
			
			foreach($pattern as $key=>$value)
			{
				if(preg_match($value,$this->ua))
				{
					$this->os['version'] = $key;
					break;
				}
			}
		}
		$this->fix_os_version();
	}
	
	/**
	 * Fix problems with detection of OS version
	 */
	private function fix_os_version()
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
		/* Fix Mobile Safari detection */
		if($this->device['type'] == 'mobile' && $this->browser['name'] == 'Safari' || $this->device['type'] == 'tablet' && $this->browser['name'] == 'Safari')
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
				$this->set_device('PC','pc');
			}
		}
		
		/* Fix Mobile phones detection */
		
		if($this->browser['name'] == 'Opera Mini' || $this->browser['name'] == 'Opera Mobile')
		{
			if($this->device['type'] == 'none')
			{
				$this->set_device('Mobile phone','mobile');
			}
		}
	}
}
?>
