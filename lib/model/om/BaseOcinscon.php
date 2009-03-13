<?php


abstract class BaseOcinscon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $numins;


	
	protected $codtipins;


	
	protected $feccom;


	
	protected $fecter;


	
	protected $porobreje;


	
	protected $portietra;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNumins()
  {

    return trim($this->numins);

  }
  
  public function getCodtipins()
  {

    return trim($this->codtipins);

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

  
  public function getFecter($format = 'Y-m-d')
  {

    if ($this->fecter === null || $this->fecter === '') {
      return null;
    } elseif (!is_int($this->fecter)) {
            $ts = adodb_strtotime($this->fecter);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecter] as date/time value: " . var_export($this->fecter, true));
      }
    } else {
      $ts = $this->fecter;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPorobreje($val=false)
  {

    if($val) return number_format($this->porobreje,2,',','.');
    else return $this->porobreje;

  }
  
  public function getPortietra($val=false)
  {

    if($val) return number_format($this->portietra,2,',','.');
    else return $this->portietra;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OcinsconPeer::CODCON;
      }
  
	} 
	
	public function setNumins($v)
	{

    if ($this->numins !== $v) {
        $this->numins = $v;
        $this->modifiedColumns[] = OcinsconPeer::NUMINS;
      }
  
	} 
	
	public function setCodtipins($v)
	{

    if ($this->codtipins !== $v) {
        $this->codtipins = $v;
        $this->modifiedColumns[] = OcinsconPeer::CODTIPINS;
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
      $this->modifiedColumns[] = OcinsconPeer::FECCOM;
    }

	} 
	
	public function setFecter($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecter] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecter !== $ts) {
      $this->fecter = $ts;
      $this->modifiedColumns[] = OcinsconPeer::FECTER;
    }

	} 
	
	public function setPorobreje($v)
	{

    if ($this->porobreje !== $v) {
        $this->porobreje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcinsconPeer::POROBREJE;
      }
  
	} 
	
	public function setPortietra($v)
	{

    if ($this->portietra !== $v) {
        $this->portietra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcinsconPeer::PORTIETRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcinsconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->numins = $rs->getString($startcol + 1);

      $this->codtipins = $rs->getString($startcol + 2);

      $this->feccom = $rs->getDate($startcol + 3, null);

      $this->fecter = $rs->getDate($startcol + 4, null);

      $this->porobreje = $rs->getFloat($startcol + 5);

      $this->portietra = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocinscon object", $e);
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
			$con = Propel::getConnection(OcinsconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcinsconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcinsconPeer::DATABASE_NAME);
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
					$pk = OcinsconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcinsconPeer::doUpdate($this, $con);
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


			if (($retval = OcinsconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNumins();
				break;
			case 2:
				return $this->getCodtipins();
				break;
			case 3:
				return $this->getFeccom();
				break;
			case 4:
				return $this->getFecter();
				break;
			case 5:
				return $this->getPorobreje();
				break;
			case 6:
				return $this->getPortietra();
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
		$keys = OcinsconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNumins(),
			$keys[2] => $this->getCodtipins(),
			$keys[3] => $this->getFeccom(),
			$keys[4] => $this->getFecter(),
			$keys[5] => $this->getPorobreje(),
			$keys[6] => $this->getPortietra(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNumins($value);
				break;
			case 2:
				$this->setCodtipins($value);
				break;
			case 3:
				$this->setFeccom($value);
				break;
			case 4:
				$this->setFecter($value);
				break;
			case 5:
				$this->setPorobreje($value);
				break;
			case 6:
				$this->setPortietra($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcinsconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecter($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPorobreje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPortietra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcinsconPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcinsconPeer::CODCON)) $criteria->add(OcinsconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcinsconPeer::NUMINS)) $criteria->add(OcinsconPeer::NUMINS, $this->numins);
		if ($this->isColumnModified(OcinsconPeer::CODTIPINS)) $criteria->add(OcinsconPeer::CODTIPINS, $this->codtipins);
		if ($this->isColumnModified(OcinsconPeer::FECCOM)) $criteria->add(OcinsconPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(OcinsconPeer::FECTER)) $criteria->add(OcinsconPeer::FECTER, $this->fecter);
		if ($this->isColumnModified(OcinsconPeer::POROBREJE)) $criteria->add(OcinsconPeer::POROBREJE, $this->porobreje);
		if ($this->isColumnModified(OcinsconPeer::PORTIETRA)) $criteria->add(OcinsconPeer::PORTIETRA, $this->portietra);
		if ($this->isColumnModified(OcinsconPeer::ID)) $criteria->add(OcinsconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcinsconPeer::DATABASE_NAME);

		$criteria->add(OcinsconPeer::ID, $this->id);

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

		$copyObj->setNumins($this->numins);

		$copyObj->setCodtipins($this->codtipins);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecter($this->fecter);

		$copyObj->setPorobreje($this->porobreje);

		$copyObj->setPortietra($this->portietra);


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
			self::$peer = new OcinsconPeer();
		}
		return self::$peer;
	}

} 