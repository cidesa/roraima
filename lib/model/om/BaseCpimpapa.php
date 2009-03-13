<?php


abstract class BaseCpimpapa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refapa;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $moncom;


	
	protected $moncau;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefapa()
  {

    return trim($this->refapa);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getStaimp()
  {

    return trim($this->staimp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefapa($v)
	{

    if ($this->refapa !== $v) {
        $this->refapa = $v;
        $this->modifiedColumns[] = CpimpapaPeer::REFAPA;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpimpapaPeer::CODPRE;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpapaPeer::MONIMP;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpapaPeer::MONCOM;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpapaPeer::MONCAU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpapaPeer::MONPAG;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpapaPeer::MONAJU;
      }
  
	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = CpimpapaPeer::STAIMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpimpapaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refapa = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->monimp = $rs->getFloat($startcol + 2);

      $this->moncom = $rs->getFloat($startcol + 3);

      $this->moncau = $rs->getFloat($startcol + 4);

      $this->monpag = $rs->getFloat($startcol + 5);

      $this->monaju = $rs->getFloat($startcol + 6);

      $this->staimp = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpimpapa object", $e);
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
			$con = Propel::getConnection(CpimpapaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpimpapaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpimpapaPeer::DATABASE_NAME);
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
					$pk = CpimpapaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpimpapaPeer::doUpdate($this, $con);
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


			if (($retval = CpimpapaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimpapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefapa();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getMoncau();
				break;
			case 5:
				return $this->getMonpag();
				break;
			case 6:
				return $this->getMonaju();
				break;
			case 7:
				return $this->getStaimp();
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
		$keys = CpimpapaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefapa(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getMoncau(),
			$keys[5] => $this->getMonpag(),
			$keys[6] => $this->getMonaju(),
			$keys[7] => $this->getStaimp(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimpapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefapa($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setMoncau($value);
				break;
			case 5:
				$this->setMonpag($value);
				break;
			case 6:
				$this->setMonaju($value);
				break;
			case 7:
				$this->setStaimp($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpimpapaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefapa($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncau($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpimpapaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpimpapaPeer::REFAPA)) $criteria->add(CpimpapaPeer::REFAPA, $this->refapa);
		if ($this->isColumnModified(CpimpapaPeer::CODPRE)) $criteria->add(CpimpapaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpimpapaPeer::MONIMP)) $criteria->add(CpimpapaPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(CpimpapaPeer::MONCOM)) $criteria->add(CpimpapaPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(CpimpapaPeer::MONCAU)) $criteria->add(CpimpapaPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(CpimpapaPeer::MONPAG)) $criteria->add(CpimpapaPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CpimpapaPeer::MONAJU)) $criteria->add(CpimpapaPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpimpapaPeer::STAIMP)) $criteria->add(CpimpapaPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(CpimpapaPeer::ID)) $criteria->add(CpimpapaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpimpapaPeer::DATABASE_NAME);

		$criteria->add(CpimpapaPeer::ID, $this->id);

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

		$copyObj->setRefapa($this->refapa);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);


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
			self::$peer = new CpimpapaPeer();
		}
		return self::$peer;
	}

} 