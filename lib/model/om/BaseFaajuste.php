<?php


abstract class BaseFaajuste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $tipaju;


	
	protected $codref;


	
	protected $fecaju;


	
	protected $desaju;


	
	protected $codalm;


	
	protected $monaju;


	
	protected $obsaju;


	
	protected $staaju;


	
	protected $tipo;


	
	protected $nrocon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefaju()
  {

    return trim($this->refaju);

  }
  
  public function getTipaju()
  {

    return trim($this->tipaju);

  }
  
  public function getCodref()
  {

    return trim($this->codref);

  }
  
  public function getFecaju($format = 'Y-m-d')
  {

    if ($this->fecaju === null || $this->fecaju === '') {
      return null;
    } elseif (!is_int($this->fecaju)) {
            $ts = adodb_strtotime($this->fecaju);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
      }
    } else {
      $ts = $this->fecaju;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesaju()
  {

    return trim($this->desaju);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getObsaju()
  {

    return trim($this->obsaju);

  }
  
  public function getStaaju()
  {

    return trim($this->staaju);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getNrocon()
  {

    return trim($this->nrocon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefaju($v)
	{

    if ($this->refaju !== $v) {
        $this->refaju = $v;
        $this->modifiedColumns[] = FaajustePeer::REFAJU;
      }
  
	} 
	
	public function setTipaju($v)
	{

    if ($this->tipaju !== $v) {
        $this->tipaju = $v;
        $this->modifiedColumns[] = FaajustePeer::TIPAJU;
      }
  
	} 
	
	public function setCodref($v)
	{

    if ($this->codref !== $v) {
        $this->codref = $v;
        $this->modifiedColumns[] = FaajustePeer::CODREF;
      }
  
	} 
	
	public function setFecaju($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaju !== $ts) {
      $this->fecaju = $ts;
      $this->modifiedColumns[] = FaajustePeer::FECAJU;
    }

	} 
	
	public function setDesaju($v)
	{

    if ($this->desaju !== $v) {
        $this->desaju = $v;
        $this->modifiedColumns[] = FaajustePeer::DESAJU;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FaajustePeer::CODALM;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaajustePeer::MONAJU;
      }
  
	} 
	
	public function setObsaju($v)
	{

    if ($this->obsaju !== $v) {
        $this->obsaju = $v;
        $this->modifiedColumns[] = FaajustePeer::OBSAJU;
      }
  
	} 
	
	public function setStaaju($v)
	{

    if ($this->staaju !== $v) {
        $this->staaju = $v;
        $this->modifiedColumns[] = FaajustePeer::STAAJU;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FaajustePeer::TIPO;
      }
  
	} 
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = FaajustePeer::NROCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaajustePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refaju = $rs->getString($startcol + 0);

      $this->tipaju = $rs->getString($startcol + 1);

      $this->codref = $rs->getString($startcol + 2);

      $this->fecaju = $rs->getDate($startcol + 3, null);

      $this->desaju = $rs->getString($startcol + 4);

      $this->codalm = $rs->getString($startcol + 5);

      $this->monaju = $rs->getFloat($startcol + 6);

      $this->obsaju = $rs->getString($startcol + 7);

      $this->staaju = $rs->getString($startcol + 8);

      $this->tipo = $rs->getString($startcol + 9);

      $this->nrocon = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faajuste object", $e);
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
			$con = Propel::getConnection(FaajustePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaajustePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaajustePeer::DATABASE_NAME);
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
					$pk = FaajustePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaajustePeer::doUpdate($this, $con);
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


			if (($retval = FaajustePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getTipaju();
				break;
			case 2:
				return $this->getCodref();
				break;
			case 3:
				return $this->getFecaju();
				break;
			case 4:
				return $this->getDesaju();
				break;
			case 5:
				return $this->getCodalm();
				break;
			case 6:
				return $this->getMonaju();
				break;
			case 7:
				return $this->getObsaju();
				break;
			case 8:
				return $this->getStaaju();
				break;
			case 9:
				return $this->getTipo();
				break;
			case 10:
				return $this->getNrocon();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaajustePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getTipaju(),
			$keys[2] => $this->getCodref(),
			$keys[3] => $this->getFecaju(),
			$keys[4] => $this->getDesaju(),
			$keys[5] => $this->getCodalm(),
			$keys[6] => $this->getMonaju(),
			$keys[7] => $this->getObsaju(),
			$keys[8] => $this->getStaaju(),
			$keys[9] => $this->getTipo(),
			$keys[10] => $this->getNrocon(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setTipaju($value);
				break;
			case 2:
				$this->setCodref($value);
				break;
			case 3:
				$this->setFecaju($value);
				break;
			case 4:
				$this->setDesaju($value);
				break;
			case 5:
				$this->setCodalm($value);
				break;
			case 6:
				$this->setMonaju($value);
				break;
			case 7:
				$this->setObsaju($value);
				break;
			case 8:
				$this->setStaaju($value);
				break;
			case 9:
				$this->setTipo($value);
				break;
			case 10:
				$this->setNrocon($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaajustePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipaju($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodref($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodalm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObsaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStaaju($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNrocon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaajustePeer::DATABASE_NAME);

		if ($this->isColumnModified(FaajustePeer::REFAJU)) $criteria->add(FaajustePeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(FaajustePeer::TIPAJU)) $criteria->add(FaajustePeer::TIPAJU, $this->tipaju);
		if ($this->isColumnModified(FaajustePeer::CODREF)) $criteria->add(FaajustePeer::CODREF, $this->codref);
		if ($this->isColumnModified(FaajustePeer::FECAJU)) $criteria->add(FaajustePeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(FaajustePeer::DESAJU)) $criteria->add(FaajustePeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(FaajustePeer::CODALM)) $criteria->add(FaajustePeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FaajustePeer::MONAJU)) $criteria->add(FaajustePeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(FaajustePeer::OBSAJU)) $criteria->add(FaajustePeer::OBSAJU, $this->obsaju);
		if ($this->isColumnModified(FaajustePeer::STAAJU)) $criteria->add(FaajustePeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(FaajustePeer::TIPO)) $criteria->add(FaajustePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FaajustePeer::NROCON)) $criteria->add(FaajustePeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FaajustePeer::ID)) $criteria->add(FaajustePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaajustePeer::DATABASE_NAME);

		$criteria->add(FaajustePeer::ID, $this->id);

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

		$copyObj->setRefaju($this->refaju);

		$copyObj->setTipaju($this->tipaju);

		$copyObj->setCodref($this->codref);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setObsaju($this->obsaju);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setTipo($this->tipo);

		$copyObj->setNrocon($this->nrocon);


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
			self::$peer = new FaajustePeer();
		}
		return self::$peer;
	}

} 
