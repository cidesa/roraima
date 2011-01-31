<?php


abstract class BaseNpintpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdec;


	
	protected $despre;


	
	protected $haspre;


	
	protected $porpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumdec()
  {

    return trim($this->numdec);

  }
  
  public function getDespre($format = 'Y-m-d')
  {

    if ($this->despre === null || $this->despre === '') {
      return null;
    } elseif (!is_int($this->despre)) {
            $ts = adodb_strtotime($this->despre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [despre] as date/time value: " . var_export($this->despre, true));
      }
    } else {
      $ts = $this->despre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHaspre($format = 'Y-m-d')
  {

    if ($this->haspre === null || $this->haspre === '') {
      return null;
    } elseif (!is_int($this->haspre)) {
            $ts = adodb_strtotime($this->haspre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [haspre] as date/time value: " . var_export($this->haspre, true));
      }
    } else {
      $ts = $this->haspre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPorpre($val=false)
  {

    if($val) return number_format($this->porpre,2,',','.');
    else return $this->porpre;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = NpintprePeer::NUMDEC;
      }
  
	} 
	
	public function setDespre($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [despre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->despre !== $ts) {
      $this->despre = $ts;
      $this->modifiedColumns[] = NpintprePeer::DESPRE;
    }

	} 
	
	public function setHaspre($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [haspre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->haspre !== $ts) {
      $this->haspre = $ts;
      $this->modifiedColumns[] = NpintprePeer::HASPRE;
    }

	} 
	
	public function setPorpre($v)
	{

    if ($this->porpre !== $v) {
        $this->porpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintprePeer::PORPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpintprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numdec = $rs->getString($startcol + 0);

      $this->despre = $rs->getDate($startcol + 1, null);

      $this->haspre = $rs->getDate($startcol + 2, null);

      $this->porpre = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npintpre object", $e);
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
			$con = Propel::getConnection(NpintprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpintprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpintprePeer::DATABASE_NAME);
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
					$pk = NpintprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpintprePeer::doUpdate($this, $con);
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


			if (($retval = NpintprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdec();
				break;
			case 1:
				return $this->getDespre();
				break;
			case 2:
				return $this->getHaspre();
				break;
			case 3:
				return $this->getPorpre();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpintprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdec(),
			$keys[1] => $this->getDespre(),
			$keys[2] => $this->getHaspre(),
			$keys[3] => $this->getPorpre(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdec($value);
				break;
			case 1:
				$this->setDespre($value);
				break;
			case 2:
				$this->setHaspre($value);
				break;
			case 3:
				$this->setPorpre($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpintprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHaspre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpintprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpintprePeer::NUMDEC)) $criteria->add(NpintprePeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(NpintprePeer::DESPRE)) $criteria->add(NpintprePeer::DESPRE, $this->despre);
		if ($this->isColumnModified(NpintprePeer::HASPRE)) $criteria->add(NpintprePeer::HASPRE, $this->haspre);
		if ($this->isColumnModified(NpintprePeer::PORPRE)) $criteria->add(NpintprePeer::PORPRE, $this->porpre);
		if ($this->isColumnModified(NpintprePeer::ID)) $criteria->add(NpintprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpintprePeer::DATABASE_NAME);

		$criteria->add(NpintprePeer::ID, $this->id);

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

		$copyObj->setNumdec($this->numdec);

		$copyObj->setDespre($this->despre);

		$copyObj->setHaspre($this->haspre);

		$copyObj->setPorpre($this->porpre);


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
			self::$peer = new NpintprePeer();
		}
		return self::$peer;
	}

} 