<?php
/*
 * @version 1.0.5
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com>
 */
class DetectBrowser
{
	private $os = Array('name'=>'not-detected','version'=>'0.0'); /* os property of class, @default = 'not-detected' */
	private $device = 'not-detected'; /* device property of class, @default = 'not-detected' */
	private $browser = Array('name'=>'not-detected','version'=>'0.0'); /* browser property of class, @default = 'not-detected' */
	private $ua; /* USER AGENT of browser */
	public function __construct()
	{
		$this->ua = $_SERVER['HTTP_USER_AGENT'];
		//$this->ua = 'Mozilla/4.0 (PSP (PlayStation Portable); 2.00)';
		//echo $this->ua.'\n<br/>';
		$this->detect_broswer();
		$this->detect_device();
		$this->detect_os();
		echo print_r($this->browser);
		echo '<br/>'.$this->device;
		echo '<br/>'.$this->os['name'].' '.$this->os['version'];
		$path = $_SERVER['DOCUMENT_ROOT'].'/browser/lib/log.txt';
		$file = fopen($path,'a+');
		fwrite($file,"{\n".$this->ua."\n".$this->device."\n}\n");
		fclose($file);
	}
	
	private function detect_os()
	{
		$ios = '/like Mac OS X/';
		$ubuntu = '/Ubuntu/';
		$linux = '/(X11|Linux)/';
		$windows = '/(Win|Windows|WP)/';
		$symbian = '/(SymbianOS|SymbOS)/';
		$android = '/;( )?Android/';
		$maemo = '/Maemo/';
		$bada = '/Bada/';
		$chromium_os = '/CrOS/';
		$free_bsd = '/FreeBSD/';
		$arch_linux = '/Arch Linux/';
		$cent_os = '/CentOS/';
		$debian = '/Debian/';
		$fedora = '/Fedora/';
		$gentoo = '/Gentoo/';
		$kanotix = '/(kanotix|Kanotix)/';
		$mandriva = '/Mandriva/';
		$mint = '/Mint/';
		$red_hat = '/Red Hat/';
		$slackware = '/Slackware/';
		$suse = '/SUSE/';
		$mac_os_x = '/Mac OS X/';
		$morph_os = '/MorphOS/';
		$minix = '/Minix/';
		$net_bsd = '/NetBSD/';
		$aros = '/AROS/';
		$amiga = '/Amiga/';
		$beos = '/BeOS/';
		$dragonfly_bsd = '/DragonFly/';
		$hp_ux = '/HP-UX/';
		$irix = '/IRIX/';
		$joli_os = '/Jolicloud/';
		$nintendo_wii = '/Nintendo Wii/';
		$open_bsd = '/OpenBSD/';
		$palm_os = '/Palm OS/';
		$pc_linux_os = '/PCLinuxOS/';
		$rim_os = '/BlackBerry/';
		$rim_tablet_os = '/RIM Tablet OS/';
		$solaris = '/SunOS/';
		$syllable = '/Syllable/';
		$tizen = '/Tizen/';
		$web_os = '/(webOS|hpwOS)/';
				
		if(preg_match($ios,$this->ua))
		{
			/* if os is iOS */
			$this->ios();
		}
		else
		if(preg_match($ubuntu,$this->ua))
		{
			/* if os is Ubuntu */
			$this->ubuntu();
		}
		else
		if(preg_match($tizen,$this->ua))
		{
			/* if os is Tizen */
			$this->tizen();
		}
		else
		if(preg_match($android,$this->ua))
		{
			/* if os is Android */
			$this->android();
		}
		else
		if(preg_match($web_os,$this->ua))
		{
			/* if os is webOS */
			$this->web_os();
		}
		else
		if(preg_match($maemo,$this->ua))
		{
			/* if os is Maemo */
			$this->maemo();
		}
		else
		if(preg_match($bada,$this->ua))
		{
			/* if os is Bada */
			$this->bada();
		}
		else
		if(preg_match($chromium_os,$this->ua))
		{
			/* if os is Chromium OS */
			$this->chromium_os();
		}
		else
		if(preg_match($free_bsd,$this->ua))
		{
			/* if os is FreeBSD */
			$this->free_bsd();
		}
		else
		if(preg_match($arch_linux,$this->ua))
		{
			/* if os is Arch Linux */
			$this->arch_linux();
		}
		else
		if(preg_match($cent_os,$this->ua))
		{
			/* if os is Cent OS */
			$this->cent_os();
		}
		else
		if(preg_match($debian,$this->ua))
		{
			/* if os is Debian */
			$this->debian();
		}
		else
		if(preg_match($fedora,$this->ua))
		{
			/* if os is Fedora */
			$this->fedora();
		}
		else
		if(preg_match($gentoo,$this->ua))
		{
			/* if os is Gentoo */
			$this->gentoo();
		}
		else
		if(preg_match($kanotix,$this->ua))
		{
			/* if os is Kanotix */
			$this->kanotix();
		}
		else
		if(preg_match($mandriva,$this->ua))
		{
			/* if os is Mandriva */
			$this->mandriva();
		}
		else
		if(preg_match($syllable,$this->ua))
		{
			/* if os is Syllable */
			$this->syllable();
		}
		else
		if(preg_match($mint,$this->ua))
		{
			/* if os is Mint */
			$this->mint();
		}
		else
		if(preg_match($red_hat,$this->ua))
		{
			/* if os is Red Hat */
			$this->red_hat();
		}
		else
		if(preg_match($slackware,$this->ua))
		{
			/* if os is Shlackware */
			$this->slackware();
		}
		else
		if(preg_match($suse,$this->ua))
		{
			/* if os is SUSE */
			$this->suse();
		}
		else
		if(preg_match($irix,$this->ua))
		{
			/* if os is IRIX */
			$this->irix();
		}
		else
		if(preg_match($mac_os_x,$this->ua))
		{
			/* if os is Mac OS X */
			$this->mac_os_x();
		}
		else
		if(preg_match($net_bsd,$this->ua))
		{
			/* if os is NetBSD */
			$this->net_bsd();
		}
		else
		if(preg_match($open_bsd,$this->ua))
		{
			/* if os is Open BSD */
			$this->open_bsd();
		}
		else
		if(preg_match($solaris,$this->ua))
		{
			/* if os is Solaris */
			$this->solaris();
		}
		else
		if(preg_match($hp_ux,$this->ua))
		{
			/* if os is HP-UX */
			$this->hp_ux();
		}
		else
		if(preg_match($pc_linux_os,$this->ua))
		{
			/* if os is PCLinuxOS */
			$this->pc_linux_os();
		}
		else
		if(preg_match($dragonfly_bsd,$this->ua))
		{
			/* if os is DragonFly BSD */
			$this->dragonfly_bsd();
		}
		else
		if(preg_match($joli_os,$this->ua))
		{
			/* if os is Joli OS */
			$this->joli_os();
		}
		else
		if(preg_match($linux,$this->ua))
		{
			/* if os is Linux */
			$this->linux();
		}
		else
		if(preg_match($morph_os,$this->ua))
		{
			/* if os is MorphOS */
			$this->morph_os();
		}
		else
		if(preg_match($minix,$this->ua))
		{
			/* if os is Minix 3 */
			$this->minix();
		}
		else
		if(preg_match($rim_os,$this->ua))
		{
			/* if os is RIM OS */
			$this->rim_os();
		}
		else
		if(preg_match($rim_tablet_os,$this->ua))
		{
			/* if os is RIM Tablet OS */
			$this->rim_tablet_os();
		}
		else
		if(preg_match($windows,$this->ua))
		{
			/* if os is MS Windows */
			$this->windows();
		}
		else
		if(preg_match($symbian,$this->ua))
		{
			/* if os is Symbian */
			$this->symbian();
		}
		else
		if(preg_match($aros,$this->ua))
		{
			/* if os is AROS */
			$this->aros();
		}
		else
		if(preg_match($amiga,$this->ua))
		{
			/* if os is Amiga */
			$this->amiga();
		}
		else
		if(preg_match($beos,$this->ua))
		{
			/* if os is BeOS */
			$this->beos();
		}
		else
		if(preg_match($nintendo_wii,$this->ua))
		{
			/* if os is Nintendo Wii */
			$this->nintendo_wii();
		}
		else
		if(preg_match($palm_os,$this->ua))
		{
			/* if os is Palm OS */
			$this->palm_os();
		}
		
	}
	
