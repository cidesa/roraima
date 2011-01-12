<?php


abstract class BaseFcdecpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $numdec;


	
	protected $numref;


	
	protected $fecven;


	
	protected $mondec;


	
	protected $numero;


	
	protected $fueing;


	
	protected $monpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getNumdec()
  {

    return trim($this->numdec);

  }
  
  public function getNumref()
  {

    return trim($this->numref);

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

  
  public function getMondec($val=false)
  {

    if($val) return number_format($this->mondec,2,',','.');
    else return $this->mondec;

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getFueing()
  {

    return trim($this->fueing);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = FcdecpagPeer::NUMPAG;
      }
  
	} 
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = FcdecpagPeer::NUMDEC;
      }
  
	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = FcdecpagPeer::NUMREF;
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
      $this->modifiedColumns[] = FcdecpagPeer::FECVEN;
    }

	} 
	
	public function setMondec($v)
	{

    if ($this->mondec !== $v) {
        $this->mondec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdecpagPeer::MONDEC;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcdecpagPeer::NUMERO;
      }
  
	} 
	
	public function setFueing($v)
	{

    if ($this->fueing !== $v) {
        $this->fueing = $v;
        $this->modifiedColumns[] = FcdecpagPeer::FUEING;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdecpagPeer::MONPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdecpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpag = $rs->getString($startcol + 0);

      $this->numdec = $rs->getString($startcol + 1);

      $this->numref = $rs->getString($startcol + 2);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->mondec = $rs->getFloat($startcol + 4);

      $this->numero = $rs->getString($startcol + 5);

      $this->fueing = $rs->getString($startcol + 6);

      $this->monpag = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdecpag object", $e);
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
			$con = Propel::getConnection(FcdecpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdecpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdecpagPeer::DATABASE_NAME);
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
					$pk = FcdecpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdecpagPeer::doUpdate($this, $con);
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


			if (($retval = FcdecpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdecpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getNumdec();
				break;
			case 2:
				return $this->getNumref();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getMondec();
				break;
			case 5:
				return $this->getNumero();
				break;
			case 6:
				return $this->getFueing();
				break;
			case 7:
				return $this->getMonpag();
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
		$keys = FcdecpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getNumdec(),
			$keys[2] => $this->getNumref(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getMondec(),
			$keys[5] => $this->getNumero(),
			$keys[6] => $this->getFueing(),
			$keys[7] => $this->getMonpag(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdecpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setNumdec($value);
				break;
			case 2:
				$this->setNumref($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setMondec($value);
				break;
			case 5:
				$this->setNumero($value);
				break;
			case 6:
				$this->setFueing($value);
				break;
			case 7:
				$this->setMonpag($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdecpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumdec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumref($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumero($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFueing($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdecpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdecpagPeer::NUMPAG)) $criteria->add(FcdecpagPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcdecpagPeer::NUMDEC)) $criteria->add(FcdecpagPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcdecpagPeer::NUMREF)) $criteria->add(FcdecpagPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcdecpagPeer::FECVEN)) $criteria->add(FcdecpagPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcdecpagPeer::MONDEC)) $criteria->add(FcdecpagPeer::MONDEC, $this->mondec);
		if ($this->isColumnModified(FcdecpagPeer::NUMERO)) $criteria->add(FcdecpagPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcdecpagPeer::FUEING)) $criteria->add(FcdecpagPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcdecpagPeer::MONPAG)) $criteria->add(FcdecpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdecpagPeer::ID)) $criteria->add(FcdecpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdecpagPeer::DATABASE_NAME);

		$criteria->add(FcdecpagPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setNumref($this->numref);

		$copyObj->setFecven($this->fecven);

		$copyObj->setMondec($this->mondec);

		$copyObj->setNumero($this->numero);

		$copyObj->setFueing($this->fueing);

		$copyObj->setMonpag($this->monpag);


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
			self::$peer = new FcdecpagPeer();
		}
		return self::$peer;
	}

} 