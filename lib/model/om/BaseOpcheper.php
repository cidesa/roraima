<?php


abstract class BaseOpcheper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refopp;


	
	protected $refcuo;


	
	protected $monpag;


	
	protected $fecpag;


	
	protected $numord;


	
	protected $ctaban;


	
	protected $numche;


	
	protected $tipmov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefopp()
  {

    return trim($this->refopp);

  }
  
  public function getRefcuo()
  {

    return trim($this->refcuo);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

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

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefopp($v)
	{

    if ($this->refopp !== $v) {
        $this->refopp = $v;
        $this->modifiedColumns[] = OpcheperPeer::REFOPP;
      }
  
	} 
	
	public function setRefcuo($v)
	{

    if ($this->refcuo !== $v) {
        $this->refcuo = $v;
        $this->modifiedColumns[] = OpcheperPeer::REFCUO;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpcheperPeer::MONPAG;
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
      $this->modifiedColumns[] = OpcheperPeer::FECPAG;
    }

	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpcheperPeer::NUMORD;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = OpcheperPeer::CTABAN;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = OpcheperPeer::NUMCHE;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = OpcheperPeer::TIPMOV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpcheperPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refopp = $rs->getString($startcol + 0);

      $this->refcuo = $rs->getString($startcol + 1);

      $this->monpag = $rs->getFloat($startcol + 2);

      $this->fecpag = $rs->getDate($startcol + 3, null);

      $this->numord = $rs->getString($startcol + 4);

      $this->ctaban = $rs->getString($startcol + 5);

      $this->numche = $rs->getString($startcol + 6);

      $this->tipmov = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opcheper object", $e);
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
			$con = Propel::getConnection(OpcheperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpcheperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpcheperPeer::DATABASE_NAME);
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
					$pk = OpcheperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpcheperPeer::doUpdate($this, $con);
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


			if (($retval = OpcheperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpcheperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefopp();
				break;
			case 1:
				return $this->getRefcuo();
				break;
			case 2:
				return $this->getMonpag();
				break;
			case 3:
				return $this->getFecpag();
				break;
			case 4:
				return $this->getNumord();
				break;
			case 5:
				return $this->getCtaban();
				break;
			case 6:
				return $this->getNumche();
				break;
			case 7:
				return $this->getTipmov();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpcheperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefopp(),
			$keys[1] => $this->getRefcuo(),
			$keys[2] => $this->getMonpag(),
			$keys[3] => $this->getFecpag(),
			$keys[4] => $this->getNumord(),
			$keys[5] => $this->getCtaban(),
			$keys[6] => $this->getNumche(),
			$keys[7] => $this->getTipmov(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpcheperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefopp($value);
				break;
			case 1:
				$this->setRefcuo($value);
				break;
			case 2:
				$this->setMonpag($value);
				break;
			case 3:
				$this->setFecpag($value);
				break;
			case 4:
				$this->setNumord($value);
				break;
			case 5:
				$this->setCtaban($value);
				break;
			case 6:
				$this->setNumche($value);
				break;
			case 7:
				$this->setTipmov($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpcheperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefopp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefcuo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumord($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCtaban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumche($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipmov($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpcheperPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpcheperPeer::REFOPP)) $criteria->add(OpcheperPeer::REFOPP, $this->refopp);
		if ($this->isColumnModified(OpcheperPeer::REFCUO)) $criteria->add(OpcheperPeer::REFCUO, $this->refcuo);
		if ($this->isColumnModified(OpcheperPeer::MONPAG)) $criteria->add(OpcheperPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(OpcheperPeer::FECPAG)) $criteria->add(OpcheperPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(OpcheperPeer::NUMORD)) $criteria->add(OpcheperPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpcheperPeer::CTABAN)) $criteria->add(OpcheperPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(OpcheperPeer::NUMCHE)) $criteria->add(OpcheperPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(OpcheperPeer::TIPMOV)) $criteria->add(OpcheperPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(OpcheperPeer::ID)) $criteria->add(OpcheperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpcheperPeer::DATABASE_NAME);

		$criteria->add(OpcheperPeer::ID, $this->id);

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

		$copyObj->setRefopp($this->refopp);

		$copyObj->setRefcuo($this->refcuo);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setNumord($this->numord);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setNumche($this->numche);

		$copyObj->setTipmov($this->tipmov);


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
			self::$peer = new OpcheperPeer();
		}
		return self::$peer;
	}

} 