	private function detect_device()
	{
		$iphone = '/iPhone/'; /* Apple iPhone */
		$ipad = '/iPad/'; /* Apple iPad */
		$kindle = '/(Kindle|Silk)/'; /* Amazon Kindle */
		$black_berry = '/(BlackBerry|RIM)/'; /* Black Berry */
		$nokia = '/(Nokia|N900|nokia|NOKIA|Series 60|Series 40|S60|S40)/'; /* Nokia */
		$htc = '/(HTC|Desire|001HT|C720|c720|Espresso|S700)/'; /* HTC */
		$siemens = '/SIE-/'; /* Siemens Moblie */
		$philips = '/(PHILIPS|Philips|philips)/'; /* PHILIPS */
		$motorola = '/(Motorola|MOT|MOTOZINE|XT|Mot)/'; /* Motorolla */
		$benq = '/(benq|BenQ|BENQ)/'; /* BenQ */
		$playstation = '/PLAYSTATION/';
		$psp = '/PSP/';

		
		if(preg_match($iphone,$this->ua))
		{
			/* if device is iPhone */
			$this->iphone();
		}
		else
		if(preg_match($ipad,$this->ua))
		{
			/* if device is iPad */
			$this->ipad();
		}
		else
		if(preg_match($kindle,$this->ua))
		{
			/* if device is Kindle */
			$this->kindle();
		}
		else
		if(preg_match($black_berry,$this->ua))
		{
			/* if device is Black Berry */
			$this->black_berry();
		}
		else
		if(preg_match($nokia,$this->ua))
		{
			/* if device is Nokia */
			$this->nokia();
		}
		else
		if(preg_match($htc,$this->ua))
		{
			/* if device is HTC */
			$this->htc();
		}
		else
		if(preg_match($siemens,$this->ua))
		{
			/* if device is Siemens */
			$this->siemens();
		}
		else
		if(preg_match($philips,$this->ua))
		{
			/* if device is Siemens */
			$this->philips();
		}
		else
		if(preg_match($motorola,$this->ua))
		{
			/* if device is Motorola */
			$this->motorola();
		}
		else
		if(preg_match($benq,$this->ua))
		{
			/* if device is BenQ */
			$this->benq();
		}
		else
		if(preg_match($playstation,$this->ua))
		{
			/* if device is Playstation */
			$this->playstation();
		}
		else
		if(preg_match($psp,$this->ua))
		{
			/* if device is PSP */
			$this->psp();
		}
		else 
			$this->device = 'PC';
		if($this->device != 'PC')
		{$this->detect_mobile_broswer();}
	}
	
