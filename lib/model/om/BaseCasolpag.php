<?php


abstract class BaseCasolpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $solpag;


	
	protected $fecsol;


	
	protected $dessol;


	
	protected $tipcom;


	
	protected $cedrif;


	
	protected $monsol;


	
	protected $stasol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getSolpag()
  {

    return trim($this->solpag);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getStasol()
  {

    return trim($this->stasol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setSolpag($v)
	{

    if ($this->solpag !== $v) {
        $this->solpag = $v;
        $this->modifiedColumns[] = CasolpagPeer::SOLPAG;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = CasolpagPeer::FECSOL;
    }

	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = CasolpagPeer::DESSOL;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CasolpagPeer::TIPCOM;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CasolpagPeer::CEDRIF;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CasolpagPeer::MONSOL;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = CasolpagPeer::STASOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CasolpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->solpag = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->dessol = $rs->getString($startcol + 2);

      $this->tipcom = $rs->getString($startcol + 3);

      $this->cedrif = $rs->getString($startcol + 4);

      $this->monsol = $rs->getFloat($startcol + 5);

      $this->stasol = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Casolpag object", $e);
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
			$con = Propel::getConnection(CasolpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CasolpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CasolpagPeer::DATABASE_NAME);
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
					$pk = CasolpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CasolpagPeer::doUpdate($this, $con);
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


			if (($retval = CasolpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSolpag();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getDessol();
				break;
			case 3:
				return $this->getTipcom();
				break;
			case 4:
				return $this->getCedrif();
				break;
			case 5:
				return $this->getMonsol();
				break;
			case 6:
				return $this->getStasol();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSolpag(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getDessol(),
			$keys[3] => $this->getTipcom(),
			$keys[4] => $this->getCedrif(),
			$keys[5] => $this->getMonsol(),
			$keys[6] => $this->getStasol(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSolpag($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setDessol($value);
				break;
			case 3:
				$this->setTipcom($value);
				break;
			case 4:
				$this->setCedrif($value);
				break;
			case 5:
				$this->setMonsol($value);
				break;
			case 6:
				$this->setStasol($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSolpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDessol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedrif($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonsol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStasol($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CasolpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasolpagPeer::SOLPAG)) $criteria->add(CasolpagPeer::SOLPAG, $this->solpag);
		if ($this->isColumnModified(CasolpagPeer::FECSOL)) $criteria->add(CasolpagPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(CasolpagPeer::DESSOL)) $criteria->add(CasolpagPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(CasolpagPeer::TIPCOM)) $criteria->add(CasolpagPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CasolpagPeer::CEDRIF)) $criteria->add(CasolpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CasolpagPeer::MONSOL)) $criteria->add(CasolpagPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(CasolpagPeer::STASOL)) $criteria->add(CasolpagPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(CasolpagPeer::ID)) $criteria->add(CasolpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CasolpagPeer::DATABASE_NAME);

		$criteria->add(CasolpagPeer::ID, $this->id);

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

		$copyObj->setSolpag($this->solpag);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setStasol($this->stasol);


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
			self::$peer = new CasolpagPeer();
		}
		return self::$peer;
	}

} 