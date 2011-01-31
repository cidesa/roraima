<?php


abstract class BaseFordefaccesp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $desaccesp;


	
	protected $nomabraccesp;


	
	protected $codempres;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $desbieser;


	
	protected $orgeje;


	
	protected $codunimed;


	
	protected $codest;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $espadiubigeo;


	
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
  
  public function getDesaccesp()
  {

    return trim($this->desaccesp);

  }
  
  public function getNomabraccesp()
  {

    return trim($this->nomabraccesp);

  }
  
  public function getCodempres()
  {

    return trim($this->codempres);

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

  
  public function getDesbieser()
  {

    return trim($this->desbieser);

  }
  
  public function getOrgeje()
  {

    return trim($this->orgeje);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getEspadiubigeo()
  {

    return trim($this->espadiubigeo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODACCESP;
      }
  
	} 
	
	public function setDesaccesp($v)
	{

    if ($this->desaccesp !== $v) {
        $this->desaccesp = $v;
        $this->modifiedColumns[] = FordefaccespPeer::DESACCESP;
      }
  
	} 
	
	public function setNomabraccesp($v)
	{

    if ($this->nomabraccesp !== $v) {
        $this->nomabraccesp = $v;
        $this->modifiedColumns[] = FordefaccespPeer::NOMABRACCESP;
      }
  
	} 
	
	public function setCodempres($v)
	{

    if ($this->codempres !== $v) {
        $this->codempres = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODEMPRES;
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
      $this->modifiedColumns[] = FordefaccespPeer::FECINI;
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
      $this->modifiedColumns[] = FordefaccespPeer::FECCUL;
    }

	} 
	
	public function setDesbieser($v)
	{

    if ($this->desbieser !== $v) {
        $this->desbieser = $v;
        $this->modifiedColumns[] = FordefaccespPeer::DESBIESER;
      }
  
	} 
	
	public function setOrgeje($v)
	{

    if ($this->orgeje !== $v) {
        $this->orgeje = $v;
        $this->modifiedColumns[] = FordefaccespPeer::ORGEJE;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODUNIMED;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODEST;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODMUN;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FordefaccespPeer::CODPAR;
      }
  
	} 
	
	public function setEspadiubigeo($v)
	{

    if ($this->espadiubigeo !== $v) {
        $this->espadiubigeo = $v;
        $this->modifiedColumns[] = FordefaccespPeer::ESPADIUBIGEO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefaccespPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->desaccesp = $rs->getString($startcol + 2);

      $this->nomabraccesp = $rs->getString($startcol + 3);

      $this->codempres = $rs->getString($startcol + 4);

      $this->fecini = $rs->getDate($startcol + 5, null);

      $this->feccul = $rs->getDate($startcol + 6, null);

      $this->desbieser = $rs->getString($startcol + 7);

      $this->orgeje = $rs->getString($startcol + 8);

      $this->codunimed = $rs->getString($startcol + 9);

      $this->codest = $rs->getString($startcol + 10);

      $this->codmun = $rs->getString($startcol + 11);

      $this->codpar = $rs->getString($startcol + 12);

      $this->espadiubigeo = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefaccesp object", $e);
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
			$con = Propel::getConnection(FordefaccespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefaccespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefaccespPeer::DATABASE_NAME);
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
					$pk = FordefaccespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefaccespPeer::doUpdate($this, $con);
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


			if (($retval = FordefaccespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefaccespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDesaccesp();
				break;
			case 3:
				return $this->getNomabraccesp();
				break;
			case 4:
				return $this->getCodempres();
				break;
			case 5:
				return $this->getFecini();
				break;
			case 6:
				return $this->getFeccul();
				break;
			case 7:
				return $this->getDesbieser();
				break;
			case 8:
				return $this->getOrgeje();
				break;
			case 9:
				return $this->getCodunimed();
				break;
			case 10:
				return $this->getCodest();
				break;
			case 11:
				return $this->getCodmun();
				break;
			case 12:
				return $this->getCodpar();
				break;
			case 13:
				return $this->getEspadiubigeo();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefaccespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getDesaccesp(),
			$keys[3] => $this->getNomabraccesp(),
			$keys[4] => $this->getCodempres(),
			$keys[5] => $this->getFecini(),
			$keys[6] => $this->getFeccul(),
			$keys[7] => $this->getDesbieser(),
			$keys[8] => $this->getOrgeje(),
			$keys[9] => $this->getCodunimed(),
			$keys[10] => $this->getCodest(),
			$keys[11] => $this->getCodmun(),
			$keys[12] => $this->getCodpar(),
			$keys[13] => $this->getEspadiubigeo(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefaccespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDesaccesp($value);
				break;
			case 3:
				$this->setNomabraccesp($value);
				break;
			case 4:
				$this->setCodempres($value);
				break;
			case 5:
				$this->setFecini($value);
				break;
			case 6:
				$this->setFeccul($value);
				break;
			case 7:
				$this->setDesbieser($value);
				break;
			case 8:
				$this->setOrgeje($value);
				break;
			case 9:
				$this->setCodunimed($value);
				break;
			case 10:
				$this->setCodest($value);
				break;
			case 11:
				$this->setCodmun($value);
				break;
			case 12:
				$this->setCodpar($value);
				break;
			case 13:
				$this->setEspadiubigeo($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefaccespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesaccesp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomabraccesp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodempres($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccul($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesbieser($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOrgeje($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodunimed($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodest($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodmun($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEspadiubigeo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefaccespPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefaccespPeer::CODPRO)) $criteria->add(FordefaccespPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordefaccespPeer::CODACCESP)) $criteria->add(FordefaccespPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordefaccespPeer::DESACCESP)) $criteria->add(FordefaccespPeer::DESACCESP, $this->desaccesp);
		if ($this->isColumnModified(FordefaccespPeer::NOMABRACCESP)) $criteria->add(FordefaccespPeer::NOMABRACCESP, $this->nomabraccesp);
		if ($this->isColumnModified(FordefaccespPeer::CODEMPRES)) $criteria->add(FordefaccespPeer::CODEMPRES, $this->codempres);
		if ($this->isColumnModified(FordefaccespPeer::FECINI)) $criteria->add(FordefaccespPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FordefaccespPeer::FECCUL)) $criteria->add(FordefaccespPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(FordefaccespPeer::DESBIESER)) $criteria->add(FordefaccespPeer::DESBIESER, $this->desbieser);
		if ($this->isColumnModified(FordefaccespPeer::ORGEJE)) $criteria->add(FordefaccespPeer::ORGEJE, $this->orgeje);
		if ($this->isColumnModified(FordefaccespPeer::CODUNIMED)) $criteria->add(FordefaccespPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefaccespPeer::CODEST)) $criteria->add(FordefaccespPeer::CODEST, $this->codest);
		if ($this->isColumnModified(FordefaccespPeer::CODMUN)) $criteria->add(FordefaccespPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FordefaccespPeer::CODPAR)) $criteria->add(FordefaccespPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FordefaccespPeer::ESPADIUBIGEO)) $criteria->add(FordefaccespPeer::ESPADIUBIGEO, $this->espadiubigeo);
		if ($this->isColumnModified(FordefaccespPeer::ID)) $criteria->add(FordefaccespPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefaccespPeer::DATABASE_NAME);

		$criteria->add(FordefaccespPeer::ID, $this->id);

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

		$copyObj->setDesaccesp($this->desaccesp);

		$copyObj->setNomabraccesp($this->nomabraccesp);

		$copyObj->setCodempres($this->codempres);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setDesbieser($this->desbieser);

		$copyObj->setOrgeje($this->orgeje);

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setEspadiubigeo($this->espadiubigeo);


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
			self::$peer = new FordefaccespPeer();
		}
		return self::$peer;
	}

} 