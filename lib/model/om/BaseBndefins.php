<?php


abstract class BaseBndefins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codins;


	
	protected $nomins;


	
	protected $dirins;


	
	protected $telins;


	
	protected $faxins;


	
	protected $email;


	
	protected $edoins;


	
	protected $munins;


	
	protected $paqins;


	
	protected $foract;


	
	protected $desact;


	
	protected $lonact;


	
	protected $forubi;


	
	protected $desubi;


	
	protected $lonubi;


	
	protected $fecper;


	
	protected $feceje;


	
	protected $coddes;


	
	protected $codinc;


	
	protected $porrev;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodins()
  {

    return trim($this->codins);

  }
  
  public function getNomins()
  {

    return trim($this->nomins);

  }
  
  public function getDirins()
  {

    return trim($this->dirins);

  }
  
  public function getTelins()
  {

    return trim($this->telins);

  }
  
  public function getFaxins()
  {

    return trim($this->faxins);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getEdoins()
  {

    return trim($this->edoins);

  }
  
  public function getMunins()
  {

    return trim($this->munins);

  }
  
  public function getPaqins()
  {

    return trim($this->paqins);

  }
  
  public function getForact()
  {

    return trim($this->foract);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getLonact()
  {

    return $this->lonact;

  }
  
  public function getForubi()
  {

    return trim($this->forubi);

  }
  
  public function getDesubi()
  {

    return trim($this->desubi);

  }
  
  public function getLonubi($val=false)
  {

    if($val) return number_format($this->lonubi,2,',','.');
    else return $this->lonubi;

  }
  
  public function getFecper($format = 'Y-m-d')
  {

    if ($this->fecper === null || $this->fecper === '') {
      return null;
    } elseif (!is_int($this->fecper)) {
            $ts = adodb_strtotime($this->fecper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper] as date/time value: " . var_export($this->fecper, true));
      }
    } else {
      $ts = $this->fecper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeceje($format = 'Y-m-d')
  {

    if ($this->feceje === null || $this->feceje === '') {
      return null;
    } elseif (!is_int($this->feceje)) {
            $ts = adodb_strtotime($this->feceje);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feceje] as date/time value: " . var_export($this->feceje, true));
      }
    } else {
      $ts = $this->feceje;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoddes()
  {

    return trim($this->coddes);

  }
  
  public function getCodinc()
  {

    return trim($this->codinc);

  }
  
  public function getPorrev()
  {

    return trim($this->porrev);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodins($v)
	{

    if ($this->codins !== $v) {
        $this->codins = $v;
        $this->modifiedColumns[] = BndefinsPeer::CODINS;
      }
  
	} 
	
	public function setNomins($v)
	{

    if ($this->nomins !== $v) {
        $this->nomins = $v;
        $this->modifiedColumns[] = BndefinsPeer::NOMINS;
      }
  
	} 
	
	public function setDirins($v)
	{

    if ($this->dirins !== $v) {
        $this->dirins = $v;
        $this->modifiedColumns[] = BndefinsPeer::DIRINS;
      }
  
	} 
	
	public function setTelins($v)
	{

    if ($this->telins !== $v) {
        $this->telins = $v;
        $this->modifiedColumns[] = BndefinsPeer::TELINS;
      }
  
	} 
	
	public function setFaxins($v)
	{

    if ($this->faxins !== $v) {
        $this->faxins = $v;
        $this->modifiedColumns[] = BndefinsPeer::FAXINS;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = BndefinsPeer::EMAIL;
      }
  
	} 
	
	public function setEdoins($v)
	{

    if ($this->edoins !== $v) {
        $this->edoins = $v;
        $this->modifiedColumns[] = BndefinsPeer::EDOINS;
      }
  
	} 
	
	public function setMunins($v)
	{

    if ($this->munins !== $v) {
        $this->munins = $v;
        $this->modifiedColumns[] = BndefinsPeer::MUNINS;
      }
  
	} 
	
	public function setPaqins($v)
	{

    if ($this->paqins !== $v) {
        $this->paqins = $v;
        $this->modifiedColumns[] = BndefinsPeer::PAQINS;
      }
  
	} 
	
	public function setForact($v)
	{

    if ($this->foract !== $v) {
        $this->foract = $v;
        $this->modifiedColumns[] = BndefinsPeer::FORACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = BndefinsPeer::DESACT;
      }
  
	} 
	
	public function setLonact($v)
	{

    if ($this->lonact !== $v) {
        $this->lonact = $v;
        $this->modifiedColumns[] = BndefinsPeer::LONACT;
      }
  
	} 
	
	public function setForubi($v)
	{

    if ($this->forubi !== $v) {
        $this->forubi = $v;
        $this->modifiedColumns[] = BndefinsPeer::FORUBI;
      }
  
	} 
	
	public function setDesubi($v)
	{

    if ($this->desubi !== $v) {
        $this->desubi = $v;
        $this->modifiedColumns[] = BndefinsPeer::DESUBI;
      }
  
	} 
	
	public function setLonubi($v)
	{

    if ($this->lonubi !== $v) {
        $this->lonubi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndefinsPeer::LONUBI;
      }
  
	} 
	
	public function setFecper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper !== $ts) {
      $this->fecper = $ts;
      $this->modifiedColumns[] = BndefinsPeer::FECPER;
    }

	} 
	
	public function setFeceje($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feceje] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feceje !== $ts) {
      $this->feceje = $ts;
      $this->modifiedColumns[] = BndefinsPeer::FECEJE;
    }

	} 
	
	public function setCoddes($v)
	{

    if ($this->coddes !== $v) {
        $this->coddes = $v;
        $this->modifiedColumns[] = BndefinsPeer::CODDES;
      }
  
	} 
	
	public function setCodinc($v)
	{

    if ($this->codinc !== $v) {
        $this->codinc = $v;
        $this->modifiedColumns[] = BndefinsPeer::CODINC;
      }
  
	} 
	
	public function setPorrev($v)
	{

    if ($this->porrev !== $v) {
        $this->porrev = $v;
        $this->modifiedColumns[] = BndefinsPeer::PORREV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndefinsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codins = $rs->getString($startcol + 0);

      $this->nomins = $rs->getString($startcol + 1);

      $this->dirins = $rs->getString($startcol + 2);

      $this->telins = $rs->getString($startcol + 3);

      $this->faxins = $rs->getString($startcol + 4);

      $this->email = $rs->getString($startcol + 5);

      $this->edoins = $rs->getString($startcol + 6);

      $this->munins = $rs->getString($startcol + 7);

      $this->paqins = $rs->getString($startcol + 8);

      $this->foract = $rs->getString($startcol + 9);

      $this->desact = $rs->getString($startcol + 10);

      $this->lonact = $rs->getInt($startcol + 11);

      $this->forubi = $rs->getString($startcol + 12);

      $this->desubi = $rs->getString($startcol + 13);

      $this->lonubi = $rs->getFloat($startcol + 14);

      $this->fecper = $rs->getDate($startcol + 15, null);

      $this->feceje = $rs->getDate($startcol + 16, null);

      $this->coddes = $rs->getString($startcol + 17);

      $this->codinc = $rs->getString($startcol + 18);

      $this->porrev = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bndefins object", $e);
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
			$con = Propel::getConnection(BndefinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndefinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndefinsPeer::DATABASE_NAME);
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
					$pk = BndefinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BndefinsPeer::doUpdate($this, $con);
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


			if (($retval = BndefinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodins();
				break;
			case 1:
				return $this->getNomins();
				break;
			case 2:
				return $this->getDirins();
				break;
			case 3:
				return $this->getTelins();
				break;
			case 4:
				return $this->getFaxins();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getEdoins();
				break;
			case 7:
				return $this->getMunins();
				break;
			case 8:
				return $this->getPaqins();
				break;
			case 9:
				return $this->getForact();
				break;
			case 10:
				return $this->getDesact();
				break;
			case 11:
				return $this->getLonact();
				break;
			case 12:
				return $this->getForubi();
				break;
			case 13:
				return $this->getDesubi();
				break;
			case 14:
				return $this->getLonubi();
				break;
			case 15:
				return $this->getFecper();
				break;
			case 16:
				return $this->getFeceje();
				break;
			case 17:
				return $this->getCoddes();
				break;
			case 18:
				return $this->getCodinc();
				break;
			case 19:
				return $this->getPorrev();
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
		$keys = BndefinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodins(),
			$keys[1] => $this->getNomins(),
			$keys[2] => $this->getDirins(),
			$keys[3] => $this->getTelins(),
			$keys[4] => $this->getFaxins(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getEdoins(),
			$keys[7] => $this->getMunins(),
			$keys[8] => $this->getPaqins(),
			$keys[9] => $this->getForact(),
			$keys[10] => $this->getDesact(),
			$keys[11] => $this->getLonact(),
			$keys[12] => $this->getForubi(),
			$keys[13] => $this->getDesubi(),
			$keys[14] => $this->getLonubi(),
			$keys[15] => $this->getFecper(),
			$keys[16] => $this->getFeceje(),
			$keys[17] => $this->getCoddes(),
			$keys[18] => $this->getCodinc(),
			$keys[19] => $this->getPorrev(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodins($value);
				break;
			case 1:
				$this->setNomins($value);
				break;
			case 2:
				$this->setDirins($value);
				break;
			case 3:
				$this->setTelins($value);
				break;
			case 4:
				$this->setFaxins($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setEdoins($value);
				break;
			case 7:
				$this->setMunins($value);
				break;
			case 8:
				$this->setPaqins($value);
				break;
			case 9:
				$this->setForact($value);
				break;
			case 10:
				$this->setDesact($value);
				break;
			case 11:
				$this->setLonact($value);
				break;
			case 12:
				$this->setForubi($value);
				break;
			case 13:
				$this->setDesubi($value);
				break;
			case 14:
				$this->setLonubi($value);
				break;
			case 15:
				$this->setFecper($value);
				break;
			case 16:
				$this->setFeceje($value);
				break;
			case 17:
				$this->setCoddes($value);
				break;
			case 18:
				$this->setCodinc($value);
				break;
			case 19:
				$this->setPorrev($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelins($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxins($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEdoins($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMunins($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPaqins($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setForact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDesact($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLonact($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setForubi($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDesubi($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLonubi($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecper($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFeceje($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCoddes($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodinc($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPorrev($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndefinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndefinsPeer::CODINS)) $criteria->add(BndefinsPeer::CODINS, $this->codins);
		if ($this->isColumnModified(BndefinsPeer::NOMINS)) $criteria->add(BndefinsPeer::NOMINS, $this->nomins);
		if ($this->isColumnModified(BndefinsPeer::DIRINS)) $criteria->add(BndefinsPeer::DIRINS, $this->dirins);
		if ($this->isColumnModified(BndefinsPeer::TELINS)) $criteria->add(BndefinsPeer::TELINS, $this->telins);
		if ($this->isColumnModified(BndefinsPeer::FAXINS)) $criteria->add(BndefinsPeer::FAXINS, $this->faxins);
		if ($this->isColumnModified(BndefinsPeer::EMAIL)) $criteria->add(BndefinsPeer::EMAIL, $this->email);
		if ($this->isColumnModified(BndefinsPeer::EDOINS)) $criteria->add(BndefinsPeer::EDOINS, $this->edoins);
		if ($this->isColumnModified(BndefinsPeer::MUNINS)) $criteria->add(BndefinsPeer::MUNINS, $this->munins);
		if ($this->isColumnModified(BndefinsPeer::PAQINS)) $criteria->add(BndefinsPeer::PAQINS, $this->paqins);
		if ($this->isColumnModified(BndefinsPeer::FORACT)) $criteria->add(BndefinsPeer::FORACT, $this->foract);
		if ($this->isColumnModified(BndefinsPeer::DESACT)) $criteria->add(BndefinsPeer::DESACT, $this->desact);
		if ($this->isColumnModified(BndefinsPeer::LONACT)) $criteria->add(BndefinsPeer::LONACT, $this->lonact);
		if ($this->isColumnModified(BndefinsPeer::FORUBI)) $criteria->add(BndefinsPeer::FORUBI, $this->forubi);
		if ($this->isColumnModified(BndefinsPeer::DESUBI)) $criteria->add(BndefinsPeer::DESUBI, $this->desubi);
		if ($this->isColumnModified(BndefinsPeer::LONUBI)) $criteria->add(BndefinsPeer::LONUBI, $this->lonubi);
		if ($this->isColumnModified(BndefinsPeer::FECPER)) $criteria->add(BndefinsPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(BndefinsPeer::FECEJE)) $criteria->add(BndefinsPeer::FECEJE, $this->feceje);
		if ($this->isColumnModified(BndefinsPeer::CODDES)) $criteria->add(BndefinsPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(BndefinsPeer::CODINC)) $criteria->add(BndefinsPeer::CODINC, $this->codinc);
		if ($this->isColumnModified(BndefinsPeer::PORREV)) $criteria->add(BndefinsPeer::PORREV, $this->porrev);
		if ($this->isColumnModified(BndefinsPeer::ID)) $criteria->add(BndefinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndefinsPeer::DATABASE_NAME);

		$criteria->add(BndefinsPeer::ID, $this->id);

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

		$copyObj->setCodins($this->codins);

		$copyObj->setNomins($this->nomins);

		$copyObj->setDirins($this->dirins);

		$copyObj->setTelins($this->telins);

		$copyObj->setFaxins($this->faxins);

		$copyObj->setEmail($this->email);

		$copyObj->setEdoins($this->edoins);

		$copyObj->setMunins($this->munins);

		$copyObj->setPaqins($this->paqins);

		$copyObj->setForact($this->foract);

		$copyObj->setDesact($this->desact);

		$copyObj->setLonact($this->lonact);

		$copyObj->setForubi($this->forubi);

		$copyObj->setDesubi($this->desubi);

		$copyObj->setLonubi($this->lonubi);

		$copyObj->setFecper($this->fecper);

		$copyObj->setFeceje($this->feceje);

		$copyObj->setCoddes($this->coddes);

		$copyObj->setCodinc($this->codinc);

		$copyObj->setPorrev($this->porrev);


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
			self::$peer = new BndefinsPeer();
		}
		return self::$peer;
	}

} 