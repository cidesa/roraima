<?php


abstract class BaseCpimppag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpag;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $refere;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpag()
  {

    return trim($this->refpag);

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
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getStaimp()
  {

    return trim($this->staimp);

  }
  
  public function getRefere()
  {

    return trim($this->refere);

  }
  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = CpimppagPeer::REFPAG;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpimppagPeer::CODPRE;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimppagPeer::MONIMP;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimppagPeer::MONAJU;
      }
  
	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = CpimppagPeer::STAIMP;
      }
  
	} 
	
	public function setRefere($v)
	{

    if ($this->refere !== $v) {
        $this->refere = $v;
        $this->modifiedColumns[] = CpimppagPeer::REFERE;
      }
  
	} 
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = CpimppagPeer::REFPRC;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = CpimppagPeer::REFCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpimppagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpag = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->monimp = $rs->getFloat($startcol + 2);

      $this->monaju = $rs->getFloat($startcol + 3);

      $this->staimp = $rs->getString($startcol + 4);

      $this->refere = $rs->getString($startcol + 5);

      $this->refprc = $rs->getString($startcol + 6);

      $this->refcom = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpimppag object", $e);
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
			$con = Propel::getConnection(CpimppagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpimppagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpimppagPeer::DATABASE_NAME);
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
					$pk = CpimppagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpimppagPeer::doUpdate($this, $con);
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


			if (($retval = CpimppagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimppagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpag();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMonaju();
				break;
			case 4:
				return $this->getStaimp();
				break;
			case 5:
				return $this->getRefere();
				break;
			case 6:
				return $this->getRefprc();
				break;
			case 7:
				return $this->getRefcom();
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
		$keys = CpimppagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpag(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMonaju(),
			$keys[4] => $this->getStaimp(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getRefprc(),
			$keys[7] => $this->getRefcom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimppagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpag($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMonaju($value);
				break;
			case 4:
				$this->setStaimp($value);
				break;
			case 5:
				$this->setRefere($value);
				break;
			case 6:
				$this->setRefprc($value);
				break;
			case 7:
				$this->setRefcom($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpimppagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStaimp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpimppagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpimppagPeer::REFPAG)) $criteria->add(CpimppagPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(CpimppagPeer::CODPRE)) $criteria->add(CpimppagPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpimppagPeer::MONIMP)) $criteria->add(CpimppagPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(CpimppagPeer::MONAJU)) $criteria->add(CpimppagPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpimppagPeer::STAIMP)) $criteria->add(CpimppagPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(CpimppagPeer::REFERE)) $criteria->add(CpimppagPeer::REFERE, $this->refere);
		if ($this->isColumnModified(CpimppagPeer::REFPRC)) $criteria->add(CpimppagPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpimppagPeer::REFCOM)) $criteria->add(CpimppagPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpimppagPeer::ID)) $criteria->add(CpimppagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpimppagPeer::DATABASE_NAME);

		$criteria->add(CpimppagPeer::ID, $this->id);

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

		$copyObj->setRefpag($this->refpag);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setRefere($this->refere);

		$copyObj->setRefprc($this->refprc);

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
			self::$peer = new CpimppagPeer();
		}
		return self::$peer;
	}

} 