<?php


abstract class BaseFordetpryaccespmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $codunieje;


	
	protected $codpar;


	
	protected $codpre;


	
	protected $disper;


	
	protected $monpre;


	
	protected $codfin;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $ubigeo;


	
	protected $pobapx;


	
	protected $observ;


	
	protected $codact;


	
	protected $jusins;


	
	protected $canins;


	
	protected $caninsrep;


	
	protected $monprerep;


	
	protected $codtip;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodaccesp()
  {

    return trim($this->codaccesp);

  }
  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getCodunieje()
  {

    return trim($this->codunieje);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getDisper()
  {

    return trim($this->disper);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccul($format = 'Y-m-d')
  {

    if ($this->feccul === null || $this->feccul === '') {
      return null;
    } elseif (!is_int($this->feccul)) {
            $ts = adodb_strtotime($this->feccul);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
      }
    } else {
      $ts = $this->feccul;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUbigeo()
  {

    return trim($this->ubigeo);

  }
  
  public function getPobapx()
  {

    return trim($this->pobapx);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getJusins()
  {

    return trim($this->jusins);

  }
  
  public function getCanins($val=false)
  {

    if($val) return number_format($this->canins,2,',','.');
    else return $this->canins;

  }
  
  public function getCaninsrep($val=false)
  {

    if($val) return number_format($this->caninsrep,2,',','.');
    else return $this->caninsrep;

  }
  
  public function getMonprerep($val=false)
  {

    if($val) return number_format($this->monprerep,2,',','.');
    else return $this->monprerep;

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODACCESP;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODMET;
      }
  
	} 
	
	public function setCodunieje($v)
	{

    if ($this->codunieje !== $v) {
        $this->codunieje = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODUNIEJE;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODPAR;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODPRE;
      }
  
	} 
	
	public function setDisper($v)
	{

    if ($this->disper !== $v) {
        $this->disper = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::DISPER;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordetpryaccespmetPeer::MONPRE;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODFIN;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = FordetpryaccespmetPeer::FECINI;
    }

	} 
	
	public function setFeccul($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccul !== $ts) {
      $this->feccul = $ts;
      $this->modifiedColumns[] = FordetpryaccespmetPeer::FECCUL;
    }

	} 
	
	public function setUbigeo($v)
	{

    if ($this->ubigeo !== $v) {
        $this->ubigeo = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::UBIGEO;
      }
  
	} 
	
	public function setPobapx($v)
	{

    if ($this->pobapx !== $v) {
        $this->pobapx = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::POBAPX;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::OBSERV;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODACT;
      }
  
	} 
	
	public function setJusins($v)
	{

    if ($this->jusins !== $v) {
        $this->jusins = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::JUSINS;
      }
  
	} 
	
	public function setCanins($v)
	{

    if ($this->canins !== $v) {
        $this->canins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CANINS;
      }
  
	} 
	
	public function setCaninsrep($v)
	{

    if ($this->caninsrep !== $v) {
        $this->caninsrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CANINSREP;
      }
  
	} 
	
	public function setMonprerep($v)
	{

    if ($this->monprerep !== $v) {
        $this->monprerep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordetpryaccespmetPeer::MONPREREP;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::CODTIP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordetpryaccespmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codmet = $rs->getString($startcol + 2);

      $this->codunieje = $rs->getString($startcol + 3);

      $this->codpar = $rs->getString($startcol + 4);

      $this->codpre = $rs->getString($startcol + 5);

      $this->disper = $rs->getString($startcol + 6);

      $this->monpre = $rs->getFloat($startcol + 7);

      $this->codfin = $rs->getString($startcol + 8);

      $this->fecini = $rs->getDate($startcol + 9, null);

      $this->feccul = $rs->getDate($startcol + 10, null);

      $this->ubigeo = $rs->getString($startcol + 11);

      $this->pobapx = $rs->getString($startcol + 12);

      $this->observ = $rs->getString($startcol + 13);

      $this->codact = $rs->getString($startcol + 14);

      $this->jusins = $rs->getString($startcol + 15);

      $this->canins = $rs->getFloat($startcol + 16);

      $this->caninsrep = $rs->getFloat($startcol + 17);

      $this->monprerep = $rs->getFloat($startcol + 18);

      $this->codtip = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordetpryaccespmet object", $e);
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
			$con = Propel::getConnection(FordetpryaccespmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordetpryaccespmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordetpryaccespmetPeer::DATABASE_NAME);
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
					$pk = FordetpryaccespmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordetpryaccespmetPeer::doUpdate($this, $con);
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


			if (($retval = FordetpryaccespmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getCodunieje();
				break;
			case 4:
				return $this->getCodpar();
				break;
			case 5:
				return $this->getCodpre();
				break;
			case 6:
				return $this->getDisper();
				break;
			case 7:
				return $this->getMonpre();
				break;
			case 8:
				return $this->getCodfin();
				break;
			case 9:
				return $this->getFecini();
				break;
			case 10:
				return $this->getFeccul();
				break;
			case 11:
				return $this->getUbigeo();
				break;
			case 12:
				return $this->getPobapx();
				break;
			case 13:
				return $this->getObserv();
				break;
			case 14:
				return $this->getCodact();
				break;
			case 15:
				return $this->getJusins();
				break;
			case 16:
				return $this->getCanins();
				break;
			case 17:
				return $this->getCaninsrep();
				break;
			case 18:
				return $this->getMonprerep();
				break;
			case 19:
				return $this->getCodtip();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordetpryaccespmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCodunieje(),
			$keys[4] => $this->getCodpar(),
			$keys[5] => $this->getCodpre(),
			$keys[6] => $this->getDisper(),
			$keys[7] => $this->getMonpre(),
			$keys[8] => $this->getCodfin(),
			$keys[9] => $this->getFecini(),
			$keys[10] => $this->getFeccul(),
			$keys[11] => $this->getUbigeo(),
			$keys[12] => $this->getPobapx(),
			$keys[13] => $this->getObserv(),
			$keys[14] => $this->getCodact(),
			$keys[15] => $this->getJusins(),
			$keys[16] => $this->getCanins(),
			$keys[17] => $this->getCaninsrep(),
			$keys[18] => $this->getMonprerep(),
			$keys[19] => $this->getCodtip(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setCodunieje($value);
				break;
			case 4:
				$this->setCodpar($value);
				break;
			case 5:
				$this->setCodpre($value);
				break;
			case 6:
				$this->setDisper($value);
				break;
			case 7:
				$this->setMonpre($value);
				break;
			case 8:
				$this->setCodfin($value);
				break;
			case 9:
				$this->setFecini($value);
				break;
			case 10:
				$this->setFeccul($value);
				break;
			case 11:
				$this->setUbigeo($value);
				break;
			case 12:
				$this->setPobapx($value);
				break;
			case 13:
				$this->setObserv($value);
				break;
			case 14:
				$this->setCodact($value);
				break;
			case 15:
				$this->setJusins($value);
				break;
			case 16:
				$this->setCanins($value);
				break;
			case 17:
				$this->setCaninsrep($value);
				break;
			case 18:
				$this->setMonprerep($value);
				break;
			case 19:
				$this->setCodtip($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordetpryaccespmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodunieje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDisper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonpre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodfin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFeccul($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUbigeo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPobapx($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObserv($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodact($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setJusins($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCanins($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCaninsrep($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMonprerep($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodtip($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordetpryaccespmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPRO)) $criteria->add(FordetpryaccespmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODACCESP)) $criteria->add(FordetpryaccespmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODMET)) $criteria->add(FordetpryaccespmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODUNIEJE)) $criteria->add(FordetpryaccespmetPeer::CODUNIEJE, $this->codunieje);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPAR)) $criteria->add(FordetpryaccespmetPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPRE)) $criteria->add(FordetpryaccespmetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(FordetpryaccespmetPeer::DISPER)) $criteria->add(FordetpryaccespmetPeer::DISPER, $this->disper);
		if ($this->isColumnModified(FordetpryaccespmetPeer::MONPRE)) $criteria->add(FordetpryaccespmetPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODFIN)) $criteria->add(FordetpryaccespmetPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(FordetpryaccespmetPeer::FECINI)) $criteria->add(FordetpryaccespmetPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FordetpryaccespmetPeer::FECCUL)) $criteria->add(FordetpryaccespmetPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(FordetpryaccespmetPeer::UBIGEO)) $criteria->add(FordetpryaccespmetPeer::UBIGEO, $this->ubigeo);
		if ($this->isColumnModified(FordetpryaccespmetPeer::POBAPX)) $criteria->add(FordetpryaccespmetPeer::POBAPX, $this->pobapx);
		if ($this->isColumnModified(FordetpryaccespmetPeer::OBSERV)) $criteria->add(FordetpryaccespmetPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODACT)) $criteria->add(FordetpryaccespmetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordetpryaccespmetPeer::JUSINS)) $criteria->add(FordetpryaccespmetPeer::JUSINS, $this->jusins);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CANINS)) $criteria->add(FordetpryaccespmetPeer::CANINS, $this->canins);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CANINSREP)) $criteria->add(FordetpryaccespmetPeer::CANINSREP, $this->caninsrep);
		if ($this->isColumnModified(FordetpryaccespmetPeer::MONPREREP)) $criteria->add(FordetpryaccespmetPeer::MONPREREP, $this->monprerep);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODTIP)) $criteria->add(FordetpryaccespmetPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FordetpryaccespmetPeer::ID)) $criteria->add(FordetpryaccespmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordetpryaccespmetPeer::DATABASE_NAME);

		$criteria->add(FordetpryaccespmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodunieje($this->codunieje);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setDisper($this->disper);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setUbigeo($this->ubigeo);

		$copyObj->setPobapx($this->pobapx);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodact($this->codact);

		$copyObj->setJusins($this->jusins);

		$copyObj->setCanins($this->canins);

		$copyObj->setCaninsrep($this->caninsrep);

		$copyObj->setMonprerep($this->monprerep);

		$copyObj->setCodtip($this->codtip);


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
			self::$peer = new FordetpryaccespmetPeer();
		}
		return self::$peer;
	}

} 