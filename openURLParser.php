<?php

class openURLParser {
	public $rftatitle = '';
	public $rfttitle = '';
	public $rftjtitle = '';
	public $rftstitle = '';
	public $rftdate = '';
	public $rftvolume = '';
	public $rftissue = '';
	public $rftspage = '';
	public $rftepage = '';
	public $rftpages;
	public $rftartnum;
	public $rftissn;
	public $rfteissn;
	public $rftaulast;
	public $rftaufirst;
	public $rftauinit;
	public $rftauinit1;
	public $rftauinitm;
	public $rftausuffix;
	public $rftau = '';
	public $rftaucorp;
	public $rftisbn;
	public $rftcoden;
	public $rftsici;
	public $rftgenre = '';
	public $rftchron;
	public $rftssn;
	public $rftquarter;
	public $rftpart;
	
	//OpenURL 1.0 Context Object for Journal Articles 
	private $replace = array( array("-", "%E2%80%93"), array("[", "%5B"),array("]", "%5D"),array("and", "%26"),array("(", "%28"),array(")", "%29"),array(",", "%2C"), array(" ", "%20"), array("é", "%C3%A9"), array("ü", "%C3%BC"), array("#", "%23"), array("%", "%25"), array("&", "%63"), array("+", "%2B"), array("/", "%2F"), array("<", "%3C"), array("=", "3D"), array(">", "%3E"), array("?", "%3F"), array(":", "%3A"));
	
	//Array of all data 
	private $metaDataObjects = array('rft.atitle=','rft.jtitle=','rft.date=','rft.aufirst=','rft.aulast=','rft.au=','rft.genre=', 'rft_id=', 'rft.issue=', 'rft.volume=', 'rft.spage=', 'rft.epage=');
	
	private $coin;
	
	public function __construct() {
		// do nothing
	}
	
	public function convertOpenURL($openURL) {
		$this->coin = $openURL;	
		
		foreach($this->replace as $key) {
			$this->coin = str_replace($key[1], $key[0], $this->coin);
		}
		return $this->coin;
	}
	
	public function parseData() {
		$this->rftau = '';
		$pieces = explode("&", $this->coin);
		foreach($pieces as $p) {
			$p = str_replace("amp;", "", $p);
			
			//rft.atitle
			if(strpos($p, $this->metaDataObjects[0]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftatitle = $p;
			}
			
			//rft.jtitle
			if(strpos($p, $this->metaDataObjects[1]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftjtitle = $p;
			}
			
			//rft.date
			if(strpos($p, $this->metaDataObjects[2]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftdate = $p;
			}
			
			//rft.au
			if(strpos($p, $this->metaDataObjects[5]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftau .= $p . ' ';
			}
			
			//rft.genre
			if(strpos($p, $this->metaDataObjects[6]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftgenre = $p;
			}
			
			//rft.date
			if(strpos($p, $this->metaDataObjects[2]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftdate = $p;
			}
			
			//rft.issue
			if(strpos($p, $this->metaDataObjects[8]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftissue = $p;
			}
			
			//rft.volume
			if(strpos($p, $this->metaDataObjects[9]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftvolume = $p;
			}
			
			//rft.spage
			if(strpos($p, $this->metaDataObjects[10]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftspage = $p;
			}
			
			//rft.epage
			if(strpos($p, $this->metaDataObjects[11]) !== false) {
					$p = strstr($p, '=');
					$p = str_replace('=', '', $p);
					$p = str_replace('+', ' ', $p);
					$this->rftepage = $p;
			}
			
		}
	}
}
	
?>
