<?php


abstract class BaseFcsoldet2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsol;


	
	protected $codfue;


	
	protected $nomfue;


	
	protected $objeto;


	
	protected $fecven;


	
	protected $edodec;


	
	protected $conpag;


	
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
  
  public function getConpag()
  {

    return trim($this->conpag);

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
        $this->modifiedColumns[] = Fcsoldet2Peer::CODSOL;
      }
  
	} 
	
	public function setCodfue($v)
	{

    if ($this->codfue !== $v) {
        $this->codfue = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::CODFUE;
      }
  
	} 
	
	public function setNomfue($v)
	{

    if ($this->nomfue !== $v) {
        $this->nomfue = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::NOMFUE;
      }
  
	} 
	
	public function setObjeto($v)
	{

    if ($this->objeto !== $v) {
        $this->objeto = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::OBJETO;
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
      $this->modifiedColumns[] = Fcsoldet2Peer::FECVEN;
    }

	} 
	
	public function setEdodec($v)
	{

    if ($this->edodec !== $v) {
        $this->edodec = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::EDODEC;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v) {
        $this->conpag = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::CONPAG;
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
      $this->modifiedColumns[] = Fcsoldet2Peer::FECULTPAG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Fcsoldet2Peer::ID;
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

      $this->conpag = $rs->getString($startcol + 6);

      $this->fecultpag = $rs->getDate($startcol + 7, null);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcsoldet2 object", $e);
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
			$con = Propel::getConnection(Fcsoldet2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcsoldet2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcsoldet2Peer::DATABASE_NAME);
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
					$pk = Fcsoldet2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Fcsoldet2Peer::doUpdate($this, $con);
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


			if (($retval = Fcsoldet2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcsoldet2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getConpag();
				break;
			case 7:
				return $this->getFecultpag();
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
		$keys = Fcsoldet2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsol(),
			$keys[1] => $this->getCodfue(),
			$keys[2] => $this->getNomfue(),
			$keys[3] => $this->getObjeto(),
			$keys[4] => $this->getFecven(),
			$keys[5] => $this->getEdodec(),
			$keys[6] => $this->getConpag(),
			$keys[7] => $this->getFecultpag(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcsoldet2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setConpag($value);
				break;
			case 7:
				$this->setFecultpag($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcsoldet2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjeto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecven($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdodec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecultpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcsoldet2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcsoldet2Peer::CODSOL)) $criteria->add(Fcsoldet2Peer::CODSOL, $this->codsol);
		if ($this->isColumnModified(Fcsoldet2Peer::CODFUE)) $criteria->add(Fcsoldet2Peer::CODFUE, $this->codfue);
		if ($this->isColumnModified(Fcsoldet2Peer::NOMFUE)) $criteria->add(Fcsoldet2Peer::NOMFUE, $this->nomfue);
		if ($this->isColumnModified(Fcsoldet2Peer::OBJETO)) $criteria->add(Fcsoldet2Peer::OBJETO, $this->objeto);
		if ($this->isColumnModified(Fcsoldet2Peer::FECVEN)) $criteria->add(Fcsoldet2Peer::FECVEN, $this->fecven);
		if ($this->isColumnModified(Fcsoldet2Peer::EDODEC)) $criteria->add(Fcsoldet2Peer::EDODEC, $this->edodec);
		if ($this->isColumnModified(Fcsoldet2Peer::CONPAG)) $criteria->add(Fcsoldet2Peer::CONPAG, $this->conpag);
		if ($this->isColumnModified(Fcsoldet2Peer::FECULTPAG)) $criteria->add(Fcsoldet2Peer::FECULTPAG, $this->fecultpag);
		if ($this->isColumnModified(Fcsoldet2Peer::ID)) $criteria->add(Fcsoldet2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcsoldet2Peer::DATABASE_NAME);

		$criteria->add(Fcsoldet2Peer::ID, $this->id);

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

		$copyObj->setConpag($this->conpag);

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
			self::$peer = new Fcsoldet2Peer();
		}
		return self::$peer;
	}

} 