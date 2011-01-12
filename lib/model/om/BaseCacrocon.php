<?php


abstract class BaseCacrocon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcon;


	
	protected $fecpag;


	
	protected $nropag;


	
	protected $monpag;


	
	protected $pormon;


	
	protected $poramo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcon()
  {

    return trim($this->ordcon);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNropag()
  {

    return trim($this->nropag);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getPormon($val=false)
  {

    if($val) return number_format($this->pormon,2,',','.');
    else return $this->pormon;

  }
  
  public function getPoramo($val=false)
  {

    if($val) return number_format($this->poramo,2,',','.');
    else return $this->poramo;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcon($v)
	{

    if ($this->ordcon !== $v) {
        $this->ordcon = $v;
        $this->modifiedColumns[] = CacroconPeer::ORDCON;
      }
  
	} 
	
	public function setFecpag($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = CacroconPeer::FECPAG;
    }

	} 
	
	public function setNropag($v)
	{

    if ($this->nropag !== $v) {
        $this->nropag = $v;
        $this->modifiedColumns[] = CacroconPeer::NROPAG;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacroconPeer::MONPAG;
      }
  
	} 
	
	public function setPormon($v)
	{

    if ($this->pormon !== $v) {
        $this->pormon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacroconPeer::PORMON;
      }
  
	} 
	
	public function setPoramo($v)
	{

    if ($this->poramo !== $v) {
        $this->poramo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacroconPeer::PORAMO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacroconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcon = $rs->getString($startcol + 0);

      $this->fecpag = $rs->getDate($startcol + 1, null);

      $this->nropag = $rs->getString($startcol + 2);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->pormon = $rs->getFloat($startcol + 4);

      $this->poramo = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacrocon object", $e);
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
			$con = Propel::getConnection(CacroconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacroconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacroconPeer::DATABASE_NAME);
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
					$pk = CacroconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacroconPeer::doUpdate($this, $con);
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


			if (($retval = CacroconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacroconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcon();
				break;
			case 1:
				return $this->getFecpag();
				break;
			case 2:
				return $this->getNropag();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getPormon();
				break;
			case 5:
				return $this->getPoramo();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacroconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcon(),
			$keys[1] => $this->getFecpag(),
			$keys[2] => $this->getNropag(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getPormon(),
			$keys[5] => $this->getPoramo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacroconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcon($value);
				break;
			case 1:
				$this->setFecpag($value);
				break;
			case 2:
				$this->setNropag($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setPormon($value);
				break;
			case 5:
				$this->setPoramo($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacroconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNropag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPormon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPoramo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacroconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacroconPeer::ORDCON)) $criteria->add(CacroconPeer::ORDCON, $this->ordcon);
		if ($this->isColumnModified(CacroconPeer::FECPAG)) $criteria->add(CacroconPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(CacroconPeer::NROPAG)) $criteria->add(CacroconPeer::NROPAG, $this->nropag);
		if ($this->isColumnModified(CacroconPeer::MONPAG)) $criteria->add(CacroconPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CacroconPeer::PORMON)) $criteria->add(CacroconPeer::PORMON, $this->pormon);
		if ($this->isColumnModified(CacroconPeer::PORAMO)) $criteria->add(CacroconPeer::PORAMO, $this->poramo);
		if ($this->isColumnModified(CacroconPeer::ID)) $criteria->add(CacroconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacroconPeer::DATABASE_NAME);

		$criteria->add(CacroconPeer::ID, $this->id);

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

		$copyObj->setOrdcon($this->ordcon);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setNropag($this->nropag);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setPormon($this->pormon);

		$copyObj->setPoramo($this->poramo);


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
			self::$peer = new CacroconPeer();
		}
		return self::$peer;
	}

} 