	private function detect_mobile_broswer()
	{
		$safari = '/(Mobile|Safari)/'; /* Safari Mobile */
		$opera_mini = '/Opera Mini/'; /* Opera Mini */
		$skyfire = '/Skyfire/'; /* Skyfire */
		$ie = '/IEMobile/'; /* IEMobile */
		if(preg_match($skyfire,$this->ua))
		{
			/* if browser is Google Chrome */
			$this->skyfire();
		}
		else
		if(preg_match($safari,$this->ua))
		{
			/* if browser is Mobile Safari */
			$this->safari_mobile();
		}
		if(preg_match($opera_mini,$this->ua))
		{
			/* if browser is Opera Mini */
			$this->opera_mini();
		}
		else
		if(preg_match($ie,$this->ua))
		{
			/* if browser is Opera Mini */
			$this->iemobile();
		}
		
	}
	
	private function detect_broswer()
	{
		/* patterns */
		$firefox = '/Firefox/'; /* Mozilla Firefox */
		$opera = '/Opera/'; /* Opera */
		$chromium = '/Chromium/'; /* Chromium */
		$arora = '/Arora/'; /* Arora */
		$dooble = '/Dooble/'; /* Dooble */
		$midori = '/Midori/'; /* Midori */
		$rekonq = '/rekonq/'; /* Rekonq */
		$epiphany = '/Epiphany/'; /* Epiphany */
		$chrome = '/Chrome/'; /* Google Chrome */
		$abrowse = '/ABrowse/'; /* ABrowse */
		$acoo_browser = '/Acoo Browser/'; /* Acoo Browser */
		$america_online_browser = '/America Online Browser/'; /* America Online Browser */
		$amiga_voyager = '/AmigaVoyager/'; /* AmigaVoyager */
		$aol = '/AOL/'; /* AOL */
		$avant_browser = '/Avant Browser/'; /* Avant Browser */
		$beonex = '/Beonex/'; /* Beonex */
		$bon_echo = '/BonEcho/'; /* BonEcho */
		$browzar = '/Browzar/'; /* Browzar */
		$camino = '/Camino/'; /* Camino */
		$cheshire = '/Cheshire/'; /* Cheshire */
		$chimera = '/Chimera/'; /* Chimera */
		$chrome_plus = '/ChromePlus/'; /* ChromePlus */
		$classilla = '/Classilla/'; /* Classilla */
		$comet_bird = '/CometBird/'; /* CometBird */
		$comodo_dragon = '/Comodo_Dragon/'; /* Comodo_Dragon */
		$conkeror = '/Conkeror/'; /* Conkeror */
		$crazy_browser = '/Crazy Browser/'; /* Crazy Browser */
		$cyberdog = '/Cyberdog/'; /* Cyberdog */
		$deepnet_explorer = '/Deepnet Explorer/'; /* Deepnet Explorer */
		$desk_browse = '/DeskBrowse/'; /* DeskBrowse */
		$safari = '/Safari/'; /* Safari */
		
		/* patternt end */
		
		if(preg_match($firefox,$this->ua))
		{
			/* if browser is Firefox */
			$this->firefox();
		}
		else
		if(preg_match($opera,$this->ua))
		{
			/* if browser is Opera */
			$this->opera();
		}
		else
		if(preg_match($chromium,$this->ua))
		{
			/* if browser is Chromium */
			$this->chromium();
		}
		else
		if(preg_match($arora,$this->ua))
		{
			/* if browser is Arora */
			$this->arora();
		}
		else
		if(preg_match($dooble,$this->ua))
		{
			/* if browser is Dooble */
			$this->dooble();
		}
		else
		if(preg_match($midori,$this->ua))
		{
			/* if browser is Midori */
			$this->midori();
		}
		else
		if(preg_match($rekonq,$this->ua))
		{
			/* if browser is Rekonq */
			$this->rekonq();
		}
		else
		if(preg_match($epiphany,$this->ua))
		{
			/* if browser is Epiphany */
			$this->epiphany();
		}
		else
		if(preg_match($abrowse,$this->ua))
		{
			/* if browser is ABrowse */
			$this->abrowse();
		}
		else
		if(preg_match($acoo_browser,$this->ua))
		{
			/* if browser is Acoo Browser */
			$this->acoo_browser();
		}
		else
		if(preg_match($america_online_browser,$this->ua))
		{
			/* if browser is America Online Browser */
			$this->america_online_browser();
		}
		else
		if(preg_match($amiga_voyager,$this->ua))
		{
			/* if browser is Amiga Voyager */
			$this->amiga_voyager();
		}
		else
		if(preg_match($aol,$this->ua))
		{
			/* if browser is AOL */
			$this->aol();
		}
		else
		if(preg_match($avant_browser,$this->ua))
		{
			/* if browser is Avant Browser */
			$this->avant_browser();
		}
		else
		if(preg_match($beonex,$this->ua))
		{
			/* if browser is Beonex */
			$this->beonex();
		}
		else
		if(preg_match($bon_echo,$this->ua))
		{
			/* if browser is Bon Echo */
			$this->bon_echo();
		}
		else
		if(preg_match($browzar,$this->ua))
		{
			/* if browser is Browzar */
			$this->browzar();
		}
		else
		if(preg_match($camino,$this->ua))
		{
			/* if browser is Camino */
			$this->camino();
		}
		else
		if(preg_match($cheshire,$this->ua))
		{
			/* if browser is Cheshire */
			$this->cheshire();
		}
		else
		if(preg_match($chimera,$this->ua))
		{
			/* if browser is Chimera */
			$this->chimera();
		}
		else
		if(preg_match($chrome_plus,$this->ua))
		{
			/* if browser is ChromePlus */
			$this->chrome_plus();
		}
		else
		if(preg_match($classilla,$this->ua))
		{
			/* if browser is Classilla */
			$this->classilla();
		}
		else
		if(preg_match($comet_bird,$this->ua))
		{
			/* if browser is CometBird */
			$this->comet_bird();
		}
		else
		if(preg_match($comodo_dragon,$this->ua))
		{
			/* if browser is Comodo Dragon */
			$this->comodo_dragon();
		}
		else
		if(preg_match($conkeror,$this->ua))
		{
			/* if browser is Conkeror */
			$this->conkeror();
		}
		else
		if(preg_match($crazy_browser,$this->ua))
		{
			/* if browser is Crazy Browser */
			$this->crazy_browser();
		}
		else
		if(preg_match($cyberdog,$this->ua))
		{
			/* if browser is Cyberdog */
			$this->cyberdog();
		}
		else
		if(preg_match($deepnet_explorer,$this->ua))
		{
			/* if browser is Deepnet Explorer */
			$this->deepnet_explorer();
		}
		else
		if(preg_match($desk_browse,$this->ua))
		{
			/* if browser is Desc Browse */
			$this->desk_browse();
		}
		else
		if(preg_match($chrome,$this->ua))
		{
			/* if browser is Google Chrome */
			$this->chrome();
		}
		else
		if(preg_match($safari,$this->ua))
		{
			/* if browser is Apple Safari */
			$this->safari();
		}
	}
	
