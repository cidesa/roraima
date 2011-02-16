<?php


abstract class BaseLicomint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcomint;


	
	protected $numexp;


	
	protected $feccomint;


	
	protected $codcom;


	
	protected $status;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcomint()
  {

    return trim($this->numcomint);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getFeccomint($format = 'Y-m-d')
  {

    if ($this->feccomint === null || $this->feccomint === '') {
      return null;
    } elseif (!is_int($this->feccomint)) {
            $ts = adodb_strtotime($this->feccomint);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomint] as date/time value: " . var_export($this->feccomint, true));
      }
    } else {
      $ts = $this->feccomint;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcomint($v)
	{

    if ($this->numcomint !== $v) {
        $this->numcomint = $v;
        $this->modifiedColumns[] = LicomintPeer::NUMCOMINT;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LicomintPeer::NUMEXP;
      }
  
	} 
	
	public function setFeccomint($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomint] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomint !== $ts) {
      $this->feccomint = $ts;
      $this->modifiedColumns[] = LicomintPeer::FECCOMINT;
    }

	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = LicomintPeer::CODCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LicomintPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicomintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcomint = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->feccomint = $rs->getDate($startcol + 2, null);

      $this->codcom = $rs->getString($startcol + 3);

      $this->status = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licomint object", $e);
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
			$con = Propel::getConnection(LicomintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicomintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicomintPeer::DATABASE_NAME);
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
					$pk = LicomintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicomintPeer::doUpdate($this, $con);
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


			if (($retval = LicomintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcomint();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getFeccomint();
				break;
			case 3:
				return $this->getCodcom();
				break;
			case 4:
				return $this->getStatus();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicomintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcomint(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getFeccomint(),
			$keys[3] => $this->getCodcom(),
			$keys[4] => $this->getStatus(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcomint($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setFeccomint($value);
				break;
			case 3:
				$this->setCodcom($value);
				break;
			case 4:
				$this->setStatus($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicomintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcomint($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccomint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicomintPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicomintPeer::NUMCOMINT)) $criteria->add(LicomintPeer::NUMCOMINT, $this->numcomint);
		if ($this->isColumnModified(LicomintPeer::NUMEXP)) $criteria->add(LicomintPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LicomintPeer::FECCOMINT)) $criteria->add(LicomintPeer::FECCOMINT, $this->feccomint);
		if ($this->isColumnModified(LicomintPeer::CODCOM)) $criteria->add(LicomintPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(LicomintPeer::STATUS)) $criteria->add(LicomintPeer::STATUS, $this->status);
		if ($this->isColumnModified(LicomintPeer::ID)) $criteria->add(LicomintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicomintPeer::DATABASE_NAME);

		$criteria->add(LicomintPeer::ID, $this->id);

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

		$copyObj->setNumcomint($this->numcomint);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setFeccomint($this->feccomint);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setStatus($this->status);


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
			self::$peer = new LicomintPeer();
		}
		return self::$peer;
	}

} 