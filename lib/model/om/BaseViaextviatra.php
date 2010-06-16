<?php


abstract class BaseViaextviatra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numext;


	
	protected $fecext;


	
	protected $refcal;


	
	protected $codcat;


	
	protected $diaconper;


	
	protected $diasinper;


	
	protected $status;


	
	protected $observaciones;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumext()
  {

    return trim($this->numext);

  }
  
  public function getFecext($format = 'Y-m-d')
  {

    if ($this->fecext === null || $this->fecext === '') {
      return null;
    } elseif (!is_int($this->fecext)) {
            $ts = adodb_strtotime($this->fecext);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecext] as date/time value: " . var_export($this->fecext, true));
      }
    } else {
      $ts = $this->fecext;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefcal()
  {

    return trim($this->refcal);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getDiaconper()
  {

    return $this->diaconper;

  }
  
  public function getDiasinper()
  {

    return $this->diasinper;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumext($v)
	{

    if ($this->numext !== $v) {
        $this->numext = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::NUMEXT;
      }
  
	} 
	
	public function setFecext($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecext] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecext !== $ts) {
      $this->fecext = $ts;
      $this->modifiedColumns[] = ViaextviatraPeer::FECEXT;
    }

	} 
	
	public function setRefcal($v)
	{

    if ($this->refcal !== $v) {
        $this->refcal = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::REFCAL;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::CODCAT;
      }
  
	} 
	
	public function setDiaconper($v)
	{

    if ($this->diaconper !== $v) {
        $this->diaconper = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::DIACONPER;
      }
  
	} 
	
	public function setDiasinper($v)
	{

    if ($this->diasinper !== $v) {
        $this->diasinper = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::DIASINPER;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::STATUS;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::REFCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaextviatraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numext = $rs->getString($startcol + 0);

      $this->fecext = $rs->getDate($startcol + 1, null);

      $this->refcal = $rs->getString($startcol + 2);

      $this->codcat = $rs->getString($startcol + 3);

      $this->diaconper = $rs->getInt($startcol + 4);

      $this->diasinper = $rs->getInt($startcol + 5);

      $this->status = $rs->getString($startcol + 6);

      $this->observaciones = $rs->getString($startcol + 7);

      $this->refcom = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaextviatra object", $e);
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
			$con = Propel::getConnection(ViaextviatraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaextviatraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaextviatraPeer::DATABASE_NAME);
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
					$pk = ViaextviatraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaextviatraPeer::doUpdate($this, $con);
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


			if (($retval = ViaextviatraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaextviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumext();
				break;
			case 1:
				return $this->getFecext();
				break;
			case 2:
				return $this->getRefcal();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getDiaconper();
				break;
			case 5:
				return $this->getDiasinper();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getObservaciones();
				break;
			case 8:
				return $this->getRefcom();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaextviatraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumext(),
			$keys[1] => $this->getFecext(),
			$keys[2] => $this->getRefcal(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getDiaconper(),
			$keys[5] => $this->getDiasinper(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getObservaciones(),
			$keys[8] => $this->getRefcom(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaextviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumext($value);
				break;
			case 1:
				$this->setFecext($value);
				break;
			case 2:
				$this->setRefcal($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setDiaconper($value);
				break;
			case 5:
				$this->setDiasinper($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setObservaciones($value);
				break;
			case 8:
				$this->setRefcom($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaextviatraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumext($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefcal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiaconper($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiasinper($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObservaciones($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRefcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaextviatraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaextviatraPeer::NUMEXT)) $criteria->add(ViaextviatraPeer::NUMEXT, $this->numext);
		if ($this->isColumnModified(ViaextviatraPeer::FECEXT)) $criteria->add(ViaextviatraPeer::FECEXT, $this->fecext);
		if ($this->isColumnModified(ViaextviatraPeer::REFCAL)) $criteria->add(ViaextviatraPeer::REFCAL, $this->refcal);
		if ($this->isColumnModified(ViaextviatraPeer::CODCAT)) $criteria->add(ViaextviatraPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ViaextviatraPeer::DIACONPER)) $criteria->add(ViaextviatraPeer::DIACONPER, $this->diaconper);
		if ($this->isColumnModified(ViaextviatraPeer::DIASINPER)) $criteria->add(ViaextviatraPeer::DIASINPER, $this->diasinper);
		if ($this->isColumnModified(ViaextviatraPeer::STATUS)) $criteria->add(ViaextviatraPeer::STATUS, $this->status);
		if ($this->isColumnModified(ViaextviatraPeer::OBSERVACIONES)) $criteria->add(ViaextviatraPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(ViaextviatraPeer::REFCOM)) $criteria->add(ViaextviatraPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ViaextviatraPeer::ID)) $criteria->add(ViaextviatraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaextviatraPeer::DATABASE_NAME);

		$criteria->add(ViaextviatraPeer::ID, $this->id);

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

		$copyObj->setNumext($this->numext);

		$copyObj->setFecext($this->fecext);

		$copyObj->setRefcal($this->refcal);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setDiaconper($this->diaconper);

		$copyObj->setDiasinper($this->diasinper);

		$copyObj->setStatus($this->status);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new ViaextviatraPeer();
		}
		return self::$peer;
	}

} 