	private function firefox()
	{
		$this->browser['name'] = 'Mozilla Firefox';
		$this->get_browser_version('Firefox');
	}
	
	private function opera()
	{
		$this->browser['name'] = 'Opera';
		$this->get_browser_version('Version');
	}
	
	private function chromium()
	{
		$this->browser['name'] = 'Chromium';
		$this->get_browser_version('Chromium');
	}
	
	private function arora()
	{
		$this->browser['name'] = 'Arora';
		$this->get_browser_version('Arora');
	}
	
	private function dooble()
	{
		$this->browser['name'] = 'Dooble';
		$this->get_browser_version('Dooble');
	}
	
	private function midori()
	{
		$this->browser['name'] = 'Midori';
		$this->get_browser_version('Midori');
	}
	
	private function rekonq()
	{
		$this->browser['name'] = 'Rekonq';
	}
	
	private function epiphany()
	{
		$this->browser['name'] = 'Epiphany';
		$this->get_browser_version('Epiphany');
	}
	
	private function chrome()
	{
		$this->browser['name'] = 'Google Chrome';
		$this->get_browser_version('Chrome');
	}
	
	private function safari_mobile()
	{
		$this->browser['name'] = 'Safari Mobile';
		$this->get_browser_version('Version');
	}
	
	private function skyfire()
	{
		$this->browser['name'] = 'Skyfire';
		$this->get_browser_version('Skyfire');
	}
	
