<?php


abstract class BaseFcsoldet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsol;


	
	protected $codfue;


	
	protected $nomfue;


	
	protected $objeto;


	
	protected $fecven;


	
	protected $edodec;


	
	protected $fecultpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsol()
  {

    return trim($this->codsol);

  }
  
  public function getCodfue()
  {

    return trim($this->codfue);

  }
  
  public function getNomfue()
  {

    return trim($this->nomfue);

  }
  
  public function getObjeto()
  {

    return trim($this->objeto);

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

  
  public function getEdodec()
  {

    return trim($this->edodec);

  }
  
  public function getFecultpag($format = 'Y-m-d')
  {

    if ($this->fecultpag === null || $this->fecultpag === '') {
      return null;
    } elseif (!is_int($this->fecultpag)) {
            $ts = adodb_strtotime($this->fecultpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecultpag] as date/time value: " . var_export($this->fecultpag, true));
      }
    } else {
      $ts = $this->fecultpag;
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
	
	public function setCodsol($v)
	{

    if ($this->codsol !== $v) {
        $this->codsol = $v;
        $this->modifiedColumns[] = FcsoldetPeer::CODSOL;
      }
  
	} 
	
	public function setCodfue($v)
	{

    if ($this->codfue !== $v) {
        $this->codfue = $v;
        $this->modifiedColumns[] = FcsoldetPeer::CODFUE;
      }
  
	} 
	
	public function setNomfue($v)
	{

    if ($this->nomfue !== $v) {
        $this->nomfue = $v;
        $this->modifiedColumns[] = FcsoldetPeer::NOMFUE;
      }
  
	} 
	
	public function setObjeto($v)
	{

    if ($this->objeto !== $v) {
        $this->objeto = $v;
        $this->modifiedColumns[] = FcsoldetPeer::OBJETO;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FcsoldetPeer::FECVEN;
    }

	} 
	
	public function setEdodec($v)
	{

    if ($this->edodec !== $v) {
        $this->edodec = $v;
        $this->modifiedColumns[] = FcsoldetPeer::EDODEC;
      }
  
	} 
	
	public function setFecultpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecultpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecultpag !== $ts) {
      $this->fecultpag = $ts;
      $this->modifiedColumns[] = FcsoldetPeer::FECULTPAG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcsoldetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsol = $rs->getString($startcol + 0);

      $this->codfue = $rs->getString($startcol + 1);

      $this->nomfue = $rs->getString($startcol + 2);

      $this->objeto = $rs->getString($startcol + 3);

      $this->fecven = $rs->getDate($startcol + 4, null);

      $this->edodec = $rs->getString($startcol + 5);

      $this->fecultpag = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcsoldet object", $e);
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
			$con = Propel::getConnection(FcsoldetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsoldetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsoldetPeer::DATABASE_NAME);
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
					$pk = FcsoldetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcsoldetPeer::doUpdate($this, $con);
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


			if (($retval = FcsoldetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsoldetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsol();
				break;
			case 1:
				return $this->getCodfue();
				break;
			case 2:
				return $this->getNomfue();
				break;
			case 3:
				return $this->getObjeto();
				break;
			case 4:
				return $this->getFecven();
				break;
			case 5:
				return $this->getEdodec();
				break;
			case 6:
				return $this->getFecultpag();
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
		$keys = FcsoldetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsol(),
			$keys[1] => $this->getCodfue(),
			$keys[2] => $this->getNomfue(),
			$keys[3] => $this->getObjeto(),
			$keys[4] => $this->getFecven(),
			$keys[5] => $this->getEdodec(),
			$keys[6] => $this->getFecultpag(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsoldetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsol($value);
				break;
			case 1:
				$this->setCodfue($value);
				break;
			case 2:
				$this->setNomfue($value);
				break;
			case 3:
				$this->setObjeto($value);
				break;
			case 4:
				$this->setFecven($value);
				break;
			case 5:
				$this->setEdodec($value);
				break;
			case 6:
				$this->setFecultpag($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsoldetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjeto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecven($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdodec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecultpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsoldetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsoldetPeer::CODSOL)) $criteria->add(FcsoldetPeer::CODSOL, $this->codsol);
		if ($this->isColumnModified(FcsoldetPeer::CODFUE)) $criteria->add(FcsoldetPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcsoldetPeer::NOMFUE)) $criteria->add(FcsoldetPeer::NOMFUE, $this->nomfue);
		if ($this->isColumnModified(FcsoldetPeer::OBJETO)) $criteria->add(FcsoldetPeer::OBJETO, $this->objeto);
		if ($this->isColumnModified(FcsoldetPeer::FECVEN)) $criteria->add(FcsoldetPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcsoldetPeer::EDODEC)) $criteria->add(FcsoldetPeer::EDODEC, $this->edodec);
		if ($this->isColumnModified(FcsoldetPeer::FECULTPAG)) $criteria->add(FcsoldetPeer::FECULTPAG, $this->fecultpag);
		if ($this->isColumnModified(FcsoldetPeer::ID)) $criteria->add(FcsoldetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsoldetPeer::DATABASE_NAME);

		$criteria->add(FcsoldetPeer::ID, $this->id);

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

		$copyObj->setCodsol($this->codsol);

		$copyObj->setCodfue($this->codfue);

		$copyObj->setNomfue($this->nomfue);

		$copyObj->setObjeto($this->objeto);

		$copyObj->setFecven($this->fecven);

		$copyObj->setEdodec($this->edodec);

		$copyObj->setFecultpag($this->fecultpag);


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
			self::$peer = new FcsoldetPeer();
		}
		return self::$peer;
	}

} 