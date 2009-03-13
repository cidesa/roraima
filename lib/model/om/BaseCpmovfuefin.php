<?php


abstract class BaseCpmovfuefin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $correl;


	
	protected $refmov;


	
	protected $tipmov;


	
	protected $monmov;


	
	protected $fecmov;


	
	protected $codpre;


	
	protected $stamov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCorrel()
  {

    return trim($this->correl);

  }
  
  public function getRefmov()
  {

    return trim($this->refmov);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getFecmov($format = 'Y-m-d')
  {

    if ($this->fecmov === null || $this->fecmov === '') {
      return null;
    } elseif (!is_int($this->fecmov)) {
            $ts = adodb_strtotime($this->fecmov);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmov] as date/time value: " . var_export($this->fecmov, true));
      }
    } else {
      $ts = $this->fecmov;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getStamov()
  {

    return trim($this->stamov);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::CORREL;
      }
  
	} 
	
	public function setRefmov($v)
	{

    if ($this->refmov !== $v) {
        $this->refmov = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::REFMOV;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::TIPMOV;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovfuefinPeer::MONMOV;
      }
  
	} 
	
	public function setFecmov($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmov] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmov !== $ts) {
      $this->fecmov = $ts;
      $this->modifiedColumns[] = CpmovfuefinPeer::FECMOV;
    }

	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::CODPRE;
      }
  
	} 
	
	public function setStamov($v)
	{

    if ($this->stamov !== $v) {
        $this->stamov = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::STAMOV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpmovfuefinPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->correl = $rs->getString($startcol + 0);

      $this->refmov = $rs->getString($startcol + 1);

      $this->tipmov = $rs->getString($startcol + 2);

      $this->monmov = $rs->getFloat($startcol + 3);

      $this->fecmov = $rs->getDate($startcol + 4, null);

      $this->codpre = $rs->getString($startcol + 5);

      $this->stamov = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpmovfuefin object", $e);
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
			$con = Propel::getConnection(CpmovfuefinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovfuefinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovfuefinPeer::DATABASE_NAME);
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
					$pk = CpmovfuefinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpmovfuefinPeer::doUpdate($this, $con);
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


			if (($retval = CpmovfuefinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorrel();
				break;
			case 1:
				return $this->getRefmov();
				break;
			case 2:
				return $this->getTipmov();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getFecmov();
				break;
			case 5:
				return $this->getCodpre();
				break;
			case 6:
				return $this->getStamov();
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
		$keys = CpmovfuefinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorrel(),
			$keys[1] => $this->getRefmov(),
			$keys[2] => $this->getTipmov(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getFecmov(),
			$keys[5] => $this->getCodpre(),
			$keys[6] => $this->getStamov(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorrel($value);
				break;
			case 1:
				$this->setRefmov($value);
				break;
			case 2:
				$this->setTipmov($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setFecmov($value);
				break;
			case 5:
				$this->setCodpre($value);
				break;
			case 6:
				$this->setStamov($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovfuefinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefmov($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecmov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStamov($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovfuefinPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovfuefinPeer::CORREL)) $criteria->add(CpmovfuefinPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CpmovfuefinPeer::REFMOV)) $criteria->add(CpmovfuefinPeer::REFMOV, $this->refmov);
		if ($this->isColumnModified(CpmovfuefinPeer::TIPMOV)) $criteria->add(CpmovfuefinPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CpmovfuefinPeer::MONMOV)) $criteria->add(CpmovfuefinPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpmovfuefinPeer::FECMOV)) $criteria->add(CpmovfuefinPeer::FECMOV, $this->fecmov);
		if ($this->isColumnModified(CpmovfuefinPeer::CODPRE)) $criteria->add(CpmovfuefinPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpmovfuefinPeer::STAMOV)) $criteria->add(CpmovfuefinPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpmovfuefinPeer::ID)) $criteria->add(CpmovfuefinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovfuefinPeer::DATABASE_NAME);

		$criteria->add(CpmovfuefinPeer::ID, $this->id);

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

		$copyObj->setCorrel($this->correl);

		$copyObj->setRefmov($this->refmov);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setFecmov($this->fecmov);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setStamov($this->stamov);


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
			self::$peer = new CpmovfuefinPeer();
		}
		return self::$peer;
	}

} 