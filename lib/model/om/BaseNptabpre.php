<?php


abstract class BaseNptabpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecpre;


	
	protected $codcon;


	
	protected $diames;


	
	protected $diaano;


	
	protected $interes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getDiames($val=false)
  {

    if($val) return number_format($this->diames,2,',','.');
    else return $this->diames;

  }
  
  public function getDiaano($val=false)
  {

    if($val) return number_format($this->diaano,2,',','.');
    else return $this->diaano;

  }
  
  public function getInteres($val=false)
  {

    if($val) return number_format($this->interes,2,',','.');
    else return $this->interes;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecpre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = NptabprePeer::FECPRE;
    }

	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NptabprePeer::CODCON;
      }
  
	} 
	
	public function setDiames($v)
	{

    if ($this->diames !== $v) {
        $this->diames = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptabprePeer::DIAMES;
      }
  
	} 
	
	public function setDiaano($v)
	{

    if ($this->diaano !== $v) {
        $this->diaano = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptabprePeer::DIAANO;
      }
  
	} 
	
	public function setInteres($v)
	{

    if ($this->interes !== $v) {
        $this->interes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptabprePeer::INTERES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NptabprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecpre = $rs->getDate($startcol + 0, null);

      $this->codcon = $rs->getString($startcol + 1);

      $this->diames = $rs->getFloat($startcol + 2);

      $this->diaano = $rs->getFloat($startcol + 3);

      $this->interes = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nptabpre object", $e);
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
			$con = Propel::getConnection(NptabprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptabprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptabprePeer::DATABASE_NAME);
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
					$pk = NptabprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NptabprePeer::doUpdate($this, $con);
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


			if (($retval = NptabprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptabprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecpre();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getDiames();
				break;
			case 3:
				return $this->getDiaano();
				break;
			case 4:
				return $this->getInteres();
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
		$keys = NptabprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecpre(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getDiames(),
			$keys[3] => $this->getDiaano(),
			$keys[4] => $this->getInteres(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptabprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecpre($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setDiames($value);
				break;
			case 3:
				$this->setDiaano($value);
				break;
			case 4:
				$this->setInteres($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptabprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiames($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiaano($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInteres($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptabprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NptabprePeer::FECPRE)) $criteria->add(NptabprePeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(NptabprePeer::CODCON)) $criteria->add(NptabprePeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NptabprePeer::DIAMES)) $criteria->add(NptabprePeer::DIAMES, $this->diames);
		if ($this->isColumnModified(NptabprePeer::DIAANO)) $criteria->add(NptabprePeer::DIAANO, $this->diaano);
		if ($this->isColumnModified(NptabprePeer::INTERES)) $criteria->add(NptabprePeer::INTERES, $this->interes);
		if ($this->isColumnModified(NptabprePeer::ID)) $criteria->add(NptabprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptabprePeer::DATABASE_NAME);

		$criteria->add(NptabprePeer::ID, $this->id);

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

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setDiames($this->diames);

		$copyObj->setDiaano($this->diaano);

		$copyObj->setInteres($this->interes);


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
			self::$peer = new NptabprePeer();
		}
		return self::$peer;
	}

} 