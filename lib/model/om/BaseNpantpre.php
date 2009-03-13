<?php


abstract class BaseNpantpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecant;


	
	protected $monant;


	
	protected $monto;


	
	protected $observacion;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecant($format = 'Y-m-d')
  {

    if ($this->fecant === null || $this->fecant === '') {
      return null;
    } elseif (!is_int($this->fecant)) {
            $ts = adodb_strtotime($this->fecant);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecant] as date/time value: " . var_export($this->fecant, true));
      }
    } else {
      $ts = $this->fecant;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonant($val=false)
  {

    if($val) return number_format($this->monant,2,',','.');
    else return $this->monant;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getObservacion()
  {

    return trim($this->observacion);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpantprePeer::CODEMP;
      }
  
	} 
	
	public function setFecant($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecant] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecant !== $ts) {
      $this->fecant = $ts;
      $this->modifiedColumns[] = NpantprePeer::FECANT;
    }

	} 
	
	public function setMonant($v)
	{

    if ($this->monant !== $v) {
        $this->monant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpantprePeer::MONANT;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpantprePeer::MONTO;
      }
  
	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = NpantprePeer::OBSERVACION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpantprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecant = $rs->getDate($startcol + 1, null);

      $this->monant = $rs->getFloat($startcol + 2);

      $this->monto = $rs->getFloat($startcol + 3);

      $this->observacion = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npantpre object", $e);
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
			$con = Propel::getConnection(NpantprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpantprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpantprePeer::DATABASE_NAME);
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
					$pk = NpantprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpantprePeer::doUpdate($this, $con);
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


			if (($retval = NpantprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpantprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecant();
				break;
			case 2:
				return $this->getMonant();
				break;
			case 3:
				return $this->getMonto();
				break;
			case 4:
				return $this->getObservacion();
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
		$keys = NpantprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecant(),
			$keys[2] => $this->getMonant(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getObservacion(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpantprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecant($value);
				break;
			case 2:
				$this->setMonant($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setObservacion($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpantprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObservacion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpantprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpantprePeer::CODEMP)) $criteria->add(NpantprePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpantprePeer::FECANT)) $criteria->add(NpantprePeer::FECANT, $this->fecant);
		if ($this->isColumnModified(NpantprePeer::MONANT)) $criteria->add(NpantprePeer::MONANT, $this->monant);
		if ($this->isColumnModified(NpantprePeer::MONTO)) $criteria->add(NpantprePeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpantprePeer::OBSERVACION)) $criteria->add(NpantprePeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(NpantprePeer::ID)) $criteria->add(NpantprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpantprePeer::DATABASE_NAME);

		$criteria->add(NpantprePeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecant($this->fecant);

		$copyObj->setMonant($this->monant);

		$copyObj->setMonto($this->monto);

		$copyObj->setObservacion($this->observacion);


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
			self::$peer = new NpantprePeer();
		}
		return self::$peer;
	}

} 