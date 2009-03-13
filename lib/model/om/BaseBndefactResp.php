<?php


abstract class BaseBndefactResp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $desact;


	
	protected $canact;


	
	protected $staact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getCanact($val=false)
  {

    if($val) return number_format($this->canact,2,',','.');
    else return $this->canact;

  }
  
  public function getStaact()
  {

    return trim($this->staact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BndefactRespPeer::CODACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = BndefactRespPeer::DESACT;
      }
  
	} 
	
	public function setCanact($v)
	{

    if ($this->canact !== $v) {
        $this->canact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndefactRespPeer::CANACT;
      }
  
	} 
	
	public function setStaact($v)
	{

    if ($this->staact !== $v) {
        $this->staact = $v;
        $this->modifiedColumns[] = BndefactRespPeer::STAACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndefactRespPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->desact = $rs->getString($startcol + 1);

      $this->canact = $rs->getFloat($startcol + 2);

      $this->staact = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating BndefactResp object", $e);
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
			$con = Propel::getConnection(BndefactRespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndefactRespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndefactRespPeer::DATABASE_NAME);
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
					$pk = BndefactRespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndefactRespPeer::doUpdate($this, $con);
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


			if (($retval = BndefactRespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefactRespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getDesact();
				break;
			case 2:
				return $this->getCanact();
				break;
			case 3:
				return $this->getStaact();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefactRespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getDesact(),
			$keys[2] => $this->getCanact(),
			$keys[3] => $this->getStaact(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefactRespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setDesact($value);
				break;
			case 2:
				$this->setCanact($value);
				break;
			case 3:
				$this->setStaact($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefactRespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndefactRespPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndefactRespPeer::CODACT)) $criteria->add(BndefactRespPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndefactRespPeer::DESACT)) $criteria->add(BndefactRespPeer::DESACT, $this->desact);
		if ($this->isColumnModified(BndefactRespPeer::CANACT)) $criteria->add(BndefactRespPeer::CANACT, $this->canact);
		if ($this->isColumnModified(BndefactRespPeer::STAACT)) $criteria->add(BndefactRespPeer::STAACT, $this->staact);
		if ($this->isColumnModified(BndefactRespPeer::ID)) $criteria->add(BndefactRespPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndefactRespPeer::DATABASE_NAME);

		$criteria->add(BndefactRespPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setDesact($this->desact);

		$copyObj->setCanact($this->canact);

		$copyObj->setStaact($this->staact);


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
			self::$peer = new BndefactRespPeer();
		}
		return self::$peer;
	}

} 