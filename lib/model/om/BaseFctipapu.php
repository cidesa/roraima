<?php


abstract class BaseFctipapu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipapu;


	
	protected $anovig;


	
	protected $destip;


	
	protected $pormon;


	
	protected $alimon;


	
	protected $statip;


	
	protected $unipar;


	
	protected $frepar;


	
	protected $parapu;


	
	protected $exoapu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipapu()
  {

    return trim($this->tipapu);

  }
  
  public function getAnovig()
  {

    return trim($this->anovig);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getPormon()
  {

    return trim($this->pormon);

  }
  
  public function getAlimon($val=false)
  {

    if($val) return number_format($this->alimon,2,',','.');
    else return $this->alimon;

  }
  
  public function getStatip()
  {

    return trim($this->statip);

  }
  
  public function getUnipar()
  {

    return trim($this->unipar);

  }
  
  public function getFrepar()
  {

    return $this->frepar;

  }
  
  public function getParapu()
  {

    return trim($this->parapu);

  }
  
  public function getExoapu()
  {

    return trim($this->exoapu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipapu($v)
	{

    if ($this->tipapu !== $v) {
        $this->tipapu = $v;
        $this->modifiedColumns[] = FctipapuPeer::TIPAPU;
      }
  
	} 
	
	public function setAnovig($v)
	{

    if ($this->anovig !== $v) {
        $this->anovig = $v;
        $this->modifiedColumns[] = FctipapuPeer::ANOVIG;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = FctipapuPeer::DESTIP;
      }
  
	} 
	
	public function setPormon($v)
	{

    if ($this->pormon !== $v) {
        $this->pormon = $v;
        $this->modifiedColumns[] = FctipapuPeer::PORMON;
      }
  
	} 
	
	public function setAlimon($v)
	{

    if ($this->alimon !== $v) {
        $this->alimon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FctipapuPeer::ALIMON;
      }
  
	} 
	
	public function setStatip($v)
	{

    if ($this->statip !== $v) {
        $this->statip = $v;
        $this->modifiedColumns[] = FctipapuPeer::STATIP;
      }
  
	} 
	
	public function setUnipar($v)
	{

    if ($this->unipar !== $v) {
        $this->unipar = $v;
        $this->modifiedColumns[] = FctipapuPeer::UNIPAR;
      }
  
	} 
	
	public function setFrepar($v)
	{

    if ($this->frepar !== $v) {
        $this->frepar = $v;
        $this->modifiedColumns[] = FctipapuPeer::FREPAR;
      }
  
	} 
	
	public function setParapu($v)
	{

    if ($this->parapu !== $v) {
        $this->parapu = $v;
        $this->modifiedColumns[] = FctipapuPeer::PARAPU;
      }
  
	} 
	
	public function setExoapu($v)
	{

    if ($this->exoapu !== $v) {
        $this->exoapu = $v;
        $this->modifiedColumns[] = FctipapuPeer::EXOAPU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FctipapuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipapu = $rs->getString($startcol + 0);

      $this->anovig = $rs->getString($startcol + 1);

      $this->destip = $rs->getString($startcol + 2);

      $this->pormon = $rs->getString($startcol + 3);

      $this->alimon = $rs->getFloat($startcol + 4);

      $this->statip = $rs->getString($startcol + 5);

      $this->unipar = $rs->getString($startcol + 6);

      $this->frepar = $rs->getInt($startcol + 7);

      $this->parapu = $rs->getString($startcol + 8);

      $this->exoapu = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fctipapu object", $e);
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
			$con = Propel::getConnection(FctipapuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctipapuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctipapuPeer::DATABASE_NAME);
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
					$pk = FctipapuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FctipapuPeer::doUpdate($this, $con);
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


			if (($retval = FctipapuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipapu();
				break;
			case 1:
				return $this->getAnovig();
				break;
			case 2:
				return $this->getDestip();
				break;
			case 3:
				return $this->getPormon();
				break;
			case 4:
				return $this->getAlimon();
				break;
			case 5:
				return $this->getStatip();
				break;
			case 6:
				return $this->getUnipar();
				break;
			case 7:
				return $this->getFrepar();
				break;
			case 8:
				return $this->getParapu();
				break;
			case 9:
				return $this->getExoapu();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipapuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipapu(),
			$keys[1] => $this->getAnovig(),
			$keys[2] => $this->getDestip(),
			$keys[3] => $this->getPormon(),
			$keys[4] => $this->getAlimon(),
			$keys[5] => $this->getStatip(),
			$keys[6] => $this->getUnipar(),
			$keys[7] => $this->getFrepar(),
			$keys[8] => $this->getParapu(),
			$keys[9] => $this->getExoapu(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipapu($value);
				break;
			case 1:
				$this->setAnovig($value);
				break;
			case 2:
				$this->setDestip($value);
				break;
			case 3:
				$this->setPormon($value);
				break;
			case 4:
				$this->setAlimon($value);
				break;
			case 5:
				$this->setStatip($value);
				break;
			case 6:
				$this->setUnipar($value);
				break;
			case 7:
				$this->setFrepar($value);
				break;
			case 8:
				$this->setParapu($value);
				break;
			case 9:
				$this->setExoapu($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipapuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipapu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnovig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestip($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPormon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlimon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatip($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnipar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFrepar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setParapu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExoapu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctipapuPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctipapuPeer::TIPAPU)) $criteria->add(FctipapuPeer::TIPAPU, $this->tipapu);
		if ($this->isColumnModified(FctipapuPeer::ANOVIG)) $criteria->add(FctipapuPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FctipapuPeer::DESTIP)) $criteria->add(FctipapuPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(FctipapuPeer::PORMON)) $criteria->add(FctipapuPeer::PORMON, $this->pormon);
		if ($this->isColumnModified(FctipapuPeer::ALIMON)) $criteria->add(FctipapuPeer::ALIMON, $this->alimon);
		if ($this->isColumnModified(FctipapuPeer::STATIP)) $criteria->add(FctipapuPeer::STATIP, $this->statip);
		if ($this->isColumnModified(FctipapuPeer::UNIPAR)) $criteria->add(FctipapuPeer::UNIPAR, $this->unipar);
		if ($this->isColumnModified(FctipapuPeer::FREPAR)) $criteria->add(FctipapuPeer::FREPAR, $this->frepar);
		if ($this->isColumnModified(FctipapuPeer::PARAPU)) $criteria->add(FctipapuPeer::PARAPU, $this->parapu);
		if ($this->isColumnModified(FctipapuPeer::EXOAPU)) $criteria->add(FctipapuPeer::EXOAPU, $this->exoapu);
		if ($this->isColumnModified(FctipapuPeer::ID)) $criteria->add(FctipapuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctipapuPeer::DATABASE_NAME);

		$criteria->add(FctipapuPeer::ID, $this->id);

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

		$copyObj->setTipapu($this->tipapu);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setDestip($this->destip);

		$copyObj->setPormon($this->pormon);

		$copyObj->setAlimon($this->alimon);

		$copyObj->setStatip($this->statip);

		$copyObj->setUnipar($this->unipar);

		$copyObj->setFrepar($this->frepar);

		$copyObj->setParapu($this->parapu);

		$copyObj->setExoapu($this->exoapu);


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
			self::$peer = new FctipapuPeer();
		}
		return self::$peer;
	}

} 