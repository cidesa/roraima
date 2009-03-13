<?php


abstract class BaseBnregsem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codsem;


	
	protected $dessem;


	
	protected $codpro;


	
	protected $codubi;


	
	protected $ordcom;


	
	protected $fecreg;


	
	protected $feccom;


	
	protected $fecexp;


	
	protected $ordrcp;


	
	protected $fotsem;


	
	protected $sexsem;


	
	protected $razsem;


	
	protected $edasem;


	
	protected $hersem;


	
	protected $obssem;


	
	protected $viduti;


	
	protected $mesdep;


	
	protected $valini;


	
	protected $valres;


	
	protected $vallib;


	
	protected $valrex;


	
	protected $cosrep;


	
	protected $depmen;


	
	protected $depacu;


	
	protected $stasem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodsem()
  {

    return trim($this->codsem);

  }
  
  public function getDessem()
  {

    return trim($this->dessem);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getOrdcom()
  {

    return trim($this->ordcom);

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

  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecexp($format = 'Y-m-d')
  {

    if ($this->fecexp === null || $this->fecexp === '') {
      return null;
    } elseif (!is_int($this->fecexp)) {
            $ts = adodb_strtotime($this->fecexp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecexp] as date/time value: " . var_export($this->fecexp, true));
      }
    } else {
      $ts = $this->fecexp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getOrdrcp()
  {

    return trim($this->ordrcp);

  }
  
  public function getFotsem()
  {

    return trim($this->fotsem);

  }
  
  public function getSexsem()
  {

    return trim($this->sexsem);

  }
  
  public function getRazsem()
  {

    return trim($this->razsem);

  }
  
  public function getEdasem()
  {

    return trim($this->edasem);

  }
  
  public function getHersem()
  {

    return trim($this->hersem);

  }
  
  public function getObssem()
  {

    return trim($this->obssem);

  }
  
  public function getViduti()
  {

    return trim($this->viduti);

  }
  
  public function getMesdep($val=false)
  {

    if($val) return number_format($this->mesdep,2,',','.');
    else return $this->mesdep;

  }
  
  public function getValini($val=false)
  {

    if($val) return number_format($this->valini,2,',','.');
    else return $this->valini;

  }
  
  public function getValres($val=false)
  {

    if($val) return number_format($this->valres,2,',','.');
    else return $this->valres;

  }
  
  public function getVallib($val=false)
  {

    if($val) return number_format($this->vallib,2,',','.');
    else return $this->vallib;

  }
  
  public function getValrex($val=false)
  {

    if($val) return number_format($this->valrex,2,',','.');
    else return $this->valrex;

  }
  
  public function getCosrep($val=false)
  {

    if($val) return number_format($this->cosrep,2,',','.');
    else return $this->cosrep;

  }
  
  public function getDepmen($val=false)
  {

    if($val) return number_format($this->depmen,2,',','.');
    else return $this->depmen;

  }
  
  public function getDepacu($val=false)
  {

    if($val) return number_format($this->depacu,2,',','.');
    else return $this->depacu;

  }
  
  public function getStasem()
  {

    return trim($this->stasem);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BnregsemPeer::CODACT;
      }
  
	} 
	
	public function setCodsem($v)
	{

    if ($this->codsem !== $v) {
        $this->codsem = $v;
        $this->modifiedColumns[] = BnregsemPeer::CODSEM;
      }
  
	} 
	
	public function setDessem($v)
	{

    if ($this->dessem !== $v) {
        $this->dessem = $v;
        $this->modifiedColumns[] = BnregsemPeer::DESSEM;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = BnregsemPeer::CODPRO;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = BnregsemPeer::CODUBI;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = BnregsemPeer::ORDCOM;
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
      $this->modifiedColumns[] = BnregsemPeer::FECREG;
    }

	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = BnregsemPeer::FECCOM;
    }

	} 
	
	public function setFecexp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecexp !== $ts) {
      $this->fecexp = $ts;
      $this->modifiedColumns[] = BnregsemPeer::FECEXP;
    }

	} 
	
	public function setOrdrcp($v)
	{

    if ($this->ordrcp !== $v) {
        $this->ordrcp = $v;
        $this->modifiedColumns[] = BnregsemPeer::ORDRCP;
      }
  
	} 
	
	public function setFotsem($v)
	{

    if ($this->fotsem !== $v) {
        $this->fotsem = $v;
        $this->modifiedColumns[] = BnregsemPeer::FOTSEM;
      }
  
	} 
	
	public function setSexsem($v)
	{

    if ($this->sexsem !== $v) {
        $this->sexsem = $v;
        $this->modifiedColumns[] = BnregsemPeer::SEXSEM;
      }
  
	} 
	
	public function setRazsem($v)
	{

    if ($this->razsem !== $v) {
        $this->razsem = $v;
        $this->modifiedColumns[] = BnregsemPeer::RAZSEM;
      }
  
	} 
	
	public function setEdasem($v)
	{

    if ($this->edasem !== $v) {
        $this->edasem = $v;
        $this->modifiedColumns[] = BnregsemPeer::EDASEM;
      }
  
	} 
	
	public function setHersem($v)
	{

    if ($this->hersem !== $v) {
        $this->hersem = $v;
        $this->modifiedColumns[] = BnregsemPeer::HERSEM;
      }
  
	} 
	
	public function setObssem($v)
	{

    if ($this->obssem !== $v) {
        $this->obssem = $v;
        $this->modifiedColumns[] = BnregsemPeer::OBSSEM;
      }
  
	} 
	
	public function setViduti($v)
	{

    if ($this->viduti !== $v) {
        $this->viduti = $v;
        $this->modifiedColumns[] = BnregsemPeer::VIDUTI;
      }
  
	} 
	
	public function setMesdep($v)
	{

    if ($this->mesdep !== $v) {
        $this->mesdep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::MESDEP;
      }
  
	} 
	
	public function setValini($v)
	{

    if ($this->valini !== $v) {
        $this->valini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::VALINI;
      }
  
	} 
	
	public function setValres($v)
	{

    if ($this->valres !== $v) {
        $this->valres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::VALRES;
      }
  
	} 
	
	public function setVallib($v)
	{

    if ($this->vallib !== $v) {
        $this->vallib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::VALLIB;
      }
  
	} 
	
	public function setValrex($v)
	{

    if ($this->valrex !== $v) {
        $this->valrex = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::VALREX;
      }
  
	} 
	
	public function setCosrep($v)
	{

    if ($this->cosrep !== $v) {
        $this->cosrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::COSREP;
      }
  
	} 
	
	public function setDepmen($v)
	{

    if ($this->depmen !== $v) {
        $this->depmen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::DEPMEN;
      }
  
	} 
	
	public function setDepacu($v)
	{

    if ($this->depacu !== $v) {
        $this->depacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregsemPeer::DEPACU;
      }
  
	} 
	
	public function setStasem($v)
	{

    if ($this->stasem !== $v) {
        $this->stasem = $v;
        $this->modifiedColumns[] = BnregsemPeer::STASEM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnregsemPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codsem = $rs->getString($startcol + 1);

      $this->dessem = $rs->getString($startcol + 2);

      $this->codpro = $rs->getString($startcol + 3);

      $this->codubi = $rs->getString($startcol + 4);

      $this->ordcom = $rs->getString($startcol + 5);

      $this->fecreg = $rs->getDate($startcol + 6, null);

      $this->feccom = $rs->getDate($startcol + 7, null);

      $this->fecexp = $rs->getDate($startcol + 8, null);

      $this->ordrcp = $rs->getString($startcol + 9);

      $this->fotsem = $rs->getString($startcol + 10);

      $this->sexsem = $rs->getString($startcol + 11);

      $this->razsem = $rs->getString($startcol + 12);

      $this->edasem = $rs->getString($startcol + 13);

      $this->hersem = $rs->getString($startcol + 14);

      $this->obssem = $rs->getString($startcol + 15);

      $this->viduti = $rs->getString($startcol + 16);

      $this->mesdep = $rs->getFloat($startcol + 17);

      $this->valini = $rs->getFloat($startcol + 18);

      $this->valres = $rs->getFloat($startcol + 19);

      $this->vallib = $rs->getFloat($startcol + 20);

      $this->valrex = $rs->getFloat($startcol + 21);

      $this->cosrep = $rs->getFloat($startcol + 22);

      $this->depmen = $rs->getFloat($startcol + 23);

      $this->depacu = $rs->getFloat($startcol + 24);

      $this->stasem = $rs->getString($startcol + 25);

      $this->id = $rs->getInt($startcol + 26);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 27; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnregsem object", $e);
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
			$con = Propel::getConnection(BnregsemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnregsemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnregsemPeer::DATABASE_NAME);
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
					$pk = BnregsemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnregsemPeer::doUpdate($this, $con);
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


			if (($retval = BnregsemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregsemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodsem();
				break;
			case 2:
				return $this->getDessem();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getCodubi();
				break;
			case 5:
				return $this->getOrdcom();
				break;
			case 6:
				return $this->getFecreg();
				break;
			case 7:
				return $this->getFeccom();
				break;
			case 8:
				return $this->getFecexp();
				break;
			case 9:
				return $this->getOrdrcp();
				break;
			case 10:
				return $this->getFotsem();
				break;
			case 11:
				return $this->getSexsem();
				break;
			case 12:
				return $this->getRazsem();
				break;
			case 13:
				return $this->getEdasem();
				break;
			case 14:
				return $this->getHersem();
				break;
			case 15:
				return $this->getObssem();
				break;
			case 16:
				return $this->getViduti();
				break;
			case 17:
				return $this->getMesdep();
				break;
			case 18:
				return $this->getValini();
				break;
			case 19:
				return $this->getValres();
				break;
			case 20:
				return $this->getVallib();
				break;
			case 21:
				return $this->getValrex();
				break;
			case 22:
				return $this->getCosrep();
				break;
			case 23:
				return $this->getDepmen();
				break;
			case 24:
				return $this->getDepacu();
				break;
			case 25:
				return $this->getStasem();
				break;
			case 26:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregsemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodsem(),
			$keys[2] => $this->getDessem(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getCodubi(),
			$keys[5] => $this->getOrdcom(),
			$keys[6] => $this->getFecreg(),
			$keys[7] => $this->getFeccom(),
			$keys[8] => $this->getFecexp(),
			$keys[9] => $this->getOrdrcp(),
			$keys[10] => $this->getFotsem(),
			$keys[11] => $this->getSexsem(),
			$keys[12] => $this->getRazsem(),
			$keys[13] => $this->getEdasem(),
			$keys[14] => $this->getHersem(),
			$keys[15] => $this->getObssem(),
			$keys[16] => $this->getViduti(),
			$keys[17] => $this->getMesdep(),
			$keys[18] => $this->getValini(),
			$keys[19] => $this->getValres(),
			$keys[20] => $this->getVallib(),
			$keys[21] => $this->getValrex(),
			$keys[22] => $this->getCosrep(),
			$keys[23] => $this->getDepmen(),
			$keys[24] => $this->getDepacu(),
			$keys[25] => $this->getStasem(),
			$keys[26] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregsemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodsem($value);
				break;
			case 2:
				$this->setDessem($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setCodubi($value);
				break;
			case 5:
				$this->setOrdcom($value);
				break;
			case 6:
				$this->setFecreg($value);
				break;
			case 7:
				$this->setFeccom($value);
				break;
			case 8:
				$this->setFecexp($value);
				break;
			case 9:
				$this->setOrdrcp($value);
				break;
			case 10:
				$this->setFotsem($value);
				break;
			case 11:
				$this->setSexsem($value);
				break;
			case 12:
				$this->setRazsem($value);
				break;
			case 13:
				$this->setEdasem($value);
				break;
			case 14:
				$this->setHersem($value);
				break;
			case 15:
				$this->setObssem($value);
				break;
			case 16:
				$this->setViduti($value);
				break;
			case 17:
				$this->setMesdep($value);
				break;
			case 18:
				$this->setValini($value);
				break;
			case 19:
				$this->setValres($value);
				break;
			case 20:
				$this->setVallib($value);
				break;
			case 21:
				$this->setValrex($value);
				break;
			case 22:
				$this->setCosrep($value);
				break;
			case 23:
				$this->setDepmen($value);
				break;
			case 24:
				$this->setDepacu($value);
				break;
			case 25:
				$this->setStasem($value);
				break;
			case 26:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregsemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDessem($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodubi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrdcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecreg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecexp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOrdrcp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFotsem($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSexsem($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRazsem($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEdasem($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setHersem($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setObssem($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setViduti($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMesdep($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setValini($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setValres($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setVallib($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setValrex($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCosrep($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDepmen($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDepacu($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setStasem($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnregsemPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnregsemPeer::CODACT)) $criteria->add(BnregsemPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnregsemPeer::CODSEM)) $criteria->add(BnregsemPeer::CODSEM, $this->codsem);
		if ($this->isColumnModified(BnregsemPeer::DESSEM)) $criteria->add(BnregsemPeer::DESSEM, $this->dessem);
		if ($this->isColumnModified(BnregsemPeer::CODPRO)) $criteria->add(BnregsemPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(BnregsemPeer::CODUBI)) $criteria->add(BnregsemPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnregsemPeer::ORDCOM)) $criteria->add(BnregsemPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(BnregsemPeer::FECREG)) $criteria->add(BnregsemPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(BnregsemPeer::FECCOM)) $criteria->add(BnregsemPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(BnregsemPeer::FECEXP)) $criteria->add(BnregsemPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(BnregsemPeer::ORDRCP)) $criteria->add(BnregsemPeer::ORDRCP, $this->ordrcp);
		if ($this->isColumnModified(BnregsemPeer::FOTSEM)) $criteria->add(BnregsemPeer::FOTSEM, $this->fotsem);
		if ($this->isColumnModified(BnregsemPeer::SEXSEM)) $criteria->add(BnregsemPeer::SEXSEM, $this->sexsem);
		if ($this->isColumnModified(BnregsemPeer::RAZSEM)) $criteria->add(BnregsemPeer::RAZSEM, $this->razsem);
		if ($this->isColumnModified(BnregsemPeer::EDASEM)) $criteria->add(BnregsemPeer::EDASEM, $this->edasem);
		if ($this->isColumnModified(BnregsemPeer::HERSEM)) $criteria->add(BnregsemPeer::HERSEM, $this->hersem);
		if ($this->isColumnModified(BnregsemPeer::OBSSEM)) $criteria->add(BnregsemPeer::OBSSEM, $this->obssem);
		if ($this->isColumnModified(BnregsemPeer::VIDUTI)) $criteria->add(BnregsemPeer::VIDUTI, $this->viduti);
		if ($this->isColumnModified(BnregsemPeer::MESDEP)) $criteria->add(BnregsemPeer::MESDEP, $this->mesdep);
		if ($this->isColumnModified(BnregsemPeer::VALINI)) $criteria->add(BnregsemPeer::VALINI, $this->valini);
		if ($this->isColumnModified(BnregsemPeer::VALRES)) $criteria->add(BnregsemPeer::VALRES, $this->valres);
		if ($this->isColumnModified(BnregsemPeer::VALLIB)) $criteria->add(BnregsemPeer::VALLIB, $this->vallib);
		if ($this->isColumnModified(BnregsemPeer::VALREX)) $criteria->add(BnregsemPeer::VALREX, $this->valrex);
		if ($this->isColumnModified(BnregsemPeer::COSREP)) $criteria->add(BnregsemPeer::COSREP, $this->cosrep);
		if ($this->isColumnModified(BnregsemPeer::DEPMEN)) $criteria->add(BnregsemPeer::DEPMEN, $this->depmen);
		if ($this->isColumnModified(BnregsemPeer::DEPACU)) $criteria->add(BnregsemPeer::DEPACU, $this->depacu);
		if ($this->isColumnModified(BnregsemPeer::STASEM)) $criteria->add(BnregsemPeer::STASEM, $this->stasem);
		if ($this->isColumnModified(BnregsemPeer::ID)) $criteria->add(BnregsemPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnregsemPeer::DATABASE_NAME);

		$criteria->add(BnregsemPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodsem($this->codsem);

		$copyObj->setDessem($this->dessem);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setOrdrcp($this->ordrcp);

		$copyObj->setFotsem($this->fotsem);

		$copyObj->setSexsem($this->sexsem);

		$copyObj->setRazsem($this->razsem);

		$copyObj->setEdasem($this->edasem);

		$copyObj->setHersem($this->hersem);

		$copyObj->setObssem($this->obssem);

		$copyObj->setViduti($this->viduti);

		$copyObj->setMesdep($this->mesdep);

		$copyObj->setValini($this->valini);

		$copyObj->setValres($this->valres);

		$copyObj->setVallib($this->vallib);

		$copyObj->setValrex($this->valrex);

		$copyObj->setCosrep($this->cosrep);

		$copyObj->setDepmen($this->depmen);

		$copyObj->setDepacu($this->depacu);

		$copyObj->setStasem($this->stasem);


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
			self::$peer = new BnregsemPeer();
		}
		return self::$peer;
	}

} 