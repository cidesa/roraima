<?php


abstract class BaseForproinvmun extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmun;


	
	protected $codpremun;


	
	protected $codpregob;


	
	protected $despremun;


	
	protected $monapomun;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodpremun()
  {

    return trim($this->codpremun);

  }
  
  public function getCodpregob()
  {

    return trim($this->codpregob);

  }
  
  public function getDespremun()
  {

    return trim($this->despremun);

  }
  
  public function getMonapomun($val=false)
  {

    if($val) return number_format($this->monapomun,2,',','.');
    else return $this->monapomun;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = ForproinvmunPeer::CODMUN;
      }
  
	} 
	
	public function setCodpremun($v)
	{

    if ($this->codpremun !== $v) {
        $this->codpremun = $v;
        $this->modifiedColumns[] = ForproinvmunPeer::CODPREMUN;
      }
  
	} 
	
	public function setCodpregob($v)
	{

    if ($this->codpregob !== $v) {
        $this->codpregob = $v;
        $this->modifiedColumns[] = ForproinvmunPeer::CODPREGOB;
      }
  
	} 
	
	public function setDespremun($v)
	{

    if ($this->despremun !== $v) {
        $this->despremun = $v;
        $this->modifiedColumns[] = ForproinvmunPeer::DESPREMUN;
      }
  
	} 
	
	public function setMonapomun($v)
	{

    if ($this->monapomun !== $v) {
        $this->monapomun = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForproinvmunPeer::MONAPOMUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForproinvmunPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmun = $rs->getString($startcol + 0);

      $this->codpremun = $rs->getString($startcol + 1);

      $this->codpregob = $rs->getString($startcol + 2);

      $this->despremun = $rs->getString($startcol + 3);

      $this->monapomun = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forproinvmun object", $e);
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
			$con = Propel::getConnection(ForproinvmunPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForproinvmunPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForproinvmunPeer::DATABASE_NAME);
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
					$pk = ForproinvmunPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForproinvmunPeer::doUpdate($this, $con);
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


			if (($retval = ForproinvmunPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForproinvmunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmun();
				break;
			case 1:
				return $this->getCodpremun();
				break;
			case 2:
				return $this->getCodpregob();
				break;
			case 3:
				return $this->getDespremun();
				break;
			case 4:
				return $this->getMonapomun();
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
		$keys = ForproinvmunPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmun(),
			$keys[1] => $this->getCodpremun(),
			$keys[2] => $this->getCodpregob(),
			$keys[3] => $this->getDespremun(),
			$keys[4] => $this->getMonapomun(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForproinvmunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmun($value);
				break;
			case 1:
				$this->setCodpremun($value);
				break;
			case 2:
				$this->setCodpregob($value);
				break;
			case 3:
				$this->setDespremun($value);
				break;
			case 4:
				$this->setMonapomun($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForproinvmunPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmun($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpremun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpregob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespremun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonapomun($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForproinvmunPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForproinvmunPeer::CODMUN)) $criteria->add(ForproinvmunPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(ForproinvmunPeer::CODPREMUN)) $criteria->add(ForproinvmunPeer::CODPREMUN, $this->codpremun);
		if ($this->isColumnModified(ForproinvmunPeer::CODPREGOB)) $criteria->add(ForproinvmunPeer::CODPREGOB, $this->codpregob);
		if ($this->isColumnModified(ForproinvmunPeer::DESPREMUN)) $criteria->add(ForproinvmunPeer::DESPREMUN, $this->despremun);
		if ($this->isColumnModified(ForproinvmunPeer::MONAPOMUN)) $criteria->add(ForproinvmunPeer::MONAPOMUN, $this->monapomun);
		if ($this->isColumnModified(ForproinvmunPeer::ID)) $criteria->add(ForproinvmunPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForproinvmunPeer::DATABASE_NAME);

		$criteria->add(ForproinvmunPeer::ID, $this->id);

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

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpremun($this->codpremun);

		$copyObj->setCodpregob($this->codpregob);

		$copyObj->setDespremun($this->despremun);

		$copyObj->setMonapomun($this->monapomun);


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
			self::$peer = new ForproinvmunPeer();
		}
		return self::$peer;
	}

} 