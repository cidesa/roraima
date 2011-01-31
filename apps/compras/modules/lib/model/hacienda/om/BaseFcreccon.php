<?php


abstract class BaseFcreccon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $fecent;


	
	protected $fecven;


	
	protected $rifcon;


	
	protected $numlic;


	
	protected $numsol;


	
	protected $tipsol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getNumlic()
  {

    return trim($this->numlic);

  }
  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getTipsol()
  {

    return trim($this->tipsol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = FcrecconPeer::CODREC;
      }
  
	} 
	
	public function setFecent($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = FcrecconPeer::FECENT;
    }

	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FcrecconPeer::FECVEN;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcrecconPeer::RIFCON;
      }
  
	} 
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = FcrecconPeer::NUMLIC;
      }
  
	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = FcrecconPeer::NUMSOL;
      }
  
	} 
	
	public function setTipsol($v)
	{

    if ($this->tipsol !== $v) {
        $this->tipsol = $v;
        $this->modifiedColumns[] = FcrecconPeer::TIPSOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcrecconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrec = $rs->getString($startcol + 0);

      $this->fecent = $rs->getDate($startcol + 1, null);

      $this->fecven = $rs->getDate($startcol + 2, null);

      $this->rifcon = $rs->getString($startcol + 3);

      $this->numlic = $rs->getString($startcol + 4);

      $this->numsol = $rs->getString($startcol + 5);

      $this->tipsol = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcreccon object", $e);
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
			$con = Propel::getConnection(FcrecconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrecconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrecconPeer::DATABASE_NAME);
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
					$pk = FcrecconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcrecconPeer::doUpdate($this, $con);
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


			if (($retval = FcrecconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getFecent();
				break;
			case 2:
				return $this->getFecven();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getNumlic();
				break;
			case 5:
				return $this->getNumsol();
				break;
			case 6:
				return $this->getTipsol();
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
		$keys = FcrecconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getFecent(),
			$keys[2] => $this->getFecven(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getNumlic(),
			$keys[5] => $this->getNumsol(),
			$keys[6] => $this->getTipsol(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setFecent($value);
				break;
			case 2:
				$this->setFecven($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setNumlic($value);
				break;
			case 5:
				$this->setNumsol($value);
				break;
			case 6:
				$this->setTipsol($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecven($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumlic($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumsol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipsol($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrecconPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrecconPeer::CODREC)) $criteria->add(FcrecconPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcrecconPeer::FECENT)) $criteria->add(FcrecconPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FcrecconPeer::FECVEN)) $criteria->add(FcrecconPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcrecconPeer::RIFCON)) $criteria->add(FcrecconPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcrecconPeer::NUMLIC)) $criteria->add(FcrecconPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcrecconPeer::NUMSOL)) $criteria->add(FcrecconPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcrecconPeer::TIPSOL)) $criteria->add(FcrecconPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(FcrecconPeer::ID)) $criteria->add(FcrecconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrecconPeer::DATABASE_NAME);

		$criteria->add(FcrecconPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setFecent($this->fecent);

		$copyObj->setFecven($this->fecven);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setTipsol($this->tipsol);


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
			self::$peer = new FcrecconPeer();
		}
		return self::$peer;
	}

} 