<?php


abstract class BaseOcregcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codobr;


	
	protected $codpro;


	
	protected $descon;


	
	protected $tipcon;


	
	protected $moncon;


	
	protected $monext;


	
	protected $monmul;


	
	protected $monmod;


	
	protected $feclic;


	
	protected $fecbuepro;


	
	protected $feccon;


	
	protected $fecini;


	
	protected $fecproini;


	
	protected $fecpar;


	
	protected $fecrei;


	
	protected $fecpro;


	
	protected $fecfin;


	
	protected $fecrecprov;


	
	protected $fecrecdef;


	
	protected $poriva;


	
	protected $moniva;


	
	protected $tieejecon;


	
	protected $stacon;


	
	protected $platie;


	
	protected $fecfinmod;


	
	protected $gasree;


	
	protected $subtot;


	
	protected $monful;


	
	protected $codpre;


	
	protected $despre;


	
	protected $refcom;


	
	protected $tipo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getCodobr()
	{

		return $this->codobr; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getDescon()
	{

		return $this->descon; 		
	}
	
	public function getTipcon()
	{

		return $this->tipcon; 		
	}
	
	public function getMoncon()
	{

		return number_format($this->moncon,2,',','.');
		
	}
	
	public function getMonext()
	{

		return number_format($this->monext,2,',','.');
		
	}
	
	public function getMonmul()
	{

		return number_format($this->monmul,2,',','.');
		
	}
	
	public function getMonmod()
	{

		return number_format($this->monmod,2,',','.');
		
	}
	
	public function getFeclic($format = 'Y-m-d')
	{

		if ($this->feclic === null || $this->feclic === '') {
			return null;
		} elseif (!is_int($this->feclic)) {
						$ts = strtotime($this->feclic);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feclic] as date/time value: " . var_export($this->feclic, true));
			}
		} else {
			$ts = $this->feclic;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecbuepro($format = 'Y-m-d')
	{

		if ($this->fecbuepro === null || $this->fecbuepro === '') {
			return null;
		} elseif (!is_int($this->fecbuepro)) {
						$ts = strtotime($this->fecbuepro);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecbuepro] as date/time value: " . var_export($this->fecbuepro, true));
			}
		} else {
			$ts = $this->fecbuepro;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccon($format = 'Y-m-d')
	{

		if ($this->feccon === null || $this->feccon === '') {
			return null;
		} elseif (!is_int($this->feccon)) {
						$ts = strtotime($this->feccon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
			}
		} else {
			$ts = $this->feccon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecproini($format = 'Y-m-d')
	{

		if ($this->fecproini === null || $this->fecproini === '') {
			return null;
		} elseif (!is_int($this->fecproini)) {
						$ts = strtotime($this->fecproini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecproini] as date/time value: " . var_export($this->fecproini, true));
			}
		} else {
			$ts = $this->fecproini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecpar($format = 'Y-m-d')
	{

		if ($this->fecpar === null || $this->fecpar === '') {
			return null;
		} elseif (!is_int($this->fecpar)) {
						$ts = strtotime($this->fecpar);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpar] as date/time value: " . var_export($this->fecpar, true));
			}
		} else {
			$ts = $this->fecpar;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecrei($format = 'Y-m-d')
	{

		if ($this->fecrei === null || $this->fecrei === '') {
			return null;
		} elseif (!is_int($this->fecrei)) {
						$ts = strtotime($this->fecrei);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrei] as date/time value: " . var_export($this->fecrei, true));
			}
		} else {
			$ts = $this->fecrei;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecpro($format = 'Y-m-d')
	{

		if ($this->fecpro === null || $this->fecpro === '') {
			return null;
		} elseif (!is_int($this->fecpro)) {
						$ts = strtotime($this->fecpro);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpro] as date/time value: " . var_export($this->fecpro, true));
			}
		} else {
			$ts = $this->fecpro;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecrecprov($format = 'Y-m-d')
	{

		if ($this->fecrecprov === null || $this->fecrecprov === '') {
			return null;
		} elseif (!is_int($this->fecrecprov)) {
						$ts = strtotime($this->fecrecprov);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrecprov] as date/time value: " . var_export($this->fecrecprov, true));
			}
		} else {
			$ts = $this->fecrecprov;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecrecdef($format = 'Y-m-d')
	{

		if ($this->fecrecdef === null || $this->fecrecdef === '') {
			return null;
		} elseif (!is_int($this->fecrecdef)) {
						$ts = strtotime($this->fecrecdef);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrecdef] as date/time value: " . var_export($this->fecrecdef, true));
			}
		} else {
			$ts = $this->fecrecdef;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPoriva()
	{

		return number_format($this->poriva,2,',','.');
		
	}
	
	public function getMoniva()
	{

		return number_format($this->moniva,2,',','.');
		
	}
	
	public function getTieejecon()
	{

		return number_format($this->tieejecon,2,',','.');
		
	}
	
	public function getStacon()
	{

		return $this->stacon; 		
	}
	
	public function getPlatie()
	{

		return $this->platie; 		
	}
	
	public function getFecfinmod($format = 'Y-m-d')
	{

		if ($this->fecfinmod === null || $this->fecfinmod === '') {
			return null;
		} elseif (!is_int($this->fecfinmod)) {
						$ts = strtotime($this->fecfinmod);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfinmod] as date/time value: " . var_export($this->fecfinmod, true));
			}
		} else {
			$ts = $this->fecfinmod;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getGasree()
	{

		return number_format($this->gasree,2,',','.');
		
	}
	
	public function getSubtot()
	{

		return number_format($this->subtot,2,',','.');
		
	}
	
	public function getMonful()
	{

		return number_format($this->monful,2,',','.');
		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getDespre()
	{

		return $this->despre; 		
	}
	
	public function getRefcom()
	{

		return $this->refcom; 		
	}
	
	public function getTipo()
	{

		return $this->tipo; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcregconPeer::CODCON;
		}

	} 
	
	public function setCodobr($v)
	{

		if ($this->codobr !== $v) {
			$this->codobr = $v;
			$this->modifiedColumns[] = OcregconPeer::CODOBR;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = OcregconPeer::CODPRO;
		}

	} 
	
	public function setDescon($v)
	{

		if ($this->descon !== $v) {
			$this->descon = $v;
			$this->modifiedColumns[] = OcregconPeer::DESCON;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = OcregconPeer::TIPCON;
		}

	} 
	
	public function setMoncon($v)
	{

		if ($this->moncon !== $v) {
			$this->moncon = $v;
			$this->modifiedColumns[] = OcregconPeer::MONCON;
		}

	} 
	
	public function setMonext($v)
	{

		if ($this->monext !== $v) {
			$this->monext = $v;
			$this->modifiedColumns[] = OcregconPeer::MONEXT;
		}

	} 
	
	public function setMonmul($v)
	{

		if ($this->monmul !== $v) {
			$this->monmul = $v;
			$this->modifiedColumns[] = OcregconPeer::MONMUL;
		}

	} 
	
	public function setMonmod($v)
	{

		if ($this->monmod !== $v) {
			$this->monmod = $v;
			$this->modifiedColumns[] = OcregconPeer::MONMOD;
		}

	} 
	
	public function setFeclic($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feclic] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feclic !== $ts) {
			$this->feclic = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECLIC;
		}

	} 
	
	public function setFecbuepro($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecbuepro] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecbuepro !== $ts) {
			$this->fecbuepro = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECBUEPRO;
		}

	} 
	
	public function setFeccon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccon !== $ts) {
			$this->feccon = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECCON;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECINI;
		}

	} 
	
	public function setFecproini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecproini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecproini !== $ts) {
			$this->fecproini = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECPROINI;
		}

	} 
	
	public function setFecpar($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpar] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpar !== $ts) {
			$this->fecpar = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECPAR;
		}

	} 
	
	public function setFecrei($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrei] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrei !== $ts) {
			$this->fecrei = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECREI;
		}

	} 
	
	public function setFecpro($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpro] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpro !== $ts) {
			$this->fecpro = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECPRO;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECFIN;
		}

	} 
	
	public function setFecrecprov($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrecprov] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrecprov !== $ts) {
			$this->fecrecprov = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECRECPROV;
		}

	} 
	
	public function setFecrecdef($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrecdef] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrecdef !== $ts) {
			$this->fecrecdef = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECRECDEF;
		}

	} 
	
	public function setPoriva($v)
	{

		if ($this->poriva !== $v) {
			$this->poriva = $v;
			$this->modifiedColumns[] = OcregconPeer::PORIVA;
		}

	} 
	
	public function setMoniva($v)
	{

		if ($this->moniva !== $v) {
			$this->moniva = $v;
			$this->modifiedColumns[] = OcregconPeer::MONIVA;
		}

	} 
	
	public function setTieejecon($v)
	{

		if ($this->tieejecon !== $v) {
			$this->tieejecon = $v;
			$this->modifiedColumns[] = OcregconPeer::TIEEJECON;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = OcregconPeer::STACON;
		}

	} 
	
	public function setPlatie($v)
	{

		if ($this->platie !== $v) {
			$this->platie = $v;
			$this->modifiedColumns[] = OcregconPeer::PLATIE;
		}

	} 
	
	public function setFecfinmod($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfinmod] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfinmod !== $ts) {
			$this->fecfinmod = $ts;
			$this->modifiedColumns[] = OcregconPeer::FECFINMOD;
		}

	} 
	
	public function setGasree($v)
	{

		if ($this->gasree !== $v) {
			$this->gasree = $v;
			$this->modifiedColumns[] = OcregconPeer::GASREE;
		}

	} 
	
	public function setSubtot($v)
	{

		if ($this->subtot !== $v) {
			$this->subtot = $v;
			$this->modifiedColumns[] = OcregconPeer::SUBTOT;
		}

	} 
	
	public function setMonful($v)
	{

		if ($this->monful !== $v) {
			$this->monful = $v;
			$this->modifiedColumns[] = OcregconPeer::MONFUL;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = OcregconPeer::CODPRE;
		}

	} 
	
	public function setDespre($v)
	{

		if ($this->despre !== $v) {
			$this->despre = $v;
			$this->modifiedColumns[] = OcregconPeer::DESPRE;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = OcregconPeer::REFCOM;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = OcregconPeer::TIPO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcregconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codobr = $rs->getString($startcol + 1);

			$this->codpro = $rs->getString($startcol + 2);

			$this->descon = $rs->getString($startcol + 3);

			$this->tipcon = $rs->getString($startcol + 4);

			$this->moncon = $rs->getFloat($startcol + 5);

			$this->monext = $rs->getFloat($startcol + 6);

			$this->monmul = $rs->getFloat($startcol + 7);

			$this->monmod = $rs->getFloat($startcol + 8);

			$this->feclic = $rs->getDate($startcol + 9, null);

			$this->fecbuepro = $rs->getDate($startcol + 10, null);

			$this->feccon = $rs->getDate($startcol + 11, null);

			$this->fecini = $rs->getDate($startcol + 12, null);

			$this->fecproini = $rs->getDate($startcol + 13, null);

			$this->fecpar = $rs->getDate($startcol + 14, null);

			$this->fecrei = $rs->getDate($startcol + 15, null);

			$this->fecpro = $rs->getDate($startcol + 16, null);

			$this->fecfin = $rs->getDate($startcol + 17, null);

			$this->fecrecprov = $rs->getDate($startcol + 18, null);

			$this->fecrecdef = $rs->getDate($startcol + 19, null);

			$this->poriva = $rs->getFloat($startcol + 20);

			$this->moniva = $rs->getFloat($startcol + 21);

			$this->tieejecon = $rs->getFloat($startcol + 22);

			$this->stacon = $rs->getString($startcol + 23);

			$this->platie = $rs->getString($startcol + 24);

			$this->fecfinmod = $rs->getDate($startcol + 25, null);

			$this->gasree = $rs->getFloat($startcol + 26);

			$this->subtot = $rs->getFloat($startcol + 27);

			$this->monful = $rs->getFloat($startcol + 28);

			$this->codpre = $rs->getString($startcol + 29);

			$this->despre = $rs->getString($startcol + 30);

			$this->refcom = $rs->getString($startcol + 31);

			$this->tipo = $rs->getString($startcol + 32);

			$this->id = $rs->getInt($startcol + 33);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 34; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocregcon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcregconPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OcregconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcregconPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = OcregconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodobr();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getDescon();
				break;
			case 4:
				return $this->getTipcon();
				break;
			case 5:
				return $this->getMoncon();
				break;
			case 6:
				return $this->getMonext();
				break;
			case 7:
				return $this->getMonmul();
				break;
			case 8:
				return $this->getMonmod();
				break;
			case 9:
				return $this->getFeclic();
				break;
			case 10:
				return $this->getFecbuepro();
				break;
			case 11:
				return $this->getFeccon();
				break;
			case 12:
				return $this->getFecini();
				break;
			case 13:
				return $this->getFecproini();
				break;
			case 14:
				return $this->getFecpar();
				break;
			case 15:
				return $this->getFecrei();
				break;
			case 16:
				return $this->getFecpro();
				break;
			case 17:
				return $this->getFecfin();
				break;
			case 18:
				return $this->getFecrecprov();
				break;
			case 19:
				return $this->getFecrecdef();
				break;
			case 20:
				return $this->getPoriva();
				break;
			case 21:
				return $this->getMoniva();
				break;
			case 22:
				return $this->getTieejecon();
				break;
			case 23:
				return $this->getStacon();
				break;
			case 24:
				return $this->getPlatie();
				break;
			case 25:
				return $this->getFecfinmod();
				break;
			case 26:
				return $this->getGasree();
				break;
			case 27:
				return $this->getSubtot();
				break;
			case 28:
				return $this->getMonful();
				break;
			case 29:
				return $this->getCodpre();
				break;
			case 30:
				return $this->getDespre();
				break;
			case 31:
				return $this->getRefcom();
				break;
			case 32:
				return $this->getTipo();
				break;
			case 33:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodobr(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getDescon(),
			$keys[4] => $this->getTipcon(),
			$keys[5] => $this->getMoncon(),
			$keys[6] => $this->getMonext(),
			$keys[7] => $this->getMonmul(),
			$keys[8] => $this->getMonmod(),
			$keys[9] => $this->getFeclic(),
			$keys[10] => $this->getFecbuepro(),
			$keys[11] => $this->getFeccon(),
			$keys[12] => $this->getFecini(),
			$keys[13] => $this->getFecproini(),
			$keys[14] => $this->getFecpar(),
			$keys[15] => $this->getFecrei(),
			$keys[16] => $this->getFecpro(),
			$keys[17] => $this->getFecfin(),
			$keys[18] => $this->getFecrecprov(),
			$keys[19] => $this->getFecrecdef(),
			$keys[20] => $this->getPoriva(),
			$keys[21] => $this->getMoniva(),
			$keys[22] => $this->getTieejecon(),
			$keys[23] => $this->getStacon(),
			$keys[24] => $this->getPlatie(),
			$keys[25] => $this->getFecfinmod(),
			$keys[26] => $this->getGasree(),
			$keys[27] => $this->getSubtot(),
			$keys[28] => $this->getMonful(),
			$keys[29] => $this->getCodpre(),
			$keys[30] => $this->getDespre(),
			$keys[31] => $this->getRefcom(),
			$keys[32] => $this->getTipo(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodobr($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setDescon($value);
				break;
			case 4:
				$this->setTipcon($value);
				break;
			case 5:
				$this->setMoncon($value);
				break;
			case 6:
				$this->setMonext($value);
				break;
			case 7:
				$this->setMonmul($value);
				break;
			case 8:
				$this->setMonmod($value);
				break;
			case 9:
				$this->setFeclic($value);
				break;
			case 10:
				$this->setFecbuepro($value);
				break;
			case 11:
				$this->setFeccon($value);
				break;
			case 12:
				$this->setFecini($value);
				break;
			case 13:
				$this->setFecproini($value);
				break;
			case 14:
				$this->setFecpar($value);
				break;
			case 15:
				$this->setFecrei($value);
				break;
			case 16:
				$this->setFecpro($value);
				break;
			case 17:
				$this->setFecfin($value);
				break;
			case 18:
				$this->setFecrecprov($value);
				break;
			case 19:
				$this->setFecrecdef($value);
				break;
			case 20:
				$this->setPoriva($value);
				break;
			case 21:
				$this->setMoniva($value);
				break;
			case 22:
				$this->setTieejecon($value);
				break;
			case 23:
				$this->setStacon($value);
				break;
			case 24:
				$this->setPlatie($value);
				break;
			case 25:
				$this->setFecfinmod($value);
				break;
			case 26:
				$this->setGasree($value);
				break;
			case 27:
				$this->setSubtot($value);
				break;
			case 28:
				$this->setMonful($value);
				break;
			case 29:
				$this->setCodpre($value);
				break;
			case 30:
				$this->setDespre($value);
				break;
			case 31:
				$this->setRefcom($value);
				break;
			case 32:
				$this->setTipo($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonext($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonmul($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonmod($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFeclic($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecbuepro($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFeccon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecini($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecproini($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecpar($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecrei($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecpro($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecfin($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecrecprov($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecrecdef($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPoriva($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMoniva($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTieejecon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStacon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPlatie($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecfinmod($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setGasree($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setSubtot($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setMonful($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodpre($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setDespre($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setRefcom($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTipo($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcregconPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcregconPeer::CODCON)) $criteria->add(OcregconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcregconPeer::CODOBR)) $criteria->add(OcregconPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcregconPeer::CODPRO)) $criteria->add(OcregconPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(OcregconPeer::DESCON)) $criteria->add(OcregconPeer::DESCON, $this->descon);
		if ($this->isColumnModified(OcregconPeer::TIPCON)) $criteria->add(OcregconPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(OcregconPeer::MONCON)) $criteria->add(OcregconPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(OcregconPeer::MONEXT)) $criteria->add(OcregconPeer::MONEXT, $this->monext);
		if ($this->isColumnModified(OcregconPeer::MONMUL)) $criteria->add(OcregconPeer::MONMUL, $this->monmul);
		if ($this->isColumnModified(OcregconPeer::MONMOD)) $criteria->add(OcregconPeer::MONMOD, $this->monmod);
		if ($this->isColumnModified(OcregconPeer::FECLIC)) $criteria->add(OcregconPeer::FECLIC, $this->feclic);
		if ($this->isColumnModified(OcregconPeer::FECBUEPRO)) $criteria->add(OcregconPeer::FECBUEPRO, $this->fecbuepro);
		if ($this->isColumnModified(OcregconPeer::FECCON)) $criteria->add(OcregconPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(OcregconPeer::FECINI)) $criteria->add(OcregconPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(OcregconPeer::FECPROINI)) $criteria->add(OcregconPeer::FECPROINI, $this->fecproini);
		if ($this->isColumnModified(OcregconPeer::FECPAR)) $criteria->add(OcregconPeer::FECPAR, $this->fecpar);
		if ($this->isColumnModified(OcregconPeer::FECREI)) $criteria->add(OcregconPeer::FECREI, $this->fecrei);
		if ($this->isColumnModified(OcregconPeer::FECPRO)) $criteria->add(OcregconPeer::FECPRO, $this->fecpro);
		if ($this->isColumnModified(OcregconPeer::FECFIN)) $criteria->add(OcregconPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(OcregconPeer::FECRECPROV)) $criteria->add(OcregconPeer::FECRECPROV, $this->fecrecprov);
		if ($this->isColumnModified(OcregconPeer::FECRECDEF)) $criteria->add(OcregconPeer::FECRECDEF, $this->fecrecdef);
		if ($this->isColumnModified(OcregconPeer::PORIVA)) $criteria->add(OcregconPeer::PORIVA, $this->poriva);
		if ($this->isColumnModified(OcregconPeer::MONIVA)) $criteria->add(OcregconPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(OcregconPeer::TIEEJECON)) $criteria->add(OcregconPeer::TIEEJECON, $this->tieejecon);
		if ($this->isColumnModified(OcregconPeer::STACON)) $criteria->add(OcregconPeer::STACON, $this->stacon);
		if ($this->isColumnModified(OcregconPeer::PLATIE)) $criteria->add(OcregconPeer::PLATIE, $this->platie);
		if ($this->isColumnModified(OcregconPeer::FECFINMOD)) $criteria->add(OcregconPeer::FECFINMOD, $this->fecfinmod);
		if ($this->isColumnModified(OcregconPeer::GASREE)) $criteria->add(OcregconPeer::GASREE, $this->gasree);
		if ($this->isColumnModified(OcregconPeer::SUBTOT)) $criteria->add(OcregconPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(OcregconPeer::MONFUL)) $criteria->add(OcregconPeer::MONFUL, $this->monful);
		if ($this->isColumnModified(OcregconPeer::CODPRE)) $criteria->add(OcregconPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OcregconPeer::DESPRE)) $criteria->add(OcregconPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(OcregconPeer::REFCOM)) $criteria->add(OcregconPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OcregconPeer::TIPO)) $criteria->add(OcregconPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(OcregconPeer::ID)) $criteria->add(OcregconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcregconPeer::DATABASE_NAME);

		$criteria->add(OcregconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setDescon($this->descon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setMonext($this->monext);

		$copyObj->setMonmul($this->monmul);

		$copyObj->setMonmod($this->monmod);

		$copyObj->setFeclic($this->feclic);

		$copyObj->setFecbuepro($this->fecbuepro);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecproini($this->fecproini);

		$copyObj->setFecpar($this->fecpar);

		$copyObj->setFecrei($this->fecrei);

		$copyObj->setFecpro($this->fecpro);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setFecrecprov($this->fecrecprov);

		$copyObj->setFecrecdef($this->fecrecdef);

		$copyObj->setPoriva($this->poriva);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setTieejecon($this->tieejecon);

		$copyObj->setStacon($this->stacon);

		$copyObj->setPlatie($this->platie);

		$copyObj->setFecfinmod($this->fecfinmod);

		$copyObj->setGasree($this->gasree);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setMonful($this->monful);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setDespre($this->despre);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipo($this->tipo);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OcregconPeer();
		}
		return self::$peer;
	}

} 