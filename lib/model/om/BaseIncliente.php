<?php


abstract class BaseIncliente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcli;


	
	protected $nomcli;


	
	protected $rifcli;


	
	protected $dircli;


	
	protected $telcli;


	
	protected $faxcli;


	
	protected $email;


	
	protected $limcre;


	
	protected $codctacon;


	
	protected $codctaord;


	
	protected $codctaper;


	
	protected $fecreg;


	
	protected $cirjud;


	
	protected $regmer;


	
	protected $tomreg;


	
	protected $folreg;


	
	protected $capsus;


	
	protected $cappag;


	
	protected $rifrepleg;


	
	protected $nomrepleg;


	
	protected $dirrepleg;


	
	protected $telrepleg;


	
	protected $emailrepleg;


	
	protected $rifpercon;


	
	protected $nompercon;


	
	protected $dirpercon;


	
	protected $telpercon;


	
	protected $emailpercon;


	
	protected $fecvenreg;


	
	protected $codgruprec;


	
	protected $ctaconasoc;


	
	protected $ctaordasoc;


	
	protected $ctaperasoc;


	
	protected $ctaordart;


	
	protected $ctaperart;


	
	protected $ctaordcont;


	
	protected $ctapercont;


	
	protected $nacpro;


	
	protected $actprof;


	
	protected $codtipemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getNomcli()
  {

    return trim($this->nomcli);

  }
  
  public function getRifcli()
  {

    return trim($this->rifcli);

  }
  
  public function getDircli()
  {

    return trim($this->dircli);

  }
  
  public function getTelcli()
  {

    return trim($this->telcli);

  }
  
  public function getFaxcli()
  {

    return trim($this->faxcli);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getLimcre($val=false)
  {

    if($val) return number_format($this->limcre,2,',','.');
    else return $this->limcre;

  }
  
  public function getCodctacon()
  {

    return trim($this->codctacon);

  }
  
  public function getCodctaord()
  {

    return trim($this->codctaord);

  }
  
  public function getCodctaper()
  {

    return trim($this->codctaper);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCirjud()
  {

    return trim($this->cirjud);

  }
  
  public function getRegmer()
  {

    return trim($this->regmer);

  }
  
  public function getTomreg()
  {

    return trim($this->tomreg);

  }
  
  public function getFolreg()
  {

    return trim($this->folreg);

  }
  
  public function getCapsus($val=false)
  {

    if($val) return number_format($this->capsus,2,',','.');
    else return $this->capsus;

  }
  
  public function getCappag($val=false)
  {

    if($val) return number_format($this->cappag,2,',','.');
    else return $this->cappag;

  }
  
  public function getRifrepleg()
  {

    return trim($this->rifrepleg);

  }
  
  public function getNomrepleg()
  {

    return trim($this->nomrepleg);

  }
  
  public function getDirrepleg()
  {

    return trim($this->dirrepleg);

  }
  
  public function getTelrepleg()
  {

    return trim($this->telrepleg);

  }
  
  public function getEmailrepleg()
  {

    return trim($this->emailrepleg);

  }
  
  public function getRifpercon()
  {

    return trim($this->rifpercon);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getDirpercon()
  {

    return trim($this->dirpercon);

  }
  
  public function getTelpercon()
  {

    return trim($this->telpercon);

  }
  
  public function getEmailpercon()
  {

    return trim($this->emailpercon);

  }
  
  public function getFecvenreg($format = 'Y-m-d')
  {

    if ($this->fecvenreg === null || $this->fecvenreg === '') {
      return null;
    } elseif (!is_int($this->fecvenreg)) {
            $ts = adodb_strtotime($this->fecvenreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvenreg] as date/time value: " . var_export($this->fecvenreg, true));
      }
    } else {
      $ts = $this->fecvenreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodgruprec()
  {

    return trim($this->codgruprec);

  }
  
  public function getCtaconasoc()
  {

    return trim($this->ctaconasoc);

  }
  
  public function getCtaordasoc()
  {

    return trim($this->ctaordasoc);

  }
  
  public function getCtaperasoc()
  {

    return trim($this->ctaperasoc);

  }
  
  public function getCtaordart()
  {

    return trim($this->ctaordart);

  }
  
  public function getCtaperart()
  {

    return trim($this->ctaperart);

  }
  
  public function getCtaordcont()
  {

    return trim($this->ctaordcont);

  }
  
  public function getCtapercont()
  {

    return trim($this->ctapercont);

  }
  
  public function getNacpro()
  {

    return trim($this->nacpro);

  }
  
  public function getActprof()
  {

    return trim($this->actprof);

  }
  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = InclientePeer::CODCLI;
      }
  
	} 
	
	public function setNomcli($v)
	{

    if ($this->nomcli !== $v) {
        $this->nomcli = $v;
        $this->modifiedColumns[] = InclientePeer::NOMCLI;
      }
  
	} 
	
	public function setRifcli($v)
	{

    if ($this->rifcli !== $v) {
        $this->rifcli = $v;
        $this->modifiedColumns[] = InclientePeer::RIFCLI;
      }
  
	} 
	
	public function setDircli($v)
	{

    if ($this->dircli !== $v) {
        $this->dircli = $v;
        $this->modifiedColumns[] = InclientePeer::DIRCLI;
      }
  
	} 
	
	public function setTelcli($v)
	{

    if ($this->telcli !== $v) {
        $this->telcli = $v;
        $this->modifiedColumns[] = InclientePeer::TELCLI;
      }
  
	} 
	
	public function setFaxcli($v)
	{

    if ($this->faxcli !== $v) {
        $this->faxcli = $v;
        $this->modifiedColumns[] = InclientePeer::FAXCLI;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = InclientePeer::EMAIL;
      }
  
	} 
	
	public function setLimcre($v)
	{

    if ($this->limcre !== $v) {
        $this->limcre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InclientePeer::LIMCRE;
      }
  
	} 
	
	public function setCodctacon($v)
	{

    if ($this->codctacon !== $v) {
        $this->codctacon = $v;
        $this->modifiedColumns[] = InclientePeer::CODCTACON;
      }
  
	} 
	
	public function setCodctaord($v)
	{

    if ($this->codctaord !== $v) {
        $this->codctaord = $v;
        $this->modifiedColumns[] = InclientePeer::CODCTAORD;
      }
  
	} 
	
	public function setCodctaper($v)
	{

    if ($this->codctaper !== $v) {
        $this->codctaper = $v;
        $this->modifiedColumns[] = InclientePeer::CODCTAPER;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = InclientePeer::FECREG;
    }

	} 
	
	public function setCirjud($v)
	{

    if ($this->cirjud !== $v) {
        $this->cirjud = $v;
        $this->modifiedColumns[] = InclientePeer::CIRJUD;
      }
  
	} 
	
	public function setRegmer($v)
	{

    if ($this->regmer !== $v) {
        $this->regmer = $v;
        $this->modifiedColumns[] = InclientePeer::REGMER;
      }
  
	} 
	
	public function setTomreg($v)
	{

    if ($this->tomreg !== $v) {
        $this->tomreg = $v;
        $this->modifiedColumns[] = InclientePeer::TOMREG;
      }
  
	} 
	
	public function setFolreg($v)
	{

    if ($this->folreg !== $v) {
        $this->folreg = $v;
        $this->modifiedColumns[] = InclientePeer::FOLREG;
      }
  
	} 
	
	public function setCapsus($v)
	{

    if ($this->capsus !== $v) {
        $this->capsus = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InclientePeer::CAPSUS;
      }
  
	} 
	
	public function setCappag($v)
	{

    if ($this->cappag !== $v) {
        $this->cappag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InclientePeer::CAPPAG;
      }
  
	} 
	
	public function setRifrepleg($v)
	{

    if ($this->rifrepleg !== $v) {
        $this->rifrepleg = $v;
        $this->modifiedColumns[] = InclientePeer::RIFREPLEG;
      }
  
	} 
	
	public function setNomrepleg($v)
	{

    if ($this->nomrepleg !== $v) {
        $this->nomrepleg = $v;
        $this->modifiedColumns[] = InclientePeer::NOMREPLEG;
      }
  
	} 
	
	public function setDirrepleg($v)
	{

    if ($this->dirrepleg !== $v) {
        $this->dirrepleg = $v;
        $this->modifiedColumns[] = InclientePeer::DIRREPLEG;
      }
  
	} 
	
	public function setTelrepleg($v)
	{

    if ($this->telrepleg !== $v) {
        $this->telrepleg = $v;
        $this->modifiedColumns[] = InclientePeer::TELREPLEG;
      }
  
	} 
	
	public function setEmailrepleg($v)
	{

    if ($this->emailrepleg !== $v) {
        $this->emailrepleg = $v;
        $this->modifiedColumns[] = InclientePeer::EMAILREPLEG;
      }
  
	} 
	
	public function setRifpercon($v)
	{

    if ($this->rifpercon !== $v) {
        $this->rifpercon = $v;
        $this->modifiedColumns[] = InclientePeer::RIFPERCON;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = InclientePeer::NOMPERCON;
      }
  
	} 
	
	public function setDirpercon($v)
	{

    if ($this->dirpercon !== $v) {
        $this->dirpercon = $v;
        $this->modifiedColumns[] = InclientePeer::DIRPERCON;
      }
  
	} 
	
	public function setTelpercon($v)
	{

    if ($this->telpercon !== $v) {
        $this->telpercon = $v;
        $this->modifiedColumns[] = InclientePeer::TELPERCON;
      }
  
	} 
	
	public function setEmailpercon($v)
	{

    if ($this->emailpercon !== $v) {
        $this->emailpercon = $v;
        $this->modifiedColumns[] = InclientePeer::EMAILPERCON;
      }
  
	} 
	
	public function setFecvenreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvenreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvenreg !== $ts) {
      $this->fecvenreg = $ts;
      $this->modifiedColumns[] = InclientePeer::FECVENREG;
    }

	} 
	
	public function setCodgruprec($v)
	{

    if ($this->codgruprec !== $v) {
        $this->codgruprec = $v;
        $this->modifiedColumns[] = InclientePeer::CODGRUPREC;
      }
  
	} 
	
	public function setCtaconasoc($v)
	{

    if ($this->ctaconasoc !== $v) {
        $this->ctaconasoc = $v;
        $this->modifiedColumns[] = InclientePeer::CTACONASOC;
      }
  
	} 
	
	public function setCtaordasoc($v)
	{

    if ($this->ctaordasoc !== $v) {
        $this->ctaordasoc = $v;
        $this->modifiedColumns[] = InclientePeer::CTAORDASOC;
      }
  
	} 
	
	public function setCtaperasoc($v)
	{

    if ($this->ctaperasoc !== $v) {
        $this->ctaperasoc = $v;
        $this->modifiedColumns[] = InclientePeer::CTAPERASOC;
      }
  
	} 
	
	public function setCtaordart($v)
	{

    if ($this->ctaordart !== $v) {
        $this->ctaordart = $v;
        $this->modifiedColumns[] = InclientePeer::CTAORDART;
      }
  
	} 
	
	public function setCtaperart($v)
	{

    if ($this->ctaperart !== $v) {
        $this->ctaperart = $v;
        $this->modifiedColumns[] = InclientePeer::CTAPERART;
      }
  
	} 
	
	public function setCtaordcont($v)
	{

    if ($this->ctaordcont !== $v) {
        $this->ctaordcont = $v;
        $this->modifiedColumns[] = InclientePeer::CTAORDCONT;
      }
  
	} 
	
	public function setCtapercont($v)
	{

    if ($this->ctapercont !== $v) {
        $this->ctapercont = $v;
        $this->modifiedColumns[] = InclientePeer::CTAPERCONT;
      }
  
	} 
	
	public function setNacpro($v)
	{

    if ($this->nacpro !== $v) {
        $this->nacpro = $v;
        $this->modifiedColumns[] = InclientePeer::NACPRO;
      }
  
	} 
	
	public function setActprof($v)
	{

    if ($this->actprof !== $v) {
        $this->actprof = $v;
        $this->modifiedColumns[] = InclientePeer::ACTPROF;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = InclientePeer::CODTIPEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InclientePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcli = $rs->getString($startcol + 0);

      $this->nomcli = $rs->getString($startcol + 1);

      $this->rifcli = $rs->getString($startcol + 2);

      $this->dircli = $rs->getString($startcol + 3);

      $this->telcli = $rs->getString($startcol + 4);

      $this->faxcli = $rs->getString($startcol + 5);

      $this->email = $rs->getString($startcol + 6);

      $this->limcre = $rs->getFloat($startcol + 7);

      $this->codctacon = $rs->getString($startcol + 8);

      $this->codctaord = $rs->getString($startcol + 9);

      $this->codctaper = $rs->getString($startcol + 10);

      $this->fecreg = $rs->getDate($startcol + 11, null);

      $this->cirjud = $rs->getString($startcol + 12);

      $this->regmer = $rs->getString($startcol + 13);

      $this->tomreg = $rs->getString($startcol + 14);

      $this->folreg = $rs->getString($startcol + 15);

      $this->capsus = $rs->getFloat($startcol + 16);

      $this->cappag = $rs->getFloat($startcol + 17);

      $this->rifrepleg = $rs->getString($startcol + 18);

      $this->nomrepleg = $rs->getString($startcol + 19);

      $this->dirrepleg = $rs->getString($startcol + 20);

      $this->telrepleg = $rs->getString($startcol + 21);

      $this->emailrepleg = $rs->getString($startcol + 22);

      $this->rifpercon = $rs->getString($startcol + 23);

      $this->nompercon = $rs->getString($startcol + 24);

      $this->dirpercon = $rs->getString($startcol + 25);

      $this->telpercon = $rs->getString($startcol + 26);

      $this->emailpercon = $rs->getString($startcol + 27);

      $this->fecvenreg = $rs->getDate($startcol + 28, null);

      $this->codgruprec = $rs->getString($startcol + 29);

      $this->ctaconasoc = $rs->getString($startcol + 30);

      $this->ctaordasoc = $rs->getString($startcol + 31);

      $this->ctaperasoc = $rs->getString($startcol + 32);

      $this->ctaordart = $rs->getString($startcol + 33);

      $this->ctaperart = $rs->getString($startcol + 34);

      $this->ctaordcont = $rs->getString($startcol + 35);

      $this->ctapercont = $rs->getString($startcol + 36);

      $this->nacpro = $rs->getString($startcol + 37);

      $this->actprof = $rs->getString($startcol + 38);

      $this->codtipemp = $rs->getString($startcol + 39);

      $this->id = $rs->getInt($startcol + 40);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 41; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Incliente object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InclientePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InclientePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InclientePeer::DATABASE_NAME);
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
					$pk = InclientePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InclientePeer::doUpdate($this, $con);
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


			if (($retval = InclientePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InclientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcli();
				break;
			case 1:
				return $this->getNomcli();
				break;
			case 2:
				return $this->getRifcli();
				break;
			case 3:
				return $this->getDircli();
				break;
			case 4:
				return $this->getTelcli();
				break;
			case 5:
				return $this->getFaxcli();
				break;
			case 6:
				return $this->getEmail();
				break;
			case 7:
				return $this->getLimcre();
				break;
			case 8:
				return $this->getCodctacon();
				break;
			case 9:
				return $this->getCodctaord();
				break;
			case 10:
				return $this->getCodctaper();
				break;
			case 11:
				return $this->getFecreg();
				break;
			case 12:
				return $this->getCirjud();
				break;
			case 13:
				return $this->getRegmer();
				break;
			case 14:
				return $this->getTomreg();
				break;
			case 15:
				return $this->getFolreg();
				break;
			case 16:
				return $this->getCapsus();
				break;
			case 17:
				return $this->getCappag();
				break;
			case 18:
				return $this->getRifrepleg();
				break;
			case 19:
				return $this->getNomrepleg();
				break;
			case 20:
				return $this->getDirrepleg();
				break;
			case 21:
				return $this->getTelrepleg();
				break;
			case 22:
				return $this->getEmailrepleg();
				break;
			case 23:
				return $this->getRifpercon();
				break;
			case 24:
				return $this->getNompercon();
				break;
			case 25:
				return $this->getDirpercon();
				break;
			case 26:
				return $this->getTelpercon();
				break;
			case 27:
				return $this->getEmailpercon();
				break;
			case 28:
				return $this->getFecvenreg();
				break;
			case 29:
				return $this->getCodgruprec();
				break;
			case 30:
				return $this->getCtaconasoc();
				break;
			case 31:
				return $this->getCtaordasoc();
				break;
			case 32:
				return $this->getCtaperasoc();
				break;
			case 33:
				return $this->getCtaordart();
				break;
			case 34:
				return $this->getCtaperart();
				break;
			case 35:
				return $this->getCtaordcont();
				break;
			case 36:
				return $this->getCtapercont();
				break;
			case 37:
				return $this->getNacpro();
				break;
			case 38:
				return $this->getActprof();
				break;
			case 39:
				return $this->getCodtipemp();
				break;
			case 40:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InclientePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcli(),
			$keys[1] => $this->getNomcli(),
			$keys[2] => $this->getRifcli(),
			$keys[3] => $this->getDircli(),
			$keys[4] => $this->getTelcli(),
			$keys[5] => $this->getFaxcli(),
			$keys[6] => $this->getEmail(),
			$keys[7] => $this->getLimcre(),
			$keys[8] => $this->getCodctacon(),
			$keys[9] => $this->getCodctaord(),
			$keys[10] => $this->getCodctaper(),
			$keys[11] => $this->getFecreg(),
			$keys[12] => $this->getCirjud(),
			$keys[13] => $this->getRegmer(),
			$keys[14] => $this->getTomreg(),
			$keys[15] => $this->getFolreg(),
			$keys[16] => $this->getCapsus(),
			$keys[17] => $this->getCappag(),
			$keys[18] => $this->getRifrepleg(),
			$keys[19] => $this->getNomrepleg(),
			$keys[20] => $this->getDirrepleg(),
			$keys[21] => $this->getTelrepleg(),
			$keys[22] => $this->getEmailrepleg(),
			$keys[23] => $this->getRifpercon(),
			$keys[24] => $this->getNompercon(),
			$keys[25] => $this->getDirpercon(),
			$keys[26] => $this->getTelpercon(),
			$keys[27] => $this->getEmailpercon(),
			$keys[28] => $this->getFecvenreg(),
			$keys[29] => $this->getCodgruprec(),
			$keys[30] => $this->getCtaconasoc(),
			$keys[31] => $this->getCtaordasoc(),
			$keys[32] => $this->getCtaperasoc(),
			$keys[33] => $this->getCtaordart(),
			$keys[34] => $this->getCtaperart(),
			$keys[35] => $this->getCtaordcont(),
			$keys[36] => $this->getCtapercont(),
			$keys[37] => $this->getNacpro(),
			$keys[38] => $this->getActprof(),
			$keys[39] => $this->getCodtipemp(),
			$keys[40] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InclientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcli($value);
				break;
			case 1:
				$this->setNomcli($value);
				break;
			case 2:
				$this->setRifcli($value);
				break;
			case 3:
				$this->setDircli($value);
				break;
			case 4:
				$this->setTelcli($value);
				break;
			case 5:
				$this->setFaxcli($value);
				break;
			case 6:
				$this->setEmail($value);
				break;
			case 7:
				$this->setLimcre($value);
				break;
			case 8:
				$this->setCodctacon($value);
				break;
			case 9:
				$this->setCodctaord($value);
				break;
			case 10:
				$this->setCodctaper($value);
				break;
			case 11:
				$this->setFecreg($value);
				break;
			case 12:
				$this->setCirjud($value);
				break;
			case 13:
				$this->setRegmer($value);
				break;
			case 14:
				$this->setTomreg($value);
				break;
			case 15:
				$this->setFolreg($value);
				break;
			case 16:
				$this->setCapsus($value);
				break;
			case 17:
				$this->setCappag($value);
				break;
			case 18:
				$this->setRifrepleg($value);
				break;
			case 19:
				$this->setNomrepleg($value);
				break;
			case 20:
				$this->setDirrepleg($value);
				break;
			case 21:
				$this->setTelrepleg($value);
				break;
			case 22:
				$this->setEmailrepleg($value);
				break;
			case 23:
				$this->setRifpercon($value);
				break;
			case 24:
				$this->setNompercon($value);
				break;
			case 25:
				$this->setDirpercon($value);
				break;
			case 26:
				$this->setTelpercon($value);
				break;
			case 27:
				$this->setEmailpercon($value);
				break;
			case 28:
				$this->setFecvenreg($value);
				break;
			case 29:
				$this->setCodgruprec($value);
				break;
			case 30:
				$this->setCtaconasoc($value);
				break;
			case 31:
				$this->setCtaordasoc($value);
				break;
			case 32:
				$this->setCtaperasoc($value);
				break;
			case 33:
				$this->setCtaordart($value);
				break;
			case 34:
				$this->setCtaperart($value);
				break;
			case 35:
				$this->setCtaordcont($value);
				break;
			case 36:
				$this->setCtapercont($value);
				break;
			case 37:
				$this->setNacpro($value);
				break;
			case 38:
				$this->setActprof($value);
				break;
			case 39:
				$this->setCodtipemp($value);
				break;
			case 40:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InclientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcli($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDircli($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelcli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFaxcli($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLimcre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodctacon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodctaord($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodctaper($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecreg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCirjud($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRegmer($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTomreg($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFolreg($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCapsus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCappag($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRifrepleg($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomrepleg($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirrepleg($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setTelrepleg($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setEmailrepleg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setRifpercon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNompercon($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDirpercon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTelpercon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setEmailpercon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecvenreg($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodgruprec($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCtaconasoc($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCtaordasoc($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCtaperasoc($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCtaordart($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCtaperart($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCtaordcont($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCtapercont($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setNacpro($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setActprof($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCodtipemp($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setId($arr[$keys[40]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InclientePeer::DATABASE_NAME);

		if ($this->isColumnModified(InclientePeer::CODCLI)) $criteria->add(InclientePeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(InclientePeer::NOMCLI)) $criteria->add(InclientePeer::NOMCLI, $this->nomcli);
		if ($this->isColumnModified(InclientePeer::RIFCLI)) $criteria->add(InclientePeer::RIFCLI, $this->rifcli);
		if ($this->isColumnModified(InclientePeer::DIRCLI)) $criteria->add(InclientePeer::DIRCLI, $this->dircli);
		if ($this->isColumnModified(InclientePeer::TELCLI)) $criteria->add(InclientePeer::TELCLI, $this->telcli);
		if ($this->isColumnModified(InclientePeer::FAXCLI)) $criteria->add(InclientePeer::FAXCLI, $this->faxcli);
		if ($this->isColumnModified(InclientePeer::EMAIL)) $criteria->add(InclientePeer::EMAIL, $this->email);
		if ($this->isColumnModified(InclientePeer::LIMCRE)) $criteria->add(InclientePeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(InclientePeer::CODCTACON)) $criteria->add(InclientePeer::CODCTACON, $this->codctacon);
		if ($this->isColumnModified(InclientePeer::CODCTAORD)) $criteria->add(InclientePeer::CODCTAORD, $this->codctaord);
		if ($this->isColumnModified(InclientePeer::CODCTAPER)) $criteria->add(InclientePeer::CODCTAPER, $this->codctaper);
		if ($this->isColumnModified(InclientePeer::FECREG)) $criteria->add(InclientePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(InclientePeer::CIRJUD)) $criteria->add(InclientePeer::CIRJUD, $this->cirjud);
		if ($this->isColumnModified(InclientePeer::REGMER)) $criteria->add(InclientePeer::REGMER, $this->regmer);
		if ($this->isColumnModified(InclientePeer::TOMREG)) $criteria->add(InclientePeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(InclientePeer::FOLREG)) $criteria->add(InclientePeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(InclientePeer::CAPSUS)) $criteria->add(InclientePeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(InclientePeer::CAPPAG)) $criteria->add(InclientePeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(InclientePeer::RIFREPLEG)) $criteria->add(InclientePeer::RIFREPLEG, $this->rifrepleg);
		if ($this->isColumnModified(InclientePeer::NOMREPLEG)) $criteria->add(InclientePeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(InclientePeer::DIRREPLEG)) $criteria->add(InclientePeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(InclientePeer::TELREPLEG)) $criteria->add(InclientePeer::TELREPLEG, $this->telrepleg);
		if ($this->isColumnModified(InclientePeer::EMAILREPLEG)) $criteria->add(InclientePeer::EMAILREPLEG, $this->emailrepleg);
		if ($this->isColumnModified(InclientePeer::RIFPERCON)) $criteria->add(InclientePeer::RIFPERCON, $this->rifpercon);
		if ($this->isColumnModified(InclientePeer::NOMPERCON)) $criteria->add(InclientePeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(InclientePeer::DIRPERCON)) $criteria->add(InclientePeer::DIRPERCON, $this->dirpercon);
		if ($this->isColumnModified(InclientePeer::TELPERCON)) $criteria->add(InclientePeer::TELPERCON, $this->telpercon);
		if ($this->isColumnModified(InclientePeer::EMAILPERCON)) $criteria->add(InclientePeer::EMAILPERCON, $this->emailpercon);
		if ($this->isColumnModified(InclientePeer::FECVENREG)) $criteria->add(InclientePeer::FECVENREG, $this->fecvenreg);
		if ($this->isColumnModified(InclientePeer::CODGRUPREC)) $criteria->add(InclientePeer::CODGRUPREC, $this->codgruprec);
		if ($this->isColumnModified(InclientePeer::CTACONASOC)) $criteria->add(InclientePeer::CTACONASOC, $this->ctaconasoc);
		if ($this->isColumnModified(InclientePeer::CTAORDASOC)) $criteria->add(InclientePeer::CTAORDASOC, $this->ctaordasoc);
		if ($this->isColumnModified(InclientePeer::CTAPERASOC)) $criteria->add(InclientePeer::CTAPERASOC, $this->ctaperasoc);
		if ($this->isColumnModified(InclientePeer::CTAORDART)) $criteria->add(InclientePeer::CTAORDART, $this->ctaordart);
		if ($this->isColumnModified(InclientePeer::CTAPERART)) $criteria->add(InclientePeer::CTAPERART, $this->ctaperart);
		if ($this->isColumnModified(InclientePeer::CTAORDCONT)) $criteria->add(InclientePeer::CTAORDCONT, $this->ctaordcont);
		if ($this->isColumnModified(InclientePeer::CTAPERCONT)) $criteria->add(InclientePeer::CTAPERCONT, $this->ctapercont);
		if ($this->isColumnModified(InclientePeer::NACPRO)) $criteria->add(InclientePeer::NACPRO, $this->nacpro);
		if ($this->isColumnModified(InclientePeer::ACTPROF)) $criteria->add(InclientePeer::ACTPROF, $this->actprof);
		if ($this->isColumnModified(InclientePeer::CODTIPEMP)) $criteria->add(InclientePeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(InclientePeer::ID)) $criteria->add(InclientePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InclientePeer::DATABASE_NAME);

		$criteria->add(InclientePeer::ID, $this->id);

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

		$copyObj->setCodcli($this->codcli);

		$copyObj->setNomcli($this->nomcli);

		$copyObj->setRifcli($this->rifcli);

		$copyObj->setDircli($this->dircli);

		$copyObj->setTelcli($this->telcli);

		$copyObj->setFaxcli($this->faxcli);

		$copyObj->setEmail($this->email);

		$copyObj->setLimcre($this->limcre);

		$copyObj->setCodctacon($this->codctacon);

		$copyObj->setCodctaord($this->codctaord);

		$copyObj->setCodctaper($this->codctaper);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setCirjud($this->cirjud);

		$copyObj->setRegmer($this->regmer);

		$copyObj->setTomreg($this->tomreg);

		$copyObj->setFolreg($this->folreg);

		$copyObj->setCapsus($this->capsus);

		$copyObj->setCappag($this->cappag);

		$copyObj->setRifrepleg($this->rifrepleg);

		$copyObj->setNomrepleg($this->nomrepleg);

		$copyObj->setDirrepleg($this->dirrepleg);

		$copyObj->setTelrepleg($this->telrepleg);

		$copyObj->setEmailrepleg($this->emailrepleg);

		$copyObj->setRifpercon($this->rifpercon);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setDirpercon($this->dirpercon);

		$copyObj->setTelpercon($this->telpercon);

		$copyObj->setEmailpercon($this->emailpercon);

		$copyObj->setFecvenreg($this->fecvenreg);

		$copyObj->setCodgruprec($this->codgruprec);

		$copyObj->setCtaconasoc($this->ctaconasoc);

		$copyObj->setCtaordasoc($this->ctaordasoc);

		$copyObj->setCtaperasoc($this->ctaperasoc);

		$copyObj->setCtaordart($this->ctaordart);

		$copyObj->setCtaperart($this->ctaperart);

		$copyObj->setCtaordcont($this->ctaordcont);

		$copyObj->setCtapercont($this->ctapercont);

		$copyObj->setNacpro($this->nacpro);

		$copyObj->setActprof($this->actprof);

		$copyObj->setCodtipemp($this->codtipemp);


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
			self::$peer = new InclientePeer();
		}
		return self::$peer;
	}

} 