	private function safari()
	{
		$this->browser['name'] = 'Safari';
		$this->get_browser_version('Version');
	}
	
	private function opera_mini()
	{
		$this->browser['name'] = 'Opera Mini';
		$this->get_browser_version('Opera Mini');
		$this->ua = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
	}
	
	private function abrowse()
	{
		$this->browser['name'] = 'ABrowse';
		$this->get_browser_version('Abrowse',false);
	}
	
	private function acoo_browser()
	{
		$this->browser['name'] = 'Acoo Browser';
	}
	
	private function america_online_browser()
	{
		$this->browser['name'] = 'America Online Browser';
		$this->get_browser_version('America Online Browser',false);
	}
	
	private function amiga_voyager()
	{
		$this->browser['name'] = 'Amiga Voyager';
		$this->get_browser_version('AmigaVoyager');
	}
	
	private function aol()
	{
		$this->browser['name'] = 'AOL';
		$this->get_browser_version('AOL',false);
	}
	
	private function avant_browser()
	{
		$this->browser['name'] = 'Avant Browser';
	}
	
	private function beonex()
	{
		$this->browser['name'] = 'Beonex';
		$this->get_browser_version('Beonex');
	}
	
	private function bon_echo()
	{
		$this->browser['name'] = 'BonEcho';
		$this->get_browser_version('BonEcho');
	}
	
	private function browzar()
	{
		$this->browser['name'] = 'Browzar';
	}
	
	private function camino()
	{
		$this->browser['name'] = 'Camino';
		$this->get_browser_version('Camino');
	}
	
	private function cheshire()
	{
		$this->browser['name'] = 'Cheshire';
		$this->get_browser_version('Cheshire');
	}
	
	private function chimera()
	{
		$this->browser['name'] = 'Chimera';
		$this->get_browser_version('Chimera');
	}
	
	private function chrome_plus()
	{
		$this->browser['name'] = 'ChromePlus';
		$this->get_browser_version('ChromePlus');
	}
	
	private function classilla()
	{
		$this->browser['name'] = 'Classilla';
	}
	
	private function comet_bird()
	{
		$this->browser['name'] = 'CometBird';
		$this->get_browser_version('CometBird');
	}
	
	private function comodo_dragon()
	{
		$this->browser['name'] = 'Comodo_Dragon';
		$this->get_browser_version('Comodo_Dragon');
	}
	
	private function conkeror()
	{
		$this->browser['name'] = 'Conkeror';
		$this->get_browser_version('Conkeror');
	}
	
	private function crazy_browser()
	{
		$this->browser['name'] = 'Crazy Browser';
		$this->get_browser_version('Crazy Browser',false);
	}
	
	private function cyberdog()
	{
		$this->browser['name'] = 'Cyberdog';
		$this->get_browser_version('Cyberdog');
	}
	
	private function deepnet_explorer()
	{
		$this->browser['name'] = 'Deepnet Explorer';
		$this->get_browser_version('Deepnet Explorer',false);
	}
	
	private function desk_browse()
	{
		$this->browser['name'] = 'DeskBrowse';
		$this->get_browser_version('DeskBrowse');
	}
	
	private function iemobile()
	{
		$this->browser['name'] = 'Internet Explorer Mobile';
		$this->get_browser_version('IEMobile');
	}
	private function get_browser_version($phrase,$slash=true)
	{
		if($slash)
		{
			$version = "/".$phrase."\/[0-9.]{1,15}/";
			preg_match($version,$this->ua,$v);
			@$version = $v[0];
			$version = str_replace($phrase.'/','',$version);
			$version = str_replace(';','',$version);
			$this->browser['version'] = $version;
		}
		else
		{
			$version = "/".$phrase."( )?[0-9.]{1,15}/";
			preg_match($version,$this->ua,$v);
			@$version = $v[0];
			$version = str_replace($phrase.' ','',$version);
			$this->browser['version'] = $version;
		}
	}
	
	private function iphone()
	{
		$this->device = 'iPhone';
	}
	
	private function ipad()
	{
		$this->device = 'iPad';
	}
	
	private function kindle()
	{
		$this->device = 'Amazon Kindle';
	}
	
