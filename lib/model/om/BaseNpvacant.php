<?php


abstract class BaseNpvacant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $caudes;


	
	protected $cauhas;


	
	protected $diavac;


	
	protected $diaant;


	
	protected $diapag;


	
	protected $diadis;


	
	protected $monvac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCaudes($format = 'Y-m-d')
  {

    if ($this->caudes === null || $this->caudes === '') {
      return null;
    } elseif (!is_int($this->caudes)) {
            $ts = adodb_strtotime($this->caudes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [caudes] as date/time value: " . var_export($this->caudes, true));
      }
    } else {
      $ts = $this->caudes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCauhas($format = 'Y-m-d')
  {

    if ($this->cauhas === null || $this->cauhas === '') {
      return null;
    } elseif (!is_int($this->cauhas)) {
            $ts = adodb_strtotime($this->cauhas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [cauhas] as date/time value: " . var_export($this->cauhas, true));
      }
    } else {
      $ts = $this->cauhas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDiavac($val=false)
  {

    if($val) return number_format($this->diavac,2,',','.');
    else return $this->diavac;

  }
  
  public function getDiaant($val=false)
  {

    if($val) return number_format($this->diaant,2,',','.');
    else return $this->diaant;

  }
  
  public function getDiapag($val=false)
  {

    if($val) return number_format($this->diapag,2,',','.');
    else return $this->diapag;

  }
  
  public function getDiadis($val=false)
  {

    if($val) return number_format($this->diadis,2,',','.');
    else return $this->diadis;

  }
  
  public function getMonvac($val=false)
  {

    if($val) return number_format($this->monvac,2,',','.');
    else return $this->monvac;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacantPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpvacantPeer::CODCAR;
      }
  
	} 
	
	public function setCaudes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [caudes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->caudes !== $ts) {
      $this->caudes = $ts;
      $this->modifiedColumns[] = NpvacantPeer::CAUDES;
    }

	} 
	
	public function setCauhas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [cauhas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->cauhas !== $ts) {
      $this->cauhas = $ts;
      $this->modifiedColumns[] = NpvacantPeer::CAUHAS;
    }

	} 
	
	public function setDiavac($v)
	{

    if ($this->diavac !== $v) {
        $this->diavac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacantPeer::DIAVAC;
      }
  
	} 
	
	public function setDiaant($v)
	{

    if ($this->diaant !== $v) {
        $this->diaant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacantPeer::DIAANT;
      }
  
	} 
	
	public function setDiapag($v)
	{

    if ($this->diapag !== $v) {
        $this->diapag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacantPeer::DIAPAG;
      }
  
	} 
	
	public function setDiadis($v)
	{

    if ($this->diadis !== $v) {
        $this->diadis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacantPeer::DIADIS;
      }
  
	} 
	
	public function setMonvac($v)
	{

    if ($this->monvac !== $v) {
        $this->monvac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacantPeer::MONVAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacantPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->caudes = $rs->getDate($startcol + 2, null);

      $this->cauhas = $rs->getDate($startcol + 3, null);

      $this->diavac = $rs->getFloat($startcol + 4);

      $this->diaant = $rs->getFloat($startcol + 5);

      $this->diapag = $rs->getFloat($startcol + 6);

      $this->diadis = $rs->getFloat($startcol + 7);

      $this->monvac = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacant object", $e);
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
			$con = Propel::getConnection(NpvacantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacantPeer::DATABASE_NAME);
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
					$pk = NpvacantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacantPeer::doUpdate($this, $con);
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


			if (($retval = NpvacantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCaudes();
				break;
			case 3:
				return $this->getCauhas();
				break;
			case 4:
				return $this->getDiavac();
				break;
			case 5:
				return $this->getDiaant();
				break;
			case 6:
				return $this->getDiapag();
				break;
			case 7:
				return $this->getDiadis();
				break;
			case 8:
				return $this->getMonvac();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCaudes(),
			$keys[3] => $this->getCauhas(),
			$keys[4] => $this->getDiavac(),
			$keys[5] => $this->getDiaant(),
			$keys[6] => $this->getDiapag(),
			$keys[7] => $this->getDiadis(),
			$keys[8] => $this->getMonvac(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCaudes($value);
				break;
			case 3:
				$this->setCauhas($value);
				break;
			case 4:
				$this->setDiavac($value);
				break;
			case 5:
				$this->setDiaant($value);
				break;
			case 6:
				$this->setDiapag($value);
				break;
			case 7:
				$this->setDiadis($value);
				break;
			case 8:
				$this->setMonvac($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCaudes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCauhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiavac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiaant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiapag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiadis($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonvac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacantPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacantPeer::CODEMP)) $criteria->add(NpvacantPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacantPeer::CODCAR)) $criteria->add(NpvacantPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpvacantPeer::CAUDES)) $criteria->add(NpvacantPeer::CAUDES, $this->caudes);
		if ($this->isColumnModified(NpvacantPeer::CAUHAS)) $criteria->add(NpvacantPeer::CAUHAS, $this->cauhas);
		if ($this->isColumnModified(NpvacantPeer::DIAVAC)) $criteria->add(NpvacantPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NpvacantPeer::DIAANT)) $criteria->add(NpvacantPeer::DIAANT, $this->diaant);
		if ($this->isColumnModified(NpvacantPeer::DIAPAG)) $criteria->add(NpvacantPeer::DIAPAG, $this->diapag);
		if ($this->isColumnModified(NpvacantPeer::DIADIS)) $criteria->add(NpvacantPeer::DIADIS, $this->diadis);
		if ($this->isColumnModified(NpvacantPeer::MONVAC)) $criteria->add(NpvacantPeer::MONVAC, $this->monvac);
		if ($this->isColumnModified(NpvacantPeer::ID)) $criteria->add(NpvacantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacantPeer::DATABASE_NAME);

		$criteria->add(NpvacantPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCaudes($this->caudes);

		$copyObj->setCauhas($this->cauhas);

		$copyObj->setDiavac($this->diavac);

		$copyObj->setDiaant($this->diaant);

		$copyObj->setDiapag($this->diapag);

		$copyObj->setDiadis($this->diadis);

		$copyObj->setMonvac($this->monvac);


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
			self::$peer = new NpvacantPeer();
		}
		return self::$peer;
	}

} 