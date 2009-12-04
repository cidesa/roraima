<?php


abstract class BaseTsmovtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $fectra;


	
	protected $destra;


	
	protected $ctaori;


	
	protected $ctades;


	
	protected $montra;


	
	protected $numcom;


	
	protected $status;


	
	protected $fecing;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getCtaori()
  {

    return trim($this->ctaori);

  }
  
  public function getCtades()
  {

    return trim($this->ctades);

  }
  
  public function getMontra($val=false)
  {

    if($val) return number_format($this->montra,2,',','.');
    else return $this->montra;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = TsmovtraPeer::REFTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = TsmovtraPeer::FECTRA;
    }

	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = TsmovtraPeer::DESTRA;
      }
  
	} 
	
	public function setCtaori($v)
	{

    if ($this->ctaori !== $v) {
        $this->ctaori = $v;
        $this->modifiedColumns[] = TsmovtraPeer::CTAORI;
      }
  
	} 
	
	public function setCtades($v)
	{

    if ($this->ctades !== $v) {
        $this->ctades = $v;
        $this->modifiedColumns[] = TsmovtraPeer::CTADES;
      }
  
	} 
	
	public function setMontra($v)
	{

    if ($this->montra !== $v) {
        $this->montra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsmovtraPeer::MONTRA;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = TsmovtraPeer::NUMCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = TsmovtraPeer::STATUS;
      }
  
	} 
	
	public function setFecing($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = TsmovtraPeer::FECING;
    }

	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = TsmovtraPeer::FECANU;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsmovtraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->destra = $rs->getString($startcol + 2);

      $this->ctaori = $rs->getString($startcol + 3);

      $this->ctades = $rs->getString($startcol + 4);

      $this->montra = $rs->getFloat($startcol + 5);

      $this->numcom = $rs->getString($startcol + 6);

      $this->status = $rs->getString($startcol + 7);

      $this->fecing = $rs->getDate($startcol + 8, null);

      $this->fecanu = $rs->getDate($startcol + 9, null);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsmovtra object", $e);
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
			$con = Propel::getConnection(TsmovtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsmovtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsmovtraPeer::DATABASE_NAME);
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
					$pk = TsmovtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsmovtraPeer::doUpdate($this, $con);
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


			if (($retval = TsmovtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getDestra();
				break;
			case 3:
				return $this->getCtaori();
				break;
			case 4:
				return $this->getCtades();
				break;
			case 5:
				return $this->getMontra();
				break;
			case 6:
				return $this->getNumcom();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getFecing();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getDestra(),
			$keys[3] => $this->getCtaori(),
			$keys[4] => $this->getCtades(),
			$keys[5] => $this->getMontra(),
			$keys[6] => $this->getNumcom(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getFecing(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setDestra($value);
				break;
			case 3:
				$this->setCtaori($value);
				break;
			case 4:
				$this->setCtades($value);
				break;
			case 5:
				$this->setMontra($value);
				break;
			case 6:
				$this->setNumcom($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setFecing($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCtaori($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCtades($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecing($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsmovtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsmovtraPeer::REFTRA)) $criteria->add(TsmovtraPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(TsmovtraPeer::FECTRA)) $criteria->add(TsmovtraPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(TsmovtraPeer::DESTRA)) $criteria->add(TsmovtraPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(TsmovtraPeer::CTAORI)) $criteria->add(TsmovtraPeer::CTAORI, $this->ctaori);
		if ($this->isColumnModified(TsmovtraPeer::CTADES)) $criteria->add(TsmovtraPeer::CTADES, $this->ctades);
		if ($this->isColumnModified(TsmovtraPeer::MONTRA)) $criteria->add(TsmovtraPeer::MONTRA, $this->montra);
		if ($this->isColumnModified(TsmovtraPeer::NUMCOM)) $criteria->add(TsmovtraPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(TsmovtraPeer::STATUS)) $criteria->add(TsmovtraPeer::STATUS, $this->status);
		if ($this->isColumnModified(TsmovtraPeer::FECING)) $criteria->add(TsmovtraPeer::FECING, $this->fecing);
		if ($this->isColumnModified(TsmovtraPeer::FECANU)) $criteria->add(TsmovtraPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(TsmovtraPeer::ID)) $criteria->add(TsmovtraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsmovtraPeer::DATABASE_NAME);

		$criteria->add(TsmovtraPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setDestra($this->destra);

		$copyObj->setCtaori($this->ctaori);

		$copyObj->setCtades($this->ctades);

		$copyObj->setMontra($this->montra);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setStatus($this->status);

		$copyObj->setFecing($this->fecing);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new TsmovtraPeer();
		}
		return self::$peer;
	}

} 