<?php


abstract class BaseCpmovadi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $codpre;


	
	protected $perpre;


	
	protected $monmov;


	
	protected $stamov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getStamov()
  {

    return trim($this->stamov);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpmovadiPeer::REFADI;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpmovadiPeer::CODPRE;
      }
  
	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = CpmovadiPeer::PERPRE;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovadiPeer::MONMOV;
      }
  
	} 
	
	public function setStamov($v)
	{

    if ($this->stamov !== $v) {
        $this->stamov = $v;
        $this->modifiedColumns[] = CpmovadiPeer::STAMOV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpmovadiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->perpre = $rs->getString($startcol + 2);

      $this->monmov = $rs->getFloat($startcol + 3);

      $this->stamov = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpmovadi object", $e);
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
			$con = Propel::getConnection(CpmovadiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovadiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovadiPeer::DATABASE_NAME);
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
					$pk = CpmovadiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpmovadiPeer::doUpdate($this, $con);
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


			if (($retval = CpmovadiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getStamov();
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
		$keys = CpmovadiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getStamov(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setStamov($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovadiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStamov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovadiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovadiPeer::REFADI)) $criteria->add(CpmovadiPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpmovadiPeer::CODPRE)) $criteria->add(CpmovadiPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpmovadiPeer::PERPRE)) $criteria->add(CpmovadiPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(CpmovadiPeer::MONMOV)) $criteria->add(CpmovadiPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpmovadiPeer::STAMOV)) $criteria->add(CpmovadiPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpmovadiPeer::ID)) $criteria->add(CpmovadiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovadiPeer::DATABASE_NAME);

		$criteria->add(CpmovadiPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonmov($this->monmov);

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
			self::$peer = new CpmovadiPeer();
		}
		return self::$peer;
	}

} 