	private function black_berry()
	{
		$tablet = '/RIM Tablet OS/'; /* Black Berry Tablets */
		$v6v7 = '/BlackBerry;/'; /* Black Berry phones with BlackBerry 6 and BlackBerry 7 */
		$v4v5 = '/BlackBerry\w{1,10}\//'; /* Black Berry phones with BlackBerry 4.2-5.0 */
		if(preg_match($tablet,$this->ua))
		{
			/* if Tablet */
			$pattern = '/Mozilla\/5.0 \(\w{1,20}\;/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			$device = str_replace('Mozilla/5.0 (','',$device);
			$device = str_replace(';','',$device);
			$this->device = 'BlackBerry '.$device;
		}
		else
		if(preg_match($v6v7,$this->ua))
		{
			/* if v6 or v7 */
			$pattern = '/BlackBerry [0-9]{1,20}/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			$this->device = $device;
		}
		else
		if(preg_match($v4v5,$this->ua))
		{
			/* if v4.2-5.0 */
			$pattern = '/BlackBerry\w{1,20}/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			$this->device = str_replace('BlackBerry','BlackBerry ',$device);
		}
		else
			$this->device = 'BlackBerry';
	}
	
	private function nokia()
	{
		$n900 = '/N900/'; /* n900 */
		$lumia = '/Lumia/'; /* Lumia */
		$classic = '/Nokia[0-9]{4}Classic/'; /* classic */
		$nokia = '/(Nokia|nokia|Nokia|nokia |Nokia-|nokia-)\w{1,10}(\/|\-| )?/'; /* else */
		
		if(preg_match($n900,$this->ua))
		{
			/* if Nokia N900 */
			$this->device = 'Nokia N900';
		}
		else
		if(preg_match($lumia,$this->ua))
		{
			/* if Nokia Lumia */
			$this->device = 'Nokia Lumia';
		}
		else
		if(preg_match($classic,$this->ua))
		{
			/* if Classic */
			$pattern = '/Nokia[0-9]{4}Classic\//';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			$device = str_replace('Nokia','Nokia ',$device);
			$this->device = str_replace('Classic/',' Classic',$device);
		}
		else
		if(preg_match($nokia,$this->ua))
		{
			/* if else */
			$pattern = '/(Nokia|nokia|Nokia|nokia |Nokia-|nokia-)\w{1,10}(\/|\-| )?/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			$device = str_replace('nokia ','Nokia',$device);
			$device = str_replace('Nokia ','Nokia',$device);
			$device = str_replace('nokia','Nokia ',$device);
			$device = str_replace('Nokia','Nokia ',$device);
			$device = str_replace('-','',$device);
			$device = str_replace('/','',$device);
			$this->device = $device;
		}
		else
		{
			$this->device = 'Nokia';
		}
	}
	
	private function htc()
	{
		$desire = '/Desire/';
		$dream = '/Dream/';
		$flyer = '/Flyer/';
		$wildfire = '/Wildfire/';
		$desire_hd_softbank = '/001HT/';
		$faraday = '/2125/';
		$excalibur = '/(Excalibur|C720|c720)/';
		$one_s = '/(One_S|One S)/';
		$one_v = '/(One V|One_V)/';
		$desire_s = '/(S510e|DesireS)/';
		$desire_z = '/Desire Z/';
		$desire_hd = '/Desire HD/';
		$espresso = '/Espresso/';
		$fiesta = '/HTC Click/';
		$fuwa = '/(S700|s700)/';
		
		$this->device = 'HTC ';
		if(preg_match($desire_z,$this->ua))
		{
			$this->device .= 'Desire Z';
		}
		else
		if(preg_match($desire_s,$this->ua))
		{
			$this->device .= 'Desire S';
		}
		else
		if(preg_match($desire_hd,$this->ua))
		{
			$this->device .= 'Desire HD';
		}
		else
		if(preg_match($desire,$this->ua))
		{
			$this->device .= 'Desire';
		}
		else
		if(preg_match($dream,$this->ua))
		{
			$this->device .= 'Dream';
		}
		else
		if(preg_match($flyer,$this->ua))
		{
			$this->device .= 'Flyer';
		}
		else
		if(preg_match($wildfire,$this->ua))
		{
			$this->device .= 'Wildfire';
		}
		else
		if(preg_match($desire_hd_softbank,$this->ua))
		{
			$this->device .= 'Desire HD SoftBank';
		}
		else
		if(preg_match($faraday,$this->ua))
		{
			$this->device .= 'Faraday';
		}
		else
		if(preg_match($excalibur,$this->ua))
		{
			$this->device .= 'Excalibur';
		}
		else
		if(preg_match($one_s,$this->ua))
		{
			$this->device .= 'One S';
		}
		else
		if(preg_match($one_v,$this->ua))
		{
			$this->device .= 'One V';
		}
		else
		if(preg_match($espresso,$this->ua))
		{
			$this->device .= 'Espresso';
		}
		else
		if(preg_match($fiesta,$this->ua))
		{
			$this->device .= 'Fiesta';
		}
		else
		if(preg_match($fuwa,$this->ua))
		{
			$this->device .= 'Fuwa';
		}
	}
	
	private function siemens()
	{
		$this->device = 'Siemens ';
		$pattern = '/SIE-\w{2,5}/';
		preg_match($pattern,$this->ua,$v);
		$device = $v[0];
		$device = str_replace('SIE-','',$device);
		$this->device .= $device;
	}
	
	private function philips()
	{
		$this->device = 'Philips ';
		$pattern = '/(PHILIPS|Philips|philips)(-| )?[\w@]{2,10}/';
		preg_match($pattern,$this->ua,$v);
		$device = $v[0];
		
		$device = str_replace('PHILIPS','',$device);
		$device = str_replace('Philips','',$device);
		$device = str_replace('philips','',$device);
		$device = str_replace(' ','',$device);
		$device = str_replace('-','',$device);
		$device = str_replace('/','',$device);
		
		$this->device .= $device;
	}
	
	private function motorola()
	{
		$this->device = 'Motorola ';
		$xt = '/XT\w{1,10}/';
		if(preg_match($xt,$this->ua))
		{
			$pattern = '/XT\w{1,10}/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			
			$this->device .= $device;
		}
		else
		{
			$pattern = '/(Motorola|MOT|MOTOZINE|Mot)(-| )?\w{2,10}/';
			preg_match($pattern,$this->ua,$v);
			$device = $v[0];
			
			$device = str_replace('Motorola','',$device);
			$device = str_replace('MOT','',$device);
			$device = str_replace('MOTOZINE','',$device);
			$device = str_replace('Mot','',$device);
			$device = str_replace(' ','',$device);
			$device = str_replace('-','',$device);
			$device = str_replace('/','',$device);
			
			$this->device .= $device;
		}
	}
	
	private function benq()
	{
		$this->device = 'BenQ ';
		$pattern = '/(BenQ|BENQ|benq)-\w{2,10}/';
		preg_match($pattern,$this->ua,$v);
		$device = $v[0];
		$device = str_replace('BenQ-','',$device);
		$device = str_replace('BENQ-','',$device);
		$device = str_replace('benq-','',$device);
		$this->device .= $device;
	}
	
	private function ios()
	{
		$pattern = '/[0-9._]{1,15} like Mac OS X/';
		$this->os['name'] = 'iOS';
		preg_match($pattern,$this->ua,$v);
		$v = $v[0];
		$v = str_replace('CPU OS ','',$v);
		$v = str_replace(' like Mac OS X','',$v);
		$v = str_replace('_','.',$v);
		$this->os['version'] = $v;
	}
	
	private function ubuntu()
	{
		$this->os['name'] = 'Ubuntu';
		$pattern = '/Ubuntu\/[0-9.]{1,10} /';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Ubuntu/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function linux()
	{
		$this->os['name'] = 'Linux';
	}
	
	private function windows()
	{
		$this->os['name'] = 'Windows';
		$win95 = '/(Win95)/';
		$win98 = '/(Win98)/';
		$me = '/(Win 9[0-9]{1} 4.90|WinNT|Windows ME)/';
		$win2000 = '/(Windows NT 5.0|Windows 2000|Windows NT 5.01)/';
		$xp = '/Windows NT 5.1/';
		$server2003 = '/Windows NT 5.2/';
		$vista = '/Windows NT 6.0/';
		$seven = '/Windows NT 6.1/';
		$eight = '/Windows NT 6.2/';
		$ce = '/Windows CE/';
		$wp = '/(Windows Phone OS [0-9.]{1,15}|WP[0-9.]{1,10})/';
		$mobile = '/Windows Mobile/';
		
		if(preg_match($win95,$this->ua))
		{
			$this->os['version'] = '95';
		}
		else
		if(preg_match($wp,$this->ua))
		{
			$this->os['version'] = 'Phone ';
			preg_match($wp,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Windows Phone OS ','',$v);
			$v = str_replace('WP','',$v);
			$this->os['version'] .= $v;
		}
		else
		if(preg_match($win98,$this->ua))
		{
			$this->os['version'] = '95';
		}
		else
		if(preg_match($me,$this->ua))
		{
			$this->os['version'] = 'ME';
		}
		else
		if(preg_match($win2000,$this->ua))
		{
			$this->os['version'] = '2000';
		}
		else
		if(preg_match($xp,$this->ua))
		{
			$this->os['version'] = 'XP';
		}
		else
		if(preg_match($server2003,$this->ua))
		{
			$this->os['version'] = 'Server 2003';
		}
		else
		if(preg_match($seven,$this->ua))
		{
			$this->os['version'] = '7';
		}
		else
		if(preg_match($eight,$this->ua))
		{
			$this->os['version'] = '8';
		}
		else
		if(preg_match($ce,$this->ua))
		{
			$this->os['version'] = 'CE';
		}
		else
		if(preg_match($mobile,$this->ua))
		{
			$this->os['version'] = 'Mobile';
		}
	}
	
	private function symbian()
	{
		$this->os['name'] = 'Symbian';
		$pattern = '/SymbianOS\/[0-9,]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('SymbianOS/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function android()
	{
		$this->os['name'] = 'Android';
		$pattern = '/Android [0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Android','',$v);
			$v = str_replace(' ','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function maemo()
	{
		$this->os['name'] = 'Maemo';
	}
	
	private function bada()
	{
		$this->os['name'] = 'Bada';
		$pattern = '/Bada\/[0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Bada','',$v);
			$v = str_replace('/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function chromium_os()
	{
		$this->os['name'] = 'Chromium OS';
		$pattern = '/CrOS \w{1,10} [0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('CrOS','',$v);
			$v = preg_replace('/ \w{1,10} /','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function free_bsd()
	{
		$this->os['name'] = 'FreeBSD';
	}
	
	private function arch_linux()
	{
		$this->os['name'] = 'Arch Linux';
	}
	
	private function cent_os()
	{
		$this->os['name'] = 'Cent OS';
	}
	
	private function debian()
	{
		$this->os['name'] = 'Debian';
	}
	
	private function fedora()
	{
		$this->os['name'] = 'Fedora';
	}
	
	private function gentoo()
	{
		$this->os['name'] = 'Gentoo';
	}
	
	private function kanotix()
	{
		$this->os['name'] = 'Kanotix';
	}
	
	private function mandriva()
	{
		$this->os['name'] = 'Mandriva';
	}
	
	private function mint()
	{
		$this->os['name'] = 'Mint';
		$pattern = '/Mint\/[0-9.]{1,10} (\w{1,10})?/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Mint/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function red_hat()
	{
		$this->os['name'] = 'Red Hat';
	}
	
	private function slackware()
	{
		$this->os['name'] = 'Slackware';
		$pattern = '/Slackware\/[0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Slackware/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function suse()
	{
		$this->os['name'] = 'SUSE';
	}
	
	private function mac_os_x()
	{
		$this->os['name'] = 'Mac OS X';
		$pattern = '/Mac OS X [0-9._]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Mac OS X ','',$v);
			$v = str_replace('_','.',$v);
			$this->os['version'] = $v;
			if(preg_match('/10.3/',$v))
			{
				$this->os['version'] .= ' (Panther)';
			}
			if(preg_match('/10.4/',$v))
			{
				$this->os['version'] .= ' (Tiger)';
			}
			if(preg_match('/10.5/',$v))
			{
				$this->os['version'] .= ' (Leopard)';
			}
			if(preg_match('/10.6/',$v))
			{
				$this->os['version'] .= ' (Snow Leopard)';
			}
			if(preg_match('/10.7/',$v))
			{
				$this->os['version'] .= ' (Lion)';
			}
			if(preg_match('/10.8/',$v))
			{
				$this->os['version'] .= ' (Mountain Lion)';
			}
		}
	}
	
	private function morph_os()
	{
		$this->os['name'] = 'Morph OS';
	}
	
	private function minix()
	{
		$this->os['name'] = 'Minix 3';
	}
	
	private function net_bsd()
	{
		$this->os['name'] = 'NetBSD';
	}
	
	private function aros()
	{
		$this->os['name'] = 'AROS';
	}
	
	private function amiga()
	{
		$this->os['name'] = 'Amiga';
	}
	
	private function beos()
	{
		$this->os['name'] = 'BeOS';
	}
	
	private function dragonfly_bsd()
	{
		$this->os['name'] = 'DragonFly BSD';
	}
	
	private function hp_ux()
	{
		$this->os['name'] = 'HP-UX';
	}
	
	private function irix()
	{
		$this->os['name'] = 'IRIX';
	}
	
	private function joli_os()
	{
		$this->os['name'] = 'Joli OS';
	}
	
	private function nintendo_wii()
	{
		$this->os['name'] = 'Nintendo Wii';
	}
	
	private function open_bsd()
	{
		$this->os['name'] = 'Open BSD';
	}
	
	private function palm_os()
	{
		$this->os['name'] = 'Palm OS';
		$pattern = '/Palm OS [0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('Palm OS ','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function pc_linux_os()
	{
		$this->os['name'] = 'PClinux OS';
		$pattern = '/PCLinuxOS\/[0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('PCLinuxOS/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function rim_os()
	{
		$this->os['name'] = 'RIM';
	}
	
	private function rim_tablet_os()
	{
		$this->os['name'] = 'RIM Tablet';
		$pattern = '/RIM Tablet OS [0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('RIM Tablet OS ','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function solaris()
	{
		$this->os['name'] = 'Solaris';
	}
	
	private function syllable()
	{
		$this->os['name'] = 'Syllable';
	}
	
	private function tizen()
	{
		$this->os['name'] = 'Tizen';
	}
	
	private function web_os()
	{
		$this->os['name'] = 'webOS';
		$pattern = '/(webOS|hpwOS)\/[0-9.]{1,10}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('webOS/','',$v);
			$v = str_replace('hpwOS/','',$v);
			$this->os['version'] = $v;
		}
	}
	
	private function psp()
	{
		$this->device = 'PSP';
	}
	
	private function playstation()
	{
		$this->device = 'Sony Playstation ';
		$pattern = '/PLAYSTATION [0-9]{1,3}/';
		if(preg_match($pattern,$this->ua))
		{
			preg_match($pattern,$this->ua,$v);
			$v = $v[0];
			$v = str_replace('PLAYSTATION ','',$v);
			$this->device .= $v;
		}
	}
}
$br = new DetectBrowser();
?>
