<?php


abstract class BaseFcconrepres1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedcon;


	
	protected $rifcon;


	
	protected $nomcon;


	
	protected $repcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $emacon;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $nitcon;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $ciucon;


	
	protected $cpocon;


	
	protected $apocon;


	
	protected $urlcon;


	
	protected $naccon;


	
	protected $tipcon;


	
	protected $faxcon;


	
	protected $clacon;


	
	protected $fecdescon;


	
	protected $fecactcon;


	
	protected $stacon;


	
	protected $origen;


	
	protected $nomneg;


	
	protected $reccon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedcon()
  {

    return trim($this->cedcon);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getRepcon()
  {

    return trim($this->repcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getEmacon()
  {

    return trim($this->emacon);

  }
  
  public function getCodsec()
  {

    return trim($this->codsec);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getNitcon()
  {

    return trim($this->nitcon);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCiucon()
  {

    return trim($this->ciucon);

  }
  
  public function getCpocon()
  {

    return trim($this->cpocon);

  }
  
  public function getApocon()
  {

    return trim($this->apocon);

  }
  
  public function getUrlcon()
  {

    return trim($this->urlcon);

  }
  
  public function getNaccon()
  {

    return trim($this->naccon);

  }
  
  public function getTipcon()
  {

    return trim($this->tipcon);

  }
  
  public function getFaxcon()
  {

    return trim($this->faxcon);

  }
  
  public function getClacon()
  {

    return trim($this->clacon);

  }
  
  public function getFecdescon($format = 'Y-m-d')
  {

    if ($this->fecdescon === null || $this->fecdescon === '') {
      return null;
    } elseif (!is_int($this->fecdescon)) {
            $ts = adodb_strtotime($this->fecdescon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdescon] as date/time value: " . var_export($this->fecdescon, true));
      }
    } else {
      $ts = $this->fecdescon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecactcon($format = 'Y-m-d')
  {

    if ($this->fecactcon === null || $this->fecactcon === '') {
      return null;
    } elseif (!is_int($this->fecactcon)) {
            $ts = adodb_strtotime($this->fecactcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecactcon] as date/time value: " . var_export($this->fecactcon, true));
      }
    } else {
      $ts = $this->fecactcon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getOrigen()
  {

    return trim($this->origen);

  }
  
  public function getNomneg()
  {

    return trim($this->nomneg);

  }
  
  public function getReccon()
  {

    return trim($this->reccon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedcon($v)
	{

    if ($this->cedcon !== $v) {
        $this->cedcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CEDCON;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::RIFCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::NOMCON;
      }
  
	} 
	
	public function setRepcon($v)
	{

    if ($this->repcon !== $v) {
        $this->repcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::REPCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::DIRCON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::TELCON;
      }
  
	} 
	
	public function setEmacon($v)
	{

    if ($this->emacon !== $v) {
        $this->emacon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::EMACON;
      }
  
	} 
	
	public function setCodsec($v)
	{

    if ($this->codsec !== $v) {
        $this->codsec = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CODSEC;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CODPAR;
      }
  
	} 
	
	public function setNitcon($v)
	{

    if ($this->nitcon !== $v) {
        $this->nitcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::NITCON;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CODMUN;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CODPAI;
      }
  
	} 
	
	public function setCiucon($v)
	{

    if ($this->ciucon !== $v) {
        $this->ciucon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CIUCON;
      }
  
	} 
	
	public function setCpocon($v)
	{

    if ($this->cpocon !== $v) {
        $this->cpocon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CPOCON;
      }
  
	} 
	
	public function setApocon($v)
	{

    if ($this->apocon !== $v) {
        $this->apocon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::APOCON;
      }
  
	} 
	
	public function setUrlcon($v)
	{

    if ($this->urlcon !== $v) {
        $this->urlcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::URLCON;
      }
  
	} 
	
	public function setNaccon($v)
	{

    if ($this->naccon !== $v) {
        $this->naccon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::NACCON;
      }
  
	} 
	
	public function setTipcon($v)
	{

    if ($this->tipcon !== $v) {
        $this->tipcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::TIPCON;
      }
  
	} 
	
	public function setFaxcon($v)
	{

    if ($this->faxcon !== $v) {
        $this->faxcon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::FAXCON;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::CLACON;
      }
  
	} 
	
	public function setFecdescon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdescon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdescon !== $ts) {
      $this->fecdescon = $ts;
      $this->modifiedColumns[] = Fcconrepres1Peer::FECDESCON;
    }

	} 
	
	public function setFecactcon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecactcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecactcon !== $ts) {
      $this->fecactcon = $ts;
      $this->modifiedColumns[] = Fcconrepres1Peer::FECACTCON;
    }

	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::STACON;
      }
  
	} 
	
	public function setOrigen($v)
	{

    if ($this->origen !== $v) {
        $this->origen = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::ORIGEN;
      }
  
	} 
	
	public function setNomneg($v)
	{

    if ($this->nomneg !== $v) {
        $this->nomneg = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::NOMNEG;
      }
  
	} 
	
	public function setReccon($v)
	{

    if ($this->reccon !== $v) {
        $this->reccon = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::RECCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Fcconrepres1Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedcon = $rs->getString($startcol + 0);

      $this->rifcon = $rs->getString($startcol + 1);

      $this->nomcon = $rs->getString($startcol + 2);

      $this->repcon = $rs->getString($startcol + 3);

      $this->dircon = $rs->getString($startcol + 4);

      $this->telcon = $rs->getString($startcol + 5);

      $this->emacon = $rs->getString($startcol + 6);

      $this->codsec = $rs->getString($startcol + 7);

      $this->codpar = $rs->getString($startcol + 8);

      $this->nitcon = $rs->getString($startcol + 9);

      $this->codmun = $rs->getString($startcol + 10);

      $this->codedo = $rs->getString($startcol + 11);

      $this->codpai = $rs->getString($startcol + 12);

      $this->ciucon = $rs->getString($startcol + 13);

      $this->cpocon = $rs->getString($startcol + 14);

      $this->apocon = $rs->getString($startcol + 15);

      $this->urlcon = $rs->getString($startcol + 16);

      $this->naccon = $rs->getString($startcol + 17);

      $this->tipcon = $rs->getString($startcol + 18);

      $this->faxcon = $rs->getString($startcol + 19);

      $this->clacon = $rs->getString($startcol + 20);

      $this->fecdescon = $rs->getDate($startcol + 21, null);

      $this->fecactcon = $rs->getDate($startcol + 22, null);

      $this->stacon = $rs->getString($startcol + 23);

      $this->origen = $rs->getString($startcol + 24);

      $this->nomneg = $rs->getString($startcol + 25);

      $this->reccon = $rs->getString($startcol + 26);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcconrepres1 object", $e);
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
			$con = Propel::getConnection(Fcconrepres1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcconrepres1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcconrepres1Peer::DATABASE_NAME);
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
					$pk = Fcconrepres1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Fcconrepres1Peer::doUpdate($this, $con);
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


			if (($retval = Fcconrepres1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcconrepres1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedcon();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getRepcon();
				break;
			case 4:
				return $this->getDircon();
				break;
			case 5:
				return $this->getTelcon();
				break;
			case 6:
				return $this->getEmacon();
				break;
			case 7:
				return $this->getCodsec();
				break;
			case 8:
				return $this->getCodpar();
				break;
			case 9:
				return $this->getNitcon();
				break;
			case 10:
				return $this->getCodmun();
				break;
			case 11:
				return $this->getCodedo();
				break;
			case 12:
				return $this->getCodpai();
				break;
			case 13:
				return $this->getCiucon();
				break;
			case 14:
				return $this->getCpocon();
				break;
			case 15:
				return $this->getApocon();
				break;
			case 16:
				return $this->getUrlcon();
				break;
			case 17:
				return $this->getNaccon();
				break;
			case 18:
				return $this->getTipcon();
				break;
			case 19:
				return $this->getFaxcon();
				break;
			case 20:
				return $this->getClacon();
				break;
			case 21:
				return $this->getFecdescon();
				break;
			case 22:
				return $this->getFecactcon();
				break;
			case 23:
				return $this->getStacon();
				break;
			case 24:
				return $this->getOrigen();
				break;
			case 25:
				return $this->getNomneg();
				break;
			case 26:
				return $this->getReccon();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcconrepres1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedcon(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getRepcon(),
			$keys[4] => $this->getDircon(),
			$keys[5] => $this->getTelcon(),
			$keys[6] => $this->getEmacon(),
			$keys[7] => $this->getCodsec(),
			$keys[8] => $this->getCodpar(),
			$keys[9] => $this->getNitcon(),
			$keys[10] => $this->getCodmun(),
			$keys[11] => $this->getCodedo(),
			$keys[12] => $this->getCodpai(),
			$keys[13] => $this->getCiucon(),
			$keys[14] => $this->getCpocon(),
			$keys[15] => $this->getApocon(),
			$keys[16] => $this->getUrlcon(),
			$keys[17] => $this->getNaccon(),
			$keys[18] => $this->getTipcon(),
			$keys[19] => $this->getFaxcon(),
			$keys[20] => $this->getClacon(),
			$keys[21] => $this->getFecdescon(),
			$keys[22] => $this->getFecactcon(),
			$keys[23] => $this->getStacon(),
			$keys[24] => $this->getOrigen(),
			$keys[25] => $this->getNomneg(),
			$keys[26] => $this->getReccon(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcconrepres1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedcon($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setRepcon($value);
				break;
			case 4:
				$this->setDircon($value);
				break;
			case 5:
				$this->setTelcon($value);
				break;
			case 6:
				$this->setEmacon($value);
				break;
			case 7:
				$this->setCodsec($value);
				break;
			case 8:
				$this->setCodpar($value);
				break;
			case 9:
				$this->setNitcon($value);
				break;
			case 10:
				$this->setCodmun($value);
				break;
			case 11:
				$this->setCodedo($value);
				break;
			case 12:
				$this->setCodpai($value);
				break;
			case 13:
				$this->setCiucon($value);
				break;
			case 14:
				$this->setCpocon($value);
				break;
			case 15:
				$this->setApocon($value);
				break;
			case 16:
				$this->setUrlcon($value);
				break;
			case 17:
				$this->setNaccon($value);
				break;
			case 18:
				$this->setTipcon($value);
				break;
			case 19:
				$this->setFaxcon($value);
				break;
			case 20:
				$this->setClacon($value);
				break;
			case 21:
				$this->setFecdescon($value);
				break;
			case 22:
				$this->setFecactcon($value);
				break;
			case 23:
				$this->setStacon($value);
				break;
			case 24:
				$this->setOrigen($value);
				break;
			case 25:
				$this->setNomneg($value);
				break;
			case 26:
				$this->setReccon($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcconrepres1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDircon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmacon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodsec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNitcon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodmun($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodedo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpai($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCiucon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCpocon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setApocon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUrlcon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNaccon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipcon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFaxcon($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setClacon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecdescon($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecactcon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStacon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setOrigen($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNomneg($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setReccon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcconrepres1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcconrepres1Peer::CEDCON)) $criteria->add(Fcconrepres1Peer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(Fcconrepres1Peer::RIFCON)) $criteria->add(Fcconrepres1Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcconrepres1Peer::NOMCON)) $criteria->add(Fcconrepres1Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcconrepres1Peer::REPCON)) $criteria->add(Fcconrepres1Peer::REPCON, $this->repcon);
		if ($this->isColumnModified(Fcconrepres1Peer::DIRCON)) $criteria->add(Fcconrepres1Peer::DIRCON, $this->dircon);
		if ($this->isColumnModified(Fcconrepres1Peer::TELCON)) $criteria->add(Fcconrepres1Peer::TELCON, $this->telcon);
		if ($this->isColumnModified(Fcconrepres1Peer::EMACON)) $criteria->add(Fcconrepres1Peer::EMACON, $this->emacon);
		if ($this->isColumnModified(Fcconrepres1Peer::CODSEC)) $criteria->add(Fcconrepres1Peer::CODSEC, $this->codsec);
		if ($this->isColumnModified(Fcconrepres1Peer::CODPAR)) $criteria->add(Fcconrepres1Peer::CODPAR, $this->codpar);
		if ($this->isColumnModified(Fcconrepres1Peer::NITCON)) $criteria->add(Fcconrepres1Peer::NITCON, $this->nitcon);
		if ($this->isColumnModified(Fcconrepres1Peer::CODMUN)) $criteria->add(Fcconrepres1Peer::CODMUN, $this->codmun);
		if ($this->isColumnModified(Fcconrepres1Peer::CODEDO)) $criteria->add(Fcconrepres1Peer::CODEDO, $this->codedo);
		if ($this->isColumnModified(Fcconrepres1Peer::CODPAI)) $criteria->add(Fcconrepres1Peer::CODPAI, $this->codpai);
		if ($this->isColumnModified(Fcconrepres1Peer::CIUCON)) $criteria->add(Fcconrepres1Peer::CIUCON, $this->ciucon);
		if ($this->isColumnModified(Fcconrepres1Peer::CPOCON)) $criteria->add(Fcconrepres1Peer::CPOCON, $this->cpocon);
		if ($this->isColumnModified(Fcconrepres1Peer::APOCON)) $criteria->add(Fcconrepres1Peer::APOCON, $this->apocon);
		if ($this->isColumnModified(Fcconrepres1Peer::URLCON)) $criteria->add(Fcconrepres1Peer::URLCON, $this->urlcon);
		if ($this->isColumnModified(Fcconrepres1Peer::NACCON)) $criteria->add(Fcconrepres1Peer::NACCON, $this->naccon);
		if ($this->isColumnModified(Fcconrepres1Peer::TIPCON)) $criteria->add(Fcconrepres1Peer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(Fcconrepres1Peer::FAXCON)) $criteria->add(Fcconrepres1Peer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(Fcconrepres1Peer::CLACON)) $criteria->add(Fcconrepres1Peer::CLACON, $this->clacon);
		if ($this->isColumnModified(Fcconrepres1Peer::FECDESCON)) $criteria->add(Fcconrepres1Peer::FECDESCON, $this->fecdescon);
		if ($this->isColumnModified(Fcconrepres1Peer::FECACTCON)) $criteria->add(Fcconrepres1Peer::FECACTCON, $this->fecactcon);
		if ($this->isColumnModified(Fcconrepres1Peer::STACON)) $criteria->add(Fcconrepres1Peer::STACON, $this->stacon);
		if ($this->isColumnModified(Fcconrepres1Peer::ORIGEN)) $criteria->add(Fcconrepres1Peer::ORIGEN, $this->origen);
		if ($this->isColumnModified(Fcconrepres1Peer::NOMNEG)) $criteria->add(Fcconrepres1Peer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(Fcconrepres1Peer::RECCON)) $criteria->add(Fcconrepres1Peer::RECCON, $this->reccon);
		if ($this->isColumnModified(Fcconrepres1Peer::ID)) $criteria->add(Fcconrepres1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcconrepres1Peer::DATABASE_NAME);

		$criteria->add(Fcconrepres1Peer::ID, $this->id);

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

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setRepcon($this->repcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNitcon($this->nitcon);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCiucon($this->ciucon);

		$copyObj->setCpocon($this->cpocon);

		$copyObj->setApocon($this->apocon);

		$copyObj->setUrlcon($this->urlcon);

		$copyObj->setNaccon($this->naccon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setFecdescon($this->fecdescon);

		$copyObj->setFecactcon($this->fecactcon);

		$copyObj->setStacon($this->stacon);

		$copyObj->setOrigen($this->origen);

		$copyObj->setNomneg($this->nomneg);

		$copyObj->setReccon($this->reccon);


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
			self::$peer = new Fcconrepres1Peer();
		}
		return self::$peer;
	}

} 