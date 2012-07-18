<?php
/*
 * @version 1.0.7
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com>
 * @license: GPL
 */
 
class DetectBrowser
{
	private $os = Array('name'=>'none','version'=>'none','family'=>'none');
	private $device = Array('name'=>'none','type'=>'none'); 
	private $browser = Array('name'=>'none','version'=>'none','type'=>'none');
	private $ua; // user agent
	
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
		$this->detect_broswer();
		$this->detect_device();
		$this->detect_os();
	}
	
	/*
	 * getter for BROWSER property
	*/
	
	public function get_browser()
	{
		return $this->browser;
	}
	
	/*
	 * getter for OS property
	*/ 

	public function get_os()
	{
		return $this->os;
	}

	/*
	 * getter for DEVICE property
	*/ 

	public function get_device()
	{
		return $this->device;
	}
	
	/*
	 * getter for USER AGENT property
	 */ 
	
	public function get_ua()
	{
		return $this->ua;
	}
	
	/*
	 * detection of BROWSER property
	*/ 
	
	private function detect_broswer()
	{
		/*
		 * Arrays:
		 * pattern - Regular Expression pattern
		 * type - type of browser (desctop or mobile)
		 * phrese - part of Regular Expression to detect browser Version like (%phrase %version)
		*/
		 
		$pattern['Firefox'] = '/Firefox/';
		$type['Firefox'] = 'desctop';
		
		$pattern['Chromium'] = '/Chromium/';
		$type['Chromium'] = 'desctop';
		
		$pattern['Google Chrome'] = '/Chrome/';
		$type['Google Chrome'] = 'desctop';
		$phrase['Google Chrome'] = 'Chrome';
		
		$pattern['Opera Mini'] = '/Opera Mini/';
		$type['Opera Mini'] = 'mobile';
		
		$pattern['Opera Mobile'] = '/Opera Mobi/';
		$type['Opera Mobile'] = 'mobile';
		$phrase['Opera Mobile'] = 'Opera Mobi';
		
		$pattern['Opera'] = '/Opera/';
		$type['Opera'] = 'desctop';
		$phrase['Opera'] = 'Version';
		
		$pattern['Internet Explorer Mobile'] = '/IEMobile/';
		$type['Internet Explorer Mobile'] = 'mobile';
		$phrase['Internet Explorer Mobile'] = 'IEMobile';
		
		$pattern['Internet Explorer'] = '/MSIE/';
		$type['Internet Explorer'] = 'desctop';
		$phrase['Internet Explorer'] = 'MSIE';
		
		
		foreach($pattern as $key=>$value)
		{
			if(preg_match($value,$this->ua))
			{
				if(isset($phrase[$key]))
				{
					$this->set_browser($key,$type[$key],$phrase[$key]);
				}
				else
				{
					$this->set_browser($key,$type[$key]);
				}
				break;
			}
		}
	}
	
	/*
	 * setter for BROWSER property
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
	
	/*
	 * detection of browser version
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
	
	/*
	 * detection of DEVICE property
	*/ 
	
	private function detect_device()
	{
		/*
		 * Arrays:
		 * pattern - Regular Expression pattern
		 * type - type of device ( pc | mobile | tablet | reader | player | playstation )
		*/
		
		$pattern['iPhone'] = '/iPhone/';
		$type['iPhone'] = 'mobile';
		
		$pattern['iPod'] = '/(iPod|itouch)/';
		$type['iPod'] = 'player';
		
		$pattern['iPad'] = '/iPad/';
		$type['iPad'] = 'tablet';
		
		$pattern['Amazon Kindle Fire'] = '/Kindle Fire/';
		$type['Amazon Kindle Fire'] = 'tablet';
		
		$pattern['Amazon Kindle'] = '/(Kindle\/|Silk)/';
		$type['Amazon Kindle'] = 'reader';
		
		$pattern['Motorola'] = '/(MOT|Motorola|MOT-|MOTOZINE|XT|Mot)/';
		$type['Motorola'] = 'mobile';
		
		$pattern['Sony Ericsson'] = '/SonyEricsson/';
		$type['Sony Ericsson'] = 'mobile';
		
		$pattern['Nokia'] = '/(Nokia|N900|nokia|NOKIA|Series 60|Series 40|S60|S40)/';
		$type['Nokia'] = 'mobile';
		
		$pattern['Siemens'] = '/SIE-/';
		$type['Siemens'] = 'mobile';
		
		$pattern['HTC'] = '/(HTC|Desire|001HT|C720|c720|Espresso|S700)/';
		$type['HTC'] = 'mobile';
		
		$pattern['BenQ'] = '/(benq|BenQ|BENQ)/';
		$type['BenQ'] = 'mobile';
		
		$pattern['Sony Playstation'] = '/PLAYSTATION/';
		$type['Sony Playstation'] = 'playstation';
		
		$pattern['PSP'] = '/PSP/';
		$type['PSP'] = 'playstation';
		
		$pattern['XBOX'] = '/(XBOX|Xbox|xbox)/';
		$type['XBOX'] = 'playstation';
		
		$pattern['Google'] = '/(Nexus|Google)/';
		$type['Google'] = 'mobile';
		
		$pattern['Philips'] = '/(PHILIPS|Philips|philips)/';
		$type['Philips'] = 'mobile';
		
		$pattern['LG'] = '/LG/';
		$type['LG'] = 'mobile';
		
		$pattern['Black Berry Tablet'] = '/RIM Tablet/';
		$type['Black Berry Tablet'] = 'tablet';
		
		$pattern['Black Berry'] = '/(BlackBerry)/';
		$type['Black Berry'] = 'mobile';
		
		$pattern['SonyEricsson'] = '/SonyEricsson/';
		$type['SonyEricsson'] = 'mobile';
		
		$pattern['Samsung'] = '/(SAMSUNG|Samsung|samsung|sam-r|GT-|SHW-|SCH-|SGH)/';
		$type['Samsung'] = 'mobile';
		
		$pattern['Samsung Galaxy Tab'] = '/(GT-P1000|SCH-I800|GT-P5100|GT-P7511|GT-P6810|SHW-M380S|SGH-T859|SGH-T869|SCH-I905|GT-P6210|GT-P6800|GT-P7300|GT-P7510|GT-P7500|GT-P3100)/';
		$type['Samsung Galaxy Tab'] = 'tablet';
		
		$pattern['Samsung Galaxy Note'] = '/GT-N7000/';
		$type['Samsung Galaxy Note'] = 'mobile';
		
		$pattern['Android Phone'] = '/(; |\()Android/';
		$type['Android Phone'] = 'mobile';
		
		foreach($pattern as $key=>$value)
		{
			if(preg_match($value,$this->ua))
			{
				$this->set_device($key,$type[$key]);
				break;
			}
		}
	}
	
	/*
	 * setter of DEVICE property
	*/ 
	
	private function set_device($name,$type)
	{
		$this->device['name'] = $name;
		$this->device['type'] = $type;
	}
	
	/*
	 * detection of OS propery
	*/ 
	private function detect_os()
	{
		/*
		 * Arrays:
		 * pattern - Regular Expression pattern
		 * family - family of OS ( unix | mac | win )
		 * phrese - part of Regular Expression to detect OS  Version like (%phrase %version or %version %phrase)
		*/
		
		$pattern['Android'] = '/(; |\()Android/';
		$family['Android'] = 'unix';
		
		$pattern['iOS'] = '/like Mac OS X/';
		$family['iOS'] = 'mac';
		$phrase['iOS'] = 'like Mac OS X';
		
		$pattern['Ubuntu'] = '/Ubuntu/';
		$family['Ubuntu'] = 'unix';
		
		$pattern['Bada'] = '/Bada/';
		$family['Bada'] = 'unix';
		
		$pattern['Maemo'] = '/Maemo/';
		$family['Maemo'] = 'unix';
		
		$pattern['Chromium OS'] = '/CrOS/';
		$family['Chromium OS'] = 'unix';
	
		$pattern['Free BSD'] = '/FreeBSD/';
		$family['Fre BSD'] = 'unix';
		
		$pattern['Arch Linux'] = '/Arch Linux/';
		$family['Arch Linux'] = 'unix';
		
		$pattern['Cent OS'] = '/CentOS/';
		$family['Cent OS'] = 'unix';
		
		$pattern['debian'] = '/Debian/';
		$family['Debian'] = 'unix';
		
		$pattern['Fedora'] = '/Fedora/';
		$family['Fedora'] = 'unix';
		
		$pattern['Gentoo'] = '/Gentoo/';
		$family['Gentoo'] = 'unix';
		
		$pattern['Kanotix'] = '/(kanotix|Kanotix)/';
		$family['Kanotix'] = 'unix';
		
		$pattern['Mandriva'] = '/Mandriva/';
		$family['Mandriva'] = 'unix';
		
		$pattern['Mint'] = '/Mint/';
		$family['Mint'] = 'unix';
		
		$pattern['Red Hat'] = '/Red Hat/';
		$family['Red Hat'] = 'unix';
		
		$pattern['Slackware'] = '/Slackware/';
		$family['Slackware'] = 'unix';
		
		$pattern['SUSE'] = '/SUSE/';
		$family['SUSE'] = 'unix';
		
		$pattern['Mac OS X'] = '/Mac OS X/';
		$family['Mac OS X'] = 'mac';
		
		$pattern['Morph OS'] = '/MorphOS/';
		$family['Morph OS'] = 'unix';
		
		$pattern['Minix'] = '/Minix/';
		$family['Minix'] = 'unix';
		
		$pattern['Net BSD'] = '/NetBSD/';
		$family['Net BSD'] = 'unix';
		
		$pattern['AROS'] = '/AROS/';
		$family['AROS'] = 'unix';
		
		$pattern['Amiga'] = '/Amiga/';
		$family['Amiga'] = 'unix';
		
		$pattern['Be OS'] = '/BeOS/';
		$family['Be OS'] = 'unix';
		
		$pattern['Dragonfly BSD'] = '/DragonFly/';
		$family['DragonFly BSD'] = 'unix';
		
		$pattern['HP UX'] = '/HP-UX/';
		$family['HP UX'] = 'unix';
		
		$pattern['IRIX'] = '/IRIX/';
		$family['IRIX'] = 'unix';
		
		$pattern['Joli OS'] = '/Jolicloud/';
		$family['Joli OS'] = 'unix';
		
		$pattern['Nintendo Wii'] = '/Nintendo Wii/';
		$family['Nintendo Wii'] = 'unix';
		
		$pattern['Open BSD'] = '/OpenBSD/';
		$family['Open BSD'] = 'unix';
		
		$pattern['Palm OS'] = '/Palm OS/';
		$family['Palm OS'] = 'unix';
		
		$pattern['PC Linux OS'] = '/PCLinuxOS/';
		$family['PC Linux OS'] = 'unix';
		
		$pattern['RIM OS'] = '/BlackBerry/';
		$family['RIM OS'] = 'unix';
		
		$pattern['RIM Tablet OS'] = '/RIM Tablet OS/';
		$family['RIM Tablet OS'] = 'unix';
		
		$pattern['Solaris'] = '/SunOS/';
		$family['Solaris'] = 'unix';
		
		$pattern['Syllable'] = '/Syllable/';
		$family['Syllable'] = 'unix';
		
		$pattern['Tizen'] = '/Tizen/';
		$family['Tizen'] = 'unix';
		
		$pattern['Web OS'] = '/(webOS|hpwOS)/';
		$family['Web OS'] = 'unix';

		$pattern['Symbian'] = '/(SymbOS|Symbian)/';
		$family['Symbian'] = 'unix';
		$phrase['Symbian'] = '(SymbOS|SymbianOS|Symbian)';

						
		$pattern['Linux'] = '/(Linux|X11)/';
		$family['Linux'] = 'unix';

		$pattern['Windows'] = '/(Windows|Win|WP)/';
		$family['Windows'] = 'win';
		
		foreach($pattern as $key=>$value)
		{
			if(preg_match($value,$this->ua))
			{
				if(isset($phrase[$key]))
				{
					$this->set_os($key,$family[$key],$phrase[$key]);
				}
				else
				{
					$this->set_os($key,$family[$key]);
				}
				break;
			}
		}
	}
	
	/*
	 * setter for OS property
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
	
	/*
	 * detection version of OS
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
	}
}
?>
