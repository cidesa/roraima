<?php


abstract class BaseAplifor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codapl;


	
	protected $coddiv;


	
	protected $nomopc;


	
	protected $desocp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodapl()
  {

    return trim($this->codapl);

  }
  
  public function getCoddiv()
  {

    return trim($this->coddiv);

  }
  
  public function getNomopc()
  {

    return trim($this->nomopc);

  }
  
  public function getDesocp()
  {

    return trim($this->desocp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodapl($v)
	{

    if ($this->codapl !== $v) {
        $this->codapl = $v;
        $this->modifiedColumns[] = ApliforPeer::CODAPL;
      }
  
	} 
	
	public function setCoddiv($v)
	{

    if ($this->coddiv !== $v) {
        $this->coddiv = $v;
        $this->modifiedColumns[] = ApliforPeer::CODDIV;
      }
  
	} 
	
	public function setNomopc($v)
	{

    if ($this->nomopc !== $v) {
        $this->nomopc = $v;
        $this->modifiedColumns[] = ApliforPeer::NOMOPC;
      }
  
	} 
	
	public function setDesocp($v)
	{

    if ($this->desocp !== $v) {
        $this->desocp = $v;
        $this->modifiedColumns[] = ApliforPeer::DESOCP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ApliforPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codapl = $rs->getString($startcol + 0);

      $this->coddiv = $rs->getString($startcol + 1);

      $this->nomopc = $rs->getString($startcol + 2);

      $this->desocp = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Aplifor object", $e);
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
			$con = Propel::getConnection(ApliforPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ApliforPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ApliforPeer::DATABASE_NAME);
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
					$pk = ApliforPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ApliforPeer::doUpdate($this, $con);
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


			if (($retval = ApliforPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApliforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodapl();
				break;
			case 1:
				return $this->getCoddiv();
				break;
			case 2:
				return $this->getNomopc();
				break;
			case 3:
				return $this->getDesocp();
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
		$keys = ApliforPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodapl(),
			$keys[1] => $this->getCoddiv(),
			$keys[2] => $this->getNomopc(),
			$keys[3] => $this->getDesocp(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApliforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodapl($value);
				break;
			case 1:
				$this->setCoddiv($value);
				break;
			case 2:
				$this->setNomopc($value);
				break;
			case 3:
				$this->setDesocp($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ApliforPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodapl($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCoddiv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomopc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesocp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ApliforPeer::DATABASE_NAME);

		if ($this->isColumnModified(ApliforPeer::CODAPL)) $criteria->add(ApliforPeer::CODAPL, $this->codapl);
		if ($this->isColumnModified(ApliforPeer::CODDIV)) $criteria->add(ApliforPeer::CODDIV, $this->coddiv);
		if ($this->isColumnModified(ApliforPeer::NOMOPC)) $criteria->add(ApliforPeer::NOMOPC, $this->nomopc);
		if ($this->isColumnModified(ApliforPeer::DESOCP)) $criteria->add(ApliforPeer::DESOCP, $this->desocp);
		if ($this->isColumnModified(ApliforPeer::ID)) $criteria->add(ApliforPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ApliforPeer::DATABASE_NAME);

		$criteria->add(ApliforPeer::ID, $this->id);

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

		$copyObj->setCodapl($this->codapl);

		$copyObj->setCoddiv($this->coddiv);

		$copyObj->setNomopc($this->nomopc);

		$copyObj->setDesocp($this->desocp);


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
			self::$peer = new ApliforPeer();
		}
		return self::$peer;
	}

} 